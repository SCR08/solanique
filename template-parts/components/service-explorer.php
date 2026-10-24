<?php
/** Visual service explorer, preserving complete approved service copy. @package Solanique */
defined( 'ABSPATH' ) || exit;
$content = solanique_get_final_page_copy( $args['page'] );
$section = $content['services'] ?? array();
$items   = (array) ( $section['items'] ?? array() );
$id      = $args['id'];
$images  = $args['images'];
?>
<section id="<?php echo esc_attr( $id ); ?>" class="sg-section sg-product-section sg-product-services" aria-labelledby="<?php echo esc_attr( $id . '-title' ); ?>">
	<div class="sg-container sg-container--xl">
		<header class="sg-product-section__header sg-flow">
			<h2 id="<?php echo esc_attr( $id . '-title' ); ?>" class="sg-product-section__title" data-sg-reveal="fade-up"><?php echo esc_html( $section['heading'] ?? '' ); ?></h2>
		</header>
		<div class="sg-service-explorer" data-sg-service-explorer>
			<div class="sg-service-explorer__controls" role="group" aria-label="<?php echo esc_attr( $section['heading'] ?? '' ); ?>">
				<?php foreach ( $items as $index => $item ) : ?>
					<button id="<?php echo esc_attr( $id . '-control-' . $index ); ?>" class="sg-service-explorer__trigger<?php echo 0 === $index ? ' is-active' : ''; ?>" type="button" aria-controls="<?php echo esc_attr( $id . '-panel-' . $index ); ?>" aria-current="<?php echo 0 === $index ? 'true' : 'false'; ?>" data-sg-service-explorer-trigger>
						<span class="sg-service-explorer__trigger-number" aria-hidden="true"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						<span class="sg-service-explorer__trigger-title"><?php echo esc_html( $item['title'] ?? '' ); ?></span>
					</button>
				<?php endforeach; ?>
			</div>
			<div class="sg-service-explorer__stage" tabindex="0" role="region" aria-label="<?php echo esc_attr( $section['heading'] ?? '' ); ?>" data-sg-service-explorer-stage>
				<?php foreach ( $items as $index => $item ) : ?>
					<?php $image = $images[ $index ] ?? null; ?>
					<article id="<?php echo esc_attr( $id . '-panel-' . $index ); ?>" class="sg-service-explorer__panel<?php echo 0 === $index ? ' is-active' : ''; ?>" aria-labelledby="<?php echo esc_attr( $id . '-heading-' . $index ); ?>" data-sg-service-explorer-panel>
						<?php if ( $image ) : ?>
							<figure class="sg-service-explorer__media" aria-hidden="true">
								<?php echo sg_asset_img( $image[0], '', array( 'class' => 'sg-service-explorer__image', 'width' => $image[1], 'height' => $image[2], 'sizes' => '(min-width: 64rem) 60vw, 86vw', 'loading' => 'lazy', 'decoding' => 'async' ) ); ?>
							</figure>
						<?php endif; ?>
						<div class="sg-service-explorer__content sg-flow">
							<h3 id="<?php echo esc_attr( $id . '-heading-' . $index ); ?>" class="sg-service-explorer__title"><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
							<p class="sg-service-explorer__text"><?php echo esc_html( $item['text'] ?? '' ); ?></p>
							<?php if ( ! empty( $args['links'][ $index ] ) ) : $link = $args['links'][ $index ]; ?>
								<a class="sg-service-explorer__link" href="<?php echo esc_url( $link['url'] ); ?>" lang="<?php echo esc_attr( $link['lang'] ); ?>" hreflang="<?php echo esc_attr( $link['lang'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a>
							<?php endif; ?>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
