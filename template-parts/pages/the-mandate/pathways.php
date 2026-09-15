<?php
/**
 * The Mandate closing brand line section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content = solanique_get_final_page_copy( 'the_mandate' );
?>

<section class="sg-section sg-product-cta sg-access-banner sg-mandate-pathways" aria-labelledby="sg-mandate-pathways-title">
	<div class="sg-container sg-container--md">
		<div class="sg-product-cta__content sg-flow" data-sg-stagger>
			<span class="sg-product-cta__line" aria-hidden="true" data-sg-reveal="line"></span>
			<h2 id="sg-mandate-pathways-title" class="sg-product-cta__title" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['final_line'] ?? '' ); ?>
			</h2>
		</div>
	</div>
</section>
