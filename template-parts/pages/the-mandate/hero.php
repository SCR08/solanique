<?php
/**
 * The Mandate hero section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content = solanique_get_final_page_copy( 'the_mandate' );
?>

<section class="sg-product-hero sg-mandate-hero" aria-labelledby="sg-mandate-hero-title">
	<div class="sg-product-hero__visual sg-mandate-hero__visual" data-sg-reveal="scale-in">
		<div class="sg-product-hero__visual-shell sg-product-hero__image-frame">
			<?php
			echo sg_asset_img(
				'images/about/illuminated-commercial-office-buildings-night.jpg',
				__( 'Illuminated commercial buildings representing Solanique Group advisory perspective.', 'solanique' ),
				array(
					'class'         => 'sg-product-hero__image sg-mandate-hero__image sg-img sg-img--cover',
					'width'         => 2048,
					'height'        => 1149,
					'loading'       => 'eager',
					'fetchpriority' => 'high',
					'sizes'         => '100vw',
				)
			);
			?>
		</div>
	</div>

	<div class="sg-container sg-container--xl sg-product-hero__inner sg-mandate-hero__inner">
		<div class="sg-product-hero__content sg-mandate-hero__content sg-flow" data-sg-stagger>
			<span class="sg-product-hero__line sg-mandate-hero__line" aria-hidden="true" data-sg-reveal="line"></span>

			<p class="sg-product-hero__eyebrow sg-mandate-hero__eyebrow" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['brand'] ?? '' ); ?>
			</p>

			<h1 id="sg-mandate-hero-title" class="sg-product-hero__title sg-mandate-hero__title" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['title'] ?? '' ); ?>
			</h1>
		</div>
	</div>
</section>
