<?php
/**
 * About page hero section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$primary_url   = solanique_get_inquiry_url();
$secondary_url = '#sg-about-ecosystem';
?>

<section class="sg-product-hero sg-about-hero" aria-labelledby="sg-about-hero-title">
	<div class="sg-product-hero__visual sg-about-hero__visual sg-about-reveal" data-sg-reveal="scale-in">
		<div class="sg-product-hero__visual-shell sg-product-hero__image-frame sg-about-hero__mark">
			<?php
			echo sg_asset_img(
				'images/about/illuminated-commercial-office-buildings-night.jpg',
				__( 'Illuminated commercial buildings representing Solanique Group advisory perspective.', 'solanique' ),
				array(
					'class'  => 'sg-product-hero__image sg-about-hero__image sg-img sg-img--cover',
					'width'  => 2048,
					'height' => 1149,
					'sizes'  => '100vw',
				)
			);
			?>
			<span class="sg-about-hero__ring sg-about-hero__ring--outer"></span>
			<span class="sg-about-hero__ring sg-about-hero__ring--inner"></span>
			<span class="sg-about-hero__axis sg-about-hero__axis--one"></span>
			<span class="sg-about-hero__axis sg-about-hero__axis--two"></span>
			<span class="sg-about-hero__plane sg-about-hero__plane--one"></span>
			<span class="sg-about-hero__plane sg-about-hero__plane--two"></span>
			<span class="sg-about-hero__point sg-about-hero__point--one"></span>
			<span class="sg-about-hero__point sg-about-hero__point--two"></span>
		</div>
	</div>

	<div class="sg-container sg-container--xl sg-product-hero__inner sg-about-hero__inner">
		<div class="sg-product-hero__content sg-about-hero__content sg-flow" data-sg-stagger>
			<span class="sg-product-hero__line sg-about-hero__line" aria-hidden="true" data-sg-reveal="line"></span>

			<p class="sg-product-hero__eyebrow sg-about-hero__eyebrow sg-about-reveal" data-sg-reveal="fade-up">
				<?php esc_html_e( 'The Firm', 'solanique' ); ?>
			</p>

			<h1 id="sg-about-hero-title" class="sg-product-hero__title sg-about-hero__title sg-about-reveal" data-sg-reveal="fade-up">
				<?php esc_html_e( 'A Private Standard for Vision, Property, and Legacy', 'solanique' ); ?>
			</h1>

			<p class="sg-product-hero__text sg-about-hero__text sg-about-reveal" data-sg-reveal="fade-up">
				<?php esc_html_e( 'Solanique Group is a global advisory ecosystem created for clients who see capital, real estate, and lifestyle as connected expressions of long-term vision.', 'solanique' ); ?>
			</p>

			<div class="sg-cluster sg-product-hero__actions sg-about-hero__actions sg-about-reveal" data-sg-reveal="fade-up">
				<a class="sg-button sg-button--lg" href="<?php echo esc_url( $primary_url ); ?>">
					<?php esc_html_e( 'Start Inquiry', 'solanique' ); ?>
				</a>
				<a class="sg-button sg-button--ghost sg-product-hero__secondary-link sg-about-hero__secondary-link" href="<?php echo esc_url( $secondary_url ); ?>">
					<?php esc_html_e( 'Explore Our Ecosystem', 'solanique' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>
