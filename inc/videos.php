<?php
/**
 * Service video manifest and rendering helpers.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

/**
 * Determines whether a production-safe video asset exists in the theme source assets.
 *
 * @param string $video_path Relative path below src/assets.
 * @return bool
 */
function sg_video_asset_exists( string $video_path ): bool {
	$video_path = function_exists( 'solanique_normalize_theme_asset_path' ) ? solanique_normalize_theme_asset_path( $video_path ) : ltrim( $video_path, '/' );

	if ( '' === $video_path ) {
		return false;
	}

	$extension = strtolower( pathinfo( $video_path, PATHINFO_EXTENSION ) );

	if ( ! in_array( $extension, array( 'mp4', 'webm', 'mov' ), true ) ) {
		return false;
	}

	return file_exists( get_theme_file_path( trailingslashit( SOLANIQUE_ASSET_SRC_DIR ) . $video_path ) );
}

/**
 * Returns the planned service video manifest.
 *
 * Video entries remain disabled until the client supplies production-approved
 * media files and a developer explicitly enables the corresponding entry.
 *
 * @param string $service  Optional service key.
 * @param string $language Optional language code.
 * @return array<int,array<string,mixed>>
 */
function sg_get_service_videos( string $service = '', string $language = '' ): array {
	$videos = array(
		array(
			'id'            => 'solanique-presentation-en',
			'service'       => 'brand',
			'language'      => 'en',
			'title'         => __( 'Solanique presentation', 'solanique' ),
			'video_path'    => 'videos/presentation/solanique-presentation-en.mp4',
			'poster_path'   => '',
			'trigger_label' => __( 'Watch presentation', 'solanique' ),
			'autoplay_mode' => 'manual',
			'enabled'       => false,
			'display_order' => 10,
			'notes'         => 'Pending approved English presentation video.',
		),
		array(
			'id'            => 'solanique-presentation-es',
			'service'       => 'brand',
			'language'      => 'es',
			'title'         => __( 'Presentación de Solanique', 'solanique' ),
			'video_path'    => 'videos/presentation/solanique-presentation-es.mp4',
			'poster_path'   => '',
			'trigger_label' => __( 'Ver presentación', 'solanique' ),
			'autoplay_mode' => 'manual',
			'enabled'       => false,
			'display_order' => 20,
			'notes'         => 'Pending approved Spanish presentation video.',
		),
		array(
			'id'            => 'capital-smart-capital-01',
			'service'       => 'capital',
			'language'      => 'en',
			'title'         => __( 'Smart Capital', 'solanique' ),
			'video_path'    => 'videos/capital/smart-capital-01.mp4',
			'poster_path'   => '',
			'trigger_label' => __( 'Watch Capital video', 'solanique' ),
			'autoplay_mode' => 'manual',
			'enabled'       => false,
			'display_order' => 30,
			'notes'         => 'Pending approved Smart Capital video one.',
		),
		array(
			'id'            => 'capital-smart-capital-02',
			'service'       => 'capital',
			'language'      => 'en',
			'title'         => __( 'Smart Capital', 'solanique' ),
			'video_path'    => 'videos/capital/smart-capital-02.mp4',
			'poster_path'   => '',
			'trigger_label' => __( 'Watch Capital video', 'solanique' ),
			'autoplay_mode' => 'manual',
			'enabled'       => false,
			'display_order' => 40,
			'notes'         => 'Pending approved Smart Capital video two.',
		),
		array(
			'id'            => 'estate-service-01',
			'service'       => 'estate',
			'language'      => 'en',
			'title'         => __( 'Estate presentation', 'solanique' ),
			'video_path'    => 'videos/estate/estate-service-01.mp4',
			'poster_path'   => '',
			'trigger_label' => __( 'Watch Estate video', 'solanique' ),
			'autoplay_mode' => 'manual',
			'enabled'       => false,
			'display_order' => 50,
			'notes'         => 'Pending approved Estate video one.',
		),
		array(
			'id'            => 'estate-service-02',
			'service'       => 'estate',
			'language'      => 'en',
			'title'         => __( 'Estate presentation', 'solanique' ),
			'video_path'    => 'videos/estate/estate-service-02.mp4',
			'poster_path'   => '',
			'trigger_label' => __( 'Watch Estate video', 'solanique' ),
			'autoplay_mode' => 'manual',
			'enabled'       => false,
			'display_order' => 60,
			'notes'         => 'Pending approved Estate video two.',
		),
		array(
			'id'            => 'concierge-service-01',
			'service'       => 'concierge',
			'language'      => 'en',
			'title'         => __( 'Concierge presentation', 'solanique' ),
			'video_path'    => 'videos/concierge/concierge-service-01.mp4',
			'poster_path'   => '',
			'trigger_label' => __( 'Watch Concierge video', 'solanique' ),
			'autoplay_mode' => 'manual',
			'enabled'       => false,
			'display_order' => 70,
			'notes'         => 'Pending approved Concierge video.',
		),
		array(
			'id'            => 'brand-vision-luxury',
			'service'       => 'brand',
			'language'      => 'en',
			'title'         => __( 'Solanique vision', 'solanique' ),
			'video_path'    => 'videos/brand/solanique-vision-luxury.mp4',
			'poster_path'   => '',
			'trigger_label' => __( 'Watch brand video', 'solanique' ),
			'autoplay_mode' => 'manual',
			'enabled'       => false,
			'display_order' => 80,
			'notes'         => 'Pending approved brand vision or luxury concept video.',
		),
	);

	foreach ( $videos as &$video ) {
		$video['video_present']  = sg_video_asset_exists( (string) ( $video['video_path'] ?? '' ) );
		$video['poster_present'] = ! empty( $video['poster_path'] ) && file_exists( get_theme_file_path( trailingslashit( SOLANIQUE_ASSET_SRC_DIR ) . solanique_normalize_theme_asset_path( (string) $video['poster_path'] ) ) );
		$video['enabled']        = (bool) ( $video['enabled'] ?? false ) && (bool) $video['video_present'];
	}
	unset( $video );

	usort(
		$videos,
		static function ( array $first, array $second ): int {
			return (int) $first['display_order'] <=> (int) $second['display_order'];
		}
	);

	$service  = sanitize_key( $service );
	$language = sanitize_key( $language );

	return array_values(
		array_filter(
			$videos,
			static function ( array $video ) use ( $service, $language ): bool {
				if ( '' !== $service && $service !== (string) $video['service'] ) {
					return false;
				}

				if ( '' !== $language && $language !== (string) $video['language'] ) {
					return false;
				}

				return true;
			}
		)
	);
}

