<?php
/**
 * Homepage closing CTA section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content = solanique_get_final_page_copy( 'home' );
$cta     = $content['cta'] ?? array();
$cta_url = solanique_get_final_mailto( $cta['email'] ?? '' );
?>

<section class="sg-section sg-home-cta sg-access-banner" aria-labelledby="solanique-home-cta-title">
	<div class="sg-container sg-container--md">
		<div class="sg-home-cta__content sg-flow" data-sg-stagger>
			<p class="sg-home-cta__eyebrow sg-home-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['headline'] ?? '' ); ?>
			</p>

			<h2 id="solanique-home-cta-title" class="sg-home-cta__title sg-home-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $cta['heading'] ?? '' ); ?>
			</h2>

			<p class="sg-home-cta__text sg-home-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $cta['text'] ?? '' ); ?>
			</p>

			<?php if ( '' !== $cta_url ) : ?>
				<div class="sg-home-cta__action sg-cluster sg-home-reveal" data-sg-reveal="fade-up">
					<a class="sg-button sg-button--lg" href="<?php echo esc_url( $cta_url ); ?>" aria-label="<?php echo esc_attr( $cta['label'] ?? '' ); ?>">
						<?php echo esc_html( $cta['label'] ?? '' ); ?>
					</a>
				</div>
			<?php endif; ?>

			<p class="sg-home-cta__final sg-home-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['final_line'] ?? '' ); ?>
			</p>
		</div>
	</div>
</section>
