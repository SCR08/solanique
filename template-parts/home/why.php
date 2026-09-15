<?php
/**
 * Homepage why Solanique section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content    = solanique_get_final_page_copy( 'home' );
$difference = $content['difference'] ?? array();
?>

<section class="sg-section sg-home-why" aria-labelledby="solanique-home-why-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-home-why__layout">
			<div class="sg-home-why__header sg-flow" data-sg-stagger>
				<p class="sg-home-why__eyebrow sg-home-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $content['headline'] ?? '' ); ?>
				</p>

				<h2 id="solanique-home-why-title" class="sg-home-why__title sg-home-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $difference['heading'] ?? '' ); ?>
				</h2>

				<p class="sg-home-why__intro sg-home-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $difference['intro'] ?? '' ); ?>
				</p>

				<figure class="sg-home-why__visual sg-home-reveal" data-sg-reveal="scale-in">
					<?php
					echo sg_asset_img(
						'images/estates/proptech-real-estate-portfolio-analytics.jpg',
						__( 'Digital property and portfolio interface representing Solanique Group integrated advisory.', 'solanique' ),
						array(
							'class'  => 'sg-home-why__image sg-img sg-img--cover',
							'width'  => 2048,
							'height' => 1365,
							'sizes'  => '(min-width: 64rem) 38vw, 100vw',
						)
					);
					?>
				</figure>
			</div>

			<ol class="sg-home-why__list" data-sg-stagger>
				<?php foreach ( (array) ( $difference['items'] ?? array() ) as $index => $item ) : ?>
					<li class="sg-home-why__item sg-home-reveal" data-sg-reveal="fade-up">
						<span class="sg-home-why__number"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						<div class="sg-home-why__item-body sg-flow">
							<h3 class="sg-home-why__item-title"><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
							<p class="sg-home-why__item-text"><?php echo esc_html( $item['text'] ?? '' ); ?></p>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</div>
</section>
