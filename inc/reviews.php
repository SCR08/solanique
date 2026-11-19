<?php
/** Staff-managed, client-approved reviews with optional source links. @package Solanique */
defined( 'ABSPATH' ) || exit;

/** The client's approved destination for writing a Google review. */
function sg_google_review_url(): string {
	return 'https://g.page/r/CeAaHKKd0OStECE/review';
}

/** Register an editorial collection, not a public review submission endpoint. */
function sg_register_reviews(): void {
	register_post_type(
		'sg_review',
		array(
			'labels' => array(
				'name'          => __( 'Reviews', 'solanique' ),
				'singular_name' => __( 'Review', 'solanique' ),
				'add_new_item'  => __( 'Add review excerpt', 'solanique' ),
				'edit_item'     => __( 'Edit review excerpt', 'solanique' ),
			),
			'public'              => false,
			'publicly_queryable'  => false,
			'exclude_from_search' => true,
			'show_ui'             => true,
			'show_in_rest'        => false,
			'rewrite'             => false,
			'query_var'           => false,
			'capability_type'     => 'page',
			'map_meta_cap'        => true,
			'menu_icon'           => 'dashicons-format-quote',
			'supports'            => array( 'title', 'editor', 'revisions', 'page-attributes' ),
		)
	);
}
add_action( 'init', 'sg_register_reviews' );

/** Keep the source and publication approval explicit for every excerpt. */
function sg_review_meta_box(): void {
	add_meta_box( 'sg-review-details', __( 'Review source and approval', 'solanique' ), 'sg_review_meta_fields', 'sg_review', 'normal', 'high' );
}
add_action( 'add_meta_boxes_sg_review', 'sg_review_meta_box' );

/** @param WP_Post $post Review being edited. */
function sg_review_meta_fields( WP_Post $post ): void {
	wp_nonce_field( 'sg_save_review', 'sg_review_nonce' );
	$language = get_post_meta( $post->ID, '_sg_review_language', true );
	$original_language = get_post_meta( $post->ID, '_sg_review_original_language', true ) ?: ( 'es' === $language ? 'es' : 'en' );
	?>
	<p><?php esc_html_e( 'Use the reviewer name as the title and the exact approved review text as the body. No invented reviews, ratings, or translations.', 'solanique' ); ?></p>
	<p>
		<label for="sg-review-source"><?php esc_html_e( 'Original Google review URL (optional for client-supplied testimonials)', 'solanique' ); ?></label><br>
		<input id="sg-review-source" class="widefat" type="url" name="sg_review_source" value="<?php echo esc_attr( get_post_meta( $post->ID, '_sg_review_source', true ) ); ?>" placeholder="https://">
		<span class="description"><?php esc_html_e( 'Leave blank when no individual source link was supplied. No Google attribution link will be shown.', 'solanique' ); ?></span>
	</p>
	<p>
		<label for="sg-review-language"><?php esc_html_e( 'Show on', 'solanique' ); ?></label>
		<select id="sg-review-language" name="sg_review_language">
			<option value="en" <?php selected( $language, 'en' ); ?>>English</option>
			<option value="es" <?php selected( $language, 'es' ); ?>>Español</option>
			<option value="both" <?php selected( $language, 'both' ); ?>><?php esc_html_e( 'Both languages (keep original review wording)', 'solanique' ); ?></option>
		</select>
	</p>
	<p>
		<label for="sg-review-original-language"><?php esc_html_e( 'Original review language', 'solanique' ); ?></label>
		<select id="sg-review-original-language" name="sg_review_original_language">
			<option value="en" <?php selected( $original_language, 'en' ); ?>>English</option>
			<option value="es" <?php selected( $original_language, 'es' ); ?>>Español</option>
		</select>
	</p>
	<p><label><input type="checkbox" name="sg_review_approved" value="1" <?php checked( get_post_meta( $post->ID, '_sg_review_approved', true ), '1' ); ?>> <?php esc_html_e( 'Exact text and reviewer attribution approved for website display', 'solanique' ); ?></label></p>
	<p><label><input type="checkbox" name="sg_review_other_brokerage" value="1" <?php checked( get_post_meta( $post->ID, '_sg_review_other_brokerage', true ), '1' ); ?>> <?php esc_html_e( 'Experience with Sandra at another brokerage', 'solanique' ); ?></label></p>
	<?php
}

