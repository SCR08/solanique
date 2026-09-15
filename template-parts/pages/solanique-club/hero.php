<?php
/**
 * Solanique Club hero section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$is_spanish    = function_exists( 'sg_is_spanish' ) && sg_is_spanish();
$primary_url   = solanique_get_inquiry_url();
$secondary_url = '#sg-solanique-club-areas';
$copy          = $is_spanish ? array(
	'eyebrow' => 'Ecosistema privado',
	'title'   => 'Solanique Club',
	'text'    => 'Un frente privado para conversaciones de JV Network and Service Providers e Investor Club mientras se prepara la infraestructura aprobada de registro e intake.',
	'primary' => 'Registrar interés',
	'second'  => 'Ver áreas',
	'alt'     => 'Mapa digital de desarrollo inmobiliario representando una red privada de Solanique Club.',
) : array(
	'eyebrow' => 'Private ecosystem',
	'title'   => 'Solanique Club',
	'text'    => 'A private front-end gateway for JV Network and Service Providers and Investor Club conversations while approved registration and intake infrastructure is prepared.',
	'primary' => 'Register Interest',
	'second'  => 'View Areas',
	'alt'     => 'Digital real estate development map representing a private Solanique Club network.',
);
?>

<section class="sg-product-hero sg-solanique-club-hero" aria-labelledby="sg-solanique-club-hero-title">
	<div class="sg-product-hero__visual" data-sg-reveal="scale-in">
		<div class="sg-product-hero__visual-shell sg-product-hero__image-frame">
			<?php
			echo sg_asset_img(
				'images/estates/smart-city-real-estate-development-map.jpg',
				$copy['alt'],
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
			<p class="sg-product-hero__eyebrow" data-sg-reveal="fade-up"><?php echo esc_html( $copy['eyebrow'] ); ?></p>
			<h1 id="sg-solanique-club-hero-title" class="sg-product-hero__title" data-sg-reveal="fade-up">
				<?php echo esc_html( $copy['title'] ); ?>
			</h1>
			<p class="sg-product-hero__text" data-sg-reveal="fade-up"><?php echo esc_html( $copy['text'] ); ?></p>
			<div class="sg-cluster sg-product-hero__actions" data-sg-reveal="fade-up">
				<a class="sg-button sg-button--lg" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $copy['primary'] ); ?></a>
				<a class="sg-button sg-button--ghost sg-product-hero__secondary-link" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $copy['second'] ); ?></a>
			</div>
		</div>
	</div>
</section>
