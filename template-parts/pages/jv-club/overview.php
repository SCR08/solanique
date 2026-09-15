<?php
/**
 * JV Club overview.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$items = array(
	array(
		'title' => __( 'Strategic partner fit', 'solanique' ),
		'text'  => __( 'A private review of objectives, capability, market context, and the nature of a potential partnership.', 'solanique' ),
	),
	array(
		'title' => __( 'Development and acquisition context', 'solanique' ),
		'text'  => __( 'A disciplined conversation around real estate, capital, timing, stewardship, and operational readiness.', 'solanique' ),
	),
	array(
		'title' => __( 'Cross-border coordination', 'solanique' ),
		'text'  => __( 'Bilingual perspective for partners navigating opportunities across jurisdictions, cultures, and markets.', 'solanique' ),
	),
);
?>

<section id="sg-jv-club-overview" class="sg-section sg-product-section sg-jv-club-overview" aria-labelledby="sg-jv-club-overview-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-product-section__header sg-flow" data-sg-stagger>
			<p class="sg-product-section__eyebrow" data-sg-reveal="fade-up"><?php esc_html_e( 'Private collaboration', 'solanique' ); ?></p>
			<h2 id="sg-jv-club-overview-title" class="sg-product-section__title" data-sg-reveal="fade-up">
				<?php esc_html_e( 'A disciplined channel for joint venture alignment.', 'solanique' ); ?>
			</h2>
			<p class="sg-product-section__intro" data-sg-reveal="fade-up">
				<?php esc_html_e( 'JV Club content is exploratory and private. It does not guarantee acceptance, access, capital, legal outcomes, or project approval.', 'solanique' ); ?>
			</p>
		</div>

		<ul class="sg-product-list sg-product-list--cards sg-product-list--grid" data-sg-stagger>
			<?php foreach ( $items as $index => $item ) : ?>
				<li class="sg-product-list__item" data-sg-reveal="fade-up">
					<span class="sg-product-list__number"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					<div class="sg-flow">
						<h3 class="sg-product-list__title"><?php echo esc_html( $item['title'] ); ?></h3>
						<p class="sg-product-list__text"><?php echo esc_html( $item['text'] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
