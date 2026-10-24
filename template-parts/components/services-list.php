<?php
/** Shared editorial service list; all approved copy is visible without tabs. @package Solanique */
defined( 'ABSPATH' ) || exit;
$content = solanique_get_final_page_copy( $args['page'] );
$section = $content['services'] ?? array();
$id      = $args['id'];
$images  = $args['images'] ?? array();
?>
<section id="<?php echo esc_attr( $id ); ?>" class="sg-section sg-product-section sg-editorial-services" aria-labelledby="<?php echo esc_attr( $id . '-title' ); ?>">
	<div class="sg-container sg-container--xl">
		<header class="sg-product-section__header sg-flow" data-sg-stagger>
			<h2 id="<?php echo esc_attr( $id . '-title' ); ?>" class="sg-product-section__title" data-sg-reveal="fade-up"><?php echo esc_html( $section['heading'] ?? '' ); ?></h2>
		</header>
		<ol class="sg-editorial-services__list">
			<?php foreach ( (array) ( $section['items'] ?? array() ) as $index => $item ) : ?>
				<li class="sg-editorial-services__item<?php echo isset( $images[ $index ] ) ? ' sg-editorial-services__item--illustrated' : ''; ?>">
					<div class="sg-editorial-services__copy sg-flow" data-sg-stagger>
						<span class="sg-editorial-services__number" aria-hidden="true"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						<h3 class="sg-editorial-services__title" data-sg-reveal="fade-up"><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
						<p class="sg-editorial-services__text" data-sg-reveal="fade-up"><?php echo esc_html( $item['text'] ?? '' ); ?></p>
					</div>
					<?php if ( isset( $images[ $index ] ) ) : ?>
						<figure class="sg-editorial-services__media" data-sg-reveal="fade-up">
							<?php echo sg_asset_img( $images[ $index ]['path'], '', array( 'class' => 'sg-editorial-services__image', 'width' => $images[ $index ]['width'], 'height' => $images[ $index ]['height'], 'sizes' => '(min-width: 64rem) 28vw, 100vw' ) ); ?>
						</figure>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>
