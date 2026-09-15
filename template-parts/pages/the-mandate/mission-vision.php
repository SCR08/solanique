<?php
/**
 * The Mandate mission and vision section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content = solanique_get_final_page_copy( 'the_mandate' );
$items   = array(
	$content['mission'] ?? array(),
	$content['vision'] ?? array(),
);
?>

<section class="sg-section sg-product-section sg-mandate-section" aria-labelledby="sg-mandate-mission-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-product-section__header sg-flow" data-sg-stagger>
			<p class="sg-product-section__eyebrow" data-sg-reveal="fade-up"><?php echo esc_html( $content['title'] ?? '' ); ?></p>
			<h2 id="sg-mandate-mission-title" class="sg-product-section__title" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['mission']['heading'] ?? '' ); ?> / <?php echo esc_html( $content['vision']['heading'] ?? '' ); ?>
			</h2>
		</div>

		<div class="sg-mandate-duo" data-sg-stagger>
			<?php foreach ( $items as $item ) : ?>
				<article class="sg-mandate-duo__item sg-flow" data-sg-reveal="fade-up">
					<h3 class="sg-mandate-duo__title"><?php echo esc_html( $item['heading'] ?? '' ); ?></h3>
					<p class="sg-mandate-duo__text"><?php echo esc_html( $item['text'] ?? '' ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
