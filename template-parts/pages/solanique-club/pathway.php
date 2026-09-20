<?php
/**
 * Solanique Club access pathway.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content  = solanique_get_final_page_copy( 'solanique_club' );
$pathways = (array) ( $content['pathways'] ?? array() );
?>

<section class="sg-section sg-product-cta sg-access-banner sg-solanique-club-pathway" aria-labelledby="sg-solanique-club-pathway-title">
	<div class="sg-container sg-container--md">
		<div class="sg-product-cta__content sg-flow" data-sg-stagger>
			<span class="sg-product-cta__line" aria-hidden="true" data-sg-reveal="line"></span>
			<p class="sg-product-cta__eyebrow" data-sg-reveal="fade-up"><?php echo esc_html( $content['service'] ?? '' ); ?></p>
			<h2 id="sg-solanique-club-pathway-title" class="sg-product-cta__title" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['final_line'] ?? '' ); ?>
			</h2>
			<?php if ( ! empty( $pathways ) ) : ?>
				<div class="sg-cluster sg-product-cta__action" data-sg-reveal="fade-up">
					<?php foreach ( $pathways as $pathway ) : ?>
						<?php
						$url = solanique_get_final_mailto( $pathway['email'] ?? '' );
						if ( '' === $url || empty( $pathway['action'] ) ) {
							continue;
						}
						?>
						<a class="sg-button sg-button--lg" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $pathway['action'] ); ?></a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
