<?php
/**
 * The Mandate DNA section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content     = solanique_get_final_page_copy( 'the_mandate' );
$values      = $content['values'] ?? array();
$personality = $content['personality'] ?? array();
?>

<section id="sg-mandate-dna" class="sg-section sg-product-section sg-mandate-dna" aria-labelledby="sg-mandate-dna-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-product-section__header sg-flow" data-sg-stagger>
			<p class="sg-product-section__eyebrow" data-sg-reveal="fade-up"><?php echo esc_html( $content['title'] ?? '' ); ?></p>
			<h2 id="sg-mandate-dna-title" class="sg-product-section__title" data-sg-reveal="fade-up">
				<?php echo esc_html( $values['heading'] ?? '' ); ?>
			</h2>
		</div>

		<ol class="sg-product-list sg-product-list--editorial sg-mandate-dna__list" data-sg-stagger>
			<?php foreach ( (array) ( $values['items'] ?? array() ) as $index => $value ) : ?>
				<li class="sg-product-list__item" data-sg-reveal="fade-up">
					<span class="sg-product-list__number"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					<div class="sg-flow">
						<h3 class="sg-product-list__title"><?php echo esc_html( $value['title'] ?? '' ); ?></h3>
						<p class="sg-product-list__text"><?php echo esc_html( $value['text'] ?? '' ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ol>

		<div class="sg-mandate-personality sg-flow" data-sg-reveal="fade-up">
			<h3 class="sg-mandate-personality__title"><?php echo esc_html( $personality['heading'] ?? '' ); ?></h3>
			<p class="sg-mandate-personality__text"><?php echo esc_html( $personality['text'] ?? '' ); ?></p>
		</div>
	</div>
</section>
