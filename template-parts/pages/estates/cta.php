<?php
/**
 * Estates page closing CTA section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content = solanique_get_final_page_copy( 'estate' );
$cta     = $content['cta'] ?? array();
$cta_url = solanique_get_final_mailto( $cta['email'] ?? '' );
?>

<section class="sg-section sg-product-cta sg-access-banner sg-estates-cta" aria-labelledby="sg-estates-cta-title">
	<div class="sg-container sg-container--md">
		<div class="sg-product-cta__content sg-estates-cta__content sg-flow" data-sg-stagger>
			<span class="sg-product-cta__line sg-estates-cta__line sg-estates-reveal" aria-hidden="true" data-sg-reveal="line"></span>

			<h2 id="sg-estates-cta-title" class="sg-product-cta__title sg-estates-cta__title sg-estates-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $cta['heading'] ?? '' ); ?>
			</h2>

			<p class="sg-product-cta__text sg-estates-cta__text sg-estates-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $cta['text'] ?? '' ); ?>
			</p>

			<?php if ( '' !== $cta_url ) : ?>
				<div class="sg-product-cta__action sg-cluster sg-estates-cta__action sg-estates-reveal" data-sg-reveal="fade-up">
					<a class="sg-button sg-button--lg" href="<?php echo esc_url( $cta_url ); ?>">
						<?php echo esc_html( $cta['label'] ?? '' ); ?>
					</a>
				</div>
			<?php endif; ?>

			<p class="sg-product-cta__final sg-estates-cta__final sg-estates-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['final_line'] ?? '' ); ?>
			</p>
		</div>
	</div>
</section>
