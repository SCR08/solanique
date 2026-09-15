<?php
/**
 * Solanique Club overview section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$is_spanish = function_exists( 'sg_is_spanish' ) && sg_is_spanish();
$copy       = $is_spanish ? array(
	'eyebrow' => 'Arquitectura del club',
	'title'   => 'Dos áreas privadas. Un estándar de alineación.',
	'text'    => 'Solanique Club organiza conversaciones de red, proveedores de servicio y capital privado sin prometer acceso, resultados, rendimientos ni estructuras no aprobadas.',
	'alt'     => 'Datos de mercado inmobiliario sobre una ciudad representando perspectiva global y red privada.',
) : array(
	'eyebrow' => 'Club architecture',
	'title'   => 'Two private areas. One standard of alignment.',
	'text'    => 'Solanique Club organizes network, service provider, and private capital conversations without promising access, outcomes, returns, or unapproved structures.',
	'alt'     => 'Real estate market data over a city representing global perspective and private network context.',
);
?>

<section class="sg-section sg-product-section sg-solanique-club-overview" aria-labelledby="sg-solanique-club-overview-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-solanique-club-overview__layout">
			<figure class="sg-solanique-club-overview__media" data-sg-reveal="scale-in">
				<?php
				echo sg_asset_img(
					'images/estates/real-estate-market-data-city-skyline.jpg',
					$copy['alt'],
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
				<p class="sg-product-section__eyebrow" data-sg-reveal="fade-up"><?php echo esc_html( $copy['eyebrow'] ); ?></p>
				<h2 id="sg-solanique-club-overview-title" class="sg-product-section__title" data-sg-reveal="fade-up">
					<?php echo esc_html( $copy['title'] ); ?>
				</h2>
				<p class="sg-product-section__intro" data-sg-reveal="fade-up"><?php echo esc_html( $copy['text'] ); ?></p>
			</div>
		</div>
	</div>
</section>
