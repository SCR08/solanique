<?php
/**
 * Homepage founder vision section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content    = solanique_get_final_page_copy( 'home' );
$experience = $content['experience'] ?? array();
?>

<section class="sg-section sg-home-founder" aria-labelledby="solanique-home-founder-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-home-founder__layout">
			<div class="sg-home-founder__content sg-flow" data-sg-stagger>
				<p class="sg-home-founder__eyebrow sg-home-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $content['headline'] ?? '' ); ?>
				</p>

				<h2 id="solanique-home-founder-title" class="sg-home-founder__title sg-home-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $experience['heading'] ?? '' ); ?>
				</h2>

				<p class="sg-home-founder__text sg-home-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $experience['intro'] ?? '' ); ?>
				</p>
			</div>

			<figure class="sg-home-founder__visual sg-home-reveal" data-sg-reveal="scale-in">
				<div class="sg-home-founder__portrait">
					<?php
					echo sg_asset_img(
						'images/about/illuminated-commercial-office-buildings-night.jpg',
						__( 'Illuminated commercial buildings representing Solanique Group advisory perspective.', 'solanique' ),
						array(
							'class'  => 'sg-home-founder__image sg-img sg-img--cover',
							'width'  => 2048,
							'height' => 1149,
							'sizes'  => '(min-width: 64rem) 38vw, 100vw',
						)
					);
					?>
					<div class="sg-home-founder__portrait-mark" aria-hidden="true"></div>
				</div>
			</figure>
		</div>
	</div>
</section>
