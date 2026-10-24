<?php
/**
 * Solanique Club hero section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content       = solanique_get_final_page_copy( 'solanique_club' );
$alt           = function_exists( 'sg_is_spanish' ) && sg_is_spanish()
	? __( 'Mapa digital de desarrollo inmobiliario representando una red privada de Solanique Club.', 'solanique' )
	: __( 'Digital real estate development map representing a private Solanique Club network.', 'solanique' );
?>

<section class="sg-product-hero sg-solanique-club-hero" aria-labelledby="sg-solanique-club-hero-title">
	<div class="sg-product-hero__visual" data-sg-reveal="scale-in">
		<div class="sg-product-hero__visual-shell sg-product-hero__image-frame">
			<?php
			echo sg_asset_img(
				'images/estates/smart-city-real-estate-development-map.jpg',
				$alt,
				array(
					'class'         => 'sg-product-hero__image sg-img sg-img--cover',
					'width'         => 2048,
					'height'        => 1365,
					'loading'       => 'eager',
					'fetchpriority' => 'high',
					'sizes'         => '100vw',
				)
			);
			?>
		</div>
	</div>

	<div class="sg-container sg-container--xl sg-product-hero__inner sg-solanique-club-hero__inner">
		<div class="sg-product-hero__content sg-flow" data-sg-stagger>
			<span class="sg-product-hero__line" aria-hidden="true" data-sg-reveal="line"></span>
			<p class="sg-product-hero__eyebrow" data-sg-reveal="fade-up"><?php echo esc_html( $content['brand'] ?? '' ); ?></p>
			<h1 id="sg-solanique-club-hero-title" class="sg-product-hero__title" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['service'] ?? '' ); ?>
			</h1>
			<p class="sg-product-hero__text" data-sg-reveal="fade-up"><?php echo esc_html( $content['intro'] ?? '' ); ?></p>
		</div>
	</div>
</section>
