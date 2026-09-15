<?php
/**
 * Homepage manifesto section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content = solanique_get_final_page_copy( 'home' );
$target  = $content['target'] ?? array();
?>

<section class="sg-section sg-home-manifesto" aria-labelledby="solanique-home-manifesto-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-home-manifesto__content sg-flow" data-sg-stagger>
			<hr class="sg-divider sg-divider--gold sg-home-manifesto__divider sg-home-reveal" aria-hidden="true" data-sg-reveal="line">

			<h2 id="solanique-home-manifesto-title" class="sg-home-manifesto__title sg-home-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $target['heading'] ?? '' ); ?>
			</h2>

			<p class="sg-home-manifesto__lead sg-home-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $target['intro'] ?? '' ); ?>
			</p>

			<?php if ( ! empty( $target['items'] ) && is_array( $target['items'] ) ) : ?>
				<ul class="sg-final-list sg-final-list--three sg-home-manifesto__list" data-sg-stagger>
					<?php foreach ( $target['items'] as $item ) : ?>
						<li class="sg-final-list__item sg-home-reveal" data-sg-reveal="fade-up">
							<strong class="sg-final-list__title"><?php echo esc_html( $item['title'] ?? '' ); ?></strong>
							<span class="sg-final-list__text"><?php echo esc_html( $item['text'] ?? '' ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</section>
