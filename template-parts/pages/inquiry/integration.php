<?php
/**
 * Inquiry future intake integration section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$is_spanish = function_exists( 'sg_is_spanish' ) && sg_is_spanish();
$copy       = $is_spanish ? array(
	'eyebrow' => 'Intake privado',
	'title'   => 'El registro será gestionado por el sistema privado aprobado.',
	'text'    => 'Esta sección queda preparada para la futura integración de GHL o del proveedor aprobado. No se recopilan datos desde el tema.',
	'label'   => 'Espacio de integración aprobado',
	'note'    => 'Aquí se incorporará el formulario aprobado de GHL o del socio seleccionado.',
) : array(
	'eyebrow' => 'Private intake',
	'title'   => 'Registration will be handled through the approved private intake system.',
	'text'    => 'This section is prepared for the future GHL or approved partner integration. The theme does not collect data.',
	'label'   => 'Approved integration space',
	'note'    => 'The approved GHL or selected partner form will be placed here.',
);
?>

<section class="sg-section sg-product-section sg-inquiry-integration" aria-labelledby="sg-inquiry-integration-title">
	<div class="sg-container sg-container--md">
		<div class="sg-inquiry-integration__panel sg-flow" data-sg-stagger>
			<p class="sg-product-section__eyebrow" data-sg-reveal="fade-up"><?php echo esc_html( $copy['eyebrow'] ); ?></p>
			<h2 id="sg-inquiry-integration-title" class="sg-product-section__title" data-sg-reveal="fade-up">
				<?php echo esc_html( $copy['title'] ); ?>
			</h2>
			<p class="sg-product-section__intro" data-sg-reveal="fade-up"><?php echo esc_html( $copy['text'] ); ?></p>
			<div class="sg-future-integration" data-sg-reveal="fade-up" aria-label="<?php echo esc_attr( $copy['label'] ); ?>">
				<span class="sg-future-integration__rule" aria-hidden="true"></span>
				<p class="sg-future-integration__label"><?php echo esc_html( $copy['label'] ); ?></p>
				<p class="sg-future-integration__note"><?php echo esc_html( $copy['note'] ); ?></p>
				<?php // Future GHL registration/inquiry embed goes here. ?>
			</div>
		</div>
	</div>
</section>
