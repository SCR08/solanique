<?php
/**
 * JV Club hero section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$primary_url   = solanique_get_inquiry_url();
$secondary_url = '#sg-jv-club-overview';
?>

<section class="sg-product-hero sg-jv-club-hero" aria-labelledby="sg-jv-club-hero-title">
	<div class="sg-product-hero__visual" data-sg-reveal="scale-in">
		<div class="sg-product-hero__visual-shell sg-product-hero__image-frame">
			<?php
			echo sg_asset_img(
				'images/estates/real-estate-contract-handshake-closing.jpg',
				__( 'Professional agreement moment representing JV Club alignment conversations.', 'solanique' ),
				array(
					'class'  => 'sg-product-hero__image sg-img sg-img--cover',
					'width'  => 2048,
					'height' => 1365,
					'sizes'  => '100vw',
				)
			);
			?>
		</div>
	</div>

	<div class="sg-container sg-container--xl sg-product-hero__inner">
		<div class="sg-product-hero__content sg-flow" data-sg-stagger>
			<span class="sg-product-hero__line" aria-hidden="true" data-sg-reveal="line"></span>
			<p class="sg-product-hero__eyebrow" data-sg-reveal="fade-up"><?php esc_html_e( 'Joint venture pathway', 'solanique' ); ?></p>
			<h1 id="sg-jv-club-hero-title" class="sg-product-hero__title" data-sg-reveal="fade-up">
				<?php esc_html_e( 'JV Club', 'solanique' ); ?>
			</h1>
			<p class="sg-product-hero__text" data-sg-reveal="fade-up">
				<?php esc_html_e( 'A private channel for strategic partners exploring development, acquisition, and cross-border alignment through disciplined review.', 'solanique' ); ?>
			</p>
			<div class="sg-cluster sg-product-hero__actions" data-sg-reveal="fade-up">
				<a class="sg-button sg-button--lg" href="<?php echo esc_url( $primary_url ); ?>"><?php esc_html_e( 'JV Club Access', 'solanique' ); ?></a>
				<a class="sg-button sg-button--ghost sg-product-hero__secondary-link" href="<?php echo esc_url( $secondary_url ); ?>"><?php esc_html_e( 'Explore the pathway', 'solanique' ); ?></a>
			</div>
		</div>
	</div>
</section>