/** @param int $post_id Review ID. */
function sg_save_review_details( int $post_id ): void {
	if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || wp_is_post_revision( $post_id )
		|| ! current_user_can( 'edit_post', $post_id )
		|| ! isset( $_POST['sg_review_nonce'] ) || ! is_string( $_POST['sg_review_nonce'] )
		|| ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sg_review_nonce'] ) ), 'sg_save_review' ) ) {
		return;
	}

	$language = isset( $_POST['sg_review_language'] ) && is_string( $_POST['sg_review_language'] ) ? sanitize_key( wp_unslash( $_POST['sg_review_language'] ) ) : 'en';
	$raw_source = isset( $_POST['sg_review_source'] ) && is_string( $_POST['sg_review_source'] ) ? trim( wp_unslash( $_POST['sg_review_source'] ) ) : '';
	$source   = sg_sanitize_google_review_source( $raw_source );
	$original_language = isset( $_POST['sg_review_original_language'] ) && is_string( $_POST['sg_review_original_language'] ) ? sanitize_key( wp_unslash( $_POST['sg_review_original_language'] ) ) : ( 'es' === $language ? 'es' : 'en' );
	$invalid_source = ( isset( $_POST['sg_review_source'] ) && ! is_string( $_POST['sg_review_source'] ) ) || ( '' !== $raw_source && '' === $source );
	update_post_meta( $post_id, '_sg_review_source', $source );
	update_post_meta( $post_id, '_sg_review_language', in_array( $language, array( 'en', 'es', 'both' ), true ) ? $language : 'en' );
	update_post_meta( $post_id, '_sg_review_original_language', in_array( $original_language, array( 'en', 'es' ), true ) ? $original_language : 'en' );
	update_post_meta( $post_id, '_sg_review_approved', isset( $_POST['sg_review_approved'] ) && '1' === $_POST['sg_review_approved'] && ! $invalid_source ? '1' : '0' );
	update_post_meta( $post_id, '_sg_review_other_brokerage', isset( $_POST['sg_review_other_brokerage'] ) && '1' === $_POST['sg_review_other_brokerage'] ? '1' : '0' );
}
add_action( 'save_post_sg_review', 'sg_save_review_details' );

/** Accept HTTPS Google review/profile links, never arbitrary external domains. */
function sg_sanitize_google_review_source( string $url ): string {
	$url  = esc_url_raw( $url, array( 'https' ) );
	$host = strtolower( (string) wp_parse_url( $url, PHP_URL_HOST ) );
	if ( 'https' !== wp_parse_url( $url, PHP_URL_SCHEME ) ) {
		return '';
	}
	foreach ( array( 'google.com', 'google.ca', 'g.page', 'maps.app.goo.gl' ) as $domain ) {
		if ( $host === $domain || ( in_array( $domain, array( 'google.com', 'google.ca' ), true ) && str_ends_with( $host, '.' . $domain ) ) ) {
			return $url;
		}
	}
	return '';
}

/** Returns up to six published, approved excerpts in the selected language. */
function sg_get_home_reviews(): array {
	$query = new WP_Query(
		array(
			'post_type'      => 'sg_review',
			'post_status'    => 'publish',
			'posts_per_page' => 6,
			'no_found_rows'  => true,
			'orderby'        => array( 'menu_order' => 'ASC', 'date' => 'DESC' ),
			'meta_query'     => array(
				array( 'key' => '_sg_review_approved', 'value' => '1' ),
				array( 'key' => '_sg_review_language', 'value' => array( sg_current_lang(), 'both' ), 'compare' => 'IN' ),
			),
		)
	);
	$reviews = array();
	foreach ( $query->posts as $post ) {
		$text   = trim( wp_strip_all_tags( strip_shortcodes( $post->post_content ) ) );
		$source = sg_sanitize_google_review_source( get_post_meta( $post->ID, '_sg_review_source', true ) );
		$original_language = get_post_meta( $post->ID, '_sg_review_original_language', true );
		if ( ! in_array( $original_language, array( 'en', 'es' ), true ) ) {
			$original_language = 'es' === get_post_meta( $post->ID, '_sg_review_language', true ) ? 'es' : 'en';
		}
		if ( '' !== trim( $post->post_title ) && '' !== $text ) {
			$reviews[] = array( 'name' => $post->post_title, 'text' => $text, 'source' => $source, 'language' => $original_language, 'other_brokerage' => '1' === get_post_meta( $post->ID, '_sg_review_other_brokerage', true ) );
		}
	}
	return $reviews;
}
