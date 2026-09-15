<?php
/**
 * JV Club focus areas.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$is_spanish = function_exists( 'sg_is_spanish' ) && sg_is_spanish();
$copy       = $is_spanish ? array(
	'eyebrow' => 'Marco de alianzas',
	'title'   => 'Un canal privado para oportunidades que requieren estructura.',
	'intro'   => 'JV Club organiza el lenguaje de joint ventures, desarrollo e incubación en una página frontal responsable y clara.',
	'alt'     => 'Momento profesional de acuerdo representando conversaciones de alineación JV Club.',
	'items'   => array(
		array(
			'title' => 'Institutional-level Joint Ventures',
			'text'  => 'Conversaciones donde la alineación estratégica, la preparación operativa y el contexto inmobiliario deben evaluarse antes de avanzar.',
		),
		array(
			'title' => 'Development alignment',
			'text'  => 'Revisión de cómo una oportunidad puede relacionarse con adquisición, desarrollo, custodia y dirección a largo plazo.',
		),
		array(
			'title' => 'Corporate incubation',
			'text'  => 'Apoyo conceptual para firmas y proyectos que requieren arquitectura de lanzamiento y estructura institucional.',
		),
		array(
			'title' => 'Strategic launch advisory',
			'text'  => 'Una mirada disciplinada sobre posicionamiento, preparación y capacidad antes de definir cualquier ruta de participación.',
		),
		array(
			'title' => 'Bilingual governance',
			'text'  => 'Claridad en inglés y español para conversaciones entre jurisdicciones, culturas y mercados.',
		),
	),
) : array(
	'eyebrow' => 'Venture framework',
	'title'   => 'A private channel for opportunities that require structure.',
	'intro'   => 'JV Club organizes the language of joint ventures, development, and incubation into a responsible front-end page.',
	'alt'     => 'Professional agreement moment representing JV Club alignment conversations.',
	'items'   => array(
		array(
			'title' => 'Institutional-level Joint Ventures',
			'text'  => 'Conversations where strategic alignment, operational readiness, and real estate context must be reviewed before moving forward.',
		),
		array(
			'title' => 'Development alignment',
			'text'  => 'Review of how an opportunity may relate to acquisition, development, stewardship, and long-term direction.',
		),
		array(
			'title' => 'Corporate incubation',
			'text'  => 'Conceptual support for firms and projects that require launch architecture and institutional structure.',
		),
		array(
			'title' => 'Strategic launch advisory',
			'text'  => 'A disciplined lens on positioning, preparation, and capability before any participation path is defined.',
		),
		array(
			'title' => 'Bilingual governance',
			'text'  => 'English and Spanish clarity for conversations moving across jurisdictions, cultures, and markets.',
		),
	),
);
?>

<section class="sg-section sg-product-section sg-club-feature sg-jv-club-focus" aria-labelledby="sg-jv-club-focus-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-club-feature__layout sg-club-feature__layout--reverse">
			<figure class="sg-club-feature__media" data-sg-reveal="scale-in">
				<?php
				echo sg_asset_img(
					'images/estates/real-estate-contract-handshake-closing.jpg',
					$copy['alt'],
					array(
						'class'  => 'sg-club-feature__image sg-img sg-img--cover',
						'width'  => 2048,
						'height' => 1365,
						'sizes'  => '(min-width: 64rem) 42vw, 100vw',
					)
				);
				?>
			</figure>

			<div class="sg-club-feature__content sg-flow" data-sg-stagger>
				<p class="sg-product-section__eyebrow" data-sg-reveal="fade-up"><?php echo esc_html( $copy['eyebrow'] ); ?></p>
				<h2 id="sg-jv-club-focus-title" class="sg-product-section__title" data-sg-reveal="fade-up">
					<?php echo esc_html( $copy['title'] ); ?>
				</h2>
				<p class="sg-product-section__intro" data-sg-reveal="fade-up"><?php echo esc_html( $copy['intro'] ); ?></p>

				<div class="sg-club-grid" data-sg-stagger>
					<?php foreach ( $copy['items'] as $index => $item ) : ?>
						<article class="sg-club-card sg-flow" data-sg-reveal="fade-up">
							<span class="sg-club-card__number"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
							<h3 class="sg-club-card__title"><?php echo esc_html( $item['title'] ); ?></h3>
							<p class="sg-club-card__text"><?php echo esc_html( $item['text'] ); ?></p>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
