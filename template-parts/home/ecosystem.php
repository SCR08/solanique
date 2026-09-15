<?php
/**
 * Homepage ecosystem section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content   = solanique_get_final_page_copy( 'home' );
$geography = $content['geography'] ?? array();
?>

<section id="ecosystem" class="sg-section sg-home-ecosystem" aria-labelledby="solanique-home-ecosystem-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-home-ecosystem__header sg-flow" data-sg-stagger>
			<p class="sg-home-ecosystem__eyebrow sg-home-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['headline'] ?? '' ); ?>
			</p>

			<h2 id="solanique-home-ecosystem-title" class="sg-home-ecosystem__title sg-home-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $geography['heading'] ?? '' ); ?>
			</h2>

			<p class="sg-home-ecosystem__intro sg-home-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $geography['intro'] ?? '' ); ?>
			</p>
		</div>

		<?php if ( ! empty( $geography['items'] ) && is_array( $geography['items'] ) ) : ?>
			<ol class="sg-final-list sg-final-list--three sg-home-ecosystem__list" data-sg-stagger>
				<?php foreach ( $geography['items'] as $index => $item ) : ?>
					<li class="sg-final-list__item sg-home-reveal" data-sg-reveal="fade-up">
						<span class="sg-final-list__number"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						<strong class="sg-final-list__title"><?php echo esc_html( $item['title'] ?? '' ); ?></strong>
						<span class="sg-final-list__text"><?php echo esc_html( $item['text'] ?? '' ); ?></span>
					</li>
				<?php endforeach; ?>
			</ol>
		<?php endif; ?>
	</div>
</section>
