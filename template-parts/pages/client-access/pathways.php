<?php
/**
 * Client Access pathway cards.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$pathways = array(
	array(
		'title'  => __( 'Client Access', 'solanique' ),
		'text'   => __( 'A premium front-end entry point for understanding Solanique access pathways while partner-integrated services are prepared.', 'solanique' ),
		'status' => __( 'Private access point', 'solanique' ),
	),
	array(
		'title' => __( 'Start Inquiry', 'solanique' ),
		'text'  => __( 'Begin through a private gateway designed for context, discretion, and the correct path forward.', 'solanique' ),
		'url'   => solanique_get_inquiry_url(),
	),
	array(
		'title' => __( 'Investor Club', 'solanique' ),
		'text'  => __( 'A responsible pathway for private investment conversations connected to real estate and development.', 'solanique' ),
		'url'   => solanique_get_page_url( 'investor-club', '/investor-club/' ),
	),
	array(
		'title' => __( 'JV Club', 'solanique' ),
		'text'  => __( 'A route for joint venture alignment, strategic fit, and disciplined opportunity review.', 'solanique' ),
		'url'   => solanique_get_page_url( 'jv-club', '/jv-club/' ),
	),
);
?>

<section class="sg-section sg-product-section sg-client-access-pathways" aria-labelledby="sg-client-access-pathways-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-product-section__header sg-flow" data-sg-stagger>
			<p class="sg-product-section__eyebrow" data-sg-reveal="fade-up"><?php esc_html_e( 'Private pathways', 'solanique' ); ?></p>
			<h2 id="sg-client-access-pathways-title" class="sg-product-section__title" data-sg-reveal="fade-up">
				<?php esc_html_e( 'Prepared for protected client journeys.', 'solanique' ); ?>
			</h2>
		</div>

		<div class="sg-pathway-grid" data-sg-stagger>
			<?php foreach ( $pathways as $pathway ) : ?>
				<article class="sg-pathway-card sg-flow" data-sg-reveal="fade-up">
					<h3 class="sg-pathway-card__title"><?php echo esc_html( $pathway['title'] ); ?></h3>
					<p class="sg-pathway-card__text"><?php echo esc_html( $pathway['text'] ); ?></p>
					<?php if ( ! empty( $pathway['url'] ) ) : ?>
						<a class="sg-pathway-card__link" href="<?php echo esc_url( $pathway['url'] ); ?>"><?php esc_html_e( 'Open pathway', 'solanique' ); ?></a>
					<?php else : ?>
						<span class="sg-pathway-card__status"><?php echo esc_html( $pathway['status'] ?? __( 'Private access point', 'solanique' ) ); ?></span>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
