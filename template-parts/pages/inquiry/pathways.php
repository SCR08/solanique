<?php
/**
 * Inquiry pathway cards.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$pathways = array(
	array(
		'title' => __( 'Capital', 'solanique' ),
		'text'  => __( 'Capital planning, acquisition strategy, Investor Club conversations, and business advisory.', 'solanique' ),
		'url'   => solanique_get_page_url( 'capital', '/capital/' ),
	),
	array(
		'title' => __( 'Estate', 'solanique' ),
		'text'  => __( 'Development, renovation, property management, stewardship, and asset care.', 'solanique' ),
		'url'   => solanique_get_page_url( 'estates', '/estates/' ),
	),
	array(
		'title' => __( 'Concierge', 'solanique' ),
		'text'  => __( 'Lifestyle logistics, family support, senior transitions, household operations, and time restoration.', 'solanique' ),
		'url'   => solanique_get_page_url( 'concierge', '/concierge/' ),
	),
	array(
		'title' => __( 'Solanique Club', 'solanique' ),
		'text'  => __( 'A private pathway for JV Network, Service Providers, and Investor Club conversations.', 'solanique' ),
		'url'   => solanique_get_page_url( 'solanique-club', '/solanique-club/' ),
	),
);
?>

<section id="sg-inquiry-pathways" class="sg-section sg-product-section sg-inquiry-pathways" aria-labelledby="sg-inquiry-pathways-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-product-section__header sg-flow" data-sg-stagger>
			<p class="sg-product-section__eyebrow" data-sg-reveal="fade-up"><?php esc_html_e( 'Type of Services', 'solanique' ); ?></p>
			<h2 id="sg-inquiry-pathways-title" class="sg-product-section__title" data-sg-reveal="fade-up">
				<?php esc_html_e( 'Choose the pathway that matches the nature of the inquiry.', 'solanique' ); ?>
			</h2>
		</div>

		<div class="sg-pathway-grid" data-sg-stagger>
			<?php foreach ( $pathways as $pathway ) : ?>
				<article class="sg-pathway-card sg-flow" data-sg-reveal="fade-up">
					<h3 class="sg-pathway-card__title"><?php echo esc_html( $pathway['title'] ); ?></h3>
					<p class="sg-pathway-card__text"><?php echo esc_html( $pathway['text'] ); ?></p>
					<a class="sg-pathway-card__link" href="<?php echo esc_url( $pathway['url'] ); ?>"><?php esc_html_e( 'Learn more', 'solanique' ); ?></a>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
