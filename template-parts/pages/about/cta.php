<?php
/**
 * About page closing CTA section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$inquiry_url = solanique_get_inquiry_url();
?>

<section class="sg-section sg-product-cta sg-about-cta" aria-labelledby="sg-about-cta-title">
	<div class="sg-container sg-container--md">
		<div class="sg-product-cta__content sg-about-cta__content sg-flow" data-sg-stagger>
			<span class="sg-product-cta__line sg-about-cta__line sg-about-reveal" aria-hidden="true" data-sg-reveal="line"></span>

			<h2 id="sg-about-cta-title" class="sg-product-cta__title sg-about-cta__title sg-about-reveal" data-sg-reveal="fade-up">
				<?php esc_html_e( 'Move through Inquiry.', 'solanique' ); ?>
			</h2>

			<p class="sg-product-cta__text sg-about-cta__text sg-about-reveal" data-sg-reveal="fade-up">
				<?php esc_html_e( 'Inquiry routes each request into the correct Solanique pathway with discretion and context.', 'solanique' ); ?>
			</p>

			<div class="sg-product-cta__action sg-about-cta__action sg-about-reveal" data-sg-reveal="fade-up">
				<a class="sg-button sg-button--lg" href="<?php echo esc_url( $inquiry_url ); ?>">
					<?php esc_html_e( 'Start Inquiry', 'solanique' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>
