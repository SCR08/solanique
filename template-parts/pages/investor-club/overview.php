<?php
/**
 * Investor Club overview.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$items = array(
	array(
		'title' => __( 'Private opportunity review', 'solanique' ),
		'text'  => __( 'A structured lens for understanding off-market or private real estate conversations before direction is proposed.', 'solanique' ),
	),
	array(
		'title' => __( 'Strategic capital fit', 'solanique' ),
		'text'  => __( 'Discussion around alignment, timing, market context, and how a potential opportunity supports broader objectives.', 'solanique' ),
	),
	array(
		'title' => __( 'Bilingual cross-border perspective', 'solanique' ),
		'text'  => __( 'English and Spanish insight for investors navigating Canada, the United States, Latin America, and selected global relationships.', 'solanique' ),
	),
);
?>

<section id="sg-investor-club-overview" class="sg-section sg-product-section sg-investor-club-overview" aria-labelledby="sg-investor-club-overview-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-product-section__header sg-flow" data-sg-stagger>
			<p class="sg-product-section__eyebrow" data-sg-reveal="fade-up"><?php esc_html_e( 'Responsible access', 'solanique' ); ?></p>
			<h2 id="sg-investor-club-overview-title" class="sg-product-section__title" data-sg-reveal="fade-up">
				<?php esc_html_e( 'A private club concept for disciplined opportunity conversations.', 'solanique' ); ?>
			</h2>
			<p class="sg-product-section__intro" data-sg-reveal="fade-up">
				<?php esc_html_e( 'Investor Club content is presented as an invitation-oriented pathway. It does not guarantee access, returns, financing, or outcomes.', 'solanique' ); ?>
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
