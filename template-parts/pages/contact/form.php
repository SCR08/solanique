<?php
/**
 * Legacy contact form compatibility section.
 *
 * The public Inquiry template is the approved gateway. This partial remains
 * only to prevent older template references from rendering a data-collection
 * form while secure intake is paused.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;
?>

<section id="sg-contact-form" class="sg-section sg-product-section sg-contact-form" aria-labelledby="sg-contact-form-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-gateway-panel" data-sg-stagger>
			<div class="sg-flow" data-sg-reveal="fade-up">
				<p class="sg-product-section__eyebrow"><?php esc_html_e( 'Inquiry', 'solanique' ); ?></p>
				<h2 id="sg-contact-form-title" class="sg-product-section__title">
					<?php esc_html_e( 'The Inquiry gateway has replaced public contact forms.', 'solanique' ); ?>
				</h2>
				<p class="sg-product-section__intro">
					<?php esc_html_e( 'The approved public path is Inquiry. No personal information is collected through this compatibility placeholder.', 'solanique' ); ?>
				</p>
			</div>

			<div class="sg-gateway-panel__status sg-flow" data-sg-reveal="fade-up">
				<span class="sg-gateway-panel__label"><?php esc_html_e( 'Approved path', 'solanique' ); ?></span>
				<a class="sg-button sg-button--lg" href="<?php echo esc_url( solanique_get_inquiry_url() ); ?>">
					<?php esc_html_e( 'Start Inquiry', 'solanique' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>
