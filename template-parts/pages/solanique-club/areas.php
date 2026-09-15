<?php
/**
 * Solanique Club areas.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$is_spanish = function_exists( 'sg_is_spanish' ) && sg_is_spanish();
$copy       = $is_spanish ? array(
	'eyebrow' => 'Áreas privadas',
	'title'   => 'JV Network and Service Providers junto a Investor Club.',
	'items'   => array(
		array(
			'title' => 'JV Network and Service Providers',
			'text'  => 'Un área para conversaciones de alineación, capacidad, servicio y colaboración responsable dentro del ecosistema Solanique.',
			'image' => 'images/estates/real-estate-contract-handshake-closing.jpg',
			'alt'   => 'Momento profesional de acuerdo representando conversaciones responsables de JV Network.',
		),
		array(
			'title' => 'Investor Club',
			'text'  => 'Un área para conversaciones privadas de capital, oportunidades inmobiliarias fuera de mercado y revisión disciplinada.',
			'image' => 'images/estates/digital-real-estate-investment-hologram.jpg',
			'alt'   => 'Visualización digital de inversión inmobiliaria representando revisión privada de Investor Club.',
		),
	),
) : array(
	'eyebrow' => 'Private areas',
	'title'   => 'JV Network and Service Providers alongside Investor Club.',
	'items'   => array(
		array(
			'title' => 'JV Network and Service Providers',
			'text'  => 'An area for alignment, capability, service, and responsible collaboration conversations within the Solanique ecosystem.',
			'image' => 'images/estates/real-estate-contract-handshake-closing.jpg',
			'alt'   => 'Professional agreement moment representing responsible JV Network conversations.',
		),
		array(
			'title' => 'Investor Club',
			'text'  => 'An area for private capital conversations, off-market real estate context, and disciplined opportunity review.',
			'image' => 'images/estates/digital-real-estate-investment-hologram.jpg',
			'alt'   => 'Digital real estate investment visualization representing private Investor Club review.',
		),
	),
);
?>

<section id="sg-solanique-club-areas" class="sg-section sg-product-section sg-solanique-club-areas" aria-labelledby="sg-solanique-club-areas-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-product-section__header sg-flow" data-sg-stagger>
			<p class="sg-product-section__eyebrow" data-sg-reveal="fade-up"><?php echo esc_html( $copy['eyebrow'] ); ?></p>
			<h2 id="sg-solanique-club-areas-title" class="sg-product-section__title" data-sg-reveal="fade-up">
				<?php echo esc_html( $copy['title'] ); ?>
			</h2>
		</div>

		<div class="sg-solanique-club-areas__grid" data-sg-stagger>
			<?php foreach ( $copy['items'] as $index => $item ) : ?>
				<article class="sg-solanique-club-card" data-sg-reveal="fade-up">
					<?php
					echo sg_asset_img(
						$item['image'],
						$item['alt'],
						array(
							'class'  => 'sg-solanique-club-card__image sg-img sg-img--cover',
							'width'  => 2048,
							'height' => 1365,
							'sizes'  => '(min-width: 64rem) 42vw, 100vw',
						)
					);
					?>
					<div class="sg-solanique-club-card__body sg-flow">
						<span class="sg-solanique-club-card__number"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						<h3 class="sg-solanique-club-card__title"><?php echo esc_html( $item['title'] ); ?></h3>
						<p class="sg-solanique-club-card__text"><?php echo esc_html( $item['text'] ); ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
