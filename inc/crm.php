<?php
/**
 * Future CRM and Go High Level integration manifest.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

/** Only a saved, explicitly approved dedicated student form may replace email. */
function sg_get_student_presentation_form(): array {
	$id = sg_sanitize_ghl_form_id( get_theme_mod( 'sg_student_presentation_form_id', '' ) );
	if ( '' === $id || ! get_theme_mod( 'sg_student_presentation_form_approved', false ) ) {
		return array();
	}
	// Keep the routing key compatible with the already-published intake script.
	return array( $id, 'Concierge' );
}

/** Accept form IDs, not arbitrary embeds, scripts or external destinations. */
function sg_sanitize_ghl_form_id( $value ): string {
	return is_string( $value ) && preg_match( '/^[A-Za-z0-9]{20}$/D', $value ) ? $value : '';
}

add_action( 'customize_register', function ( WP_Customize_Manager $customizer ): void {
	$customizer->add_section( 'sg_student_intake', array(
		'title' => __( 'Student program intake', 'solanique' ),
		'description' => __( 'Use only a dedicated, approved Spanish GHL student presentation form. Leave disabled until fields, privacy and department notifications are checked. This does not activate workflows.', 'solanique' ),
	) );
	$customizer->add_setting( 'sg_student_presentation_form_id', array( 'default' => '', 'sanitize_callback' => 'sg_sanitize_ghl_form_id' ) );
	$customizer->add_control( 'sg_student_presentation_form_id', array( 'section' => 'sg_student_intake', 'label' => __( 'Approved GHL student form ID', 'solanique' ), 'type' => 'text' ) );
	$customizer->add_setting( 'sg_student_presentation_form_approved', array( 'default' => false, 'sanitize_callback' => 'rest_sanitize_boolean' ) );
	$customizer->add_control( 'sg_student_presentation_form_approved', array( 'section' => 'sg_student_intake', 'label' => __( 'Enable the approved student presentation form', 'solanique' ), 'type' => 'checkbox' ) );
} );

/** Returns the approved intake form for the current page. */
function sg_get_native_ghl_popup(): array {
	if ( sg_is_student_program() && ! sg_is_student_program_v2() ) {
		return sg_get_student_presentation_form();
	}
	$forms = array(
		'capital' => array( 'A09fGOKG0qMdqOm3kNBF', 'Capital' ),
		'estates' => array( 'ZkIp2RDdL2MT2ZiwUABK', 'Estates' ),
		'concierge' => array( 'mLgnoua7O94pvh4kYsFc', 'Concierge' ),
		'inquiry' => array( '7RZNMVuqafSzVAnKkhn4', 'Inquiry' ),
	);
	foreach ( $forms as $page => $form ) {
		$slugs = 'estates' === $page ? array( 'estate', 'estates' ) : array( $page );
		if ( is_page( $slugs ) || is_page_template( 'page-' . $page . '.php' ) ) {
			return $form;
		}
	}
	return array();
}

add_action( 'wp_footer', function (): void {
	$form = sg_get_native_ghl_popup();
	if ( ! $form ) {
		return;
	}
	$id = 'inline-' . $form[0];
	$is_student = sg_is_student_program() && ! sg_is_student_program_v2();
	$title = $is_student ? 'Programa de estudiantes internacionales' : $form[1];
	?>
	<dialog class="sg-intake-dialog" id="sg-intake-dialog" aria-labelledby="sg-intake-title" data-sg-intake <?php if ( $is_student ) : ?>style="height:90svh;overflow-anchor:none"<?php endif; ?>>
		<header class="sg-intake-dialog__header">
			<h2 id="sg-intake-title"><?php echo esc_html( $title ); ?></h2>
			<button type="button" data-sg-intake-close aria-label="<?php echo esc_attr( 'es' === sg_current_lang() ? 'Cerrar formulario de consulta' : __( 'Close inquiry form', 'solanique' ) ); ?>">&#215;</button>
		</header>
		<p data-sg-intake-status role="status"><?php echo esc_html( 'es' === sg_current_lang() ? 'Cargando formulario...' : __( 'Loading form...', 'solanique' ) ); ?></p>
	<iframe
		data-src="<?php echo esc_url( 'https://api.leadconnectorhq.com/widget/form/' . $form[0] ); ?>"
		style="width:100%;height:1100px;border:none;border-radius:8px"
		id="<?php echo esc_attr( $id ); ?>"
		data-layout="{'id':'INLINE'}"
		data-trigger-type="alwaysShow"
		data-trigger-value=""
		data-activation-type="alwaysActivated"
		data-activation-value=""
		data-deactivation-type="neverDeactivate"
		data-deactivation-value=""
		data-form-name="<?php echo esc_attr( $form[1] ); ?>"
		data-height="1100"
		data-layout-iframe-id="<?php echo esc_attr( $id ); ?>"
		data-form-id="<?php echo esc_attr( $form[0] ); ?>"
		data-cookie-consent="true"
		data-cookie-consent-provider="auto"
		title="<?php echo esc_attr( $form[1] ); ?>"
	></iframe>
	</dialog>
	<?php
}, 10 );

