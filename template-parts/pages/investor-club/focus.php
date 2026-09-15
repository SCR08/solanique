<?php
/**
 * Investor Club focus areas.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$is_spanish = function_exists( 'sg_is_spanish' ) && sg_is_spanish();
$copy       = $is_spanish ? array(
	'eyebrow' => 'Marco derivado de Capital',
	'title'   => 'Acceso privado dentro del ecosistema de capital.',
	'intro'   => 'Investor Club traduce el lenguaje de The Sovereign Investment Club en una página frontal clara, privada y responsable.',
	'alt'     => 'Visualización de análisis inmobiliario representando revisión privada de oportunidades Investor Club.',
	'items'   => array(
		array(
			'title' => 'The Sovereign Investment Club',
			'text'  => 'Acceso exclusivo, por invitación, a conversaciones de capital vinculadas al ecosistema Solanique.',
		),
		array(
			'title' => 'Institutional-level Joint Ventures',
			'text'  => 'Revisión de oportunidades donde la escala, el contexto y la alineación estratégica requieren una mirada disciplinada.',
		),
		array(
			'title' => 'Off-market private real estate placements',
			'text'  => 'Un canal para analizar oportunidades privadas fuera del ruido del mercado, sin prometer acceso, rendimiento o resultado.',
		),
		array(
			'title' => 'Audited premium development projects',
			'text'  => 'Conversaciones basadas en información, revisión responsable y claridad antes de definir cualquier siguiente paso.',
		),
	),
) : array(
	'eyebrow' => 'Capital-derived framework',
	'title'   => 'Private access within the capital ecosystem.',
	'intro'   => 'Investor Club translates the language of The Sovereign Investment Club into a clear, private, and responsible front-end page.',
	'alt'     => 'Real estate analytics visualization representing private Investor Club opportunity review.',
	'items'   => array(
		array(
			'title' => 'The Sovereign Investment Club',
			'text'  => 'Exclusive, invitation-led access to capital conversations connected to the Solanique ecosystem.',
		),
		array(
			'title' => 'Institutional-level Joint Ventures',
			'text'  => 'Review of opportunities where scale, context, and strategic alignment require a disciplined lens.',
		),
		array(
			'title' => 'Off-market private real estate placements',
			'text'  => 'A channel for understanding private opportunities outside market noise without promising access, returns, or outcomes.',
		),
		array(
			'title' => 'Audited premium development projects',
			'text'  => 'Conversations grounded in information, responsible review, and clarity before any next step is defined.',
		),
	),
);
?>

<section class="sg-section sg-product-section sg-club-feature sg-investor-club-focus" aria-labelledby="sg-investor-club-focus-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-club-feature__layout">
			<figure class="sg-club-feature__media" data-sg-reveal="scale-in">
				<?php
				echo sg_asset_img(
					'images/estates/commercial-property-analytics-real-estate-investment.jpg',
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
				<h2 id="sg-investor-club-focus-title" class="sg-product-section__title" data-sg-reveal="fade-up">
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
