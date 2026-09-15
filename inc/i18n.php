<?php
/**
 * Lightweight bilingual content helpers.
 *
 * The theme uses WordPress translation functions for template strings, then
 * maps Solanique preview copy to Spanish when ?lang=es is present.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

/**
 * Returns the supported preview languages.
 *
 * @return string[]
 */
function sg_supported_langs(): array {
	return array( 'en', 'es' );
}

/**
 * Returns the active preview language.
 *
 * @return string
 */
function sg_current_lang(): string {
	$lang = isset( $_GET['lang'] ) ? sanitize_key( wp_unslash( $_GET['lang'] ) ) : 'en';

	return in_array( $lang, sg_supported_langs(), true ) ? $lang : 'en';
}

/**
 * Checks whether the current preview language is Spanish.
 *
 * @return bool
 */
function sg_is_spanish(): bool {
	return 'es' === sg_current_lang();
}

/**
 * Returns the current URL for a specific preview language.
 *
 * @param string $lang Language code.
 * @return string
 */
function sg_lang_url( string $lang ): string {
	$lang = sanitize_key( $lang );
	$lang = in_array( $lang, sg_supported_langs(), true ) ? $lang : 'en';
	$url  = function_exists( 'solanique_get_current_url' ) ? solanique_get_current_url() : home_url( '/' );
	$url  = remove_query_arg( 'lang', $url );

	return add_query_arg( 'lang', rawurlencode( $lang ), $url );
}

/**
 * Adds or removes the active language query parameter for internal URLs.
 *
 * @param string $url URL to adjust.
 * @return string
 */
function sg_localize_url( string $url ): string {
	if ( '' === $url ) {
		return '';
	}

	$home_host = wp_parse_url( home_url( '/' ), PHP_URL_HOST );
	$url_host  = wp_parse_url( $url, PHP_URL_HOST );

	if ( is_string( $url_host ) && is_string( $home_host ) && strtolower( $url_host ) !== strtolower( $home_host ) ) {
		return $url;
	}

	$url = remove_query_arg( 'lang', $url );

	if ( sg_is_spanish() ) {
		$url = add_query_arg( 'lang', 'es', $url );
	}

	return $url;
}

/**
 * Returns Spanish preview copy keyed by the English source string.
 *
 * @return array<string,string>
 */