/**
 * Returns planned CRM form entries.
 *
 * Entries are disabled until approved embed code or approved external form URLs
 * are supplied. The theme does not collect personal information natively.
 *
 * @param string $page     Optional page key.
 * @param string $service  Optional service key.
 * @param string $language Optional language code.
 * @return array<int,array<string,mixed>>
 */
function sg_get_crm_forms( string $page = '', string $service = '', string $language = '' ): array {
	$forms = array(
		array(
			'id'             => 'general-inquiry-en',
			'page'           => 'inquiry',
			'service'        => 'general',
			'language'       => 'en',
			'embed_code'     => '',
			'external_url'   => '',
			'enabled'        => false,
			'fallback_email' => '',
			'notes'          => 'Future General Inquiry GHL form.',
		),
		array(
			'id'             => 'general-inquiry-es',
			'page'           => 'inquiry',
			'service'        => 'general',
			'language'       => 'es',
			'embed_code'     => '',
			'external_url'   => '',
			'enabled'        => false,
			'fallback_email' => '',
			'notes'          => 'Future Spanish General Inquiry GHL form.',
		),
		array(
			'id'             => 'capital-inquiry-en',
			'page'           => 'capital',
			'service'        => 'capital',
			'language'       => 'en',
			'embed_code'     => '',
			'external_url'   => '',
			'enabled'        => false,
			'fallback_email' => '',
			'notes'          => 'Future Capital-specific GHL form.',
		),
		array(
			'id'             => 'capital-inquiry-es',
			'page'           => 'capital',
			'service'        => 'capital',
			'language'       => 'es',
			'embed_code'     => '',
			'external_url'   => '',
			'enabled'        => false,
			'fallback_email' => '',
			'notes'          => 'Future Spanish Capital-specific GHL form.',
		),
		array(
			'id'             => 'estate-inquiry-en',
			'page'           => 'estate',
			'service'        => 'estate',
			'language'       => 'en',
			'embed_code'     => '',
			'external_url'   => '',
			'enabled'        => false,
			'fallback_email' => '',
			'notes'          => 'Future Estate-specific GHL form.',
		),
		array(
			'id'             => 'estate-inquiry-es',
			'page'           => 'estate',
			'service'        => 'estate',
			'language'       => 'es',
			'embed_code'     => '',
			'external_url'   => '',
			'enabled'        => false,
			'fallback_email' => '',
			'notes'          => 'Future Spanish Estate-specific GHL form.',
		),
		array(
			'id'             => 'concierge-inquiry-en',
			'page'           => 'concierge',
			'service'        => 'concierge',
			'language'       => 'en',
			'embed_code'     => '',
			'external_url'   => '',
			'enabled'        => false,
			'fallback_email' => '',
			'notes'          => 'Future Concierge-specific GHL form.',
		),
		array(
			'id'             => 'concierge-inquiry-es',
			'page'           => 'concierge',
			'service'        => 'concierge',
			'language'       => 'es',
			'embed_code'     => '',
			'external_url'   => '',
			'enabled'        => false,
			'fallback_email' => '',
			'notes'          => 'Future Spanish Concierge-specific GHL form.',
		),
		array(
			'id'             => 'solanique-club-inquiry-en',
			'page'           => 'solanique-club',
			'service'        => 'solanique-club',
			'language'       => 'en',
			'embed_code'     => '',
			'external_url'   => '',
			'enabled'        => false,
			'fallback_email' => '',
			'notes'          => 'Future Solanique Club, JV Network, and Investor Club intake form.',
		),
		array(
			'id'             => 'solanique-club-inquiry-es',
			'page'           => 'solanique-club',
			'service'        => 'solanique-club',
			'language'       => 'es',
			'embed_code'     => '',
			'external_url'   => '',
			'enabled'        => false,
			'fallback_email' => '',
			'notes'          => 'Future Spanish Solanique Club, JV Network, and Investor Club intake form.',
		),
	);

	foreach ( $forms as &$form ) {
		$has_output      = '' !== trim( (string) ( $form['embed_code'] ?? '' ) ) || '' !== esc_url_raw( (string) ( $form['external_url'] ?? '' ) );
		$form['enabled'] = (bool) ( $form['enabled'] ?? false ) && $has_output;
	}
	unset( $form );

	$page     = sanitize_key( $page );
	$service  = sanitize_key( $service );
	$language = sanitize_key( $language );

	return array_values(
		array_filter(
			$forms,
			static function ( array $form ) use ( $page, $service, $language ): bool {
				if ( '' !== $page && $page !== (string) $form['page'] ) {
					return false;
				}

				if ( '' !== $service && $service !== (string) $form['service'] ) {
					return false;
				}

				if ( '' !== $language && $language !== (string) $form['language'] ) {
					return false;
				}

				return true;
			}
		)
	);
}

