<?php
/**
 * Contact page closing reassurance section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$ecosystem_url = function_exists( 'sg_localize_url' ) ? sg_localize_url( home_url( '/#ecosystem' ) ) : home_url( '/#ecosystem' );
?>

<section class="sg-section sg-product-cta sg-contact-cta" aria-labelledby="sg-contact-cta-title">
	<div class="sg-container sg-container--md">
		<div class="sg-product-cta__content sg-contact-cta__content sg-flow" data-sg-stagger>
			<span class="sg-product-cta__line sg-contact-cta__line sg-contact-reveal" aria-hidden="true" data-sg-reveal="line"></span>

			<h2 id="sg-contact-cta-title" class="sg-product-cta__title sg-contact-cta__title sg-contact-reveal" data-sg-reveal="fade-up">
				<?php esc_html_e( 'A Refined Beginning', 'solanique' ); ?>
			</h2>

			<p class="sg-product-cta__text sg-contact-cta__text sg-contact-reveal" data-sg-reveal="fade-up">
				<?php esc_html_e( 'Whether your vision begins with capital, property, lifestyle, or legacy, Solanique Group is designed to guide the conversation with discretion and intelligence.', 'solanique' ); ?>
			</p>

			<div class="sg-product-cta__action sg-contact-cta__action sg-contact-reveal" data-sg-reveal="fade-up">
				<a class="sg-button sg-button--ghost" href="<?php echo esc_url( $ecosystem_url ); ?>">
					<?php esc_html_e( 'Return to the Ecosystem', 'solanique' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>
