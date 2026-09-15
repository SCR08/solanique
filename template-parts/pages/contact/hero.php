<?php
/**
 * Contact page hero section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$primary_url   = '#sg-contact-form';
$secondary_url = '#sg-contact-expectations';
?>

<section class="sg-product-hero sg-contact-hero" aria-labelledby="sg-contact-hero-title">
	<div class="sg-product-hero__visual sg-contact-hero__visual sg-contact-reveal" aria-hidden="true" data-sg-reveal="scale-in">
		<div class="sg-product-hero__visual-shell sg-product-hero__image-frame sg-contact-hero__card">
			<?php
			echo sg_asset_img(
				'images/backgrounds/privacy-global-globe-background.jpg',
				'',
				array(
					'class'         => 'sg-product-hero__image sg-contact-hero__image sg-img sg-img--cover',
					'width'         => 1536,
					'height'        => 1024,
					'loading'       => 'eager',
					'fetchpriority' => 'high',
					'sizes'         => '100vw',
				)
			);
			?>
			<span class="sg-contact-hero__fold sg-contact-hero__fold--one"></span>
			<span class="sg-contact-hero__fold sg-contact-hero__fold--two"></span>
			<span class="sg-contact-hero__line-mark sg-contact-hero__line-mark--one"></span>
			<span class="sg-contact-hero__line-mark sg-contact-hero__line-mark--two"></span>
			<span class="sg-contact-hero__seal"></span>
		</div>
	</div>

	<div class="sg-container sg-container--xl sg-product-hero__inner sg-contact-hero__inner">
		<div class="sg-product-hero__content sg-contact-hero__content sg-flow" data-sg-stagger>
			<span class="sg-product-hero__line sg-contact-hero__line" aria-hidden="true" data-sg-reveal="line"></span>

			<p class="sg-product-hero__eyebrow sg-contact-hero__eyebrow sg-contact-reveal" data-sg-reveal="fade-up">
				<?php esc_html_e( 'Inquiry', 'solanique' ); ?>
			</p>

			<h1 id="sg-contact-hero-title" class="sg-product-hero__title sg-contact-hero__title sg-contact-reveal" data-sg-reveal="fade-up">
				<?php esc_html_e( 'Begin a Conversation with Solanique Group', 'solanique' ); ?>
			</h1>

			<p class="sg-product-hero__text sg-contact-hero__text sg-contact-reveal" data-sg-reveal="fade-up">
				<?php esc_html_e( 'Every relationship begins with a private exchange. Share your vision, market, or area of interest, and the conversation will be guided with discretion, bilingual clarity, and care.', 'solanique' ); ?>
			</p>

			<div class="sg-cluster sg-product-hero__actions sg-contact-hero__actions sg-contact-reveal" data-sg-reveal="fade-up">
				<a class="sg-button sg-button--lg" href="<?php echo esc_url( $primary_url ); ?>">
					<?php esc_html_e( 'Start Your Inquiry', 'solanique' ); ?>
				</a>
				<a class="sg-button sg-button--ghost sg-product-hero__secondary-link sg-contact-hero__secondary-link" href="<?php echo esc_url( $secondary_url ); ?>">
					<?php esc_html_e( 'What to Expect', 'solanique' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>
