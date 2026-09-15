<?php
/**
 * Investor Club operating principles.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$is_spanish = function_exists( 'sg_is_spanish' ) && sg_is_spanish();
$copy       = $is_spanish ? array(
	'eyebrow' => 'Principios de acceso',
	'title'   => 'La conversación empieza con responsabilidad.',
	'items'   => array(
		array(
			'title' => 'Acceso por invitación',
			'text'  => 'La entrada se trata como una conversación privada, no como una oferta pública.',
		),
		array(
			'title' => 'Alineación estratégica',
			'text'  => 'Cada oportunidad se considera dentro de contexto, timing y visión patrimonial.',
		),
		array(
			'title' => 'Gobernanza bilingüe',
			'text'  => 'Inglés y español sostienen claridad para clientes que se mueven entre mercados.',
		),
		array(
			'title' => 'Custodia responsable del capital',
			'text'  => 'El lenguaje de la página no promete acceso, rendimientos, financiamiento ni resultados.',
		),
	),
) : array(
	'eyebrow' => 'Access principles',
	'title'   => 'The conversation begins with responsibility.',
	'items'   => array(
		array(
			'title' => 'Invitation-led access',
			'text'  => 'Entry is treated as a private conversation, not a public offering.',
		),
		array(
			'title' => 'Strategic alignment',
			'text'  => 'Each opportunity is considered through context, timing, and patrimonial vision.',
		),
		array(
			'title' => 'Bilingual governance',
			'text'  => 'English and Spanish support clarity for clients moving across markets.',
		),
		array(
			'title' => 'Responsible capital stewardship',
			'text'  => 'The page does not promise access, returns, financing, or outcomes.',
		),
	),
);
?>

<section class="sg-section sg-product-section sg-club-principles sg-investor-club-principles" aria-labelledby="sg-investor-club-principles-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-product-section__header sg-flow" data-sg-stagger>
			<p class="sg-product-section__eyebrow" data-sg-reveal="fade-up"><?php echo esc_html( $copy['eyebrow'] ); ?></p>
			<h2 id="sg-investor-club-principles-title" class="sg-product-section__title" data-sg-reveal="fade-up">
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