/**
 * Returns one CRM form entry by ID.
 *
 * @param string $id CRM form ID.
 * @return array<string,mixed>|null
 */
function sg_get_crm_form( string $id ): ?array {
	$id = sanitize_key( $id );

	foreach ( sg_get_crm_forms() as $form ) {
		if ( $id === (string) $form['id'] ) {
			return $form;
		}
	}

	return null;
}

/**
 * Renders an approved CRM/GHL slot only when an entry is explicitly enabled.
 *
 * @param string              $id   CRM form ID.
 * @param array<string,mixed> $args Optional render arguments.
 * @return void
 */
function sg_render_crm_form_slot( string $id, array $args = array() ): void {
	$form = sg_get_crm_form( $id );

	if ( empty( $form ) || empty( $form['enabled'] ) ) {
		return;
	}

	$defaults = array(
		'title' => __( 'Private intake', 'solanique' ),
		'class' => '',
	);
	$args     = wp_parse_args( $args, $defaults );
	$classes  = trim( 'sg-crm-slot ' . preg_replace( '/[^A-Za-z0-9_ -]/', '', (string) $args['class'] ) );
	$title_id = wp_unique_id( 'sg-crm-slot-title-' );
	?>
	<section class="<?php echo esc_attr( $classes ); ?>" aria-labelledby="<?php echo esc_attr( $title_id ); ?>">
		<div class="sg-container sg-container--md">
			<h2 id="<?php echo esc_attr( $title_id ); ?>" class="sg-u--sr-only"><?php echo esc_html( (string) $args['title'] ); ?></h2>
			<?php if ( ! empty( $form['embed_code'] ) ) : ?>
				<div class="sg-crm-slot__embed">
					<?php
					// Future GHL registration/inquiry embed goes here.
					echo wp_kses(
						(string) $form['embed_code'],
						array(
							'iframe' => array(
								'allow'           => true,
								'allowfullscreen' => true,
								'class'           => true,
								'height'          => true,
								'loading'         => true,
								'name'            => true,
								'referrerpolicy'  => true,
								'sandbox'         => true,
								'src'             => true,
								'style'           => true,
								'title'           => true,
								'width'           => true,
							),
							'script' => array(
								'src'   => true,
								'async' => true,
								'defer' => true,
								'type'  => true,
							),
						)
					);
					?>
				</div>
			<?php elseif ( ! empty( $form['external_url'] ) ) : ?>
				<a class="sg-button" href="<?php echo esc_url( (string) $form['external_url'] ); ?>" rel="noopener">
					<?php esc_html_e( 'Start Inquiry', 'solanique' ); ?>
				</a>
			<?php endif; ?>
		</div>
	</section>
	<?php
}
