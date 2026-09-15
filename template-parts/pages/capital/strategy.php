<?php
/**
 * Capital page immutable principles section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content    = solanique_get_final_page_copy( 'capital' );
$principles = $content['principles'] ?? array();
?>

<section id="sg-capital-framework" class="sg-section sg-product-section sg-product-framework sg-capital-framework" aria-labelledby="sg-capital-framework-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-product-section__header sg-capital-framework__header sg-flow" data-sg-stagger>
			<p class="sg-product-section__eyebrow sg-capital-framework__eyebrow sg-capital-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['service'] ?? '' ); ?>
			</p>

			<h2 id="sg-capital-framework-title" class="sg-product-section__title sg-capital-framework__title sg-capital-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $principles['heading'] ?? '' ); ?>
			</h2>
		</div>

		<ol class="sg-product-list sg-product-list--cards sg-product-list--grid sg-capital-framework__grid" data-sg-stagger>
			<?php foreach ( (array) ( $principles['items'] ?? array() ) as $index => $item ) : ?>
				<li class="sg-product-list__item sg-capital-framework__item sg-capital-reveal" data-sg-reveal="fade-up">
					<span class="sg-product-list__number sg-capital-framework__number"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					<div class="sg-product-list__body sg-capital-framework__item-body sg-flow">
						<h3 class="sg-product-list__title sg-capital-framework__item-title"><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
						<p class="sg-product-list__text sg-capital-framework__item-text"><?php echo esc_html( $item['text'] ?? '' ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>
