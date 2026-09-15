<?php
/**
 * Privacy Policy page template.
 *
 * Template Name: Privacy Policy
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

get_header();

$is_spanish = function_exists( 'sg_is_spanish' ) && sg_is_spanish();
$editor_content = function_exists( 'solanique_get_current_page_editor_content' ) ? solanique_get_current_page_editor_content() : '';
$has_editor_content = '' !== $editor_content;
$copy       = $is_spanish ? array(
	'eyebrow'       => 'Políticas legales',
	'title'         => 'Política de Privacidad',
	'updated'       => 'Última actualización: 13 de agosto de 2026',
	'intro'         => 'Esta Política de Privacidad describe cómo Solanique Group maneja información relacionada con el sitio web, las rutas de Inquiry, los enlaces de email y las integraciones aprobadas con CRM, Go High Level o sistemas de socios.',
	'nav_label'     => 'Secciones de Política de Privacidad',
	'contact_label' => 'Contacto de privacidad',
	'contact'       => 'Para preguntas relacionadas con privacidad, utilice el canal de Inquiry publicado por Solanique Group o escriba a inquiry@solaniquegroup.com.',
	'sections'      => array(
		array(
			'title'      => 'Introducción',
			'paragraphs' => array(
				'Solanique Group respeta la privacidad de las personas que visitan el sitio web y exploran sus rutas privadas de servicio. Esta Política de Privacidad explica cómo la información puede ser recibida, utilizada, protegida y compartida en relación con la experiencia pública del sitio.',
				'Esta política se aplica al sitio web de Solanique Group y a las rutas de comunicación o intake que se presenten desde el sitio.',
			),
		),
		array(
			'title'      => 'Información que podemos recibir',
			'paragraphs' => array(
				'Podemos recibir información que una persona decide enviar voluntariamente a través de rutas de Inquiry, enlaces de email, integraciones aprobadas de Go High Level, formularios de socios o sistemas privados de intake.',
				'También podemos recibir información técnica limitada asociada con el uso del sitio, como datos del dispositivo, navegador, páginas visitadas, interacciones básicas, cookies, registros técnicos o analítica si dichas herramientas están habilitadas.',
			),
			'items'      => array(
				'información de contacto enviada voluntariamente',
				'contexto de una solicitud o interés de servicio',
				'comunicaciones por email iniciadas por el visitante',
				'datos técnicos, cookies o analítica si las herramientas correspondientes están activas',
			),
		),
		array(
			'title'      => 'Cómo podemos usar la información',
			'paragraphs' => array(
				'La información puede utilizarse para responder solicitudes, orientar una consulta hacia el pilar Solanique correspondiente, coordinar comunicaciones, mejorar la experiencia del sitio, proteger la integridad del sitio y apoyar obligaciones administrativas, operativas o legales cuando correspondan.',
				'Solanique Group no utiliza el tema de WordPress actual para crear cuentas nativas, registrar contraseñas, cobrar pagos o almacenar un portal privado funcional.',
			),
		),
		array(
			'title'      => 'Inquiry, CRM e integraciones de socios',
			'paragraphs' => array(
				'Cuando Solanique Group utilice Go High Level, un CRM aprobado o un sistema de intake de socios, esos servicios pueden recopilar, procesar o almacenar información bajo sus propios términos, políticas y controles.',
				'La información enviada por esos canales puede utilizarse para clasificar solicitudes, identificar intereses de servicio, coordinar seguimiento y administrar comunicaciones relacionadas con Capital, Estate, Concierge, Solanique Club u otras rutas aprobadas.',
			),
		),
		array(
			'title'      => 'Cookies y analítica',
			'paragraphs' => array(
				'El sitio puede usar cookies, registros técnicos o herramientas de analítica habilitadas por WordPress, hosting, plugins aprobados, sistemas de CRM o integraciones futuras.',
				'Los visitantes pueden administrar cookies desde la configuración de su navegador. Algunas funciones del sitio pueden no comportarse de la misma manera si determinadas tecnologías se deshabilitan.',
			),
		),
		array(
			'title'      => 'Divulgación de información',
			'paragraphs' => array(
				'La información puede compartirse con proveedores de servicio, plataformas tecnológicas, sistemas CRM, socios profesionales, asesores o proveedores de infraestructura únicamente según sea necesario para operar el sitio, responder solicitudes, administrar comunicaciones, mantener seguridad o cumplir obligaciones aplicables.',
				'Solanique Group no publica ni vende información personal desde el tema de WordPress.',
			),
		),
		array(
			'title'      => 'Retención de datos',
			'paragraphs' => array(
				'La información debe conservarse solo durante el tiempo razonablemente necesario para los fines descritos, para necesidades administrativas u operativas, para seguimiento de solicitudes, o según lo requieran obligaciones aplicables.',
				'Cuando la información se procese mediante CRM, Go High Level o sistemas de socios, la retención también puede depender de la configuración y políticas de esas plataformas aprobadas.',
			),
		),
		array(
			'title'      => 'Derechos y opciones',
			'paragraphs' => array(
				'Dependiendo de la jurisdicción aplicable, una persona puede tener derechos relacionados con acceso, corrección, eliminación, restricción u objeción al procesamiento de cierta información.',
				'Las solicitudes relacionadas con privacidad pueden dirigirse al canal de Inquiry publicado por Solanique Group o al email indicado en esta página.',
			),
		),
		array(
			'title'      => 'Seguridad',
			'paragraphs' => array(
				'Solanique Group aplica medidas razonables para proteger la información asociada con el sitio y sus rutas de comunicación. Ningún sistema digital puede garantizar seguridad absoluta.',
				'Las integraciones de CRM, formularios o sistemas externos deben evaluarse considerando exportabilidad de datos, costos, controles de acceso, seguridad y propiedad de la información.',
			),
		),
		array(
			'title'      => 'Actualizaciones de esta política',
			'paragraphs' => array(
				'Esta Política de Privacidad puede actualizarse cuando cambien el sitio, las integraciones, los servicios, los proveedores o los requisitos aplicables.',
				'La fecha de última actualización indica cuándo fue revisada esta versión de la política para el sitio de Solanique Group.',
			),
		),
	),
) : array(
	'eyebrow'       => 'Legal policies',
	'title'         => 'Privacy Policy',
	'updated'       => 'Last Updated: August 13, 2026',
	'intro'         => 'This Privacy Policy describes how Solanique Group handles information connected to the website, Inquiry pathways, email links, and approved CRM, Go High Level, or partner-system integrations.',
	'nav_label'     => 'Privacy Policy sections',
	'contact_label' => 'Privacy contact',
	'contact'       => 'For privacy-related questions, use the published Solanique Group Inquiry channel or email inquiry@solaniquegroup.com.',
	'sections'      => array(
		array(
			'title'      => 'Introduction',
			'paragraphs' => array(
				'Solanique Group respects the privacy of people who visit the website and explore its private service pathways. This Privacy Policy explains how information may be received, used, protected, and shared in connection with the public website experience.',
				'This policy applies to the Solanique Group website and to communication or intake pathways presented from the website.',
			),
		),
		array(
			'title'      => 'Information We May Receive',
			'paragraphs' => array(
				'We may receive information a person chooses to submit voluntarily through Inquiry pathways, email links, approved Go High Level integrations, partner forms, or private intake systems.',
				'We may also receive limited technical information associated with website use, such as device data, browser data, visited pages, basic interactions, cookies, technical logs, or analytics if those tools are enabled.',
			),
			'items'      => array(
				'contact information submitted voluntarily',
				'context for a request or service interest',
				'email communications initiated by the visitor',
				'technical data, cookies, or analytics if the relevant tools are active',
			),
		),
		array(
			'title'      => 'How We May Use Information',
			'paragraphs' => array(
				'Information may be used to respond to requests, route an inquiry to the appropriate Solanique pillar, coordinate communications, improve the website experience, protect website integrity, and support administrative, operational, or legal obligations where applicable.',
				'Solanique Group does not use the current WordPress theme to create native accounts, register passwords, collect payments, or store a functional private client portal.',
			),
		),
		array(
			'title'      => 'Inquiry, CRM, and Partner Integrations',
			'paragraphs' => array(
				'When Solanique Group uses Go High Level, an approved CRM, or a partner intake system, those services may collect, process, or store information under their own terms, policies, and controls.',
				'Information submitted through those channels may be used to classify requests, identify service interests, coordinate follow-up, and manage communications related to Capital, Estate, Concierge, Solanique Club, or other approved pathways.',
			),
		),
		array(
			'title'      => 'Cookies and Analytics',
			'paragraphs' => array(
				'The website may use cookies, technical logs, or analytics tools enabled by WordPress, hosting, approved plugins, CRM systems, or future integrations.',
				'Visitors can manage cookies through their browser settings. Some website functions may not behave the same way if certain technologies are disabled.',
			),
		),
		array(
			'title'      => 'Sharing of Information',
			'paragraphs' => array(
				'Information may be shared with service providers, technology platforms, CRM systems, professional partners, advisors, or infrastructure providers only as needed to operate the website, respond to requests, manage communications, maintain security, or meet applicable obligations.',
				'Solanique Group does not publish or sell personal information from the WordPress theme.',
			),
		),
		array(
			'title'      => 'Data Retention',
			'paragraphs' => array(
				'Information should be retained only as long as reasonably necessary for the described purposes, for administrative or operational needs, for inquiry follow-up, or as required by applicable obligations.',
				'When information is processed through CRM, Go High Level, or partner systems, retention may also depend on the configuration and policies of those approved platforms.',
			),
		),
		array(
			'title'      => 'Your Rights and Choices',
			'paragraphs' => array(
				'Depending on the applicable jurisdiction, a person may have rights related to access, correction, deletion, restriction, or objection to the processing of certain information.',
				'Privacy-related requests may be directed to the published Solanique Group Inquiry channel or the email listed on this page.',
			),
		),
		array(
			'title'      => 'Security',
			'paragraphs' => array(
				'Solanique Group applies reasonable measures to protect information associated with the website and its communication pathways. No digital system can guarantee absolute security.',
				'CRM, form, or external-system integrations should be evaluated for data exportability, costs, access controls, security, and ownership of information.',
			),
		),
		array(
			'title'      => 'Updates to This Policy',
			'paragraphs' => array(
				'This Privacy Policy may be updated when the website, integrations, services, providers, or applicable requirements change.',
				'The last updated date identifies when this version of the policy was reviewed for the Solanique Group website.',
			),
		),
	),
);

if ( $has_editor_content ) {
	$page_title = get_the_title();

	if ( '' !== $page_title ) {
		$copy['title'] = $page_title;
	}
}
?>

<main class="sg-legal-page">
	<section class="sg-legal-hero sg-parallax" aria-labelledby="sg-privacy-policy-title" data-sg-parallax data-parallax-speed="0.28">
		<div class="sg-legal-hero__media sg-parallax__media" data-sg-parallax-media aria-hidden="true">
			<?php
			echo sg_asset_img(
				'images/backgrounds/privacy-global-globe-background.jpg',
				'',
				array(
					'class'         => 'sg-legal-hero__image sg-parallax__image sg-img sg-img--cover',
					'width'         => 1536,
					'height'        => 1024,
					'loading'       => 'eager',
					'fetchpriority' => 'high',
					'sizes'         => '100vw',
				)
			);
			?>
		</div>
		<div class="sg-legal-hero__shade" aria-hidden="true"></div>

		<div class="sg-container sg-container--lg">
			<div class="sg-legal-hero__content sg-flow" data-sg-stagger>
				<p class="sg-legal-page__eyebrow" data-sg-reveal="fade-up"><?php echo esc_html( $copy['eyebrow'] ); ?></p>
				<h1 id="sg-privacy-policy-title" class="sg-legal-page__title" data-sg-reveal="fade-up"><?php echo esc_html( $copy['title'] ); ?></h1>
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
							<?php foreach ( $copy['sections'] as $index => $section ) : ?>
								<li>
									<a href="#sg-privacy-section-<?php echo esc_attr( (string) ( $index + 1 ) ); ?>">
										<?php echo esc_html( $section['title'] ); ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ol>
					</nav>

					<div class="sg-legal-page__sections">
						<?php foreach ( $copy['sections'] as $index => $section ) : ?>
							<section id="sg-privacy-section-<?php echo esc_attr( (string) ( $index + 1 ) ); ?>" class="sg-legal-section" aria-labelledby="sg-privacy-section-<?php echo esc_attr( (string) ( $index + 1 ) ); ?>-title">
								<p class="sg-legal-section__number"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></p>
								<h2 id="sg-privacy-section-<?php echo esc_attr( (string) ( $index + 1 ) ); ?>-title" class="sg-legal-section__title"><?php echo esc_html( $section['title'] ); ?></h2>
								<div class="sg-legal-section__content">
									<?php foreach ( (array) ( $section['paragraphs'] ?? array() ) as $paragraph ) : ?>
										<p><?php echo esc_html( $paragraph ); ?></p>
									<?php endforeach; ?>

									<?php if ( ! empty( $section['items'] ) ) : ?>
										<ul class="sg-legal-section__list">
											<?php foreach ( (array) $section['items'] as $item ) : ?>
												<li><?php echo esc_html( $item ); ?></li>
											<?php endforeach; ?>
										</ul>
									<?php endif; ?>
								</div>
							</section>
						<?php endforeach; ?>

						<aside class="sg-legal-page__notice" aria-label="<?php echo esc_attr( $copy['contact_label'] ); ?>">
							<p><?php echo esc_html( $copy['contact'] ); ?></p>
						</aside>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php
get_footer();
