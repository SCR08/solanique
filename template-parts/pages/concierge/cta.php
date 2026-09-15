<?php
/**
 * Concierge page closing CTA section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content = solanique_get_final_page_copy( 'concierge' );
$cta     = $content['cta'] ?? array();
$cta_url = solanique_get_final_mailto( $cta['email'] ?? '' );
?>

<section class="sg-section sg-product-cta sg-access-banner sg-concierge-cta" aria-labelledby="sg-concierge-cta-title">
	<div class="sg-container sg-container--md">
		<div class="sg-product-cta__content sg-concierge-cta__content sg-flow" data-sg-stagger>
			<span class="sg-product-cta__line sg-concierge-cta__line sg-concierge-reveal" aria-hidden="true" data-sg-reveal="line"></span>

			<h2 id="sg-concierge-cta-title" class="sg-product-cta__title sg-concierge-cta__title sg-concierge-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $cta['heading'] ?? '' ); ?>
			</h2>

			<p class="sg-product-cta__text sg-concierge-cta__text sg-concierge-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $cta['text'] ?? '' ); ?>
			</p>

			<?php if ( '' !== $cta_url ) : ?>
				<div class="sg-product-cta__action sg-cluster sg-concierge-cta__action sg-concierge-reveal" data-sg-reveal="fade-up">
					<a class="sg-button sg-button--lg" href="<?php echo esc_url( $cta_url ); ?>">
						<?php echo esc_html( $cta['label'] ?? '' ); ?>
					</a>
				</div>
			<?php endif; ?>

			<p class="sg-product-cta__final sg-concierge-cta__final sg-concierge-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['final_line'] ?? '' ); ?>
			</p>
		</div>
	</div>
</section>
