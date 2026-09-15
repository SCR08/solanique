<?php
/**
 * Investor Club hero section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$primary_url   = solanique_get_inquiry_url();
$secondary_url = '#sg-investor-club-overview';
?>

<section class="sg-product-hero sg-investor-club-hero" aria-labelledby="sg-investor-club-hero-title">
	<div class="sg-product-hero__visual" data-sg-reveal="scale-in">
		<div class="sg-product-hero__visual-shell sg-product-hero__image-frame">
			<?php
			echo sg_asset_img(
				'images/estates/digital-real-estate-investment-hologram.jpg',
				__( 'Digital real estate investment visualization representing Investor Club opportunity review.', 'solanique' ),
				array(
					'class'  => 'sg-product-hero__image sg-img sg-img--cover',
					'width'  => 2047,
					'height' => 1102,
					'sizes'  => '100vw',
				)
			);
			?>
		</div>
	</div>

	<div class="sg-container sg-container--xl sg-product-hero__inner">
		<div class="sg-product-hero__content sg-flow" data-sg-stagger>
			<span class="sg-product-hero__line" aria-hidden="true" data-sg-reveal="line"></span>
			<p class="sg-product-hero__eyebrow" data-sg-reveal="fade-up"><?php esc_html_e( 'Private investment pathway', 'solanique' ); ?></p>
			<h1 id="sg-investor-club-hero-title" class="sg-product-hero__title" data-sg-reveal="fade-up">
				<?php esc_html_e( 'Investor Club', 'solanique' ); ?>
			</h1>
			<p class="sg-product-hero__text" data-sg-reveal="fade-up">
				<?php esc_html_e( 'A discreet channel for disciplined conversations around private real estate opportunities, off-market context, and strategic capital alignment.', 'solanique' ); ?>
			</p>
			<div class="sg-cluster sg-product-hero__actions" data-sg-reveal="fade-up">
				<a class="sg-button sg-button--lg" href="<?php echo esc_url( $primary_url ); ?>"><?php esc_html_e( 'Investor Club Access', 'solanique' ); ?></a>
				<a class="sg-button sg-button--ghost sg-product-hero__secondary-link" href="<?php echo esc_url( $secondary_url ); ?>"><?php esc_html_e( 'How it works', 'solanique' ); ?></a>
			</div>
		</div>
	</div>
</section>
