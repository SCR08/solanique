<?php
/**
 * JV Club inquiry pathway.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="sg-section sg-product-cta sg-access-banner sg-jv-club-pathway" aria-labelledby="sg-jv-club-pathway-title">
	<div class="sg-container sg-container--md">
		<div class="sg-product-cta__content sg-flow" data-sg-stagger>
			<span class="sg-product-cta__line" aria-hidden="true" data-sg-reveal="line"></span>
			<h2 id="sg-jv-club-pathway-title" class="sg-product-cta__title" data-sg-reveal="fade-up">
				<?php esc_html_e( 'Start with strategic fit.', 'solanique' ); ?>
			</h2>
			<p class="sg-product-cta__text" data-sg-reveal="fade-up">
				<?php esc_html_e( 'JV Club inquiries begin by clarifying context, partnership intent, and whether the opportunity belongs inside the Solanique ecosystem.', 'solanique' ); ?>
			</p>
			<div class="sg-product-cta__action" data-sg-reveal="fade-up">
				<a class="sg-button sg-button--lg" href="<?php echo esc_url( solanique_get_inquiry_url() ); ?>"><?php esc_html_e( 'JV Club Access', 'solanique' ); ?></a>
			</div>
		</div>
	</div>
</section>
