<?php
/**
 * Inquiry hero section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$primary_url   = '#sg-inquiry-gateway';
$secondary_url = '#sg-inquiry-pathways';
?>

<section class="sg-product-hero sg-inquiry-hero" aria-labelledby="sg-inquiry-hero-title">
	<div class="sg-product-hero__visual" data-sg-reveal="scale-in">
		<div class="sg-product-hero__visual-shell sg-product-hero__image-frame">
			<?php
			echo sg_asset_img(
				'images/concierge/hotel-reception-desk-service-bell.jpg',
				__( 'Refined reception detail representing the Solanique Inquiry gateway.', 'solanique' ),
				array(
					'class'         => 'sg-product-hero__image sg-img sg-img--cover',
					'width'         => 2048,
					'height'        => 1365,
					'loading'       => 'eager',
					'fetchpriority' => 'high',
					'sizes'         => '100vw',
				)
			);
			?>
		</div>
	</div>

	<div class="sg-container sg-container--xl sg-product-hero__inner sg-inquiry-hero__inner">
		<div class="sg-product-hero__content sg-flow" data-sg-stagger>
			<span class="sg-product-hero__line" aria-hidden="true" data-sg-reveal="line"></span>
			<p class="sg-product-hero__eyebrow" data-sg-reveal="fade-up"><?php esc_html_e( 'Private gateway', 'solanique' ); ?></p>
			<h1 id="sg-inquiry-hero-title" class="sg-product-hero__title" data-sg-reveal="fade-up">
				<?php esc_html_e( 'Inquiry', 'solanique' ); ?>
			</h1>
			<p class="sg-product-hero__text" data-sg-reveal="fade-up">
				<?php esc_html_e( 'A discreet starting point for clients who require Capital, Estate, Concierge, or Solanique Club guidance through the right private channel.', 'solanique' ); ?>
			</p>
			<div class="sg-cluster sg-product-hero__actions" data-sg-reveal="fade-up">
				<a class="sg-button sg-button--lg" href="<?php echo esc_url( $primary_url ); ?>"><?php esc_html_e( 'Start Inquiry', 'solanique' ); ?></a>
				<a class="sg-button sg-button--ghost sg-product-hero__secondary-link" href="<?php echo esc_url( $secondary_url ); ?>"><?php esc_html_e( 'View Pathways', 'solanique' ); ?></a>
			</div>
		</div>
	</div>
</section>
