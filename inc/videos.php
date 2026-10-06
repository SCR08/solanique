<?php
/**
 * Approved WordPress-hosted videos and click-to-play presentation helpers.
 * @package Solanique
 */
defined( 'ABSPATH' ) || exit;

/** URLs verified against the production WordPress media API. */
function sg_get_video_defaults(): array {
	return array(
		array( 'id' => 'solanique-presentation', 'service' => 'brand', 'placement' => 'early', 'title_en' => 'Solanique Group', 'title_es' => 'Solanique Group', 'file' => 'VIDEO-FINAL-SOLANIQUE-PRESENTATION.mp4', 'poster_path' => 'images/videos/solanique-presentation.jpg', 'width' => 1950, 'height' => 1080 ),
		array( 'id' => 'brand-vision', 'service' => 'brand', 'placement' => 'closing', 'title_en' => 'Your vision', 'title_es' => 'Tu visión', 'file' => '2.-VIDEO-TU-VISION-CORREGIDO-2.0.mp4', 'poster_path' => 'images/videos/brand-vision.jpg', 'width' => 1440, 'height' => 2560 ),
		array( 'id' => 'capital-smart', 'service' => 'capital', 'placement' => 'early', 'title_en' => 'Smart Capital', 'title_es' => 'Smart Capital', 'file' => '1.-avatar-and-final-video-Smart-capital.mp4', 'poster_path' => 'images/videos/capital-smart.jpg', 'width' => 1080, 'height' => 1910 ),
		array( 'id' => 'capital-investments', 'service' => 'capital', 'placement' => 'closing', 'title_en' => 'Capital', 'title_es' => 'Capital', 'file' => '1.2-VIDEO-si-tus-inversiones-produjeranpor-ti-final.mp4', 'poster_path' => 'images/videos/capital-investments.jpg', 'width' => 1080, 'height' => 1920 ),
		array( 'id' => 'estate-luxury', 'service' => 'estate', 'placement' => 'early', 'title_en' => 'Estate', 'title_es' => 'Estate', 'file' => '1.-El-verdadero-lujo-4.0.mp4', 'poster_path' => 'images/videos/estate-luxury.jpg', 'width' => 1440, 'height' => 2560 ),
		array( 'id' => 'concierge-service', 'service' => 'concierge', 'placement' => 'early', 'title_en' => 'Concierge', 'title_es' => 'Concierge', 'file' => '3.-CONCIERGE-RITMO-CORREGIDO-Final.mp4', 'poster_path' => 'images/videos/concierge-service.jpg', 'width' => 1080, 'height' => 1920 ),
	);
}

/** Resolve media without network requests during page rendering. */
function sg_get_service_videos( string $service = '', string $language = '' ): array {
	$videos = array();
	foreach ( sg_get_video_defaults() as $video ) {
		$id = $video['id'];
		$attachment_id = absint( get_theme_mod( 'sg_video_' . $id, 0 ) );
		$poster_id = absint( get_theme_mod( 'sg_video_poster_' . $id, 0 ) );
		$attachment_url = $attachment_id && wp_attachment_is( 'video', $attachment_id ) ? wp_get_attachment_url( $attachment_id ) : '';
		$video['video_url'] = $attachment_url ?: 'https://solaniquegroup.com/wp-content/uploads/2026/10/' . $video['file'];
		$video['poster_url'] = $poster_id ? ( wp_get_attachment_image_url( $poster_id, 'large' ) ?: sg_asset_uri( $video['poster_path'] ) ) : sg_asset_uri( $video['poster_path'] );
		$video['language'] = get_theme_mod( 'sg_video_language_' . $id, 'shared' );
		$video['enabled'] = (bool) get_theme_mod( 'sg_video_enabled_' . $id, true );
		$video['title'] = 'es' === $language ? $video['title_es'] : $video['title_en'];
		$video['trigger_label'] = 'es' === $language ? 'Ver video' : 'Watch video';
		$video['autoplay_mode'] = 'manual';
		if ( $attachment_url ) {
			$metadata = wp_get_attachment_metadata( $attachment_id );
			$video['width'] = absint( $metadata['width'] ?? $video['width'] );
			$video['height'] = absint( $metadata['height'] ?? $video['height'] );
		}
		$videos[] = $video;
	}
	$videos = (array) apply_filters( 'solanique_service_videos', $videos );
	return array_values( array_filter( $videos, static function ( array $video ) use ( $service, $language ): bool {
		return ( '' === $service || $service === $video['service'] ) && ( '' === $language || 'shared' === $video['language'] || $language === $video['language'] );
	} ) );
}

function sg_get_enabled_service_videos( string $service = '', string $language = '' ): array {
	return array_values( array_filter( sg_get_service_videos( $service, $language ), static function ( array $video ): bool {
		return ! empty( $video['enabled'] ) && '' !== esc_url( $video['video_url'] ?? '' );
	} ) );
}

