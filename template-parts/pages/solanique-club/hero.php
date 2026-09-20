<?php
/**
 * Solanique Club hero section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content       = solanique_get_final_page_copy( 'solanique_club' );
$pathways      = (array) ( $content['pathways'] ?? array() );
$primary       = $pathways[0] ?? array();
$primary_url   = solanique_get_final_mailto( $primary['email'] ?? '' );
$secondary_url = '#sg-solanique-club-areas';
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
			<div class="sg-cluster sg-product-hero__actions" data-sg-reveal="fade-up">
				<?php if ( '' !== $primary_url ) : ?>
					<a class="sg-button sg-button--lg" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary['action'] ?? '' ); ?></a>
				<?php endif; ?>
				<a class="sg-button sg-button--ghost sg-product-hero__secondary-link" href="<?php echo esc_url( $secondary_url ); ?>"><?php esc_html_e( 'View Areas', 'solanique' ); ?></a>
			</div>
		</div>
	</div>
</section>
