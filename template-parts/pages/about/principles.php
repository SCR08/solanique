<?php
/**
 * About page principles section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$principles = array(
	array(
		'number'      => '01',
		'title'       => __( 'Strategic Excellence', 'solanique' ),
		'description' => __( 'Intelligence-driven decisions across Capital, Estates, and Concierge, shaped with clarity and disciplined attention to detail.', 'solanique' ),
	),
	array(
		'number'      => '02',
		'title'       => __( 'Legacy-Driven Vision', 'solanique' ),
		'description' => __( 'The work is designed for more than the immediate decision, building toward continuity, protection, and generational relevance.', 'solanique' ),
	),
	array(
		'number'      => '03',
		'title'       => __( 'Global Mindset', 'solanique' ),
		'description' => __( 'Bilingual English and Spanish perspective helps bridge cultures, markets, and cross-border complexity.', 'solanique' ),
	),
	array(
		'number'      => '04',
		'title'       => __( 'Sovereign Integrity', 'solanique' ),
		'description' => __( 'Honest guidance, transparency, and discretion protect trust as part of the Solanique standard.', 'solanique' ),
	),
	array(
		'number'      => '05',
		'title'       => __( 'Architectural Leadership', 'solanique' ),
		'description' => __( 'Clients are empowered to lead their own vision with stronger structure, better information, and refined execution around them.', 'solanique' ),
	),
);
?>

<section class="sg-section sg-product-section sg-product-framework sg-about-principles" aria-labelledby="sg-about-principles-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-product-section__layout sg-about-principles__layout">
			<div class="sg-product-section__header sg-about-principles__header sg-flow" data-sg-stagger>
				<p class="sg-product-section__eyebrow sg-about-principles__eyebrow sg-about-reveal" data-sg-reveal="fade-up">
					<?php esc_html_e( 'Principles', 'solanique' ); ?>
				</p>

				<h2 id="sg-about-principles-title" class="sg-product-section__title sg-about-principles__title sg-about-reveal" data-sg-reveal="fade-up">
					<?php esc_html_e( 'The Principles That Guide the Work', 'solanique' ); ?>
				</h2>

				<p class="sg-product-section__intro sg-about-principles__intro sg-about-reveal" data-sg-reveal="fade-up">
					<?php esc_html_e( 'The Solanique DNA is built around strategic excellence, legacy vision, bilingual mastery, sovereign integrity, and architectural leadership.', 'solanique' ); ?>
				</p>
			</div>

			<ol class="sg-product-list sg-product-list--editorial sg-about-principles__list" data-sg-stagger>
				<?php foreach ( $principles as $principle ) : ?>
					<li class="sg-product-list__item sg-about-principles__item sg-about-reveal" data-sg-reveal="fade-up">
						<span class="sg-product-list__number sg-about-principles__number"><?php echo esc_html( $principle['number'] ); ?></span>
						<div class="sg-product-list__body sg-about-principles__item-body sg-flow">
							<h3 class="sg-product-list__title sg-about-principles__item-title"><?php echo esc_html( $principle['title'] ); ?></h3>
							<p class="sg-product-list__text sg-about-principles__item-text"><?php echo esc_html( $principle['description'] ); ?></p>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</div>
</section>