/** An ordinary media link is enhanced to modal playback by JavaScript. */
function sg_render_video_trigger( array $video, string $class = '' ): void {
	if ( empty( $video['enabled'] ) || empty( $video['video_url'] ) ) {
		return;
	}
	$portrait = $video['height'] > $video['width'];
	$classes = trim( 'sg-video-preview ' . ( $portrait ? 'sg-video-preview--portrait ' : '' ) . preg_replace( '/[^A-Za-z0-9_ -]/', '', $class ) );
	?>
	<a class="<?php echo esc_attr( $classes ); ?>" href="<?php echo esc_url( $video['video_url'] ); ?>"
		data-sg-video-trigger data-video-src="<?php echo esc_url( $video['video_url'] ); ?>"
		data-video-poster="<?php echo esc_url( $video['poster_url'] ); ?>" data-video-title="<?php echo esc_attr( $video['title'] ); ?>"
		data-video-id="<?php echo esc_attr( $video['id'] ); ?>" data-video-width="<?php echo absint( $video['width'] ); ?>"
		data-video-height="<?php echo absint( $video['height'] ); ?>" data-video-autoplay-mode="manual"
		aria-label="<?php echo esc_attr( $video['trigger_label'] . ': ' . $video['title'] ); ?>">
		<img class="sg-video-preview__image" src="<?php echo esc_url( $video['poster_url'] ); ?>" alt="" width="<?php echo absint( $video['width'] ); ?>" height="<?php echo absint( $video['height'] ); ?>" loading="lazy" decoding="async">
		<span class="sg-video-preview__caption"><span class="sg-video-preview__play" aria-hidden="true">&#9654;</span><span><?php echo esc_html( $video['trigger_label'] ); ?></span></span>
	</a>
	<?php
}

/** Render a controlled early or closing video placement. */
function sg_render_service_video_slot( string $service, array $args = array() ): void {
	$language = function_exists( 'solanique_get_current_language' ) ? solanique_get_current_language() : 'en';
	$args = wp_parse_args( $args, array( 'placement' => 'early', 'class' => '' ) );
	$videos = array_values( array_filter( sg_get_enabled_service_videos( $service, $language ), static function ( array $video ) use ( $args ): bool {
		return $video['placement'] === $args['placement'];
	} ) );
	foreach ( $videos as $video ) {
		$title_id = wp_unique_id( 'sg-video-title-' );
		?>
		<section class="sg-section sg-video-slot <?php echo esc_attr( $args['class'] ); ?>" aria-labelledby="<?php echo esc_attr( $title_id ); ?>">
			<div class="sg-container sg-container--lg sg-video-slot__layout <?php echo $video['height'] > $video['width'] ? 'sg-video-slot__layout--portrait' : ''; ?>">
				<div class="sg-video-slot__heading sg-flow">
					<p class="sg-video-slot__eyebrow"><?php echo esc_html( 'es' === $language ? 'Solanique Group · Video' : 'Solanique Group · Film' ); ?></p>
					<h2 id="<?php echo esc_attr( $title_id ); ?>" class="sg-video-slot__title"><?php echo esc_html( $video['title'] ); ?></h2>
				</div>
				<?php sg_render_video_trigger( $video ); ?>
			</div>
		</section>
		<?php
	}
}

/** Native WordPress controls keep media replacements out of theme code. */
function sg_customize_videos( WP_Customize_Manager $customizer ): void {
	$customizer->add_section( 'sg_videos', array( 'title' => __( 'Solanique Videos', 'solanique' ), 'priority' => 160 ) );
	foreach ( sg_get_video_defaults() as $video ) {
		$id = $video['id'];
		foreach ( array( 'sg_video_' => 'video', 'sg_video_poster_' => 'image' ) as $prefix => $mime ) {
			$key = $prefix . $id;
			$customizer->add_setting( $key, array( 'default' => 0, 'sanitize_callback' => 'absint' ) );
			$customizer->add_control( new WP_Customize_Media_Control( $customizer, $key, array( 'section' => 'sg_videos', 'mime_type' => $mime, 'label' => $video['title_en'] . ' (' . $id . ') - ' . $mime ) ) );
		}
		$key = 'sg_video_language_' . $id;
		$customizer->add_setting( $key, array( 'default' => 'shared', 'sanitize_callback' => 'sg_sanitize_video_language' ) );
		$customizer->add_control( $key, array( 'section' => 'sg_videos', 'label' => $video['title_en'] . ' - Language placement', 'type' => 'select', 'choices' => array( 'shared' => 'Both EN and ES pages', 'en' => 'English pages only', 'es' => 'Spanish pages only' ) ) );
		$key = 'sg_video_enabled_' . $id;
		$customizer->add_setting( $key, array( 'default' => true, 'sanitize_callback' => 'rest_sanitize_boolean' ) );
		$customizer->add_control( $key, array( 'section' => 'sg_videos', 'label' => $video['title_en'] . ' - Show video', 'type' => 'checkbox' ) );
	}
}
add_action( 'customize_register', 'sg_customize_videos' );

function sg_sanitize_video_language( $value ): string {
	return in_array( $value, array( 'shared', 'en', 'es' ), true ) ? $value : 'shared';
}
