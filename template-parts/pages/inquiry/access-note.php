<?php
/**
 * Inquiry access note section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="sg-section sg-product-cta sg-access-banner sg-inquiry-access-note" aria-labelledby="sg-inquiry-access-title">
	<div class="sg-container sg-container--md">
		<div class="sg-product-cta__content sg-flow" data-sg-stagger>
			<span class="sg-product-cta__line" aria-hidden="true" data-sg-reveal="line"></span>
			<h2 id="sg-inquiry-access-title" class="sg-product-cta__title" data-sg-reveal="fade-up">
				<?php esc_html_e( 'Enter through the right private pathway.', 'solanique' ); ?>
			</h2>
			<p class="sg-product-cta__text" data-sg-reveal="fade-up">
				<?php esc_html_e( 'Inquiry routes each request into the correct Solanique pathway with discretion and context.', 'solanique' ); ?>
			</p>
			<div class="sg-product-cta__action" data-sg-reveal="fade-up">
				<a class="sg-button sg-button--lg" href="<?php echo esc_url( solanique_get_final_mailto( 'inquiry@solaniquegroup.com' ) ); ?>"><?php esc_html_e( 'Start Inquiry', 'solanique' ); ?></a>
			</div>
		</div>
	</div>
</section>
