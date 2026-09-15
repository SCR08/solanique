<?php
/**
 * The Mandate words section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content = solanique_get_final_page_copy( 'the_mandate' );
$words   = $content['words'] ?? array();
?>

<section class="sg-section sg-product-section sg-mandate-words" aria-labelledby="sg-mandate-words-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-mandate-words__layout">
			<div class="sg-flow" data-sg-stagger>
				<p class="sg-product-section__eyebrow" data-sg-reveal="fade-up"><?php echo esc_html( $content['title'] ?? '' ); ?></p>
				<h2 id="sg-mandate-words-title" class="sg-product-section__title" data-sg-reveal="fade-up">
					<?php echo esc_html( $words['heading'] ?? '' ); ?>
				</h2>
			</div>

			<ol class="sg-mandate-words__list" data-sg-stagger>
				<?php foreach ( (array) ( $words['items'] ?? array() ) as $word ) : ?>
					<li class="sg-mandate-words__item sg-flow" data-sg-reveal="fade-up">
						<strong><?php echo esc_html( $word['title'] ?? '' ); ?></strong>
						<span><?php echo esc_html( $word['text'] ?? '' ); ?></span>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</div>
</section>
