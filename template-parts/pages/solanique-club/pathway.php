<?php
/**
 * Solanique Club access pathway.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$is_spanish = function_exists( 'sg_is_spanish' ) && sg_is_spanish();
$copy       = $is_spanish ? array(
	'eyebrow' => 'Acceso futuro',
	'title'   => 'El registro será gestionado por el sistema privado aprobado.',
	'text'    => 'Por ahora, Solanique Club dirige el interés hacia Inquiry. No se recopilan datos ni se simula una cuenta en esta vista.',
	'cta'     => 'Registrar interés',
	'label'   => 'Espacio de intake del club',
	'note'    => 'Aquí se incorporará el formulario aprobado para Solanique Club, JV Network and Service Providers o Investor Club.',
) : array(
	'eyebrow' => 'Future access',
	'title'   => 'Registration will be handled through the approved private intake system.',
	'text'    => 'For now, Solanique Club routes interest through Inquiry. No data is collected and no account experience is simulated in this view.',
	'cta'     => 'Register Interest',
	'label'   => 'Club intake space',
	'note'    => 'The approved form for Solanique Club, JV Network and Service Providers, or Investor Club will be placed here.',
);
?>

<section class="sg-section sg-product-cta sg-access-banner sg-solanique-club-pathway" aria-labelledby="sg-solanique-club-pathway-title">
	<div class="sg-container sg-container--md">
		<div class="sg-product-cta__content sg-flow" data-sg-stagger>
			<span class="sg-product-cta__line" aria-hidden="true" data-sg-reveal="line"></span>
			<p class="sg-product-cta__eyebrow" data-sg-reveal="fade-up"><?php echo esc_html( $copy['eyebrow'] ); ?></p>
			<h2 id="sg-solanique-club-pathway-title" class="sg-product-cta__title" data-sg-reveal="fade-up">
				<?php echo esc_html( $copy['title'] ); ?>
			</h2>
			<p class="sg-product-cta__text" data-sg-reveal="fade-up"><?php echo esc_html( $copy['text'] ); ?></p>
			<div class="sg-future-integration sg-future-integration--compact" data-sg-reveal="fade-up" aria-label="<?php echo esc_attr( $copy['label'] ); ?>">
				<span class="sg-future-integration__rule" aria-hidden="true"></span>
				<p class="sg-future-integration__label"><?php echo esc_html( $copy['label'] ); ?></p>
				<p class="sg-future-integration__note"><?php echo esc_html( $copy['note'] ); ?></p>
				<?php // Future GHL registration/inquiry embed goes here. ?>
			</div>
			<div class="sg-cluster sg-product-cta__action" data-sg-reveal="fade-up">
				<a class="sg-button sg-button--lg" href="<?php echo esc_url( solanique_get_inquiry_url() ); ?>"><?php echo esc_html( $copy['cta'] ); ?></a>
			</div>
		</div>
	</div>
</section>
