<?php
/** Approved video library with optional visitor-selected layouts. @package Solanique */
defined( 'ABSPATH' ) || exit;
if ( ! sg_public_videos_enabled() ) {
	return;
}
$language = solanique_get_current_language();
$gallery_text = static fn( string $english, string $spanish ): string => 'es' === $language ? $spanish : $english;
$videos   = sg_get_enabled_service_videos( '', $language );
$categories = array( 'brand' => 'Solanique Group', 'capital' => 'Capital', 'estate' => 'Estate', 'concierge' => 'Concierge' );
?>
<div class="sg-film-library" data-gallery-view="masonry">
	<header class="gallery-heading"><div class="sg-container sg-container--lg">
		<div class="gallery-heading__row"><h1><?php echo esc_html( $gallery_text( 'Videos', 'Videos' ) ); ?></h1><span class="gallery-total"><?php echo esc_html( count( $videos ) . ' ' . $gallery_text( 'films', 'videos' ) ); ?></span></div>
		<nav aria-label="<?php echo esc_attr( $gallery_text( 'Return to Solanique services', 'Volver a los servicios de Solanique' ) ); ?>" class="sg-gallery-return-links">
			<a href="<?php echo esc_url( sg_localize_url( home_url( '/' ) ) ); ?>">Solanique Group</a>
			<?php foreach ( array( 'capital' => 'Capital', 'estates' => 'Estate', 'concierge' => 'Concierge' ) as $slug => $label ) : ?>
				<a href="<?php echo esc_url( solanique_get_page_url( $slug, '/' . $slug . '/' ) ); ?>"><?php echo esc_html( $label ); ?></a>
			<?php endforeach; ?>
		</nav>
	</div></header>
	<div class="gallery-toolbar sg-container sg-container--lg">
		<fieldset class="gallery-views" hidden><legend class="sg-u--sr-only"><?php echo esc_html( $gallery_text( 'Gallery view', 'Vista de la galería' ) ); ?></legend>
			<?php foreach ( array( 'editorial' => 'Editorial', 'masonry' => 'Masonry', 'cinema' => 'Cinema' ) as $view => $label ) : ?>
				<label><input type="radio" name="gallery-view" value="<?php echo esc_attr( $view ); ?>" <?php checked( 'masonry', $view ); ?>><span class="gallery-view-icon gallery-view-icon--<?php echo esc_attr( $view ); ?>" aria-hidden="true"><i></i><i></i><?php if ( 'editorial' !== $view ) : ?><i></i><?php endif; ?></span><span><?php echo esc_html( $label ); ?></span></label>
			<?php endforeach; ?>
		</fieldset>
		<div class="gallery-rail-controls" hidden>
			<button type="button" class="gallery-arrow gallery-arrow--previous" aria-label="<?php echo esc_attr( $gallery_text( 'Previous videos', 'Videos anteriores' ) ); ?>" title="<?php echo esc_attr( $gallery_text( 'Previous videos', 'Videos anteriores' ) ); ?>" disabled><span aria-hidden="true"></span></button>
			<button type="button" class="gallery-arrow gallery-arrow--next" aria-label="<?php echo esc_attr( $gallery_text( 'Next videos', 'Videos siguientes' ) ); ?>" title="<?php echo esc_attr( $gallery_text( 'Next videos', 'Videos siguientes' ) ); ?>"><span aria-hidden="true"></span></button>
		</div>
		<span class="sg-u--sr-only" role="status" aria-live="polite" data-gallery-status></span>
	</div>
	<section class="gallery-stage" aria-label="<?php echo esc_attr( $gallery_text( 'Solanique videos', 'Videos de Solanique' ) ); ?>"><div class="sg-container sg-container--lg"><div class="gallery-collection" data-gallery-rail-label="<?php echo esc_attr( $gallery_text( 'Video filmstrip', 'Colección de videos' ) ); ?>" data-gallery-count-label="<?php echo esc_attr( $gallery_text( 'films', 'videos' ) ); ?>">
		<?php foreach ( $videos as $video ) : ?>
			<article class="gallery-film" id="<?php echo esc_attr( $video['id'] ); ?>" style="--film-ratio:<?php echo esc_attr( (string) ( $video['width'] / max( 1, $video['height'] ) ) ); ?>">
				<div class="gallery-film__media"><?php sg_render_video_trigger( $video, 'gallery-poster' ); ?></div>
				<div class="gallery-film__caption"><h2><?php echo esc_html( $video['title'] ); ?></h2><?php if ( isset( $categories[ $video['service'] ] ) && $categories[ $video['service'] ] !== $video['title'] ) : ?><span><?php echo esc_html( $categories[ $video['service'] ] ); ?></span><?php endif; ?></div>
			</article>
		<?php endforeach; ?>
	</div></div></section>
</div>
