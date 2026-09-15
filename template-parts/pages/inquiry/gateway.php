<?php
/**
 * Inquiry gateway section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;
?>

<section id="sg-inquiry-gateway" class="sg-section sg-product-section sg-inquiry-gateway" aria-labelledby="sg-inquiry-gateway-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-gateway-panel" data-sg-stagger>
			<div class="sg-flow" data-sg-reveal="fade-up">
				<p class="sg-product-section__eyebrow"><?php esc_html_e( 'Private Gateway', 'solanique' ); ?></p>
				<h2 id="sg-inquiry-gateway-title" class="sg-product-section__title">
					<?php esc_html_e( 'Move through the correct private pathway.', 'solanique' ); ?>
				</h2>
				<p class="sg-product-section__intro">
					<?php esc_html_e( 'Begin through a private gateway designed for context, discretion, and the correct path forward.', 'solanique' ); ?>
				</p>
			</div>

			<div class="sg-gateway-panel__status sg-flow" data-sg-reveal="fade-up">
				<span class="sg-gateway-panel__label"><?php esc_html_e( 'Solanique Pillars', 'solanique' ); ?></span>
				<p><?php esc_html_e( 'Choose the pathway that matches the nature of the inquiry.', 'solanique' ); ?></p>
			</div>
		</div>
	</div>
</section>
