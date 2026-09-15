<?php
/**
 * Terms & Conditions page template.
 *
 * Template Name: Terms & Conditions
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

get_header();

$is_spanish = function_exists( 'sg_is_spanish' ) && sg_is_spanish();
$editor_content = function_exists( 'solanique_get_current_page_editor_content' ) ? solanique_get_current_page_editor_content() : '';
$has_editor_content = '' !== $editor_content;
$copy       = $is_spanish ? array(
	'eyebrow'      => 'Políticas legales',
	'title'        => 'Términos y Condiciones',
	'updated'      => 'Última actualización: pendiente de aprobación legal del cliente',
	'intro'        => 'La versión final de los Términos y Condiciones no ha sido suministrada. Esta página queda reservada para el contenido legal aprobado.',
	'nav_label'    => 'Secciones de Términos y Condiciones',
	'pending'      => 'Contenido legal final pendiente.',
	'pending_note' => 'No publicar lenguaje legal, de inversión, hipotecas, corretaje, socios, limitación de servicios o responsabilidad que no haya sido aprobado. Agregar aquí la redacción legal aprobada antes de producción.',
	'sections'     => array(
		'Introducción',
		'Uso del sitio web',
		'Información de servicios',
		'No asesoría profesional',
		'Propiedad intelectual',
		'Enlaces de terceros',
		'Limitación de responsabilidad',
		'Ley aplicable',
		'Cambios a los términos',
		'Contacto',
	),
) : array(
	'eyebrow'      => 'Legal policies',
	'title'        => 'Terms & Conditions',
	'updated'      => 'Last Updated: pending client legal approval',
	'intro'        => 'Final Terms & Conditions copy has not been supplied. This page is reserved for approved legal terms content.',
	'nav_label'    => 'Terms & Conditions sections',
	'pending'      => 'Final legal copy pending.',
	'pending_note' => 'Do not publish invented legal, investment, mortgage, brokerage, partner, service limitation, or liability language. Add the approved legal copy here before production.',
	'sections'     => array(
		'Introduction',
		'Use of Website',
		'Services Information',
		'No Professional Advice',
		'Intellectual Property',
		'Third-Party Links',
		'Limitation of Liability',
		'Governing Law',
		'Changes to Terms',
		'Contact',
	),
);

if ( $has_editor_content ) {
	$page_title = get_the_title();

	if ( '' !== $page_title ) {
		$copy['title'] = $page_title;
	}

	$copy['updated'] = $is_spanish
		? sprintf( 'Última actualización: %s', get_the_modified_date( 'j F Y' ) )
		: sprintf( 'Last Updated: %s', get_the_modified_date( 'F j, Y' ) );
	$copy['intro']   = $is_spanish
		? 'Revise los Términos y Condiciones publicados para el sitio web de Solanique Group.'
		: 'Review the published Terms & Conditions for the Solanique Group website.';
}
?>

<main class="sg-legal-page">
	<section class="sg-legal-hero" aria-labelledby="sg-terms-conditions-title">
		<div class="sg-container sg-container--lg">
			<div class="sg-legal-hero__content sg-flow" data-sg-stagger>
				<p class="sg-legal-page__eyebrow" data-sg-reveal="fade-up"><?php echo esc_html( $copy['eyebrow'] ); ?></p>
				<h1 id="sg-terms-conditions-title" class="sg-legal-page__title" data-sg-reveal="fade-up"><?php echo esc_html( $copy['title'] ); ?></h1>
				<p class="sg-legal-page__updated" data-sg-reveal="fade-up"><?php echo esc_html( $copy['updated'] ); ?></p>
				<p class="sg-legal-page__intro" data-sg-reveal="fade-up"><?php echo esc_html( $copy['intro'] ); ?></p>
			</div>
		</div>
	</section>

	<section class="sg-section sg-legal-page__body" aria-label="<?php echo esc_attr( $copy['nav_label'] ); ?>">
		<div class="sg-container sg-container--lg">
			<?php if ( $has_editor_content ) : ?>
				<div class="sg-legal-page__editor-shell">
					<article class="sg-legal-section sg-legal-page__editor-content">
						<?php echo wp_kses_post( $editor_content ); ?>
					</article>
				</div>
			<?php else : ?>
				<div class="sg-legal-page__layout">
					<nav class="sg-legal-page__nav" aria-label="<?php echo esc_attr( $copy['nav_label'] ); ?>">
						<ol class="sg-legal-page__nav-list">
							<?php foreach ( $copy['sections'] as $index => $section_title ) : ?>
								<li>
									<a href="#sg-terms-section-<?php echo esc_attr( (string) ( $index + 1 ) ); ?>">
										<?php echo esc_html( $section_title ); ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ol>
					</nav>

					<div class="sg-legal-page__sections">
						<?php foreach ( $copy['sections'] as $index => $section_title ) : ?>
							<section id="sg-terms-section-<?php echo esc_attr( (string) ( $index + 1 ) ); ?>" class="sg-legal-section" aria-labelledby="sg-terms-section-<?php echo esc_attr( (string) ( $index + 1 ) ); ?>-title">
								<p class="sg-legal-section__number"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></p>
								<h2 id="sg-terms-section-<?php echo esc_attr( (string) ( $index + 1 ) ); ?>-title" class="sg-legal-section__title"><?php echo esc_html( $section_title ); ?></h2>
								<p class="sg-legal-section__pending"><?php echo esc_html( $copy['pending'] ); ?></p>
							</section>
						<?php endforeach; ?>

						<aside class="sg-legal-page__notice" aria-label="<?php echo esc_attr( $copy['pending'] ); ?>">
							<p><?php echo esc_html( $copy['pending_note'] ); ?></p>
						</aside>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php
get_footer();
