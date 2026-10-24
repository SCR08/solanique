<?php
/**
 * Concierge page hero section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content       = solanique_get_final_page_copy( 'concierge' );
?>

<section class="sg-product-hero sg-concierge-hero" aria-labelledby="sg-concierge-hero-title">
	<div class="sg-product-hero__visual sg-concierge-hero__visual sg-concierge-reveal" data-sg-reveal="scale-in">
		<div class="sg-product-hero__visual-shell sg-product-hero__image-frame sg-concierge-hero__dial">
			<?php
			echo sg_asset_img(
				'images/concierge/hotel-arrival-luggage-welcome-drink-sunset.jpg',
				__( 'Hotel arrival detail with luggage representing Solanique Concierge coordination.', 'solanique' ),
				array(
					'class'         => 'sg-product-hero__image sg-concierge-hero__image sg-img sg-img--cover',
					'width'         => 2048,
					'height'        => 1365,
					'loading'       => 'eager',
					'fetchpriority' => 'high',
					'sizes'         => '100vw',
				)
			);
			?>
			<span class="sg-concierge-hero__ring sg-concierge-hero__ring--outer"></span>
			<span class="sg-concierge-hero__ring sg-concierge-hero__ring--inner"></span>
			<span class="sg-concierge-hero__path sg-concierge-hero__path--one"></span>
			<span class="sg-concierge-hero__path sg-concierge-hero__path--two"></span>
			<span class="sg-concierge-hero__point sg-concierge-hero__point--one"></span>
			<span class="sg-concierge-hero__point sg-concierge-hero__point--two"></span>
			<span class="sg-concierge-hero__point sg-concierge-hero__point--three"></span>
		</div>
	</div>

	<div class="sg-container sg-container--xl sg-product-hero__inner sg-concierge-hero__inner">
		<div class="sg-product-hero__content sg-concierge-hero__content sg-flow" data-sg-stagger>
			<span class="sg-product-hero__line sg-concierge-hero__line" aria-hidden="true" data-sg-reveal="line"></span>

			<p class="sg-product-hero__eyebrow sg-concierge-hero__eyebrow sg-concierge-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['service'] ?? '' ); ?>
			</p>

			<h1 id="sg-concierge-hero-title" class="sg-product-hero__title sg-concierge-hero__title sg-concierge-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['headline'] ?? '' ); ?>
			</h1>

			<p class="sg-product-hero__text sg-concierge-hero__text sg-concierge-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['intro'] ?? '' ); ?>
			</p>

		</div>
	</div>
</section>
