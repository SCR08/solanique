<?php
/**
 * The Mandate closing brand line section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content = solanique_get_final_page_copy( 'the_mandate' );
?>

<div class="sg-section sg-product-cta sg-access-banner sg-mandate-pathways">
	<div class="sg-container sg-container--xl">
		<div class="sg-brand-closing sg-product-cta__content sg-flow" data-sg-stagger>
			<span class="sg-product-cta__line" aria-hidden="true" data-sg-reveal="line"></span>
			<p class="sg-brand-line" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['final_line'] ?? '' ); ?>
			</p>
		</div>
	</div>
</div>
