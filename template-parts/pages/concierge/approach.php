<?php
/**
 * Concierge page pillars section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content    = solanique_get_final_page_copy( 'concierge' );
$principles = $content['principles'] ?? array();
?>

<section class="sg-section sg-product-section sg-product-framework sg-concierge-approach" aria-labelledby="sg-concierge-approach-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-product-section__layout sg-concierge-approach__layout">
			<div class="sg-product-section__header sg-concierge-approach__header sg-flow" data-sg-stagger>
				<p class="sg-product-section__eyebrow sg-concierge-approach__eyebrow sg-concierge-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $content['service'] ?? '' ); ?>
				</p>

				<h2 id="sg-concierge-approach-title" class="sg-product-section__title sg-concierge-approach__title sg-concierge-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $principles['heading'] ?? '' ); ?>
				</h2>
			</div>

			<ol class="sg-product-list sg-product-list--editorial sg-concierge-approach__list" data-sg-stagger>
				<?php foreach ( (array) ( $principles['items'] ?? array() ) as $index => $item ) : ?>
					<li class="sg-product-list__item sg-concierge-approach__item sg-concierge-reveal" data-sg-reveal="fade-up">
						<span class="sg-product-list__number sg-concierge-approach__number"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						<div class="sg-product-list__body sg-concierge-approach__item-body sg-flow">
							<h3 class="sg-product-list__title sg-concierge-approach__item-title"><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
							<p class="sg-product-list__text sg-concierge-approach__item-text"><?php echo esc_html( $item['text'] ?? '' ); ?></p>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</div>
</section>
