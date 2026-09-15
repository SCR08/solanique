<?php
/**
 * Client Access hero section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$secondary_url = solanique_get_inquiry_url();
?>

<section class="sg-product-hero sg-client-access-hero" aria-labelledby="sg-client-access-hero-title">
	<div class="sg-product-hero__visual" data-sg-reveal="scale-in">
		<div class="sg-product-hero__visual-shell sg-product-hero__image-frame">
			<?php
			echo sg_asset_img(
				'images/estates/proptech-smart-home-network-analytics.jpg',
				__( 'Private property technology visualization representing future Client Access.', 'solanique' ),
				array(
					'class'  => 'sg-product-hero__image sg-img sg-img--cover',
					'width'  => 2048,
					'height' => 1137,
					'sizes'  => '100vw',
				)
			);
			?>
		</div>
	</div>

	<div class="sg-container sg-container--xl sg-product-hero__inner">
		<div class="sg-product-hero__content sg-flow" data-sg-stagger>
			<span class="sg-product-hero__line" aria-hidden="true" data-sg-reveal="line"></span>
			<p class="sg-product-hero__eyebrow" data-sg-reveal="fade-up"><?php esc_html_e( 'Private access point', 'solanique' ); ?></p>
			<h1 id="sg-client-access-hero-title" class="sg-product-hero__title" data-sg-reveal="fade-up">
				<?php esc_html_e( 'Client Access', 'solanique' ); ?>
			</h1>
			<p class="sg-product-hero__text" data-sg-reveal="fade-up">
				<?php esc_html_e( 'A private access point for Solanique pathways, Investor Club, JV Club, and future partner-integrated service experiences.', 'solanique' ); ?>
			</p>
			<div class="sg-cluster sg-product-hero__actions" data-sg-reveal="fade-up">
				<a class="sg-button sg-button--lg" href="<?php echo esc_url( $secondary_url ); ?>"><?php esc_html_e( 'Start Inquiry', 'solanique' ); ?></a>
				<a class="sg-button sg-button--ghost sg-product-hero__secondary-link" href="<?php echo esc_url( solanique_get_page_url( 'investor-club', '/investor-club/' ) ); ?>"><?php esc_html_e( 'Investor Club', 'solanique' ); ?></a>
			</div>
		</div>
	</div>
</section>