/**
 * Returns enabled service videos only.
 *
 * @param string $service  Optional service key.
 * @param string $language Optional language code.
 * @return array<int,array<string,mixed>>
 */
function sg_get_enabled_service_videos( string $service = '', string $language = '' ): array {
	return array_values(
		array_filter(
			sg_get_service_videos( $service, $language ),
			static function ( array $video ): bool {
				return ! empty( $video['enabled'] );
			}
		)
	);
}

/**
 * Renders an accessible video trigger only when its video is enabled and present.
 *
 * @param array<string,mixed> $video Video manifest item.
 * @param string              $class Optional extra button classes.
 * @return void
 */
function sg_render_video_trigger( array $video, string $class = '' ): void {
	if ( empty( $video['enabled'] ) || empty( $video['video_path'] ) || ! sg_video_asset_exists( (string) $video['video_path'] ) ) {
		return;
	}

	$video_src  = sg_asset_uri( (string) $video['video_path'] );
	$poster_src = ! empty( $video['poster_path'] ) ? sg_asset_uri( (string) $video['poster_path'] ) : '';

	if ( '' === $video_src ) {
		return;
	}

	$classes = trim( 'sg-button sg-button--ghost ' . preg_replace( '/[^A-Za-z0-9_ -]/', '', $class ) );
	?>
	<button
		class="<?php echo esc_attr( $classes ); ?>"
		type="button"
		data-sg-video-trigger
		data-video-src="<?php echo esc_url( $video_src ); ?>"
		data-video-poster="<?php echo esc_url( $poster_src ); ?>"
		data-video-title="<?php echo esc_attr( (string) $video['title'] ); ?>"
		data-video-id="<?php echo esc_attr( (string) $video['id'] ); ?>"
		data-video-autoplay-mode="<?php echo esc_attr( (string) $video['autoplay_mode'] ); ?>"
	>
		<?php echo esc_html( (string) $video['trigger_label'] ); ?>
	</button>
	<?php
}

/**
 * Renders a service video slot only when approved enabled videos exist.
 *
 * This lets templates reserve a controlled future placement without exposing
 * broken buttons or placeholder video UI before the client supplies files.
 *
 * @param string              $service Service key from the video manifest.
 * @param array<string,mixed> $args    Optional render arguments.
 * @return void
 */
function sg_render_service_video_slot( string $service, array $args = array() ): void {
	$language = function_exists( 'solanique_get_current_language' ) ? solanique_get_current_language() : '';
	$videos   = sg_get_enabled_service_videos( $service, $language );

	if ( empty( $videos ) && '' !== $language ) {
		$videos = sg_get_enabled_service_videos( $service );
	}

	if ( empty( $videos ) ) {
		return;
	}

	$defaults = array(
		'eyebrow' => __( 'Video presentation', 'solanique' ),
		'title'   => __( 'Approved media presentation', 'solanique' ),
		'intro'   => __( 'Watch the approved local presentation for this Solanique pathway.', 'solanique' ),
		'class'   => '',
	);
	$args     = wp_parse_args( $args, $defaults );
	$classes  = trim( 'sg-section sg-video-slot ' . preg_replace( '/[^A-Za-z0-9_ -]/', '', (string) $args['class'] ) );
	$title_id = wp_unique_id( 'sg-video-slot-title-' );
	?>
	<section class="<?php echo esc_attr( $classes ); ?>" aria-labelledby="<?php echo esc_attr( $title_id ); ?>">
		<div class="sg-container sg-container--lg">
			<div class="sg-video-slot__shell sg-flow" data-sg-stagger>
				<p class="sg-video-slot__eyebrow" data-sg-reveal="fade-up"><?php echo esc_html( (string) $args['eyebrow'] ); ?></p>
				<h2 id="<?php echo esc_attr( $title_id ); ?>" class="sg-video-slot__title" data-sg-reveal="fade-up"><?php echo esc_html( (string) $args['title'] ); ?></h2>
				<p class="sg-video-slot__intro" data-sg-reveal="fade-up"><?php echo esc_html( (string) $args['intro'] ); ?></p>

				<div class="sg-video-slot__actions" data-sg-reveal="fade-up">
					<?php
					foreach ( $videos as $video ) {
						sg_render_video_trigger( $video, 'sg-video-slot__button' );
					}
					?>
				</div>
			</div>
		</div>
	</section>
	<?php
}
