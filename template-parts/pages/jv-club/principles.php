<?php
/**
 * JV Club operating principles.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$is_spanish = function_exists( 'sg_is_spanish' ) && sg_is_spanish();
$copy       = $is_spanish ? array(
	'eyebrow' => 'Principios de venture',
	'title'   => 'La estructura precede a la escala.',
	'items'   => array(
		array(
			'title' => 'Alineación antes de participación',
			'text'  => 'La conversación empieza por objetivos, contexto, capacidad y ajuste estratégico.',
		),
		array(
			'title' => 'Estructura antes de escala',
			'text'  => 'Cada posibilidad se revisa con disciplina antes de hablar de crecimiento o ejecución.',
		),
		array(
			'title' => 'Transparencia e integridad estratégica',
			'text'  => 'El lenguaje de JV Club no garantiza aceptación, capital, resultados legales ni aprobación de proyectos.',
		),
		array(
			'title' => 'Desarrollo orientado al legado',
			'text'  => 'La oportunidad se considera dentro de una visión más amplia de activos, propiedad y continuidad.',
		),
	),
) : array(
	'eyebrow' => 'Venture principles',
	'title'   => 'Structure comes before scale.',
	'items'   => array(
		array(
			'title' => 'Alignment before participation',
			'text'  => 'The conversation begins with objectives, context, capability, and strategic fit.',
		),
		array(
			'title' => 'Structure before scale',
			'text'  => 'Each possibility is reviewed with discipline before growth or execution is discussed.',
		),
		array(
			'title' => 'Transparency and strategic integrity',
			'text'  => 'JV Club language does not guarantee acceptance, capital, legal outcomes, or project approval.',
		),
		array(
			'title' => 'Legacy-oriented development',
			'text'  => 'The opportunity is considered within a broader view of assets, property, and continuity.',
		),
	),
);
?>

<section class="sg-section sg-product-section sg-club-principles sg-jv-club-principles" aria-labelledby="sg-jv-club-principles-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-product-section__header sg-flow" data-sg-stagger>
			<p class="sg-product-section__eyebrow" data-sg-reveal="fade-up"><?php echo esc_html( $copy['eyebrow'] ); ?></p>
			<h2 id="sg-jv-club-principles-title" class="sg-product-section__title" data-sg-reveal="fade-up">
				<?php echo esc_html( $copy['title'] ); ?>
			</h2>
		</div>

		<ul class="sg-club-principles__list" data-sg-stagger>
			<?php foreach ( $copy['items'] as $item ) : ?>
				<li class="sg-club-principles__item sg-flow" data-sg-reveal="fade-up">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
