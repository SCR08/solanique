<?php
/**
 * Capital page hero section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content       = solanique_get_final_page_copy( 'capital' );
?>

<section class="sg-product-hero sg-capital-hero" aria-labelledby="sg-capital-hero-title">
	<div class="sg-product-hero__visual sg-capital-hero__visual sg-capital-reveal" data-sg-reveal="scale-in">
		<div class="sg-product-hero__visual-shell sg-product-hero__image-frame sg-capital-hero__diagram">
			<?php
			echo sg_asset_img(
				'images/estates/commercial-real-estate-investment-meeting.jpg',
				__( 'Professional meeting environment representing Solanique Capital strategy.', 'solanique' ),
				array(
					'class'         => 'sg-product-hero__image sg-capital-hero__image sg-img sg-img--cover',
					'width'         => 2048,
					'height'        => 1365,
					'loading'       => 'eager',
					'fetchpriority' => 'high',
					'sizes'         => '100vw',
				)
			);
			?>
			<span class="sg-capital-hero__axis sg-capital-hero__axis--vertical"></span>
			<span class="sg-capital-hero__axis sg-capital-hero__axis--horizontal"></span>
			<span class="sg-capital-hero__plane sg-capital-hero__plane--one"></span>
			<span class="sg-capital-hero__plane sg-capital-hero__plane--two"></span>
			<span class="sg-capital-hero__plane sg-capital-hero__plane--three"></span>
		</div>
	</div>

	<div class="sg-container sg-container--xl sg-product-hero__inner sg-capital-hero__inner">
		<div class="sg-product-hero__content sg-capital-hero__content sg-flow" data-sg-stagger>
			<span class="sg-product-hero__line sg-capital-hero__line" aria-hidden="true" data-sg-reveal="line"></span>

			<p class="sg-product-hero__eyebrow sg-capital-hero__eyebrow sg-capital-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['service'] ?? '' ); ?>
			</p>

			<h1 id="sg-capital-hero-title" class="sg-product-hero__title sg-capital-hero__title sg-capital-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['headline'] ?? '' ); ?>
			</h1>

			<p class="sg-product-hero__text sg-capital-hero__text sg-capital-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['intro'] ?? '' ); ?>
			</p>

		</div>
	</div>
</section>
