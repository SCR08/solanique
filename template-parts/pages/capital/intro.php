<?php
/**
 * Capital page intro section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content   = solanique_get_final_page_copy( 'capital' );
$manifesto = $content['manifesto'] ?? array();
?>

<section class="sg-section sg-product-intro sg-capital-intro" aria-labelledby="sg-capital-intro-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-product-intro__layout sg-capital-intro__layout">
			<div class="sg-capital-intro__aside sg-capital-reveal" aria-hidden="true" data-sg-reveal="line">
				<span class="sg-capital-intro__rule"></span>
			</div>

			<div class="sg-product-intro__content sg-capital-intro__content sg-flow" data-sg-stagger>
				<h2 id="sg-capital-intro-title" class="sg-product-intro__title sg-capital-intro__title sg-capital-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $manifesto['heading'] ?? '' ); ?>
				</h2>

				<p class="sg-product-intro__text sg-capital-intro__text sg-capital-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $manifesto['text'] ?? '' ); ?>
				</p>
			</div>
		</div>
	</div>
</section>