function sg_spanish_content_map(): array {
	return array(
		'The Mandate' => 'The Mandate',
		'Inquiry' => 'Inquiry',
		'Client Access' => 'Acceso de Cliente',
		'Investor Club' => 'Investor Club',
		'JV Club' => 'JV Club',
		'Solanique Club' => 'Solanique Club',
		'Start Inquiry' => 'Iniciar consulta',
		'Capital Inquiry' => 'Consulta de Capital',
		'Estate' => 'Estate',
		'Estate Inquiry' => 'Consulta de Estate',
		'Concierge Inquiry' => 'Consulta de Concierge',
		'Solanique Pillars' => 'Pilares Solanique',
		'Type of Services' => 'Tipo de servicios',
		'The Solanique DNA' => 'El ADN Solanique',
		'Strategic Excellence' => 'Excelencia estratégica',
		'Legacy-Driven Vision' => 'Visión guiada por legado',
		'Global Mindset / Bilingual Mastery' => 'Mentalidad global / dominio bilingüe',
		'Sovereign Integrity' => 'Integridad soberana',
		'Architectural Leadership' => 'Liderazgo arquitectónico',
		'The Soul of the Fusion' => 'El alma de la fusión',
		'Integrated' => 'Integrado',
		'Visionary' => 'Visionario',
		'Private gateway' => 'Puerta privada',
		'Existing Client Access' => 'Acceso para clientes existentes',
		'An integrated ecosystem built to protect vision, align capital, command property stewardship, and restore time for the global visionary.' => 'Un ecosistema integrado creado para proteger la visión, alinear capital, dirigir la custodia de activos y restaurar tiempo para el visionario global.',
		'Mission' => 'Misión',
		'Vision' => 'Visión',
		'To deliver an integrated ecosystem of capital strategy, development intelligence, and lifestyle mastery that empowers the global visionary to ascend with precision, integrity, and bilingual insight.' => 'Entregar un ecosistema integrado de estrategia de capital, inteligencia de desarrollo y dominio de estilo de vida que impulse al visionario global a ascender con precisión, integridad y dominio bilingüe.',
		'To set a trusted private standard where property, opportunity, and personal command are guided with excellence, local roots, and a borderless view of legacy.' => 'Establecer un estándar privado de confianza donde propiedad, oportunidad y comando personal sean guiados con excelencia, raíces locales y una visión de legado sin fronteras.',
		'The Firm' => 'La Firma',
		'A private office standard for integrated command.' => 'Un estándar de oficina privada para comando integrado.',
		'Solanique Group moves beyond fragmented services by joining Capital, Estates, and Concierge into one disciplined journey.' => 'Solanique Group supera los servicios fragmentados al unir Capital, Estates y Concierge en una sola trayectoria disciplinada.',
		'The values that govern the work.' => 'Los valores que gobiernan el trabajo.',
		'Intelligence-led decisions across Capital, Estates, and Concierge, supported by structure and disciplined execution.' => 'Decisiones guiadas por inteligencia en Capital, Estates y Concierge, sostenidas por estructura y ejecución disciplinada.',
		'Guidance shaped by what can endure beyond the immediate transaction.' => 'Guía formada por aquello que puede perdurar más allá de la transacción inmediata.',
		'English and Spanish command for clients moving across cultures, markets, and private priorities.' => 'Dominio en inglés y español para clientes que se mueven entre culturas, mercados y prioridades privadas.',
		'Honesty, restraint, and discretion treated as essential marks of refinement.' => 'Honestidad, reserva y discreción tratadas como señales esenciales de refinamiento.',
		'A standard that helps visionaries become chief strategists of their own legacy.' => 'Un estándar que ayuda a los visionarios a convertirse en estrategas principales de su propio legado.',
		'History & Origin' => 'Historia y origen',
		'Solanique was formed from the meeting point of physical assets, strategic intelligence, and the private realities of time. The mandate is to unify those fragments into one calm system of command.' => 'Solanique nace del punto de encuentro entre activos físicos, inteligencia estratégica y las realidades privadas del tiempo. El mandato es unificar esos fragmentos en un sistema sereno de comando.',
		'Words that represent the business' => 'Palabras que representan el negocio',
		'A language of command, vision, and protection.' => 'Un lenguaje de comando, visión y protección.',
		'Move through the correct private pathway.' => 'Avance por la ruta privada correcta.',
		'Explore Capital, Estates, and Concierge as one integrated ecosystem.' => 'Explore Capital, Estates y Concierge como un ecosistema integrado.',
		'Begin through a private gateway designed for context, discretion, and the correct path forward.' => 'Comience por una puerta privada diseñada para contexto, discreción y el camino correcto.',
		'A discreet starting point for clients who require Capital, Estate, Concierge, Investor Club, or JV Club guidance through the right private channel.' => 'Un punto de inicio discreto para clientes que requieren guía de Capital, Estate, Concierge, Investor Club o JV Club a través del canal privado correcto.',
		'A discreet starting point for clients who require Capital, Estate, Concierge, or Solanique Club guidance through the right private channel.' => 'Un punto de inicio discreto para clientes que requieren guía de Capital, Estate, Concierge o Solanique Club a través del canal privado correcto.',
		'Private Gateway' => 'Puerta privada',
		'Choose the pathway that matches the nature of the inquiry.' => 'Elija la ruta que corresponda a la naturaleza de la consulta.',
		'Capital planning, acquisition strategy, Investor Club conversations, and business advisory.' => 'Planeación de capital, estrategia de adquisición, conversaciones de Investor Club y asesoría de negocios.',
		'Development, renovation, property management, stewardship, and asset care.' => 'Desarrollo, renovación, gestión de propiedad, custodia y cuidado de activos.',
		'Lifestyle logistics, family support, senior transitions, household operations, and time restoration.' => 'Logística de estilo de vida, apoyo familiar, transiciones senior, operaciones del hogar y restauración del tiempo.',
		'A private pathway for vetted investment and off-market real estate conversations.' => 'Una ruta privada para conversaciones validadas de inversión y oportunidades inmobiliarias fuera de mercado.',
		'A channel for strategic joint venture conversations connected to development or acquisition.' => 'Un canal para conversaciones estratégicas de joint venture vinculadas a desarrollo o adquisición.',
		'A private pathway for JV Network, Service Providers, and Investor Club conversations.' => 'Una ruta privada para conversaciones de JV Network, Service Providers e Investor Club.',
		'Learn more' => 'Conocer más',
		'View Pathways' => 'Ver rutas',
		'Private ecosystem' => 'Ecosistema privado',
		'A private front-end gateway for JV Network and Service Providers and Investor Club conversations while approved registration and intake infrastructure is prepared.' => 'Un frente privado para conversaciones de JV Network and Service Providers e Investor Club mientras se prepara la infraestructura aprobada de registro e intake.',
		'Register Interest' => 'Registrar interés',
		'View Areas' => 'Ver áreas',
		'Club architecture' => 'Arquitectura del club',
		'Two private areas. One standard of alignment.' => 'Dos áreas privadas. Un estándar de alineación.',
		'Solanique Club organizes network, service provider, and private capital conversations without promising access, outcomes, returns, or unapproved structures.' => 'Solanique Club organiza conversaciones de red, proveedores de servicio y capital privado sin prometer acceso, resultados, rendimientos ni estructuras no aprobadas.',
		'Private areas' => 'Áreas privadas',
		'JV Network and Service Providers alongside Investor Club.' => 'JV Network and Service Providers junto a Investor Club.',
		'JV Network and Service Providers' => 'JV Network and Service Providers',
		'An area for alignment, capability, service, and responsible collaboration conversations within the Solanique ecosystem.' => 'Un área para conversaciones de alineación, capacidad, servicio y colaboración responsable dentro del ecosistema Solanique.',
		'An area for private capital conversations, off-market real estate context, and disciplined opportunity review.' => 'Un área para conversaciones privadas de capital, oportunidades inmobiliarias fuera de mercado y revisión disciplinada.',
		'Future access' => 'Acceso futuro',
		'Registration will be handled through the approved private intake system.' => 'El registro será gestionado por el sistema privado aprobado.',
		'For now, Solanique Club routes interest through Inquiry. No data is collected and no account experience is simulated in this view.' => 'Por ahora, Solanique Club dirige el interés hacia Inquiry. No se recopilan datos ni se simula una cuenta en esta vista.',
		'Enter through the right private pathway.' => 'Ingrese por la ruta privada correcta.',
		'Inquiry routes each request into the correct Solanique pathway with discretion and context.' => 'Inquiry dirige cada solicitud hacia la ruta Solanique correcta con discreción y contexto.',
		'Private access point' => 'Punto de acceso privado',
		'A private access point for Solanique pathways, Investor Club, JV Club, and future partner-integrated service experiences.' => 'Un punto de acceso privado para rutas Solanique, Investor Club, JV Club y futuras experiencias de servicio integradas por socios.',
		'Access pathways' => 'Rutas de acceso',
		'A private access point for service pathways.' => 'Un punto de acceso privado para rutas de servicio.',
		'Client Access presents the available Solanique routes with clarity, discretion, and a structure ready for partner-integrated services when provided.' => 'Client Access presenta las rutas Solanique disponibles con claridad, discreción y una estructura preparada para servicios integrados por socios cuando sean provistos.',
		'Move through Inquiry, Investor Club, or JV Club according to the nature of the request.' => 'Avance por Inquiry, Investor Club o JV Club según la naturaleza de la solicitud.',
		'Private pathways' => 'Rutas privadas',
		'Prepared for protected client journeys.' => 'Preparado para trayectorias protegidas de cliente.',
		'A premium front-end entry point for understanding Solanique access pathways while partner-integrated services are prepared.' => 'Un punto de entrada frontal premium para comprender las rutas de acceso Solanique mientras se preparan servicios integrados por socios.',
		'A responsible pathway for private investment conversations connected to real estate and development.' => 'Una ruta responsable para conversaciones privadas de inversión vinculadas a bienes raíces y desarrollo.',
		'A route for joint venture alignment, strategic fit, and disciplined opportunity review.' => 'Una ruta para alineación de joint venture, ajuste estratégico y revisión disciplinada de oportunidades.',
		'Open pathway' => 'Abrir ruta',
		'Private investment pathway' => 'Ruta privada de inversión',
		'A discreet channel for disciplined conversations around private real estate opportunities, off-market context, and strategic capital alignment.' => 'Un canal discreto para conversaciones disciplinadas sobre oportunidades inmobiliarias privadas, contexto fuera de mercado y alineación estratégica de capital.',
		'Investor Club Access' => 'Acceso Investor Club',
		'How it works' => 'Cómo funciona',
		'Responsible access' => 'Acceso responsable',
		'A private club concept for disciplined opportunity conversations.' => 'Un concepto de club privado para conversaciones disciplinadas sobre oportunidades.',
		'Investor Club content is presented as an invitation-oriented pathway. It does not guarantee access, returns, financing, or outcomes.' => 'El contenido de Investor Club se presenta como una ruta orientada por invitación. No garantiza acceso, rendimientos, financiamiento ni resultados.',
		'Private opportunity review' => 'Revisión privada de oportunidades',
		'A structured lens for understanding off-market or private real estate conversations before direction is proposed.' => 'Una mirada estructurada para comprender conversaciones inmobiliarias privadas o fuera de mercado antes de proponer una dirección.',
		'Strategic capital fit' => 'Ajuste estratégico de capital',
		'Discussion around alignment, timing, market context, and how a potential opportunity supports broader objectives.' => 'Conversación sobre alineación, momento, contexto de mercado y cómo una posible oportunidad sostiene objetivos más amplios.',
		'Bilingual cross-border perspective' => 'Perspectiva bilingüe transfronteriza',
		'English and Spanish insight for investors navigating Canada, the United States, Latin America, and selected global relationships.' => 'Perspectiva en inglés y español para inversionistas que navegan Canadá, Estados Unidos, Latinoamérica y relaciones globales seleccionadas.',
		'Begin through Inquiry.' => 'Comience por Inquiry.',
		'Investor Club conversations require context, fit, and private review before any next step is defined.' => 'Las conversaciones de Investor Club requieren contexto, ajuste y revisión privada antes de definir cualquier siguiente paso.',
		'Joint venture pathway' => 'Ruta de joint venture',
		'A private channel for strategic partners exploring development, acquisition, and cross-border alignment through disciplined review.' => 'Un canal privado para socios estratégicos que exploran desarrollo, adquisición y alineación transfronteriza mediante revisión disciplinada.',
		'JV Club Access' => 'Acceso JV Club',
		'Explore the pathway' => 'Explorar la ruta',
		'Private collaboration' => 'Colaboración privada',
		'A disciplined channel for joint venture alignment.' => 'Un canal disciplinado para alineación de joint venture.',
		'JV Club content is exploratory and private. It does not guarantee acceptance, access, capital, legal outcomes, or project approval.' => 'El contenido de JV Club es exploratorio y privado. No garantiza aceptación, acceso, capital, resultados legales ni aprobación de proyectos.',
		'Strategic partner fit' => 'Ajuste de socio estratégico',
		'A private review of objectives, capability, market context, and the nature of a potential partnership.' => 'Una revisión privada de objetivos, capacidad, contexto de mercado y naturaleza de una posible asociación.',
		'Development and acquisition context' => 'Contexto de desarrollo y adquisición',
		'A disciplined conversation around real estate, capital, timing, stewardship, and operational readiness.' => 'Una conversación disciplinada sobre bienes raíces, capital, timing, custodia y preparación operativa.',
		'Cross-border coordination' => 'Coordinación transfronteriza',
		'Bilingual perspective for partners navigating opportunities across jurisdictions, cultures, and markets.' => 'Perspectiva bilingüe para socios que navegan oportunidades entre jurisdicciones, culturas y mercados.',
		'Social media links pending' => 'Enlaces sociales pendientes',
		'Pending client content' => 'Contenido del cliente pendiente',
		'Approved wording required before production.' => 'Se requiere redacción aprobada antes de producción.',
		'This section is reserved for client-supplied information and is intentionally not populated with invented copy.' => 'Esta sección está reservada para información suministrada por el cliente y no se completa con texto inventado.',
		'Legal policies' => 'Políticas legales',
		'Privacy Policy' => 'Política de Privacidad',
		'Terms & Conditions' => 'Términos y Condiciones',
		'Privacy Policy | Solanique Group' => 'Política de Privacidad | Solanique Group',
		'Terms & Conditions | Solanique Group' => 'Términos y Condiciones | Solanique Group',
		'Privacy Policy for the Solanique Group website, Inquiry pathways, email links, and approved CRM or partner-system integrations.' => 'Política de Privacidad para el sitio web de Solanique Group, rutas de Inquiry, enlaces de email e integraciones aprobadas con CRM o sistemas de socios.',
		'Final Terms & Conditions copy has not been supplied. This page is reserved for approved legal terms content.' => 'La versión final de los Términos y Condiciones no ha sido suministrada. Esta página queda reservada para el contenido legal aprobado.',
		'Privacy Policy wording pending client approval.' => 'Redacción de Política de Privacidad pendiente de aprobación del cliente.',
		'Terms & Conditions wording pending client approval.' => 'Redacción de Términos y Condiciones pendiente de aprobación del cliente.',
		'Do not publish invented privacy, data collection, tracking, GHL, or partner-intake language. Add the approved legal copy here before production.' => 'No publicar lenguaje inventado de privacidad, recopilación de datos, seguimiento, GHL o intake de socios. Agregar aquí la redacción legal aprobada antes de producción.',
		'Do not publish invented legal, investment, mortgage, brokerage, partner, service limitation, or liability language. Add the approved legal copy here before production.' => 'No publicar lenguaje legal, de inversión, hipotecas, corretaje, socios, limitación de servicios o responsabilidad que no haya sido aprobado. Agregar aquí la redacción legal aprobada antes de producción.',
		'Privacy Policy copy' => 'Texto de Política de Privacidad',
		'Data collection and processing wording' => 'Redacción sobre recopilación y procesamiento de datos',
		'Cookie or analytics disclosure if applicable' => 'Divulgación de cookies o analítica si aplica',
		'GHL or partner intake disclosure if applicable' => 'Divulgación de GHL o intake de socios si aplica',
		'Terms & Conditions copy' => 'Texto de Términos y Condiciones',
		'Service limitation wording' => 'Redacción de limitación de servicios',
		'Broker, license, and mortgage disclaimers if applicable' => 'Disclaimers de broker, licencia e hipotecas si aplica',
		'Investment, partner, or opportunity disclaimers if applicable' => 'Disclaimers de inversión, socios u oportunidades si aplica',
		'This section is prepared for a future GHL or approved partner integration. The theme does not collect data, create accounts, or simulate registration.' => 'Esta sección está preparada para una futura integración de GHL o de un socio aprobado. El tema no recopila datos, no crea cuentas ni simula registros.',
		'Agent levels pending approved client content.' => 'Niveles de agente pendientes de contenido aprobado por el cliente.',
		'This structure is reserved for the approved agent-level names, descriptions, requirements, and distinctions.' => 'Esta estructura está reservada para nombres, descripciones, requisitos y distinciones aprobadas de niveles de agente.',
		'Agent level names' => 'Nombres de niveles de agente',
		'Approved descriptions' => 'Descripciones aprobadas',
		'Requirements or distinctions' => 'Requisitos o distinciones',
		'Associated broker or license disclosures if required' => 'Divulgaciones asociadas de broker o licencia si se requieren',
		'Partner logos and descriptions pending authorization.' => 'Logos y descripciones de socios pendientes de autorización.',
		'Only client-approved logos and approved service descriptions should be published. The business-loan partner logo is intentionally withheld until authorization is confirmed.' => 'Solo deben publicarse logos aprobados por el cliente y descripciones de servicios aprobadas. El logo del socio de préstamos para negocios se retiene intencionalmente hasta confirmar autorización.',
		'Approved partner logo files' => 'Archivos de logos de socios aprobados',
		'Approved company names' => 'Nombres de compañías aprobados',
		'Approved service descriptions' => 'Descripciones de servicios aprobadas',
		'Business-loan partner logo authorization' => 'Autorización del logo del socio de préstamos para negocios',
		'Capital affiliations' => 'Afiliaciones de Capital',
		'Capital Partner Network' => 'Red de socios de Capital',
		'Brokerage and mortgage network' => 'Red de corretaje e hipotecas',
		'Professional Affiliations' => 'Afiliaciones profesionales',
		'Visit website' => 'Visitar sitio web',
		'Visit %s website' => 'Visitar el sitio web de %s',
		'Real estate' => 'Bienes raíces',
		'Mortgage' => 'Hipoteca',
		'Founder signature' => 'Firma de fundadora',
		'Professional affiliations' => 'Afiliaciones profesionales',
		'Capital disclosures' => 'Divulgaciones de Capital',
		'Estate disclosures' => 'Divulgaciones de Estate',
		'Broker, license, mortgage, and disclaimer wording pending client approval.' => 'Redacción de broker, licencia, hipotecas y disclaimers pendiente de aprobación del cliente.',
		'Broker, license, real estate, and disclaimer wording pending client approval.' => 'Redacción de broker, licencia, bienes raíces y disclaimers pendiente de aprobación del cliente.',
		'This area is reserved for required broker, license, mortgage, legal, investment, and partner disclosures. No regulated or partner language has been invented.' => 'Esta área queda reservada para divulgaciones requeridas de broker, licencia, hipotecas, legal, inversión y socios. No se ha inventado lenguaje regulatorio ni de socios.',
		'This area is reserved for required broker, license, real estate, property management, and service disclaimers. No regulatory information has been invented.' => 'Esta área queda reservada para divulgaciones requeridas de broker, licencia, bienes raíces, administración de propiedades y servicios. No se ha inventado información regulatoria.',
		'This structure is reserved for exact broker, license, mortgage, legal, investment, and partner disclosure language once supplied by the client.' => 'Esta estructura queda reservada para la redacción exacta de broker, licencia, hipotecas, legal, inversión y socios una vez suministrada por el cliente.',
		'This structure is reserved for exact broker, license, real estate, property management, and service disclaimer language once supplied by the client.' => 'Esta estructura queda reservada para la redacción exacta de broker, licencia, bienes raíces, administración de propiedades y disclaimers de servicio una vez suministrada por el cliente.',
		'Broker name' => 'Nombre del broker',
		'License number' => 'Número de licencia',
		'Required mortgage disclosure wording' => 'Redacción requerida de divulgación hipotecaria',
		'Approved investment and opportunity disclaimers' => 'Disclaimers aprobados de inversión y oportunidades',
		'Required real estate disclosure wording' => 'Redacción requerida de divulgación inmobiliaria',
		'Approved Estate service disclaimers' => 'Disclaimers aprobados de servicios Estate',
		'Start with strategic fit.' => 'Comenzar con ajuste estratégico.',
		'JV Club inquiries begin by clarifying context, partnership intent, and whether the opportunity belongs inside the Solanique ecosystem.' => 'Las consultas de JV Club comienzan aclarando contexto, intención de asociación y si la oportunidad pertenece dentro del ecosistema Solanique.',
		'Integrated Command' => 'Comando Integrado',
		'for the Global Visionary' => 'para el Visionario Global',
		'Capital / Estates / Concierge' => 'Capital / Estates / Concierge',
		'A bilingual private office ecosystem aligning capital, property, and lifestyle mastery with discretion, precision, and legacy-driven vision.' => 'Un ecosistema bilingüe de oficina privada que alinea capital, propiedad y dominio de estilo de vida con discreción, precisión y visión guiada por legado.',
		'Private Gateway' => 'Puerta privada',
		'Enter through the right private pathway.' => 'Ingrese por la ruta privada correcta.',
		'Inquiry is designed to guide Capital, Estates, Concierge, Investor Club, and JV Club requests into the correct channel with discretion.' => 'Inquiry está diseñado para dirigir solicitudes de Capital, Estates, Concierge, Investor Club y JV Club hacia el canal correcto con discreción.',
		'Route an Estates request through the private gateway for property stewardship, development, management, or asset care context.' => 'Dirija una solicitud de Estates por la puerta privada para contexto de custodia, desarrollo, gestión o cuidado de activos.',
		'Route a Concierge request through the private gateway for lifestyle logistics, family care, household operations, or time restoration context.' => 'Dirija una solicitud de Concierge por la puerta privada para contexto de logística de vida, apoyo familiar, operaciones del hogar o restauración del tiempo.',
		'Capital email' => 'Email de Capital',
		'Estates email' => 'Email de Estates',
		'Concierge email' => 'Email de Concierge',
		'Email' => 'Email',
		'Move through Inquiry.' => 'Avance por Inquiry.',
		'Inquiry routes each request into the correct Solanique pathway with discretion and context.' => 'Inquiry dirige cada solicitud hacia la ruta Solanique correcta con discreción y contexto.',
		'Estates Stewardship for Properties with Enduring Value' => 'Custodia Estates para propiedades con valor perdurable',
		'A Framework for Intelligent Growth' => 'Un marco para crecer con inteligencia',
		'A Private Path from Vision to Property' => 'Un camino privado de la visión a la propiedad',
		'A Private Standard for Global Ambition' => 'Un estándar privado para ambición global',
		'A Private Standard for Vision, Property, and Legacy' => 'Un estándar privado para visión, propiedad y legado',
		'A Private and Disciplined Process' => 'Un proceso privado y disciplinado',
		'A Quietly Refined Process' => 'Un proceso refinado y discreto',
		'A Refined Beginning' => 'Un inicio cuidadosamente refinado',
		'A Refined Real Estate Advisory Experience' => 'Una experiencia refinada de asesoría inmobiliaria',
		'A broader view for clients considering how real estate fits into family, investment, or legacy objectives.' => 'Una mirada amplia para clientes que evalúan cómo la propiedad se integra a objetivos familiares, patrimoniales o de legado.',
		'A disciplined lens for evaluating opportunities with discretion, strategic context, and long-term perspective.' => 'Una mirada disciplinada para evaluar oportunidades con discreción, contexto estratégico y perspectiva de largo plazo.',
		'A private advisory ecosystem aligning capital, property, and lifestyle with discretion, intelligence, and long-term intent.' => 'Un ecosistema privado de asesoría que alinea capital, propiedad y estilo de vida con discreción, inteligencia e intención de largo plazo.',
		'A private advisory experience designed to align capital, opportunity, and long-term vision with clarity, discretion, and strategic intent.' => 'Una experiencia privada de asesoría diseñada para alinear capital, oportunidad y visión de largo plazo con claridad, discreción e intención estratégica.',
		'A private standard for families, founders, investors, and cross-border clients.' => 'Un estándar privado para familias, fundadores, inversionistas y clientes con intereses transfronterizos.',
		'A property is never only a place.' => 'Una propiedad nunca es solo un lugar.',
		'A refined advisory experience for acquisition, development, positioning, and long-term real estate vision.' => 'Una experiencia refinada de asesoría para adquisición, desarrollo, posicionamiento y visión inmobiliaria de largo plazo.',
		'A refined concierge experience designed to simplify complexity, protect time, and elevate the details that shape everyday life.' => 'Una experiencia concierge diseñada para simplificar la complejidad, proteger el tiempo y elevar los detalles que dan forma a la vida diaria.',
		'About' => 'Firma',
		'Acquisition Strategy' => 'Estrategia de adquisición',
		'Across North America, Latin America, and select global relationships, Solanique Group connects market insight, private networks, and disciplined execution into one advisory experience.' => 'Entre Norteamérica, Latinoamérica y relaciones globales seleccionadas, Solanique Group integra inteligencia de mercado, redes privadas y ejecución disciplinada en una sola experiencia de asesoría.',
		'Advisory Areas' => 'Áreas de asesoría',
		'Advisory Continuity' => 'Continuidad de asesoría',
		'Advisory Direction' => 'Dirección estratégica',
		'Alignment' => 'Alineación',
		'Anticipation' => 'Anticipación',
		'Architectural Potential' => 'Potencial arquitectónico',
		'As needs evolve, the relationship becomes more intuitive, informed, and seamless.' => 'A medida que las necesidades evolucionan, la relación se vuelve más intuitiva, informada y fluida.',
		'As priorities evolve, Solanique remains a private partner for continued strategic thinking.' => 'A medida que las prioridades evolucionan, Solanique permanece como un aliado privado para continuar pensando estratégicamente.',
		'As the relationship develops, Solanique becomes a more intuitive private resource for daily and exceptional needs.' => 'A medida que la relación se desarrolla, Solanique se convierte en un recurso privado más intuitivo para necesidades cotidianas y excepcionales.',
		'Begin Your Journey' => 'Iniciar su recorrido',
		'Begin a Conversation with Solanique Group' => 'Iniciar una conversación con Solanique Group',
		'Begin a Private Conversation' => 'Iniciar una conversación privada',
		'Begin a private conversation with Solanique Concierge and discover how thoughtful coordination can create more space, clarity, and ease.' => 'Inicie una conversación privada con Solanique Concierge y descubra cómo una coordinación cuidadosa puede crear más espacio, claridad y fluidez.',
		'Begin a private conversation with Solanique Estates and explore how property strategy can become part of a broader legacy.' => 'Inicie una conversación privada con Solanique Estates y explore cómo la estrategia inmobiliaria puede formar parte de un legado más amplio.',
		'Begin a private conversation with Solanique Group about how capital strategy, real estate advisory, and private concierge can work as one.' => 'Inicie una conversación privada con Solanique Group sobre cómo la estrategia de capital, la asesoría inmobiliaria y el concierge privado pueden trabajar como un solo sistema.',
		'Begin with Strategy' => 'Comenzar con estrategia',
		'Begin with a Private Conversation' => 'Comenzar con una conversación privada',
		'Beyond the transaction,' => 'Más allá de la transacción,',
		'Bilingual English and Spanish insight for clients navigating opportunities across markets and jurisdictions.' => 'Perspectiva bilingüe en inglés y español para clientes que navegan oportunidades entre mercados y jurisdicciones.',
		'Bilingual English and Spanish insight for clients navigating opportunities across markets.' => 'Perspectiva bilingüe en inglés y español para clientes que navegan oportunidades entre mercados.',
		'Bilingual English and Spanish support for clients navigating personal details across markets.' => 'Acompañamiento bilingüe en inglés y español para clientes que gestionan detalles personales entre mercados.',
		'Bilingual Insight' => 'Perspectiva bilingüe',
		'Built for Visionaries Who Move Beyond Transactions' => 'Creado para visionarios que piensan más allá de la transacción',
		'By submitting this inquiry, you agree to be contacted by Solanique Group regarding your request.' => 'Al enviar esta solicitud, acepta ser contactado por Solanique Group en relación con su consulta.',
		'Canada' => 'Canadá',
		'Capital Advisory Areas' => 'Áreas de asesoría de capital',
		'Capital Planning' => 'Planeación de capital',
		'Capital Strategy for Visionaries Building Beyond the Present' => 'Estrategia de capital para visionarios que construyen más allá del presente',
		'Capital is not only allocated.' => 'El capital no solo se asigna.',
		'Capital strategy and private advisory' => 'Estrategia de capital y asesoría privada',
		'Capital strategy for investors, founders, and families pursuing disciplined growth and durable value.' => 'Estrategia de capital para inversionistas, fundadores y familias que buscan crecimiento disciplinado y valor duradero.',
		'Capital strategy, real estate advisory, and private concierge within one refined ecosystem.' => 'Estrategia de capital, asesoría inmobiliaria y concierge privado dentro de un ecosistema refinado.',
		'Capital, estates, and concierge services working as one connected advisory ecosystem.' => 'Capital, estates y concierge trabajando como un ecosistema conectado de asesoría.',
		'Change language' => 'Cambiar idioma',
		'Chauffeur opening a car door representing Solanique Concierge coordination.' => 'Chofer abriendo la puerta de un automóvil como referencia de coordinación Solanique Concierge.',
		'Clarifying Conversation' => 'Conversación de claridad',
		'Close menu' => 'Cerrar menú',
		'Concierge Approach' => 'Enfoque concierge',
		'Concierge Services' => 'Servicios concierge',
		'Continuity' => 'Continuidad',
		'Coordination' => 'Coordinación',
		'Cross-Border Assistance' => 'Asistencia transfronteriza',
		'Cross-Border Guidance' => 'Guía transfronteriza',
		'Cross-Border Perspective' => 'Perspectiva transfronteriza',
		'Dark' => 'Oscuro',
		'Decisions are guided by strategy, clarity, and disciplined execution.' => 'Las decisiones se guían por estrategia, claridad y ejecución disciplinada.',
		'Designed Around Discretion, Time, and Trust' => 'Diseñado alrededor de discreción, tiempo y confianza',
		'Details are organized with clarity so clients can focus on what matters most.' => 'Los detalles se organizan con claridad para que el cliente pueda enfocarse en lo que más importa.',
		'Development Vision' => 'Visión de desarrollo',
		'Discover how Solanique Group can unite capital, estates, and concierge into one refined path toward legacy.' => 'Descubra cómo Solanique Group puede unir capital, estates y concierge en un camino refinado hacia el legado.',
		'Discovery' => 'Descubrimiento',
		'Discreet support for travel planning, logistics, preferences, and refined arrangements.' => 'Apoyo discreto para planificación de viajes, logística, preferencias y arreglos refinados.',
		'Discretion' => 'Discreción',
		'Email Address' => 'Correo electrónico',
		'Engineered.' => 'diseñado con precisión.',
		'English' => 'Inglés',
		'English and Spanish guidance for clients navigating cross-border opportunities.' => 'Guía en inglés y español para clientes que navegan oportunidades transfronterizas.',
		'English and Spanish guidance supports clients navigating opportunities across cultures and markets.' => 'La guía en inglés y español acompaña a clientes que navegan oportunidades entre culturas y mercados.',
		'Evaluating whether a property aligns with the client\'s broader personal, family, or capital objectives.' => 'Evaluamos si una propiedad se alinea con los objetivos personales, familiares o patrimoniales más amplios del cliente.',
		'Every decision is considered with clarity, structure, and disciplined attention to detail.' => 'Cada decisión se considera con claridad, estructura y atención disciplinada al detalle.',
		'Every interaction is designed to feel considered, intelligent, and deeply respectful of the client\'s broader vision.' => 'Cada interacción está diseñada para sentirse considerada, inteligente y profundamente respetuosa de la visión más amplia del cliente.',
		'Every interaction is handled with privacy, respect, and thoughtful restraint.' => 'Cada interacción se maneja con privacidad, respeto y una discreción cuidadosamente medida.',
		'Every opportunity is evaluated through a refined lens: alignment, resilience, timing, and long-term value.' => 'Cada oportunidad se evalúa con una mirada refinada: alineación, resiliencia, momento adecuado y valor de largo plazo.',
		'Every relationship begins with a private exchange. Share your vision, priorities, or area of interest, and our team will guide the next step with discretion and care.' => 'Toda relación comienza con un intercambio privado. Comparta su visión, prioridades o área de interés, y nuestro equipo guiará el siguiente paso con discreción y cuidado.',
		'Every relationship is shaped by a standard of discretion, precision, and long-term perspective.' => 'Cada relación se construye bajo un estándar de discreción, precisión y perspectiva de largo plazo.',
		'Every request begins with understanding context. The best concierge experience is not loud or excessive; it is precise, calm, and deeply personal.' => 'Cada solicitud comienza por entender el contexto. La mejor experiencia concierge no es estridente ni excesiva; es precisa, serena y profundamente personal.',
		'Explore Capital' => 'Explorar Capital',
		'Explore Concierge' => 'Explorar Concierge',
		'Explore Estates' => 'Explorar Estates',
		'Explore Our Approach' => 'Explorar nuestro enfoque',
		'Explore Our Ecosystem' => 'Explorar el ecosistema',
		'Explore Our Framework' => 'Explorar el marco',
		'Explore Our Services' => 'Explorar servicios',
		'Explore the Ecosystem' => 'Explorar el ecosistema',
		'Footer Navigation' => 'Navegación del pie de página',
		'Footer navigation' => 'Navegación del pie de página',
		'Founder Vision' => 'Visión fundadora',
		'Founder and Family Advisory' => 'Asesoría para fundadores y familias',
		'Full Name' => 'Nombre completo',
		'General Inquiry' => 'Consulta general',
		'Global Network' => 'Red global',
		'Global Perspective' => 'Perspectiva global',
		'Great vision is never accidental.' => 'Una gran visión nunca es accidental.',
		'Guidance designed to elevate how a property is understood, presented, and aligned with the right audience.' => 'Guía diseñada para elevar cómo se entiende, presenta y alinea una propiedad con la audiencia adecuada.',
		'Guidance where capital planning intersects with acquisition, development, property positioning, or portfolio direction.' => 'Guía donde la planeación de capital se cruza con adquisición, desarrollo, posicionamiento inmobiliario o dirección de portafolio.',
		'Header actions' => 'Acciones del encabezado',
		'Hotel arrival detail with luggage representing Solanique Concierge coordination.' => 'Detalle de llegada con equipaje como referencia de coordinación Solanique Concierge.',
		'Illuminated commercial buildings representing Solanique Group advisory perspective.' => 'Edificios comerciales iluminados como referencia de la perspectiva de asesoría de Solanique Group.',
		'Inquiry Details' => 'Detalles de la consulta',
		'Integrated Advisory' => 'Asesoría integrada',
		'Integrated Ecosystem' => 'Ecosistema integrado',
		'Integrated Vision' => 'Visión integrada',
		'Integrated global advisory conversations' => 'Conversaciones de asesoría global integrada',
		'Integrity' => 'Integridad',
		'Investment Opportunity Review' => 'Revisión de oportunidades de inversión',
		'It is designed with precision, protected by discretion, and strengthened through experience.' => 'Se diseña con precisión, se protege con discreción y se fortalece con experiencia.',
		'It is directed.' => 'Se dirige.',
		'It is ease.' => 'Es fluidez.',
		'It is position, potential, and legacy.' => 'Es posición, potencial y legado.',
		'Language selector' => 'Cambiar idioma',
		'Led by Vision. Defined by Trust.' => 'Guiado por visión. Definido por confianza.',
		'Legacy' => 'Legado',
		'Light' => 'Claro',
		'Lifestyle Planning' => 'Planificación de estilo de vida',
		'Lifestyle coordination connected to residences, stays, relocations, and property-related needs.' => 'Coordinación de estilo de vida vinculada a residencias, estadías, traslados y necesidades relacionadas con propiedades.',
		'Local Intelligence. Borderless Vision.' => 'Inteligencia local. Visión sin fronteras.',
		'Long-Term Value' => 'Valor de largo plazo',
		'Looking beyond the transaction toward properties that can support enduring relevance.' => 'Miramos más allá de la transacción hacia propiedades capaces de sostener relevancia duradera.',
		'Luxury real estate advisory across strategy, acquisition, development, and long-term value creation.' => 'Asesoría inmobiliaria de lujo en estrategia, adquisición, desarrollo y creación de valor de largo plazo.',
		'Luxury real estate advisory and property strategy' => 'Asesoría inmobiliaria de lujo y estrategia de propiedad',
		'Market Context' => 'Contexto de mercado',
		'Message' => 'Mensaje',
		'Mission & Vision' => 'Misión y visión',
		'Mobile language selector' => 'Cambiar idioma móvil',
		'Mobile navigation' => 'Navegación móvil',
		'Mobile primary navigation' => 'Navegación principal móvil',
		'Modern glass building representing Solanique Estates real estate advisory.' => 'Edificio moderno de vidrio como referencia de la asesoría inmobiliaria de Solanique Estates.',
		'Modern glass real estate building representing Solanique Estates advisory.' => 'Edificio inmobiliario moderno de vidrio como referencia de Solanique Estates.',
		'One Ecosystem. Three Disciplines.' => 'Un ecosistema. Tres disciplinas.',
		'One Private Ecosystem' => 'Un ecosistema privado',
		'Ongoing Perspective' => 'Perspectiva continua',
		'Ongoing Support' => 'Acompañamiento continuo',
		'Open menu' => 'Abrir menú',
		'Opportunity' => 'Oportunidad',
		'Opportunity Evaluation' => 'Evaluación de oportunidades',
		'Optional' => 'Opcional',
		'Our Mission' => 'Nuestra misión',
		'Our Vision' => 'Nuestra visión',
		'Our role is to guide that ambition with discretion, intelligence, and a disciplined commitment to outcomes that last.' => 'Nuestro papel es guiar esa ambición con discreción, inteligencia y un compromiso disciplinado con resultados que perduren.',
		'Personal Arrangements' => 'Gestiones personales',
		'Phone Number' => 'Teléfono',
		'Portfolio Perspective' => 'Perspectiva de portafolio',
		'Precision' => 'Precisión',
		'Preference Mapping' => 'Mapa de preferencias',
		'Preferred Language' => 'Idioma preferido',
		'Primary Navigation' => 'Navegación principal',
		'Primary navigation' => 'Navegación principal',
		'Principles' => 'Principios',
		'Privacy is treated as part of the experience, not an afterthought.' => 'La privacidad se trata como parte de la experiencia, no como un detalle posterior.',
		'Private Global Advisory' => 'Asesoría global privada',
		'Private Inquiry' => 'Consulta privada',
		'Private Introduction' => 'Introducción privada',
		'Private Lifestyle Coordination' => 'Coordinación privada de estilo de vida',
		'Private Lifestyle Coordination for a Life Without Friction' => 'Coordinación privada para una vida con mayor claridad y fluidez',
		'Private Review' => 'Revisión privada',
		'Private Standard' => 'Estándar privado',
		'Private concierge and lifestyle coordination' => 'Concierge privado y coordinación de estilo de vida',
		'Private coordination for requests that require care, timing, and attention to detail.' => 'Coordinación privada para solicitudes que requieren cuidado, timing y atención al detalle.',
		'Private guidance for clients evaluating properties through the lens of value, positioning, and long-term potential.' => 'Guía privada para clientes que evalúan propiedades desde la perspectiva del valor, el posicionamiento y el potencial de largo plazo.',
		'Private guidance for founders, families, and decision-makers who require a thoughtful, confidential approach.' => 'Guía privada para fundadores, familias y tomadores de decisión que requieren un enfoque cuidadoso y confidencial.',
		'Private lifestyle coordination designed to simplify complexity and protect time.' => 'Coordinación privada de estilo de vida diseñada para simplificar la complejidad y proteger el tiempo.',
		'Private lifestyle coordination that reduces complexity and protects time, privacy, and standards.' => 'Coordinación privada de estilo de vida que reduce complejidad y protege tiempo, privacidad y estándares.',
		'Process' => 'Proceso',
		'Professional meeting environment representing Solanique Capital strategy.' => 'Ambiente profesional de reunión como referencia de estrategia Solanique Capital.',
		'Properties and possibilities are reviewed with discretion, context, and strategic clarity.' => 'Las propiedades y posibilidades se revisan con discreción, contexto y claridad estratégica.',
		'Property Intelligence' => 'Inteligencia inmobiliaria',
		'Property Intelligence Beyond the Surface' => 'Inteligencia inmobiliaria más allá de la superficie',
		'Property Lifestyle Support' => 'Soporte lifestyle para propiedades',
		'Property Positioning' => 'Posicionamiento de propiedad',
		'Real Estate Advisory' => 'Asesoría inmobiliaria',
		'Real Estate Capital Strategy' => 'Estrategia de capital inmobiliario',
		'Real estate strategy, acquisition, development, and advisory for properties with enduring value.' => 'Estrategia, adquisición, desarrollo y asesoría inmobiliaria para propiedades con valor perdurable.',
		'Recognizing how design, use, and transformation can influence future value.' => 'Reconocer cómo el diseño, el uso y la transformación pueden influir en el valor futuro.',
		'Refined Next Step' => 'Siguiente paso refinado',
		'Requests are organized with care, clarity, and thoughtful execution.' => 'Las solicitudes se organizan con cuidado, claridad y ejecución atenta.',
		'Required' => 'Requerido',
		'Return to the Ecosystem' => 'Volver al ecosistema',
		'Select a language' => 'Seleccione un idioma',
		'Select an area' => 'Seleccione un área',
		'Shape Your Real Estate Vision' => 'Dé forma a su visión inmobiliaria',
		'Share a brief overview of your goals, priorities, or request.' => 'Comparta una breve descripción de sus objetivos, prioridades o solicitud.',
		'Simplify the Details That Shape Your Life' => 'Simplificar los detalles que dan forma a su vida',
		'Skip to content' => 'Saltar al contenido',
		'Solanique Capital helps clients approach opportunity with structure, discretion, and a long-range perspective. Our role is to connect strategic thinking with disciplined execution, helping each decision support a broader vision of legacy.' => 'Solanique Capital ayuda a los clientes a abordar oportunidades con estructura, discreción y perspectiva de largo plazo. Nuestro papel es conectar pensamiento estratégico con ejecución disciplinada para que cada decisión apoye una visión más amplia de legado.',
		'Solanique Capital supports clients across strategic conversations where capital, property, and long-term planning intersect.' => 'Solanique Capital acompaña conversaciones estratégicas donde capital, propiedad y planeación de largo plazo se intersectan.',
		'Solanique Concierge exists to simplify the personal, practical, and time-sensitive details that surround a demanding life. Through discretion, coordination, and thoughtful execution, we help clients move with greater clarity and calm.' => 'Solanique Concierge existe para simplificar los detalles personales, prácticos y sensibles al tiempo que rodean una vida exigente. A través de discreción, coordinación y ejecución cuidadosa, ayudamos a los clientes a moverse con mayor claridad y calma.',
		'Solanique Concierge supports clients across the personal and practical details that require trust, taste, and reliable execution.' => 'Solanique Concierge acompaña los detalles personales y prácticos que requieren confianza, criterio y ejecución confiable.',
		'Solanique Estates guides clients through real estate decisions with discretion, strategic perspective, and a refined understanding of long-term value. From acquisition to development vision, every decision is approached with precision.' => 'Solanique Estates guía decisiones inmobiliarias con discreción, perspectiva estratégica y una comprensión refinada del valor a largo plazo. Desde adquisición hasta visión de desarrollo, cada decisión se aborda con precisión.',
		'Solanique Estates supports clients where property, market intelligence, capital, and long-term vision intersect.' => 'Solanique Estates acompaña a clientes donde propiedad, inteligencia de mercado, capital y visión de largo plazo se encuentran.',
		'Solanique Group brings together three connected disciplines so clients can move with greater clarity across capital, property, and lifestyle.' => 'Solanique Group reúne tres disciplinas conectadas para que los clientes avancen con mayor claridad entre capital, propiedad y estilo de vida.',
		'Solanique Group combines strategic insight, real estate intelligence, and private concierge coordination for clients who expect discretion, precision, and long-term value.' => 'Solanique Group combina visión estratégica, inteligencia inmobiliaria y coordinación concierge privada para clientes que esperan discreción, precisión y valor de largo plazo.',
		'Solanique Group home' => 'Inicio de Solanique Group',
		'Solanique Group is a global advisory ecosystem created for clients who see capital, real estate, and lifestyle as connected expressions of long-term vision.' => 'Solanique Group es un ecosistema global de asesoría creado para clientes que entienden el capital, la propiedad y el estilo de vida como expresiones conectadas de una visión de largo plazo.',
		'Solanique Group is built around a simple belief: clients deserve guidance that understands the relationship between ambition, privacy, property, and time.' => 'Solanique Group se construye sobre una idea simple: los clientes merecen guía que entienda la relación entre ambición, privacidad, propiedad y tiempo.',
		'Solanique Group unites capital strategy, real estate advisory, and private concierge services into one refined ecosystem for global visionaries.' => 'Solanique Group une estrategia de capital, asesoría inmobiliaria y concierge privado en un ecosistema refinado para visionarios globales.',
		'Solanique Group was created for clients who view property, capital, and lifestyle as connected expressions of ambition.' => 'Solanique Group fue creado para clientes que ven propiedad, capital y estilo de vida como expresiones conectadas de ambición.',
		'Solanique Group was created to bring capital strategy, real estate intelligence, and private lifestyle coordination into one refined advisory experience. We guide clients with discretion, bilingual insight, and a commitment to outcomes that can endure beyond the immediate decision.' => 'Solanique Group fue creado para integrar estrategia de capital, inteligencia inmobiliaria y coordinación privada de estilo de vida en una experiencia refinada de asesoría. Guiamos con discreción, perspectiva bilingüe y compromiso con resultados capaces de trascender la decisión inmediata.',
		'Solanique Group works with clients who value clarity, privacy, and a refined advisory experience. Whether your priority is capital, estates, concierge, or a combination of all three, the first step is a confidential introduction.' => 'Solanique Group trabaja con clientes que valoran claridad, privacidad y una experiencia refinada de asesoría. Ya sea que su prioridad sea capital, estates, concierge o una combinación de las tres, el primer paso es una introducción confidencial.',
		'Solanique Group. All rights reserved.' => 'Solanique Group. Todos los derechos reservados.',
		'Solanique Group Leadership' => 'Liderazgo de Solanique Group',
		'Solanique remains a private partner as the real estate vision evolves over time.' => 'Solanique permanece como aliado privado a medida que la visión inmobiliaria evoluciona con el tiempo.',
		'Spanish' => 'Español',
		'Start Your Inquiry' => 'Iniciar su consulta',
		'Start a private conversation with Solanique Capital and explore how disciplined capital thinking can support your broader vision.' => 'Inicie una conversación privada con Solanique Capital y explore cómo una visión disciplinada del capital puede apoyar una visión más amplia.',
		'Strategic Capital Framework' => 'Marco estratégico de capital',
		'Strategic Direction' => 'Dirección estratégica',
		'Strategic Fit' => 'Ajuste estratégico',
		'Strategic Mapping' => 'Mapeo estratégico',
		'Strategic capital guidance for clients seeking intelligent growth and long-term alignment.' => 'Guía estratégica de capital para clientes que buscan crecimiento inteligente y alineación de largo plazo.',
		'Strategic perspective for properties that require transformation, repositioning, or a broader architectural concept.' => 'Perspectiva estratégica para propiedades que requieren transformación, reposicionamiento o un concepto arquitectónico más amplio.',
		'Strategic perspective regions and network reach' => 'Regiones de perspectiva estratégica y alcance de red',
		'Structure' => 'Estructura',
		'Structured guidance for clients seeking clarity around how capital supports broader personal, family, or business objectives.' => 'Guía estructurada para clientes que buscan claridad sobre cómo el capital apoya objetivos personales, familiares o empresariales más amplios.',
		'Submit Private Inquiry' => 'Enviar consulta privada',
		'Tell us where your vision begins. A member of the Solanique team will review your inquiry with discretion.' => 'Cuéntenos dónde comienza su visión. Un miembro del equipo Solanique revisará su consulta con discreción.',
		'The Firm' => 'La firma',
		'The Principles That Guide the Work' => 'Los principios que guían el trabajo',
		'The first conversation is designed to understand context before proposing direction.' => 'La primera conversación está diseñada para comprender el contexto antes de proponer una dirección.',
		'The most important real estate decisions are rarely based on appearance alone. They require context, timing, discretion, and the ability to see what a property can become.' => 'Las decisiones inmobiliarias más importantes rara vez se basan solo en la apariencia. Requieren contexto, timing, discreción y la capacidad de ver lo que una propiedad puede llegar a ser.',
		'The next step is guided with clarity, privacy, and respect for your time.' => 'El siguiente paso se guía con claridad, privacidad y respeto por su tiempo.',
		'The work is measured not only by what is achieved now, but by what can endure over time.' => 'El trabajo se mide no solo por lo que se logra ahora, sino por lo que puede perdurar con el tiempo.',
		'Thoughtful coordination for personal priorities, schedules, experiences, and day-to-day needs.' => 'Coordinación cuidadosa de prioridades personales, agendas, experiencias y necesidades diarias.',
		'Three disciplines. One private advisory ecosystem.' => 'Tres disciplinas. Un ecosistema privado de asesoría.',
		'To become a trusted private advisory brand recognized for leadership, excellence, and empowerment, helping every property, opportunity, and decision become part of a broader legacy.' => 'Convertirnos en una marca privada de asesoría reconocida por liderazgo, excelencia y capacidad de empoderar, ayudando a que cada propiedad, oportunidad y decisión forme parte de un legado más amplio.',
		'To deliver an integrated ecosystem of capital strategy, real estate vision, and lifestyle mastery that empowers global visionaries to ascend with clarity, discretion, and long-term intent.' => 'Entregar un ecosistema integrado de estrategia de capital, visión inmobiliaria y dominio del estilo de vida que permita a visionarios globales avanzar con claridad, discreción e intención de largo plazo.',
		'Toggle color theme' => 'Cambiar tema visual',
		'Travel Coordination' => 'Coordinación de viajes',
		'True luxury is not excess.' => 'El verdadero lujo no es exceso.',
		'Trust is protected through honest guidance, thoughtful restraint, and responsible execution.' => 'La confianza se protege con guía honesta, contención cuidadosa y ejecución responsable.',
		'Understanding the forces, patterns, and positioning that shape long-term opportunity.' => 'Comprender las fuerzas, patrones y posicionamiento que dan forma a la oportunidad de largo plazo.',
		'United States' => 'Estados Unidos',
		'We begin by understanding the client\'s broader objectives, priorities, and definition of success.' => 'Comenzamos por comprender los objetivos más amplios, prioridades y definición de éxito del cliente.',
		'We begin by understanding your goals, priorities, and relevant details.' => 'Comenzamos por entender sus objetivos, prioridades y detalles relevantes.',
		'We begin with a confidential conversation to understand objectives, context, and priorities.' => 'Comenzamos con una conversación confidencial para entender objetivos, contexto y prioridades.',
		'We begin with a confidential understanding of the client\'s objectives, preferences, and long-term vision.' => 'Comenzamos con una comprensión confidencial de los objetivos, preferencias y visión de largo plazo del cliente.',
		'We begin with a discreet conversation to understand lifestyle priorities, preferences, and expectations.' => 'Comenzamos con una conversación discreta para entender prioridades de estilo de vida, preferencias y expectativas.',
		'We connect property, capital, and private lifestyle coordination into a clear path toward enduring value.' => 'Conectamos propiedad, capital y coordinación privada de estilo de vida en un camino claro hacia valor perdurable.',
		'We define the areas where capital, timing, and opportunity may align.' => 'Definimos las áreas donde capital, momento y oportunidad pueden alinearse.',
		'We define the details that shape how support should feel: timing, communication style, priorities, and boundaries.' => 'Definimos los detalles que dan forma al acompañamiento: timing, estilo de comunicación, prioridades y límites.',
		'We define the real estate path that best aligns with the client\'s priorities and desired outcomes.' => 'Definimos el camino inmobiliario que mejor se alinea con las prioridades y resultados deseados del cliente.',
		'We evaluate where capital, market timing, and strategic positioning can work together.' => 'Evaluamos dónde capital, momento de mercado y posicionamiento estratégico pueden trabajar juntos.',
		'We look beyond acquisition toward structures, relationships, and outcomes that endure.' => 'Miramos más allá de la adquisición hacia estructuras, relaciones y resultados que perduran.',
		'We look beyond immediate outcomes toward value that can endure across time.' => 'Miramos más allá de los resultados inmediatos hacia valor que pueda perdurar en el tiempo.',
		'We look beyond the request to understand timing, preferences, and what will make the experience feel effortless.' => 'Miramos más allá de la solicitud para entender timing, preferencias y lo que hará que la experiencia se sienta fluida.',
		'We organize each path with clarity, discipline, and a focus on informed decision-making.' => 'Organizamos cada camino con claridad, disciplina y enfoque en decisiones informadas.',
		'We provide a clear strategic path, supported by discretion and informed perspective.' => 'Proporcionamos un camino estratégico claro, respaldado por discreción y perspectiva informada.',
		'What to Expect' => 'Qué esperar',
		'When appropriate, we identify how Solanique Capital, Estates, or Concierge may support the path forward.' => 'Cuando corresponde, identificamos cómo Solanique Capital, Estates o Concierge pueden apoyar el camino a seguir.',
		'Whether your vision begins with capital, property, lifestyle, or legacy, Solanique Group is designed to guide the conversation with discretion and intelligence.' => 'Ya sea que su visión comience con capital, propiedad, estilo de vida o legado, Solanique Group está diseñado para guiar la conversación con discreción e inteligencia.',
		'Why Solanique' => 'Por qué Solanique',
		'Your Legacy,' => 'Su legado,',
		'Your first conversation' => 'Su primera conversación',
		'Your inquiry is reviewed with discretion and attention to context.' => 'Su consulta se revisa con discreción y atención al contexto.',
		'should feel considered.' => 'debe sentirse cuidadosamente considerada.',
		'there is a larger vision.' => 'existe una visión más amplia.',
		'%s service highlights' => 'Aspectos destacados de %s',
		'A Framework for Intelligent Capital Direction' => 'Un marco para dirigir el capital con inteligencia',
		'A private advisory experience aligning capital, real estate acquisition, business strategy, and cross-border perspective with disciplined intent.' => 'Una experiencia privada de asesoría que alinea capital, adquisición inmobiliaria, estrategia empresarial y perspectiva transfronteriza con intención disciplinada.',
		'Architectural Leadership' => 'Liderazgo arquitectónico',
		'Architectural planning and smart home blueprint representing Solanique Estates stewardship.' => 'Plano arquitectónico y de hogar inteligente como referencia de la gestión Solanique Estates.',
		'Asset and Portfolio Alignment' => 'Alineación de activos y portafolio',
		'Bespoke Capital and Mortgage Planning' => 'Planeación personalizada de capital e hipoteca',
		'Bilingual Efficiency' => 'Eficiencia bilingüe',
		'Bilingual English and Spanish guidance connects Canadian opportunities with cross-border relationships across the Americas.' => 'La guía bilingüe en inglés y español conecta oportunidades canadienses con relaciones transfronterizas en las Américas.',
		'Bilingual English and Spanish support for families navigating personal, household, and lifestyle details across markets.' => 'Acompañamiento bilingüe en inglés y español para familias que coordinan detalles personales, domésticos y de estilo de vida entre mercados.',
		'Bilingual advisory across local roots and global reach' => 'Asesoría bilingüe entre raíces locales y alcance global',
		'Business Transformation Planning' => 'Planeación de transformación empresarial',
		'Capital and mortgage planning' => 'Planeación de capital e hipoteca',
		'Capital architecture, strategic acquisition, private opportunity review, and business advisory for clients building durable growth.' => 'Arquitectura de capital, adquisición estratégica, revisión de oportunidades privadas y asesoría empresarial para clientes que construyen crecimiento duradero.',
		'Capital strategy, acquisition planning, and business advisory' => 'Estrategia de capital, planeación de adquisición y asesoría empresarial',
		'Capital, Estates, and Concierge work together so strategy, property, and lifestyle decisions are not managed in isolation.' => 'Capital, Estates y Concierge trabajan juntos para que las decisiones de estrategia, propiedad y estilo de vida no se gestionen de forma aislada.',
		'Capital Architecture for Visionaries Building Beyond the Present' => 'Arquitectura de capital para visionarios que construyen más allá del presente',
		'Caribbean' => 'Caribe',
		'Corporate Venture Advisory' => 'Asesoría para proyectos empresariales',
		'Development and Renovation Management' => 'Gestión de desarrollo y renovación',
		'Development and renovation management' => 'Gestión de desarrollo y renovación',
		'Development oversight, property management, owner visibility, and estate stewardship for physical assets that require disciplined care.' => 'Supervisión de desarrollo, gestión de propiedades, visibilidad para propietarios y cuidado patrimonial de activos físicos que requieren atención disciplinada.',
		'End-to-end oversight for builds, renovations, and structural transformations, aligning design intent, trades, budget, and timeline.' => 'Supervisión integral de construcciones, renovaciones y transformaciones estructurales, alineando intención de diseño, oficios, presupuesto y calendario.',
		'English and Spanish coordination helps personal, household, and cross-border details remain clear across cultures and markets.' => 'La coordinación en inglés y español ayuda a que los detalles personales, domésticos y transfronterizos se mantengan claros entre culturas y mercados.',
		'English and Spanish guidance helps clients move between cultures, markets, and cross-border decisions with greater clarity.' => 'La guía en inglés y español ayuda a los clientes a moverse entre culturas, mercados y decisiones transfronterizas con mayor claridad.',
		'Europe' => 'Europa',
		'Every opportunity is evaluated through a refined lens: alignment, market context, structure, and legacy resilience.' => 'Cada oportunidad se evalúa con una mirada refinada: alineación, contexto de mercado, estructura y resiliencia de legado.',
		'Every relationship begins with a private exchange. Share your vision, market, or area of interest, and the conversation will be guided with discretion, bilingual clarity, and care.' => 'Toda relación comienza con un intercambio privado. Comparta su visión, mercado o área de interés, y la conversación será guiada con discreción, claridad bilingüe y cuidado.',
		'Every request begins with context. The best concierge experience is not loud or excessive; it is precise, discreet, predictive, and deeply personal.' => 'Cada solicitud comienza con contexto. La mejor experiencia concierge no es estridente ni excesiva; es precisa, discreta, predictiva y profundamente personal.',
		'Family Care Coordination' => 'Coordinación de cuidado familiar',
		'Family care and transition support' => 'Cuidado familiar y apoyo en transiciones',
		'Friday Harbour' => 'Friday Harbour',
		'From Fragmentation to Command' => 'De la fragmentación al comando',
		'Global Mindset' => 'Mentalidad global',
		'Global Reach' => 'Alcance global',
		'Global private office perspective' => 'Perspectiva global de private office',
		'Guidance designed to connect business interests, property holdings, and legacy objectives into one coherent strategic view.' => 'Guía diseñada para conectar intereses empresariales, activos inmobiliarios y objetivos de legado en una visión estratégica coherente.',
		'Honest guidance, transparency, and discretion protect trust as part of the Solanique standard.' => 'La guía honesta, la transparencia y la discreción protegen la confianza como parte del estándar Solanique.',
		'Household Operations' => 'Operaciones del hogar',
		'Housekeeping, residential preparation, vendor coordination, pet care, and domestic details organized through one private standard.' => 'Limpieza, preparación residencial, coordinación de proveedores, cuidado de mascotas y detalles domésticos organizados bajo un estándar privado.',
		'Intelligence-driven decisions across Capital, Estates, and Concierge, shaped with clarity and disciplined attention to detail.' => 'Decisiones guiadas por inteligencia en Capital, Estates y Concierge, estructuradas con claridad y atención disciplinada al detalle.',
		'It is designed through capital strategy, property intelligence, lifestyle mastery, and the discipline to move beyond transactions.' => 'Se diseña a través de estrategia de capital, inteligencia inmobiliaria, dominio del estilo de vida y la disciplina de ir más allá de la transacción.',
		'Lake Simcoe / Innisfil' => 'Lake Simcoe / Innisfil',
		'Legacy Over Transaction' => 'Legado por encima de la transacción',
		'Legacy-Driven Vision' => 'Visión orientada al legado',
		'Lifestyle Logistics' => 'Logística de estilo de vida',
		'Lifestyle logistics and personal assistance' => 'Logística de estilo de vida y asistencia personal',
		'Lifestyle logistics, household coordination, family support, and personal assistance designed to restore time and remove friction.' => 'Logística de estilo de vida, coordinación del hogar, apoyo familiar y asistencia personal diseñados para devolver tiempo y reducir fricción.',
		'Local Roots. Global Reach.' => 'Raíces locales. Alcance global.',
		'Middle East' => 'Medio Oriente',
		'One-Call Direction' => 'Dirección desde un solo punto',
		'Operational Fit' => 'Ajuste operativo',
		'Physical Asset Protection' => 'Protección de activos físicos',
		'Predictive Support' => 'Soporte predictivo',
		'Precision Real Estate Acquisition' => 'Adquisición inmobiliaria de precisión',
		'Private JV and off-market conversations' => 'Conversaciones privadas de JV y oportunidades fuera de mercado',
		'Private Mobility and Personal Assistance' => 'Movilidad privada y asistencia personal',
		'Private Opportunity Review' => 'Revisión privada de oportunidades',
		'Private concierge, lifestyle logistics, and household coordination' => 'Concierge privado, logística de estilo de vida y coordinación del hogar',
		'Private coordination for schedules, travel details, household requests, and practical needs that compete for attention.' => 'Coordinación privada de agendas, detalles de viaje, solicitudes del hogar y necesidades prácticas que compiten por atención.',
		'Private lifestyle logistics, household coordination, family support, and personal assistance designed to restore time and reduce operational friction.' => 'Logística privada de estilo de vida, coordinación del hogar, apoyo familiar y asistencia personal diseñados para devolver tiempo y reducir fricción operativa.',
		'Private oversight for vacant checks, readiness reviews, and property continuity for owners managing residences across markets.' => 'Supervisión privada para revisiones de inmuebles vacantes, preparación y continuidad de propiedad para propietarios con residencias en distintos mercados.',
		'Property Management and Owner Visibility' => 'Gestión de propiedades y visibilidad para propietarios',
		'Property Well-Being Infrastructure' => 'Infraestructura de bienestar de la propiedad',
		'Property management and owner visibility' => 'Gestión de propiedades y visibilidad para propietarios',
		'Provider coordination is guided by privacy, reliability, discretion, and the expectation that each detail enters the client sphere carefully.' => 'La coordinación de proveedores se guía por privacidad, confiabilidad, discreción y la expectativa de que cada detalle ingrese cuidadosamente al ámbito del cliente.',
		'Real estate advisory, development oversight, property management, and asset stewardship for residences and portfolios that demand disciplined care.' => 'Asesoría inmobiliaria, supervisión de desarrollo, gestión de propiedades y cuidado de activos para residencias y portafolios que exigen atención disciplinada.',
		'Real estate stewardship, development, and property management' => 'Cuidado inmobiliario, desarrollo y gestión de propiedades',
		'Requests move through a clear primary point of coordination, reducing hand-offs, confusion, and fragmented communication.' => 'Las solicitudes pasan por un punto principal de coordinación, reduciendo traspasos, confusión y comunicación fragmentada.',
		'Seasonal Asset Stewardship' => 'Cuidado estacional de activos',
		'Seasonal asset care and maintenance coordination' => 'Cuidado estacional y coordinación de mantenimiento',
		'Senior Transition Support' => 'Apoyo en transiciones para adultos mayores',
		'Strategic Excellence' => 'Excelencia estratégica',
		'Strategic Context' => 'Contexto estratégico',
		'Strategic Transformation' => 'Transformación estratégica',
		'Strategic acquisition' => 'Adquisición estratégica',
		'Strategic guidance for evaluating land, residences, and commercial assets through market context, timing, and long-term positioning.' => 'Guía estratégica para evaluar terrenos, residencias y activos comerciales a través del contexto de mercado, el momento y el posicionamiento de largo plazo.',
		'Strategic markets and advisory corridors' => 'Mercados estratégicos y corredores de asesoría',
		'Solanique Capital helps clients approach growth as an integrated architecture: acquisition, capital planning, private opportunity review, and business strategy working in disciplined alignment.' => 'Solanique Capital ayuda a los clientes a abordar el crecimiento como una arquitectura integrada: adquisición, planeación de capital, revisión de oportunidades privadas y estrategia empresarial trabajando en alineación disciplinada.',
		'Solanique Capital supports strategic conversations where capital, property, business ambition, and long-term planning intersect.' => 'Solanique Capital acompaña conversaciones estratégicas donde capital, propiedad, ambición empresarial y planeación de largo plazo se encuentran.',
		'Solanique Concierge exists to protect the most finite asset: time. Through discretion, household coordination, family support, and thoughtful execution, we help clients move with greater clarity and calm.' => 'Solanique Concierge existe para proteger el activo más finito: el tiempo. A través de discreción, coordinación del hogar, apoyo familiar y ejecución cuidadosa, ayudamos a los clientes a moverse con mayor claridad y calma.',
		'Solanique Concierge restores time by organizing the personal, household, family, and logistical details that require trust and reliable execution.' => 'Solanique Concierge devuelve tiempo al organizar los detalles personales, domésticos, familiares y logísticos que requieren confianza y ejecución confiable.',
		'Solanique Estates protects the physical expression of success: acquisition logic, development vision, technical stewardship, and the daily operating details that keep a property ready, resilient, and refined.' => 'Solanique Estates protege la expresión física del éxito: lógica de adquisición, visión de desarrollo, gestión técnica y detalles operativos diarios que mantienen una propiedad lista, resiliente y refinada.',
		'Solanique Estates serves as a private stewardship layer for properties that require architectural vision, operational discipline, and ongoing care.' => 'Solanique Estates funciona como una capa privada de cuidado para propiedades que requieren visión arquitectónica, disciplina operativa y atención continua.',
		'Solanique Group fuses three connected disciplines so clients can move from fragmented service providers into one clear private advisory ecosystem.' => 'Solanique Group fusiona tres disciplinas conectadas para que los clientes pasen de proveedores fragmentados a un ecosistema privado de asesoría claro.',
		'Solanique Group operates at the intersection of local market intelligence and international vision, connecting high-growth Canadian corridors with bilingual cross-border advisory perspective.' => 'Solanique opera en la intersección entre inteligencia de mercado local y visión internacional, conectando corredores canadienses de alto crecimiento con perspectiva bilingüe transfronteriza.',
		'Solanique Group unites capital strategy, real estate stewardship, and private concierge into one bilingual advisory ecosystem connecting Lake Simcoe roots with global perspective.' => 'Solanique Group une estrategia de capital, cuidado inmobiliario y concierge privado en un ecosistema bilingüe de asesoría que conecta raíces en Lake Simcoe con perspectiva global.',
		'Solanique Group was built for high-achieving clients who have outgrown standard service models and need one trusted ecosystem to protect capital, property, time, and legacy.' => 'Solanique Group fue creado para clientes de alto desempeño que superaron los modelos de servicio convencionales y necesitan un ecosistema confiable para proteger capital, propiedad, tiempo y legado.',
		'Solanique Group was created to solve the fragmentation between wealth, homes, and time. The firm brings capital strategy, real estate intelligence, and private lifestyle coordination into one refined advisory experience for clients who expect transformation over transactions.' => 'Solanique Group fue creado para resolver la fragmentación entre patrimonio, hogares y tiempo. La firma integra estrategia de capital, inteligencia inmobiliaria y coordinación privada de estilo de vida en una experiencia refinada de asesoría para clientes que esperan transformación, no solo transacciones.',
		'Solanique Group works with clients who value clarity, privacy, and one trusted point of coordination. Whether the priority is capital, estates, concierge, or a combination of all three, the first step is a confidential introduction.' => 'Solanique Group trabaja con clientes que valoran claridad, privacidad y un punto confiable de coordinación. Ya sea que la prioridad sea capital, estates, concierge o una combinación de las tres, el primer paso es una introducción confidencial.',
		'Sovereign Integrity' => 'Integridad soberana',
		'Tailored planning conversations for clients seeking clarity around liquidity, leverage, acquisition paths, and cross-border capital movement.' => 'Conversaciones de planeación a medida para clientes que buscan claridad sobre liquidez, apalancamiento, rutas de adquisición y movimiento de capital transfronterizo.',
		'Tell us where your vision begins. The inquiry will be reviewed through the lens of private advisory, bilingual guidance, and the Solanique ecosystem.' => 'Cuéntenos dónde comienza su visión. La consulta será revisada desde la perspectiva de asesoría privada, guía bilingüe y el ecosistema Solanique.',
		'The Bilingual Bridge' => 'El puente bilingüe',
		'The Bridge' => 'El puente',
		'The Hub' => 'El núcleo',
		'The Orbit' => 'The Orbit',
		'The Solanique Difference' => 'La diferencia Solanique',
		'The Solanique DNA is built around strategic excellence, legacy vision, bilingual mastery, sovereign integrity, and architectural leadership.' => 'El ADN Solanique se construye alrededor de excelencia estratégica, visión de legado, dominio bilingüe, integridad soberana y liderazgo arquitectónico.',
		'The Solanique tone is empowered sophistication: precise enough for complex advisory work and human enough to protect the private world behind every decision.' => 'El tono Solanique es sofisticación con poder de acción: suficientemente preciso para asesoría compleja y suficientemente humano para proteger el mundo privado detrás de cada decisión.',
		'The Soul of the Fusion' => 'El alma de la fusión',
		'The advisory lens extends to international capital flows and global private office conversations connected to Europe and the Middle East.' => 'La mirada de asesoría se extiende a flujos internacionales de capital y conversaciones de private office conectadas con Europa y Medio Oriente.',
		'The firm exists to unify those worlds into one private standard, pairing strategic authority with human care and refined execution.' => 'La firma existe para unificar esos mundos bajo un estándar privado, combinando autoridad estratégica, cuidado humano y ejecución refinada.',
		'The first conversation is designed to understand context before proposing direction, preserving clarity before action.' => 'La primera conversación está diseñada para entender el contexto antes de proponer dirección, preservando claridad antes de actuar.',
		'The most important real estate decisions are rarely based on appearance alone. They require strategic context, technical awareness, operating discipline, and the ability to see what a property can become.' => 'Las decisiones inmobiliarias más importantes rara vez se basan solo en apariencia. Requieren contexto estratégico, conciencia técnica, disciplina operativa y la capacidad de ver lo que una propiedad puede llegar a ser.',
		'The work is designed for more than the immediate decision, building toward continuity, protection, and generational relevance.' => 'El trabajo está diseñado para ir más allá de la decisión inmediata, construyendo continuidad, protección y relevancia generacional.',
		'Thoughtful support for family priorities, child care coordination, trusted routines, and the needs of the next generation.' => 'Apoyo cuidadoso para prioridades familiares, coordinación de cuidado infantil, rutinas confiables y necesidades de la siguiente generación.',
		'Three disciplines. One integrated command.' => 'Tres disciplinas. Un comando integrado.',
		'To deliver an integrated ecosystem of capital strategy, development vision, real estate stewardship, and lifestyle mastery that empowers global visionaries with clarity, discretion, and long-term intent.' => 'Entregar un ecosistema integrado de estrategia de capital, visión de desarrollo, cuidado inmobiliario y dominio del estilo de vida que empodere a visionarios globales con claridad, discreción e intención de largo plazo.',
		'To set a trusted private standard where every property represents potential, prestige, prosperity, and legacy, connecting local roots with a borderless advisory vision.' => 'Establecer un estándar privado confiable donde cada propiedad represente potencial, prestigio, prosperidad y legado, conectando raíces locales con una visión de asesoría sin fronteras.',
		'Transactions become structured paths: acquisitions, renovations, capital conversations, and lifestyle logistics aligned around one vision.' => 'Las transacciones se convierten en caminos estructurados: adquisiciones, renovaciones, conversaciones de capital y logística de estilo de vida alineadas alrededor de una visión.',
		'Unified Ecosystem' => 'Ecosistema unificado',
		'Understanding the forces, patterns, owner priorities, and operating realities that shape long-term property value.' => 'Comprender las fuerzas, patrones, prioridades del propietario y realidades operativas que moldean el valor inmobiliario de largo plazo.',
		'Vetted Standards' => 'Estándares cuidadosamente seleccionados',
		'We connect local roots with global perspective so every property, opportunity, and private request can support a larger path toward legacy.' => 'Conectamos raíces locales con perspectiva global para que cada propiedad, oportunidad y solicitud privada pueda sostener un camino más amplio hacia el legado.',
		'We evaluate where capital, market timing, acquisition logic, and strategic positioning may work together.' => 'Evaluamos dónde el capital, el momento de mercado, la lógica de adquisición y el posicionamiento estratégico pueden trabajar juntos.',
		'We look beyond the immediate request to understand timing, preferences, residence needs, family rhythms, and future friction points.' => 'Miramos más allá de la solicitud inmediata para entender tiempos, preferencias, necesidades de residencia, ritmos familiares y futuros puntos de fricción.',
		'We organize each path with clarity around liquidity, leverage, ownership goals, and informed decision-making.' => 'Organizamos cada camino con claridad alrededor de liquidez, apalancamiento, objetivos de propiedad y decisiones informadas.',
		'We reject high-pressure noise in favor of refined intelligence, direct communication, and a standard of care that honors the client\'s goals.' => 'Rechazamos el ruido de alta presión en favor de inteligencia refinada, comunicación directa y un estándar de cuidado que honra los objetivos del cliente.',
		'When appropriate, we identify whether Solanique Capital, Estates, Concierge, or an integrated path may support the conversation.' => 'Cuando corresponde, identificamos si Solanique Capital, Estates, Concierge o una ruta integrada puede apoyar la conversación.',
		'Where Strategic Intelligence Meets Private Stewardship' => 'Donde la inteligencia estratégica se encuentra con la custodia privada',
		'Zero Friction' => 'Cero fricción',
		'Your inquiry is reviewed with discretion, attention to context, and respect for the private nature of the request.' => 'Su consulta se revisa con discreción, atención al contexto y respeto por la naturaleza privada de la solicitud.',
		'Company navigation' => 'Navegación de la firma',
		'Cross-border clients who need bilingual clarity, trusted coordination, and a refined bridge between markets.' => 'Clientes transfronterizos que necesitan claridad bilingüe, coordinación confiable y un puente refinado entre mercados.',
		'Facebook' => 'Facebook',
		'Families and stewards focused on continuity, privacy, and protecting what must endure over time.' => 'Familias y custodios enfocados en continuidad, privacidad y en proteger aquello que debe perdurar.',
		'Founders, investors, and operators seeking structure around capital, property, and the next stage of growth.' => 'Fundadores, inversionistas y operadores que buscan estructura alrededor del capital, la propiedad y la siguiente etapa de crecimiento.',
		'Instagram' => 'Instagram',
		'LinkedIn' => 'LinkedIn',
		'Service navigation' => 'Navegación de servicios',
		'Social media' => 'Redes sociales',
		'The Global Sovereign' => 'El soberano global',
		'The Global Visionary' => 'El visionario global',
		'The Legacy Guardian' => 'El guardián del legado',
		'The Self-Made Strategist' => 'El estratega self-made',
		'YouTube' => 'YouTube',
		'A clearer operating layer for residences, investment properties, landlord needs, and short-term rental support when appropriate.' => 'Una capa operativa más clara para residencias, propiedades de inversión, necesidades de propietarios y apoyo para rentas de corto plazo cuando corresponde.',
		'A disciplined advisory lens for joint venture conversations, private placements, and off-market possibilities where discretion matters.' => 'Una mirada de asesoría disciplinada para conversaciones de joint venture, colocaciones privadas y posibilidades fuera de mercado donde la discreción importa.',
		'A private framework for modernizing established operations, improving workflows, and aligning enterprise direction with future value.' => 'Un marco privado para modernizar operaciones establecidas, mejorar flujos de trabajo y alinear la dirección empresarial con valor futuro.',
		'A single point of contact reduces the burden of coordinating fragmented providers across wealth, property, and time.' => 'Un solo punto de contacto reduce la carga de coordinar proveedores fragmentados entre patrimonio, propiedad y tiempo.',
		'Bilingual English and Spanish perspective helps bridge cultures, markets, and cross-border complexity.' => 'La perspectiva bilingüe en inglés y español ayuda a conectar culturas, mercados y complejidad transfronteriza.',
		'Clients are empowered to lead their own vision with stronger structure, better information, and refined execution around them.' => 'Los clientes reciben estructura, mejor información y ejecución refinada para liderar su propia visión con mayor confianza.',
		'Coordination for private drivers, transport logistics, errands, personal schedules, and high-trust day-to-day support.' => 'Coordinación de conductores privados, logística de transporte, diligencias, agendas personales y apoyo diario de alta confianza.',
		'Coordination of essential property systems, technical maintenance, repairs, and trusted specialists before small issues become larger risks.' => 'Coordinación de sistemas esenciales de la propiedad, mantenimiento técnico, reparaciones y especialistas confiables antes de que pequeños detalles se conviertan en riesgos mayores.',
		'Discreet coordination for senior comfort, safer home transitions, companion support, and dignified daily assistance.' => 'Coordinación discreta para bienestar de adultos mayores, transiciones domésticas más seguras, acompañamiento y asistencia diaria digna.',
		'Evaluating how management, maintenance, tenant needs, seasonal demands, and lifestyle use affect the ownership experience.' => 'Evaluar cómo la gestión, el mantenimiento, las necesidades de ocupantes, las demandas estacionales y el uso de estilo de vida influyen en la experiencia de propiedad.',
		'Luxury bedroom housekeeping detail representing Solanique Concierge household coordination.' => 'Detalle de housekeeping en una habitación de lujo como referencia de la coordinación del hogar de Solanique Concierge.',
		'Private transport and household operations' => 'Transporte privado y operaciones del hogar',
		'Proactive care for cleaning, landscaping, seasonal preparation, and estate maintenance that preserves both function and presentation.' => 'Cuidado proactivo de limpieza, paisajismo, preparación estacional y mantenimiento de la propiedad que preserva función y presentación.',
		'Solanique is rooted in the high-growth Lake Simcoe and Innisfil corridor, with a focused perspective on The Orbit and Friday Harbour.' => 'Solanique tiene raíces en el corredor de alto crecimiento de Lake Simcoe e Innisfil, con una perspectiva enfocada en The Orbit y Friday Harbour.',
		'Solanique operates at the intersection of local market intelligence and international vision, connecting high-growth Canadian corridors with bilingual cross-border advisory perspective.' => 'Solanique opera en la intersección entre inteligencia de mercado local y visión internacional, conectando corredores canadienses de alto crecimiento con perspectiva bilingüe transfronteriza.',
		'Solanique was shaped by a simple observation: ambitious clients are often slowed by fragmented systems between wealth, property, and time.' => 'Solanique fue formada por una observación simple: los clientes ambiciosos suelen verse frenados por sistemas fragmentados entre patrimonio, propiedad y tiempo.',
		'Strategic Authority with a Human Heart' => 'Autoridad estratégica con corazón humano',
		'Strategic real estate acquisition, bespoke capital planning, private opportunity review, and business advisory for clients building with long-term intent.' => 'Adquisición inmobiliaria estratégica, planeación de capital a medida, revisión privada de oportunidades y asesoría empresarial para clientes que construyen con intención de largo plazo.',
		'Strategic support for founders and enterprises refining business models, launch architecture, operational direction, and growth roadmaps.' => 'Apoyo estratégico para fundadores y empresas que refinan modelos de negocio, arquitectura de lanzamiento, dirección operativa y rutas de crecimiento.',
		'The work looks beyond the next closing toward peace of mind, continuity, and outcomes that can endure over time.' => 'El trabajo mira más allá del siguiente cierre hacia tranquilidad, continuidad y resultados capaces de perdurar en el tiempo.',
		'Architectural planning documents representing development and renovation management.' => 'Planos arquitectónicos como referencia de gestión de desarrollo y renovación.',
		'Capital advisory service cards' => 'Tarjetas de servicios de asesoría de capital',
		'Capital advisory services' => 'Servicios de asesoría de capital',
		'Chauffeur opening a car door representing private transport coordination.' => 'Chofer abriendo la puerta de un automóvil como referencia de coordinación de transporte privado.',
		'Commercial property analytics representing asset and portfolio alignment.' => 'Analítica de propiedad comercial como referencia de alineación de activos y portafolio.',
		'Concierge service categories' => 'Categorías de servicios concierge',
		'Concierge service cards' => 'Tarjetas de servicios concierge',
		'Coordination for private drivers, transport logistics, arrivals, errands, and movement that needs to feel precise and calm.' => 'Coordinación de conductores privados, logística de transporte, llegadas, diligencias y movimiento que debe sentirse preciso y sereno.',
		'Corporate Venture Incubation' => 'Incubación corporativa de ventures',
		'Digital property and portfolio interface representing Solanique Group integrated advisory.' => 'Interfaz digital de propiedad y portafolio como referencia de la asesoría integrada de Solanique Group.',
		'Digital real estate investment visualization representing private opportunity review.' => 'Visualización digital de inversión inmobiliaria como referencia de revisión privada de oportunidades.',
		'Discreet coordination for comfort, safer home routines, transition support, and dignified daily assistance.' => 'Coordinación discreta para confort, rutinas domésticas más seguras, apoyo en transiciones y asistencia diaria digna.',
		'Dog grooming care representing Solanique Concierge pet stewardship.' => 'Cuidado y grooming canino como referencia de pet stewardship de Solanique Concierge.',
		'Errands, appointments, preferences, travel details, and bilingual personal coordination organized through one trusted channel.' => 'Diligencias, citas, preferencias, detalles de viaje y coordinación personal bilingüe organizados a través de un canal confiable.',
		'Estates advisory service cards' => 'Tarjetas de servicios de asesoría Estates',
		'Estates advisory services' => 'Servicios de asesoría Estates',
		'Family Care' => 'Cuidado familiar',
		'Housekeeping' => 'Housekeeping',
		'Housekeeping service preparing a bed representing household operations.' => 'Servicio de housekeeping preparando una cama como referencia de operaciones del hogar.',
		'Housekeeping, estate cleaning, residential preparation, laundry coordination, and domestic details held to a private standard.' => 'Housekeeping, limpieza de residencias, preparación del hogar, coordinación de lavandería y detalles domésticos bajo un estándar privado.',
		'Market analysis dashboard representing business and venture advisory.' => 'Panel de análisis de mercado como referencia de asesoría empresarial y de ventures.',
		'Modern home exterior lighting representing property readiness and asset protection.' => 'Iluminación exterior de una residencia moderna como referencia de preparación y protección del activo.',
		'Personal Assistance' => 'Asistencia personal',
		'Pet Stewardship' => 'Pet stewardship',
		'Pet care is treated as part of the household ecosystem: attentive, organized, and sensitive to preference.' => 'El cuidado de mascotas se trata como parte del ecosistema del hogar: atento, organizado y sensible a las preferencias.',
		'Prepared room detail representing family care coordination.' => 'Detalle de habitación preparada como referencia de coordinación de cuidado familiar.',
		'Private Path' => 'Ruta privada',
		'Private Drivers' => 'Conductores privados',
		'Private meeting environment representing real estate acquisition strategy.' => 'Entorno privado de reunión como referencia de estrategia de adquisición inmobiliaria.',
		'Private service phone coordination representing personal assistance.' => 'Coordinación telefónica de servicio privado como referencia de asistencia personal.',
		'Professional agreement moment representing business transformation planning.' => 'Momento de acuerdo profesional como referencia de planeación de transformación empresarial.',
		'Property management interface representing owner visibility and operating clarity.' => 'Interfaz de gestión inmobiliaria como referencia de visibilidad para propietarios y claridad operativa.',
		'Real estate closing documents representing capital and mortgage planning.' => 'Documentos de cierre inmobiliario como referencia de planeación de capital e hipoteca.',
		'Refined bathroom amenity detail representing comfort-focused household support.' => 'Detalle refinado de baño como referencia de apoyo doméstico enfocado en confort.',
		'Senior Support' => 'Apoyo senior',
		'Smart home systems visualization representing property infrastructure oversight.' => 'Visualización de sistemas smart home como referencia de supervisión de infraestructura de propiedad.',
		'Solanique coordinates the operational layer that makes a residence feel ready, maintained, and quietly cared for.' => 'Solanique coordina la capa operativa que hace que una residencia se sienta lista, mantenida y cuidadosamente atendida.',
		'Sovereign Investment Club' => 'Club de inversión soberano',
		'Support is organized around context, preferences, and the private rhythms that make a family environment feel considered.' => 'El apoyo se organiza alrededor del contexto, las preferencias y los ritmos privados que hacen que un entorno familiar se sienta cuidado.',
		'Luxury backyard and landscaping representing seasonal asset stewardship.' => 'Patio y paisajismo de lujo como referencia de custodia estacional de activos.',
		'The emphasis is not spectacle; it is reliable movement, timing, discretion, and confidence in the details.' => 'El énfasis no está en el espectáculo; está en movimiento confiable, tiempos precisos, discreción y confianza en los detalles.',
		'The result is time restored: fewer hand-offs, clearer communication, and personal details handled with discretion.' => 'El resultado es tiempo restaurado: menos intermediación, comunicación más clara y detalles personales manejados con discreción.',
		'The work is calm, respectful, and designed around privacy, trust, and the practical details that protect ease.' => 'El trabajo es sereno, respetuoso y diseñado alrededor de privacidad, confianza y detalles prácticos que protegen la fluidez.',
		'Thoughtful coordination for family priorities, trusted routines, household preparation, and the needs of the next generation.' => 'Coordinación cuidadosa para prioridades familiares, rutinas confiables, preparación del hogar y necesidades de la siguiente generación.',
		'Trusted coordination for grooming, care routines, travel considerations, and the small details that protect a beloved companion.' => 'Coordinación confiable para grooming, rutinas de cuidado, consideraciones de viaje y pequeños detalles que protegen a un compañero querido.',
		'Acquisition planning, business advisory, portfolio alignment, and cross-border capital conversations.' => 'Planeación de adquisición, asesoría empresarial, alineación de portafolio y conversaciones de capital transfronterizo.',
		'Capital Strategy' => 'Estrategia de capital',
		'Concierge Support' => 'Apoyo concierge',
		'Estates Advisory' => 'Asesoría Estates',
		'Lifestyle logistics, household coordination, family care, private mobility, and personal assistance.' => 'Logística de estilo de vida, coordinación del hogar, cuidado familiar, movilidad privada y asistencia personal.',
		'Modern glass building representing real estate advisory inquiry.' => 'Edificio moderno de vidrio como referencia de una consulta de asesoría inmobiliaria.',
		'Private meeting environment representing capital strategy inquiry.' => 'Entorno privado de reunión como referencia de una consulta de estrategia de capital.',
		'Private service phone coordination representing concierge inquiry.' => 'Coordinación telefónica de servicio privado como referencia de una consulta concierge.',
		'Property stewardship, development vision, management, maintenance, and long-term real estate positioning.' => 'Custodia de propiedad, visión de desarrollo, gestión, mantenimiento y posicionamiento inmobiliario de largo plazo.',
		'Estate' => 'Estate',
		'Estates' => 'Estate',
		'The Mandate' => 'The Mandate',
		'ui.theme' => 'Tema',
		'ui.theme_toggle' => 'Cambiar tema visual',
		'ui.theme_light' => 'Claro',
		'ui.theme_dark' => 'Oscuro',
	);
}

