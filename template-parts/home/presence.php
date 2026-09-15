<?php
/**
 * Homepage global presence section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content    = solanique_get_final_page_copy( 'home' );
$experience = $content['experience'] ?? array();
?>

<section class="sg-section sg-home-presence" aria-labelledby="solanique-home-presence-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-home-presence__layout">
			<div class="sg-home-presence__content sg-flow" data-sg-stagger>
				<p class="sg-home-presence__eyebrow sg-home-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $content['headline'] ?? '' ); ?>
				</p>

				<h2 id="solanique-home-presence-title" class="sg-home-presence__title sg-home-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $experience['heading'] ?? '' ); ?>
				</h2>
			</div>

			<div class="sg-home-presence__atlas sg-home-reveal" data-sg-reveal="scale-in">
				<ol class="sg-home-presence__cards" aria-label="<?php echo esc_attr( $experience['heading'] ?? '' ); ?>">
					<?php foreach ( (array) ( $experience['items'] ?? array() ) as $index => $group ) : ?>
						<li class="sg-home-presence__card">
							<span class="sg-home-presence__number"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
							<div class="sg-home-presence__card-body sg-flow">
								<h3 class="sg-home-presence__card-title"><?php echo esc_html( $group['title'] ?? '' ); ?></h3>
								<p class="sg-home-presence__card-text"><?php echo esc_html( $group['text'] ?? '' ); ?></p>
							</div>
						</li>
					<?php endforeach; ?>
				</ol>
			</div>
		</div>
	</div>
</section>
