<?php
/**
 * Solanique Club overview section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content = solanique_get_final_page_copy( 'solanique_club' );
$alt     = function_exists( 'sg_is_spanish' ) && sg_is_spanish()
	? __( 'Datos de mercado inmobiliario sobre una ciudad representando perspectiva global y red privada.', 'solanique' )
	: __( 'Real estate market data over a city representing global perspective and private network context.', 'solanique' );
?>

<section class="sg-section sg-product-section sg-solanique-club-overview" aria-labelledby="sg-solanique-club-overview-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-solanique-club-overview__layout">
			<figure class="sg-solanique-club-overview__media" data-sg-reveal="scale-in">
				<?php
				echo sg_asset_img(
					'images/estates/real-estate-market-data-city-skyline.jpg',
					$alt,
					array(
						'class'  => 'sg-solanique-club-overview__image sg-img sg-img--cover',
						'width'  => 2048,
						'height' => 1365,
						'sizes'  => '(min-width: 64rem) 40vw, 100vw',
					)
				);
				?>
			</figure>

			<div class="sg-solanique-club-overview__content sg-flow" data-sg-stagger>
				<p class="sg-product-section__eyebrow" data-sg-reveal="fade-up"><?php echo esc_html( $content['tagline'] ?? '' ); ?></p>
				<h2 id="sg-solanique-club-overview-title" class="sg-product-section__title" data-sg-reveal="fade-up">
					<?php echo esc_html( $content['service'] ?? '' ); ?>
				</h2>
				<p class="sg-product-section__intro" data-sg-reveal="fade-up"><?php echo esc_html( $content['intro'] ?? '' ); ?></p>
			</div>
		</div>
	</div>
</section>