/**
 * Returns translated preview text for the active language.
 *
 * @param string $key      Stable text key or English source string.
 * @param string $fallback Optional fallback text.
 * @return string
 */
function sg_t( string $key, string $fallback = '' ): string {
	if ( ! sg_is_spanish() ) {
		return '' !== $fallback ? $fallback : $key;
	}

	$map = sg_spanish_content_map();

	return $map[ $key ] ?? ( '' !== $fallback ? $fallback : $key );
}

/**
 * Returns grouped content. The key is resolved as group.key.
 *
 * @param string $group    Content group.
 * @param string $key      Content key.
 * @param string $fallback Optional fallback text.
 * @return string
 */
function sg_content( string $group, string $key, string $fallback = '' ): string {
	$group = sanitize_key( $group );
	$key   = sanitize_key( $key );

	return sg_t( $group . '.' . $key, $fallback );
}

/**
 * Applies the preview map to existing WordPress translation calls.
 *
 * @param string $translation Translated text.
 * @param string $text        Original text.
 * @param string $domain      Text domain.
 * @return string
 */
function sg_filter_gettext( string $translation, string $text, string $domain ): string {
	if ( 'solanique' !== $domain || ! sg_is_spanish() ) {
		return $translation;
	}

	return sg_t( $text, $translation );
}
add_filter( 'gettext', 'sg_filter_gettext', 10, 3 );

/**
 * Adjusts the document language attribute for the query-param preview.
 *
 * @param string $output  Existing attributes.
 * @param string $doctype Document type.
 * @return string
 */
function sg_filter_language_attributes( string $output, string $doctype ): string {
	unset( $doctype );

	$lang = sg_current_lang();

	if ( preg_match( '/\slang="[^"]*"/', $output ) ) {
		return preg_replace( '/\slang="[^"]*"/', ' lang="' . esc_attr( $lang ) . '"', $output ) ?: $output;
	}

	return trim( $output . ' lang="' . esc_attr( $lang ) . '"' );
}
add_filter( 'language_attributes', 'sg_filter_language_attributes', 10, 2 );

/**
 * Outputs simple alternate links for the current query-param language preview.
 *
 * @return void
 */
function sg_output_language_alternates(): void {
	if ( is_admin() ) {
		return;
	}

	return;
}
