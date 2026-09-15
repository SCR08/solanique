<?php
/**
 * Estate page operating protocols section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content   = solanique_get_final_page_copy( 'estate' );
$protocols = $content['protocols'] ?? array();
?>

<section class="sg-section sg-product-process sg-estates-process" aria-labelledby="sg-estates-process-title">
	<div class="sg-container sg-container--lg">
		<div class="sg-product-section__header sg-estates-process__header sg-flow" data-sg-stagger>
			<p class="sg-product-section__eyebrow sg-estates-process__eyebrow sg-estates-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['service'] ?? '' ); ?>
			</p>

			<h2 id="sg-estates-process-title" class="sg-product-section__title sg-estates-process__title sg-estates-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $protocols['heading'] ?? '' ); ?>
			</h2>
		</div>

		<ol class="sg-process sg-estates-process__timeline" data-sg-stagger>
			<?php foreach ( (array) ( $protocols['items'] ?? array() ) as $index => $step ) : ?>
				<li class="sg-process__item sg-estates-process__step sg-estates-reveal" data-sg-reveal="fade-up">
					<span class="sg-process__number sg-estates-process__number"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					<div class="sg-process__content sg-estates-process__step-body sg-flow">
						<h3 class="sg-process__title sg-estates-process__step-title"><?php echo esc_html( $step['title'] ?? '' ); ?></h3>
						<p class="sg-process__text sg-estates-process__step-text"><?php echo esc_html( $step['text'] ?? '' ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>
