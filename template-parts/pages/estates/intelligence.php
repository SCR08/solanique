<?php
/**
 * Estate page immutable principles section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content    = solanique_get_final_page_copy( 'estate' );
$principles = $content['principles'] ?? array();
?>

<section class="sg-section sg-product-section sg-product-framework sg-estates-intelligence" aria-labelledby="sg-estates-intelligence-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-product-section__layout sg-estates-intelligence__layout">
			<div class="sg-product-section__header sg-estates-intelligence__header sg-flow" data-sg-stagger>
				<p class="sg-product-section__eyebrow sg-estates-intelligence__eyebrow sg-estates-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $content['service'] ?? '' ); ?>
				</p>

				<h2 id="sg-estates-intelligence-title" class="sg-product-section__title sg-estates-intelligence__title sg-estates-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $principles['heading'] ?? '' ); ?>
				</h2>
			</div>

			<ol class="sg-product-list sg-product-list--editorial sg-estates-intelligence__list" data-sg-stagger>
				<?php foreach ( (array) ( $principles['items'] ?? array() ) as $index => $item ) : ?>
					<li class="sg-product-list__item sg-estates-intelligence__item sg-estates-reveal" data-sg-reveal="fade-up">
						<span class="sg-product-list__number sg-estates-intelligence__number"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						<div class="sg-product-list__body sg-estates-intelligence__item-body sg-flow">
							<h3 class="sg-product-list__title sg-estates-intelligence__item-title"><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
							<p class="sg-product-list__text sg-estates-intelligence__item-text"><?php echo esc_html( $item['text'] ?? '' ); ?></p>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</div>
</section>
