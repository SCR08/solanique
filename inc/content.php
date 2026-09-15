<?php
/**
 * Final client-provided bilingual page copy.
 *
 * The copy in this file is sourced from the final page PDFs in
 * _references/final-copy/. Keep wording, terminology, punctuation, and CTA
 * labels aligned with those documents.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

/**
 * Returns final page copy keyed by page and language.
 *
 * @return array<string,array<string,array<string,mixed>>>
 */
function solanique_get_final_copy(): array {
	static $copy = null;

	if ( null !== $copy ) {
		return $copy;
	}

	$copy = array(
		'home'        => array(
			'es' => array(
				'brand'       => 'SOLANIQUE GROUP',
				'tagline'     => '“Una Marca Visionaria Global”',
				'headline'    => 'El Ecosistema de la Excelencia Integrada',
				'target'      => array(
					'heading' => 'Mercado Objetivo: El Visionario Global',
					'intro'   => 'Servimos a personas y familias de alto rendimiento que han superado los servicios estándar y requieren un socio a la altura de su velocidad, liderazgo y refinamiento. Nuestros clientes valoran la discreción, el rigor y la soberanía sobre su tiempo.',
					'items'   => array(
						array(
							'title' => 'El Estratega:',
							'text'  => 'Emprendedores y líderes empresariales que construyen y consolidan activos en el corredor de Simcoe y el GTA.',
						),
						array(
							'title' => 'El Soberano Global:',
							'text'  => 'Inversionistas internacionales que gestionan su capital entre Canadá, EE. UU., México y Colombia.',
						),
						array(
							'title' => 'El Guardián del Legado:',
							'text'  => 'Propietarios en destinos de prestigio como Friday Harbour o Lake Simcoe que planifican la continuidad de su patrimonio.',
						),
					),
				),
				'geography'   => array(
					'heading' => 'Geografía: Raíces Locales, Alcance Global',
					'intro'   => 'Operamos en la intersección de centros de crecimiento estratégico y flujos de capital internacional:',
					'items'   => array(
						array(
							'title' => 'El Centro (The Hub):',
							'text'  => 'Nuestro epicentro en el corredor Lake Simcoe/Innisfil, con enfoque en The Orbit y Friday Harbour.',
						),
						array(
							'title' => 'El Puente (The Bridge):',
							'text'  => 'Conexiones bilingües fluidas entre los mercados de Canadá, EE. UU., México, Colombia y el Caribe.',
						),
						array(
							'title' => 'Alcance Global:',
							'text'  => 'Enlace estratégico entre nuestras raíces locales y centros financieros en Europa y Medio Oriente.',
						),
					),
				),
				'difference'  => array(
					'heading' => 'La Diferencia Solanique: Del Silo al Mando',
					'intro'   => 'La industria inmobiliaria y financiera opera en silos, enfocada en transacciones aisladas. Solanique elimina la "fragmentación" a través de un ecosistema unificado:',
					'items'   => array(
						array(
							'title' => 'Ecosistema Único:',
							'text'  => 'Fusionamos la estrategia financiera con la gestión física de su propiedad.',
						),
						array(
							'title' => 'Fricción Cero:',
							'text'  => 'Su único punto de contacto para todo lo relacionado con su riqueza, su hogar y su tiempo.',
						),
						array(
							'title' => 'Gobernanza Bilingüe:',
							'text'  => 'Navegamos las complejidades transfronterizas con fluidez en inglés y español.',
						),
						array(
							'title' => 'Legado sobre Transacción:',
							'text'  => 'No buscamos el siguiente cierre; trabajamos para blindar la integridad de su visión.',
						),
					),
				),
				'experience'  => array(
					'heading' => 'La Experiencia Solanique',
					'intro'   => 'Ofrecemos una alianza de Mando Integrado. Usted gana más que servicios; gana la capacidad de avanzar sin distracciones.',
					'items'   => array(
						array(
							'title' => 'El Regalo del Tiempo:',
							'text'  => 'Eliminamos la carga mental de gestionar proveedores fragmentados.',
						),
						array(
							'title' => 'Transformación Estratégica:',
							'text'  => 'Convertimos activos en herramientas de valor, desde renovaciones financiadas hasta residencias de resort gestionadas.',
						),
						array(
							'title' => 'Visión Unificada:',
							'text'  => 'Capital, Estates y Concierge trabajando en perfecta sincronía.',
						),
						array(
							'title' => 'Protección Absoluta:',
							'text'  => 'Un socio dedicado a defender su legado para las generaciones venideras.',
						),
					),
				),
				'cta'         => array(
					'heading' => '¿Está listo para la soberanía?',
					'text'    => 'Solanique Group no es para todos. Es para quienes exigen una ejecución sin fricciones y una visión sin compromisos.',
					'label'   => 'ACCESO SOLANIQUE',
					'email'   => 'inquiry@solaniquegroup.com',
				),
				'final_line'  => 'Su visión, construida. Sus activos, custodiados. Su estilo de vida, dominado: transformamos su visión en un legado que perdure por generaciones.',
			),
			'en' => array(
				'brand'       => 'SOLANIQUE GROUP',
				'tagline'     => '“A Global Visionary Brand”',
				'headline'    => 'The Ecosystem of Integrated Excellence',
				'target'      => array(
					'heading' => 'Target Market: The Global Visionary',
					'intro'   => 'We serve high-performance individuals and families who have outgrown standard services and require a partner that matches their speed, leadership, and refinement. Our clients value discretion, rigor, and sovereignty over their time.',
					'items'   => array(
						array(
							'title' => 'The Strategist:',
							'text'  => 'Entrepreneurs and business leaders building and consolidating assets in the Simcoe corridor and the GTA.',
						),
						array(
							'title' => 'The Global Sovereign:',
							'text'  => 'International investors managing capital across Canada, the U.S., Mexico, and Colombia.',
						),
						array(
							'title' => 'The Legacy Guardian:',
							'text'  => 'Property owners in prestigious destinations like Friday Harbour or Lake Simcoe who are planning for the continuity of their wealth.',
						),
					),
				),
				'geography'   => array(
					'heading' => 'Geography: Local Roots, Global Reach',
					'intro'   => 'We operate at the intersection of strategic growth hubs and international capital flows:',
					'items'   => array(
						array(
							'title' => 'The Hub:',
							'text'  => 'Our epicentre in the Lake Simcoe/Innisfil corridor, with a focus on The Orbit and Friday Harbour.',
						),
						array(
							'title' => 'The Bridge:',
							'text'  => 'Fluid bilingual connections between the markets of Canada, the U.S., Mexico, Colombia, and the Caribbean.',
						),
						array(
							'title' => 'Global Reach:',
							'text'  => 'A strategic link between our local roots and financial centres in Europe and the Middle East.',
						),
					),
				),
				'difference'  => array(
					'heading' => 'The Solanique Difference: From Silo to Command',
					'intro'   => 'The real estate and financial industries operate in silos, focused on isolated transactions. Solanique eliminates "fragmentation" through a unified ecosystem:',
					'items'   => array(
						array(
							'title' => 'Unique Ecosystem:',
							'text'  => 'We fuse high-level financial strategy with the physical management of your property.',
						),
						array(
							'title' => 'Zero Friction:',
							'text'  => 'Your single point of contact for everything related to your wealth, your home, and your time.',
						),
						array(
							'title' => 'Bilingual Governance:',
							'text'  => 'We navigate cross-border complexities with fluency in English and Spanish.',
						),
						array(
							'title' => 'Legacy over Transaction:',
							'text'  => 'We do not look for the next closing; we work to defend the integrity of your vision.',
						),
					),
				),
				'experience'  => array(
					'heading' => 'The Solanique Experience',
					'intro'   => 'We offer an alliance of Integrated Command. You gain more than services; you gain the ability to move forward without distraction.',
					'items'   => array(
						array(
							'title' => 'The Gift of Time:',
							'text'  => 'We eliminate the mental load of managing fragmented service providers.',
						),
						array(
							'title' => 'Strategic Transformation:',
							'text'  => 'We turn assets into value tools, from financed renovations to fully managed resort residences.',
						),
						array(
							'title' => 'Unified Vision:',
							'text'  => 'Capital, Estates, and Concierge working in perfect synchronicity.',
						),
						array(
							'title' => 'Absolute Protection:',
							'text'  => 'A partner dedicated to defending your legacy for generations to come.',
						),
					),
				),
				'cta'         => array(
					'heading' => 'Are you ready for sovereignty?',
					'text'    => 'Solanique Group is not for everyone. It is for those who demand frictionless execution and uncompromising vision.',
					'label'   => 'SOLANIQUE ACCESS',
					'email'   => 'inquiry@solaniquegroup.com',
				),
				'final_line'  => 'Your vision, built. Your assets, guarded. Your lifestyle, mastered: we transform your vision into a legacy that lasts for generations.',
			),
		),
		'capital'     => array(
			'es' => array(
				'brand'       => 'SOLANIQUE GROUP',
				'tagline'     => '“Una Marca Visionaria Global”',
				'service'     => 'SOLANIQUE CAPITAL',
				'headline'    => 'Arquitectura Estratégica y Soberanía Financiera',
				'intro'       => 'El capital es la roca sólida sobre la cual se construyen los imperios. En Solanique, no tratamos sus activos como transacciones aisladas, sino como vehículos de alto rendimiento que exigen precisión matemática y visión de futuro. Actuamos como sus Estrategas Principales, alineando su liquidez con activos de crecimiento para blindar, optimizar y multiplicar su patrimonio.',
				'services'    => array(
					'heading' => 'Nuestro Ecosistema de Servicios',
					'items'   => array(
						array(
							'title' => 'Adquisición Inmobiliaria de Alta Precisión:',
							'text'  => 'Compras quirúrgicas basadas en métricas profundas y proyecciones macroeconómicas. Transformamos terrenos y propiedades de lujo en máquinas de patrimonio.',
						),
						array(
							'title' => 'Planificación de Capital y Soluciones Hipotecarias:',
							'text'  => 'Estructuración personalizada para perfiles de alto patrimonio neto. Optimizamos flujos transfronterizos entre Canadá, EE. UU. y Latinoamérica.',
						),
						array(
							'title' => 'The Sovereign Investment Club:',
							'text'  => 'Acceso exclusivo, por invitación, a Joint Ventures institucionales y oportunidades privadas fuera del mercado.',
						),
						array(
							'title' => 'Incubación Corporativa y Lanzamiento:',
							'text'  => 'Arquitectura legal y estratégica para nuevas firmas, diseñadas desde el origen con capacidad internacional.',
						),
						array(
							'title' => 'Transformación de Empresas Consolidadas:',
							'text'  => 'Modernización corporativa mediante auditorías de eficiencia, optimización operativa y rutas de crecimiento agresivo.',
						),
						array(
							'title' => 'Alineación Patrimonial y de Portafolio:',
							'text'  => 'Asesoría en holdings, diversificación y planificación de transición generacional para proteger su legado.',
						),
					),
				),
				'manifesto'   => array(
					'heading' => 'Manifiesto Capital: Nuestra Filosofía',
					'text'    => 'No somos una consultoría tradicional; somos un compromiso con la arquitectura de su libertad.',
				),
				'principles'  => array(
					'heading' => 'I. Principios Inmutables',
					'items'   => array(
						array(
							'title' => 'Crecimiento Estructurado:',
							'text'  => 'Anticipamos los ciclos del mercado para transitar de la especulación a la construcción de valor a largo plazo.',
						),
						array(
							'title' => 'Integridad Estratégica:',
							'text'  => 'Cada decisión es validada bajo protocolos de transparencia y eficiencia. Representamos su visión con lealtad absoluta.',
						),
						array(
							'title' => 'Sincronización Total:',
							'text'  => 'Sus estrategias fiscales, corporativas y patrimoniales evolucionan en perfecta armonía.',
						),
					),
				),
				'protocols'   => array(
					'heading' => 'II. Protocolos de Operación',
					'items'   => array(
						array(
							'title' => 'La Auditoría de Valor:',
							'text'  => 'Inspección técnica de eficiencia con acceso constante a su Informe de Salud de Capital digital.',
						),
						array(
							'title' => 'El Protocolo del Estratega:',
							'text'  => 'Nuestra red de élite (abogados, analistas, expertos) opera bajo estándares inflexibles. El rendimiento es nuestra única métrica de permanencia.',
						),
						array(
							'title' => 'Gobernanza Bilingüe:',
							'text'  => 'Transparencia total en inglés y español para todas sus estructuras legales y financieras.',
						),
					),
				),
				'cta'         => array(
					'heading' => '¿Está listo para la soberanía financiera?',
					'text'    => 'Su capital es la manifestación económica de su ambición. Permítanos defenderla.',
					'label'   => 'ACCESO CAPITAL',
					'email'   => 'capital@solaniquegroup.com',
				),
				'final_line'  => 'Su visión, construida. Sus activos, custodiados. Su estilo de vida, dominado: transformamos su visión en un legado que perdure por generaciones.',
			),
			'en' => array(
				'brand'       => 'SOLANIQUE GROUP',
				'tagline'     => '“A Global Visionary Brand”',
				'service'     => 'SOLANIQUE CAPITAL',
				'headline'    => 'Strategic Architecture and Financial Sovereignty',
				'intro'       => 'Capital is the bedrock upon which empires are built. At Solanique, we do not treat your assets as isolated transactions; we treat them as high-performance vehicles that demand mathematical precision and forward-thinking vision. We serve as your Lead Strategists, aligning your liquidity with high-growth assets and modern corporate frameworks to shield, optimize, and multiply your wealth.',
				'services'    => array(
					'heading' => 'Our Ecosystem of Services',
					'items'   => array(
						array(
							'title' => 'High-Precision Real Estate Acquisition:',
							'text'  => 'Surgical execution of property purchases based on deep market metrics and macroeconomic projections. We transform land and luxury assets into unwavering wealth-generating machines.',
						),
						array(
							'title' => 'Tailored Capital Planning and Mortgage Solutions:',
							'text'  => 'Custom financial structuring designed for high-net-worth individuals, independent strategists, and international investors. We optimize cross-border capital flows between Canada, the U.S., and Latin America, ensuring fluid liquidity and protected leverage.',
						),
						array(
							'title' => 'The Sovereign Investment Club:',
							'text'  => 'Exclusive, invitation-only access to institutional-level Joint Ventures and off-market private real estate placements. Our members move past market noise to deploy capital directly into audited, premium development projects.',
						),
						array(
							'title' => 'Corporate Incubation and Launch Advisory:',
							'text'  => 'Comprehensive structural consulting for new firms. We guide founders from initial concept to market deployment, designing legal architecture and capital-raising strategies to ensure firms are born with institutional strength.',
						),
						array(
							'title' => 'Consolidated Business Transformation:',
							'text'  => 'A high-level consulting framework designed to modernize existing corporations. We audit current models, optimize operational flows, introduce advanced digital efficiencies, and map aggressive growth paths to revitalize market positioning.',
						),
						array(
							'title' => 'High-Level Portfolio and Estate Alignment:',
							'text'  => 'Corporate strategic consulting created to seamlessly align your businesses and commercial structures with your real estate assets. We provide advice on holding companies, portfolio diversification, and legacy transition planning.',
						),
					),
				),
				'manifesto'   => array(
					'heading' => 'Capital Manifesto: Our Philosophy',
					'text'    => 'We are not a traditional consulting firm; we are a commitment to the strategic architecture of your freedom.',
				),
				'principles'  => array(
					'heading' => 'I. Immutable Principles',
					'items'   => array(
						array(
							'title' => 'Structured Growth:',
							'text'  => 'We anticipate market cycles before they manifest, moving from speculative investment to long-term value creation.',
						),
						array(
							'title' => 'Strategic Integrity:',
							'text'  => 'Every corporate, legal, or investment decision is validated under strict protocols of efficiency and transparency. We represent your vision with unwavering loyalty.',
						),
						array(
							'title' => 'Total Synchronization:',
							'text'  => 'Every capital flow is linked to the Solanique ecosystem, ensuring that corporate growth, fiscal strategies, and patrimonial legacies evolve in perfect harmony.',
						),
					),
				),
				'protocols'   => array(
					'heading' => 'II. Operating Protocols',
					'items'   => array(
						array(
							'title' => 'The Value Audit:',
							'text'  => 'Every corporate structure and portfolio undergoes a technical efficiency inspection, resulting in a Capital Health Report accessible via your private digital dashboard.',
						),
						array(
							'title' => 'The Strategist Protocol:',
							'text'  => 'We do not accept generic advisors. Our elite network—legal architects, financial analysts, and corporate structure experts—is held to inflexible performance standards. Non-compliance results in immediate removal from our ecosystem.',
						),
						array(
							'title' => 'Bilingual Governance:',
							'text'  => 'Recognizing the global nature of our clients, all legal structures, financial projections, and daily communications are provided in both English and Spanish, ensuring absolute clarity and oversight.',
						),
					),
				),
				'cta'         => array(
					'heading' => 'Are you ready for financial sovereignty?',
					'text'    => 'Your capital is the economic manifestation of your ambition. Let us defend it.',
					'label'   => 'CAPITAL ACCESS',
					'email'   => 'capital@solaniquegroup.com',
				),
				'final_line'  => 'Your vision, built. Your assets, guarded. Your lifestyle, mastered: we transform your vision into a legacy that lasts for generations.',
			),
		),
		'estate'      => array(
			'es' => array(
				'brand'       => 'SOLANIQUE GROUP',
				'tagline'     => '“Una Marca Visionaria Global”',
				'service'     => 'SOLANIQUE ESTATE',
				'headline'    => 'Custodia Absoluta y Preservación de Activos',
				'intro'       => 'Su portafolio inmobiliario es la manifestación física de su éxito, un santuario privado y una fortaleza para su legado. Las propiedades de élite exigen una custodia especializada para defender su integridad estructural y fluidez operativa. En Solanique Estates, eliminamos la fragmentación que implica la gestión de propiedades y el mantenimiento estructural, fusionando la visión arquitectónica de alto nivel con una ejecución operativa impecable.',
				'hero_cta'    => 'ACCESO ESTATE',
				'services'    => array(
					'heading' => 'Nuestro Ecosistema de Custodia',
					'items'   => array(
						array(
							'title' => 'Dirección de Obras y Renovaciones:',
							'text'  => 'Supervisión integral de transformaciones estructurales. Defendemos la integridad de su diseño, presupuesto y plazos, coordinando a los mejores especialistas de la industria.',
						),
						array(
							'title' => 'Infraestructura y Preservación Técnica:',
							'text'  => 'Mantenimiento quirúrgico de sistemas centrales (plomería, electricidad, climatización). Resolvemos desafíos técnicos antes de que se conviertan en riesgos.',
						),
						array(
							'title' => 'Gestión Integral y Portal del Propietario:',
							'text'  => 'Administración fluida de residencias premium y rentas de corto plazo (estilo luxury Airbnb). Transparencia total, cumplimiento legal y soporte administrativo, sin fricción para usted.',
						),
						array(
							'title' => 'Mantenimiento de Élite y Custodia Estacional:',
							'text'  => 'Protocolos proactivos para mantener la salud estructural y estética. Paisajismo arquitectónico, limpieza profunda y logística pesada (nieve, protección de riberas) en los corredores más exclusivos.',
						),
						array(
							'title' => 'Protección Física de Activos:',
							'text'  => 'Inspecciones continuas de propiedades vacías y auditorías de seguridad avanzada para propietarios internacionales que requieren que su santuario esté siempre en estado de perfección inmediata.',
						),
					),
				),
				'manifesto'   => array(
					'heading' => 'Manifiesto de Custodia: Nuestra Filosofía',
					'text'    => 'No vemos la propiedad como un activo comercial, sino como un legado para fortificar.',
				),
				'principles'  => array(
					'heading' => 'I. Principios Inmutables',
					'items'   => array(
						array(
							'title' => 'Preservación Proactiva:',
							'text'  => 'Anticipamos el deterioro para transitar del mantenimiento reactivo a la longevidad arquitectónica.',
						),
						array(
							'title' => 'Integridad Absoluta:',
							'text'  => 'Cada artesano y gestor es validado bajo nuestros protocolos de élite. Representamos el interés del propietario con lealtad inquebrantable.',
						),
						array(
							'title' => 'Valor Integrado:',
							'text'  => 'Vinculamos las mejoras físicas de su propiedad con la plusvalía de su capital, asegurando una sinergia perfecta con Solanique Capital.',
						),
					),
				),
				'protocols'   => array(
					'heading' => 'II. Protocolos de Operación',
					'items'   => array(
						array(
							'title' => 'La Auditoría Trimestral:',
							'text'  => 'Inspección técnica rigurosa de salud estructural, con resultados detallados en su "Informe de Salud del Activo" accesible en su panel digital privado.',
						),
						array(
							'title' => 'El Protocolo del Artesano:',
							'text'  => 'Prohibimos el uso de contratistas generales genéricos. Solo utilizamos nuestra red curada de especialistas, sujetos a estándares de desempeño inflexibles.',
						),
						array(
							'title' => 'Gobernanza Bilingüe:',
							'text'  => 'Transparencia total y supervisión absoluta en inglés y español para todas sus gestiones globales.',
						),
					),
				),
				'cta'         => array(
					'heading' => '¿Está listo para la excelencia en la custodia de su patrimonio?',
					'text'    => 'Sus activos son la manifestación física de su ambición. Permítanos protegerla.',
					'label'   => 'ACCESO ESTATE',
					'email'   => 'estates@solaniquegroup.com',
				),
				'final_line'  => 'Su visión, construida. Sus activos, custodiados. Su estilo de vida, dominado: transformamos su visión en un legado que perdure por generaciones.',
			),
			'en' => array(
				'brand'       => 'SOLANIQUE GROUP',
				'tagline'     => '“A Global Visionary Brand”',
				'service'     => 'SOLANIQUE ESTATE',
				'headline'    => 'Absolute Custody and Asset Preservation',
				'intro'       => 'Your real estate portfolio is the physical manifestation of your success—a private sanctuary and a fortress for your family. Elite properties require relentless, highly specialized custody to defend their structural integrity and operational fluidity. At Solanique Estates, we eliminate the mental fragmentation caused by property management and technical development, fusing high-level architectural vision with impeccable physical execution.',
				'services'    => array(
					'heading' => 'Our Ecosystem of Custody',
					'items'   => array(
						array(
							'title' => 'Luxury Project Management and Renovations:',
							'text'  => 'Comprehensive, end-to-end supervision of luxury builds and structural transformations. We defend your design integrity, budget, and delivery timelines by coordinating the industry\'s elite contractors.',
						),
						array(
							'title' => 'Infrastructure and Technical Preservation:',
							'text'  => 'Surgical, rapid-response maintenance to defend your property’s vital systems. We coordinate a select network of certified electricians, master plumbers, and finishing specialists to resolve complex technical challenges before they become risks.',
						),
						array(
							'title' => 'Integral Management and Owner’s Portal:',
							'text'  => 'A tech-enabled administration ecosystem for premium residences, investment properties, and vacation homes. Through our Owner’s Portal, we oversee exclusive tenant vetting, high-end lease agreements, and optimized support for luxury short-term rentals, providing total transparency without the administrative burden.',
						),
						array(
							'title' => 'Elite Maintenance and Seasonal Custody:',
							'text'  => 'Proactive and predictive maintenance protocols designed to preserve the structural health and flawless aesthetics of your assets. We coordinate specialized firms to execute deep cleaning, architectural landscaping, and heavy seasonal logistics (such as private drive snow removal, shoreline protection, and winterization) in the most exclusive corridors.',
						),
						array(
							'title' => 'Physical Asset Protection:',
							'text'  => 'Rigorous, continuous inspections of vacant properties and advanced security audits, providing international owners the peace of mind that their sanctuaries are kept in a constant state of immediate perfection.',
						),
					),
				),
				'manifesto'   => array(
					'heading' => 'Custody Manifesto: Our Philosophy',
					'text'    => 'We do not view property as a commodity to be traded, but as a legacy to be fortified.',
				),
				'principles'  => array(
					'heading' => 'I. Immutable Principles',
					'items'   => array(
						array(
							'title' => 'Proactive Preservation:',
							'text'  => 'We anticipate deterioration and market fluctuations before they manifest, moving from reactive repairs to architectural longevity.',
						),
						array(
							'title' => 'Absolute Integrity:',
							'text'  => 'Every partner, artisan, and project manager is rigorously validated under our strict protocols. We represent the owner\'s interest with total transparency and unwavering loyalty.',
						),
						array(
							'title' => 'Integrated Value:',
							'text'  => 'Every property is linked to the Solanique ecosystem, ensuring that physical improvements, fiscal strategies, and capital appreciation move in perfect synchronization.',
						),
					),
				),
				'protocols'   => array(
					'heading' => 'II. Operating Protocols',
					'items'   => array(
						array(
							'title' => 'The Quarterly Audit:',
							'text'  => 'Every property undergoes a rigorous physical and structural health inspection, resulting in an Asset Health Report accessible via your private digital dashboard.',
						),
						array(
							'title' => 'The Artisan Protocol:',
							'text'  => 'We do not accept "general" contractors. We curate an elite network of specialists. Each is held to performance standards that, if unmet, result in immediate removal from our ecosystem.',
						),
						array(
							'title' => 'Bilingual Governance:',
							'text'  => 'Recognizing the global nature of our clients, all documentation, legal records, and daily communications are provided in both English and Spanish to ensure absolute clarity and oversight.',
						),
					),
				),
				'cta'         => array(
					'heading' => 'Are you ready for excellence in patrimonial custody?',
					'text'    => 'Your assets are the physical manifestation of your ambition. Let us defend them.',
					'label'   => 'ESTATE ACCESS',
					'email'   => 'estates@solaniquegroup.com',
				),
				'final_line'  => 'Your vision, built. Your assets, guarded. Your lifestyle, mastered: we transform your vision into a legacy that lasts for generations.',
			),
		),
		'concierge'   => array(
			'es' => array(
				'brand'       => 'SOLANIQUE GROUP',
				'tagline'     => '“Una Marca Visionaria Global”',
				'service'     => 'SOLANIQUE CONCIERGE',
				'headline'    => 'Gestión de Estilo de Vida y Optimización del Tiempo',
				'intro'       => 'La divisa definitiva del visionario global no es el dinero; es el tiempo. La riqueza pierde su brillo si sus días son consumidos por la fricción de la logística doméstica, el ruido administrativo y el caos operativo diario. Solanique Concierge es un ecosistema de gestión de estilo de vida de élite diseñado para devolverle la soberanía absoluta sobre sus horas. Actuamos como el estado mayor privado de su vida personal, dominando la logística diaria y de alto nivel para que usted pueda mantenerse completamente enfocado en su macroevolución, sus empresas y su paz mental.',
				'services'    => array(
					'heading' => 'Nuestro Ecosistema de Servicios',
					'items'   => array(
						array(
							'title' => 'Cuidado Familiar y Desarrollo Infantil:',
							'text'  => 'Soluciones de cuidado infantil exclusivas y confiables bajo los estándares más estrictos de su hogar. Gestionamos personal especializado en entornos privados seguros para proteger y estimular a la próxima generación de su legado.',
						),
						array(
							'title' => 'Atención Especializada para Personas Mayores:',
							'text'  => 'Servicios de acompañamiento y gestión de transición altamente filtrados y empáticos. Protegemos la salud, dignidad y el entorno de sus seres queridos, combinando su atención con adaptaciones estratégicas en el hogar.',
						),
						array(
							'title' => 'Servicio Doméstico de Élite:',
							'text'  => 'Custodia impecable y detallada para sus residencias privadas. Orquestamos equipos especializados que mantienen su hogar en un estado constante de perfección inmediata con discreción de guante blanco.',
						),
						array(
							'title' => 'Chofer y Conductores Privados Profesionales:',
							'text'  => 'Movilidad fluida y sin fricciones a su disposición. Conductores altamente capacitados para gestionar sus trayectos diarios, traslados al aeropuerto y logística familiar con absoluta reserva y seguridad.',
						),
						array(
							'title' => 'Custodia Exclusiva para Mascotas:',
							'text'  => 'Gestión de estilo de vida integral para los compañeros más leales de la familia. Desde cuidado residencial de primer nivel y estética de lujo, hasta entrenamiento especializado y transporte veterinario con atención de cinco estrellas.',
						),
						array(
							'title' => 'Optimización del Tiempo y Asistencia Personal:',
							'text'  => 'Una oficina de estilo de vida bilingüe dedicada a resolver las infinitas variables de una vida global. Solucionamos agendas complejas y logísticas de última hora para que su día a día fluya sin un solo punto de fricción.',
						),
					),
				),
				'manifesto'   => array(
					'heading' => 'Manifiesto del Concierge: Precisión Operativa',
					'text'    => 'Operamos bajo la premisa de que el tiempo es su activo más limitado. No procesamos solicitudes; gestionamos la infraestructura de su vida.',
				),
				'principles'  => array(
					'heading' => 'I. Pilares del Comando Concierge',
					'items'   => array(
						array(
							'title' => 'Logística de Estilo de Vida:',
							'text'  => 'Supervisión total que abarca desde la orquestación de viajes internacionales y aviación privada, hasta la producción de eventos de alto nivel, ejecutados con total eficiencia bilingüe en mercados anglófonos e hispanohablantes.',
						),
						array(
							'title' => 'Preservación del Legado (Seguridad Senior):',
							'text'  => 'Evaluación e implementación profesional de sistemas de seguridad, accesibilidad y monitoreo de alta tecnología en sus residencias, garantizando la protección familiar sin comprometer la estética arquitectónica.',
						),
						array(
							'title' => 'Gestión de Activos Premium:',
							'text'  => 'Manejo bajo guante blanco, conservación, seguros y documentación de bienes muebles de alto valor (colecciones de arte, flotas de vehículos clásicos, activos de alta relojería) bajo estrictos estándares de privacidad.',
						),
					),
				),
				'protocols'   => array(
					'heading' => 'II. Protocolo del Concierge',
					'items'   => array(
						array(
							'title' => 'Directiva de "Llamada Única":',
							'text'  => 'Todas sus solicitudes se canalizan a través de un Concierge Primario asignado. Sin transferencias, sin confusión, sin fragmentación.',
						),
						array(
							'title' => 'Validación de Integridad:',
							'text'  => 'Cada proveedor de servicios (chefs, equipos de seguridad, tutores) es rigurosamente validado bajo nuestro Estándar de Integridad antes de tener acceso a su esfera privada.',
						),
						array(
							'title' => 'Soporte Predictivo:',
							'text'  => 'Al integrar los datos de Capital y Estates, nuestro equipo anticipa sus necesidades antes de que surjan (ej. preparación y mantenimiento proactivo de una residencia secundaria previo a su llegada).',
						),
					),
				),
				'cta'         => array(
					'heading' => '¿Está listo para delegar la fricción diaria?',
					'text'    => 'El control de su tiempo es la verdadera definición de la libertad. Permítanos coordinar su entorno.',
					'label'   => 'ACCESO CONCIERGE',
					'email'   => 'concierge@solaniquegroup.com',
				),
				'final_line'  => 'Su visión, construida. Sus activos, custodiados. Su estilo de vida, dominado: transformamos su visión en un legado que perdure por generaciones.',
			),
			'en' => array(
				'brand'       => 'SOLANIQUE GROUP',
				'tagline'     => '“A Global Visionary Brand”',
				'service'     => 'SOLANIQUE CONCIERGE',
				'headline'    => 'Lifestyle Management and Time Optimization',
				'intro'       => 'The ultimate currency of the global visionary is not money; it is time. Wealth loses its luster if your days are consumed by the friction of domestic logistics, administrative noise, and daily operational chaos. Solanique Concierge is an elite lifestyle management ecosystem designed to return absolute sovereignty over your hours. We act as your private personal staff, mastering the daily and high-level logistics of your environment so you can remain completely focused on your macro-evolution, your enterprises, and your peace of mind.',
				'services'    => array(
					'heading' => 'Our Ecosystem of Services',
					'items'   => array(
						array(
							'title' => 'Family Care and Next-Gen Development:',
							'text'  => 'Exclusive and trusted childcare solutions designed to the strictest standards of your home. We manage specialized professional staff and curated access to secure private environments, ensuring your children are stimulated, protected, and safe while you lead your legacy.',
						),
						array(
							'title' => 'Specialized Senior Care and Transition Management:',
							'text'  => 'Highly vetted, empathetic accompaniment and care services for senior family members. We manage their daily lifestyle support to protect their health, dignity, and environment, combining their care with strategic home adaptations for maximum well-being.',
						),
						array(
							'title' => 'Elite Domestic Staffing and Deep Residential Cleaning:',
							'text'  => 'Flawless and detailed custody for your private residences. We orchestrate specialized teams that maintain your home in a constant state of immediate perfection with white-glove discretion and absolute precision.',
						),
						array(
							'title' => 'Professional Chauffeur and Private Driver Services:',
							'text'  => 'Fluid, frictionless mobility at your disposal. We provide highly trained professional drivers to manage your daily commutes, airport transfers, and family transport logistics with punctuality, safety, and total privacy.',
						),
						array(
							'title' => 'Exclusive Custody and Luxury Pet Services:',
							'text'  => 'Comprehensive lifestyle management for the family’s most loyal companions. From premium residential care and luxury grooming to specialized training, veterinary transport, and daily attention, we ensure your pets receive a five-star standard of care.',
						),
						array(
							'title' => 'Time Optimization and Integral Personal Assistance:',
							'text'  => 'A highly responsive, bilingual lifestyle office dedicated to solving the infinite variables of a global life. Whether resolving last-minute domestic logistics, coordinating with exclusive local providers, or managing complex personal agendas, we take control of the outcome so your day flows without a single point of friction.',
						),
					),
				),
				'manifesto'   => array(
					'heading' => 'Concierge Manifesto: Operational Precision',
					'text'    => 'We operate on the premise that time is your most limited asset. We do not just process requests; we manage the infrastructure of your life.',
				),
				'principles'  => array(
					'heading' => 'I. Pillars of Concierge Command',
					'items'   => array(
						array(
							'title' => 'Lifestyle Logistics:',
							'text'  => 'Total oversight ranging from the orchestration of international travel and private aviation to the production of high-level events, executed with flawless bilingual efficiency in both English and Spanish-speaking markets.',
						),
						array(
							'title' => 'Legacy Preservation (Senior Security):',
							'text'  => 'Professional assessment and implementation of high-tech security, accessibility, and monitoring systems for your residences, ensuring family safety without compromising architectural aesthetics.',
						),
						array(
							'title' => 'Premium Asset Management:',
							'text'  => 'White-glove handling, preservation, insurance, and documentation of high-value movable assets (art collections, classic vehicle fleets, high-end horology) under the strictest privacy and security standards.',
						),
					),
				),
				'protocols'   => array(
					'heading' => 'II. Concierge Protocol',
					'items'   => array(
						array(
							'title' => '"Single Call" Directive:',
							'text'  => 'All requests are channeled through your assigned Primary Concierge. No transfers, no confusion, no fragmentation.',
						),
						array(
							'title' => 'Integrity Validation:',
							'text'  => 'Every service provider—from chefs and security teams to specialized tutors—is validated under our Standard of Integrity before gaining access to your private sphere.',
						),
						array(
							'title' => 'Predictive Support:',
							'text'  => 'By integrating data from Capital and Estates, our concierge team anticipates your needs before they arise (e.g., proactive maintenance of a secondary residence prior to your arrival).',
						),
					),
				),
				'cta'         => array(
					'heading' => 'Are you ready to delegate daily friction?',
					'text'    => 'Controlling your time is the true definition of freedom. Let us coordinate your environment.',
					'label'   => 'CONCIERGE ACCESS',
					'email'   => 'concierge@solaniquegroup.com',
				),
				'final_line'  => 'Your vision, built. Your assets, guarded. Your lifestyle, mastered: we transform your vision into a legacy that lasts for generations.',
			),
		),
		'the_mandate' => array(
			'es' => array(
				'brand'       => 'SOLANIQUE GROUP',
				'tagline'     => '“Una Marca Visionaria Global”',
				'title'       => 'THE MANDATE',
				'mission'     => array(
					'heading' => 'Misión',
					'text'    => 'Nuestra misión es ofrecer un ecosistema integrado de estrategia de capital y maestría en el estilo de vida que empodere al visionario global para Ascender. En Solanique Group, vamos más allá de la transacción para proporcionar un viaje de maestría único y unificado, fusionando la planificación experta de capital, la estrategia de desarrollo y servicios de conserjería de élite. Servimos a una comunidad global de visionarios que esperan transformación en lugar de transacciones. Cada proyecto se trata con precisión, integridad y una visión bilingüe (inglés y español) para diseñar resultados inteligentes que construyan riqueza, belleza y un legado duradero.',
				),
				'vision'      => array(
					'heading' => 'Visión',
					'text'    => 'Ser la empresa más confiable y visionaria del mundo, construyendo un legado de liderazgo, excelencia y empoderamiento. Solanique Group aspira a establecer el estándar más alto en estrategia y desarrollo inmobiliario, guiando a nuestros clientes a liderar con excelencia. Vislumbramos un mundo donde cada propiedad represente potencial, prestigio y prosperidad. Al conectar los mercados locales con una visión global y sin fronteras, lideramos con la precisión de una institución y el corazón inspirado de un socio, convirtiendo cada propiedad en un imperio y cada sueño en un legado.',
				),
				'values'      => array(
					'heading' => 'Valores Fundamentales: El ADN de Solanique',
					'items'   => array(
						array(
							'title' => 'Excelencia Estratégica (Strategic Excellence):',
							'text'  => 'Resultados impulsados por la inteligencia a través de Capital, Estates (Bienes Raíces) y Concierge (Conserjería).',
						),
						array(
							'title' => 'Visión Orientada al Legado (Legacy-Driven Vision):',
							'text'  => 'Construir para la próxima generación, no solo para el presente.',
						),
						array(
							'title' => 'Mentalidad Global / Maestría Bilingüe (Global Mindset):',
							'text'  => 'Conectar culturas y mercados a la perfección en inglés y español.',
						),
						array(
							'title' => 'Integridad Soberana (Sovereign Integrity):',
							'text'  => 'La honestidad como una forma de poder; la transparencia como un sello de refinamiento.',
						),
						array(
							'title' => 'Liderazgo Arquitectónico (Architectural Leadership):',
							'text'  => 'Empoderar a los visionarios para convertirse en los Jefes Estrategas de su propio destino.',
						),
					),
				),
				'personality' => array(
					'heading' => 'Personalidad de la Marca',
					'text'    => 'Confiable • Refinada • Estratégica • Visionaria • Excelente • Empoderadora',
				),
				'origin'      => array(
					'heading'    => 'Historia y Origen: El Alma de la Fusión',
					'paragraphs' => array(
						'Solanique no nació en una sala de juntas; se forjó en el fuego de un sueño incansable: construir una vida donde la inteligencia y la pasión avanzaran en perfecta sincronía. Mi viaje comenzó uniendo dos mundos que rara vez convergen: la realidad táctil de la construcción y la aguda inteligencia estratégica del capital global. Comprendí que mis fortalezas no eran caminos separados, sino los elementos de una imagen mucho más grande que debía ser unificada.',
						'Lo que empezó como una ambición personal pronto se convirtió en una Misión Sagrada. Fundé Solanique Group como el Ecosistema Integrado necesario para dar vida a los espacios de quienes, al escalar hacia sus cimas, se veían frenados por sistemas fragmentados. Esta marca es mi intención hecha visible: una institución donde la lógica del mundo se encuentra con la santidad de su legado privado.',
						'No creé esta marca solo para gestionar activos; la creé para proteger su Visión. Solanique existe para devolverle el mando de su tiempo y proporcionarle el rigor necesario para transformar un sueño en un legado que perdure por generaciones. Aquí, la estrategia reflexiva se funde con la ejecución elevada para que usted pueda construir mejor, vivir mejor y alcanzar lo que alguna vez sintió inalcanzable.',
						'Este es el trabajo de mi vida: defender la integridad de su Visión y comandar la obra maestra de su Legado.',
					),
				),
				'words'       => array(
					'heading' => 'Tres Palabras que Describen el Negocio',
					'items'   => array(
						array(
							'title' => 'Integridad:',
							'text'  => 'Fusionamos Capital, Estates y Concierge en un solo ecosistema continuo de alto rendimiento.',
						),
						array(
							'title' => 'Visionario:',
							'text'  => 'Reconocemos el prestigio y el potencial en cada activo y el potencial incalculable en cada persona.',
						),
						array(
							'title' => 'Legado:',
							'text'  => 'Nuestro trabajo está hecho para durar por generaciones, no solo hasta el próximo cierre de contrato.',
						),
					),
				),
				'final_line'  => 'Tu visión, construida. Tus activos, custodiados. Tu estilo de vida, dominado: transformamos tu visión en un legado que perdure por generaciones.',
			),
			'en' => array(
				'brand'       => 'Solanique Group',
				'tagline'     => '(A Global Visionary Brand)',
				'title'       => 'THE MANDATE',
				'mission'     => array(
					'heading' => 'Mission',
					'text'    => 'Our mission is to offer an integrated ecosystem of capital strategy and lifestyle mastery that empowers the global visionary to Ascend. At Solanique Group, we go beyond the transaction to provide a unique and unified journey of mastery, fusing expert capital planning, development strategy, and elite concierge services. We serve a global community of visionaries who expect transformation rather than transactions. Each project is treated with precision, integrity, and a bilingual vision (English and Spanish) to design intelligent results that build wealth, beauty, and a lasting legacy.',
				),
				'vision'      => array(
					'heading' => 'Vision',
					'text'    => 'To be the most trusted and visionary company in the world, building a legacy of leadership, excellence, and empowerment. Solanique Group aspires to set the highest standard in strategy and real estate development, guiding our clients to lead with excellence. We envision a world where every property represents potential, prestige, and prosperity. By connecting local markets with a global, borderless vision, we lead with the precision of an institution and the inspired heart of a partner, turning every property into an empire and every dream into a legacy.',
				),
				'values'      => array(
					'heading' => 'Core Values: The Solanique DNA',
					'items'   => array(
						array(
							'title' => 'Strategic Excellence:',
							'text'  => 'Results driven by intelligence through Capital, Estates, and Concierge.',
						),
						array(
							'title' => 'Legacy-Driven Vision:',
							'text'  => 'Building for the next generation, not just for the present.',
						),
						array(
							'title' => 'Global Mindset / Bilingual Mastery:',
							'text'  => 'Connecting cultures and markets seamlessly in English and Spanish.',
						),
						array(
							'title' => 'Sovereign Integrity:',
							'text'  => 'Honesty as a form of power; transparency as a hallmark of refinement.',
						),
						array(
							'title' => 'Architectural Leadership:',
							'text'  => 'Empowering visionaries to become the Chief Strategists of their own destiny.',
						),
					),
				),
				'personality' => array(
					'heading' => 'Brand Personality',
					'text'    => 'Trusted • Refined • Strategic • Visionary • Excellent • Empowering',
				),
				'origin'      => array(
					'heading'    => 'History and Origin: The Soul of the Fusion',
					'paragraphs' => array(
						'Solanique was not born in a boardroom; it was forged in the fire of an untiring dream: to build a life where intelligence and passion advance in perfect synchronicity. My journey began by uniting two worlds that rarely converge: the tactile reality of construction and the sharp strategic intelligence of global capital. I understood that my strengths were not separate paths, but elements of a much larger image that needed to be unified.',
						'What began as a personal ambition soon became a Sacred Mission. I founded Solanique Group as the Integrated Ecosystem necessary to bring to life the spaces of those who, while scaling their peaks, were held back by fragmented systems. This brand is my intention made visible: an institution where the logic of the world meets the sanctity of your private legacy.',
						'I did not create this brand just to manage assets; I created it to protect your Vision. Solanique exists to return the command of your time to you and to provide the rigor necessary to transform a dream into a legacy that lasts for generations. Here, thoughtful strategy fuses with elevated execution so that you can build better, live better, and achieve what you once felt was unattainable.',
						'This is my life’s work: to defend the integrity of your Vision and to command the masterpiece of your Legacy.',
					),
				),
				'words'       => array(
					'heading' => 'Three Words That Describe the Business',
					'items'   => array(
						array(
							'title' => 'Integrity:',
							'text'  => 'We fuse Capital, Estates, and Concierge into a single, continuous, high-performance ecosystem.',
						),
						array(
							'title' => 'Visionary:',
							'text'  => 'We recognize the prestige and potential in every asset and the incalculable potential in every person.',
						),
						array(
							'title' => 'Legacy:',
							'text'  => 'Our work is built to last for generations, not just until the next contract closing.',
						),
					),
				),
				'final_line'  => 'Your vision, built. Your assets, guarded. Your lifestyle, mastered: we transform your vision into a legacy that lasts for generations.',
			),
		),
	);

	return $copy;
}

/**
 * Returns final copy for one page in the active preview language.
 *
 * @param string $page Page key.
 * @return array<string,mixed>
 */
function solanique_get_final_page_copy( string $page ): array {
	$page  = sanitize_key( $page );
	$copy  = solanique_get_final_copy();
	$lang  = function_exists( 'sg_current_lang' ) ? sg_current_lang() : 'en';
	$lang  = isset( $copy[ $page ][ $lang ] ) ? $lang : 'en';

	return isset( $copy[ $page ][ $lang ] ) ? $copy[ $page ][ $lang ] : array();
}

/**
 * Returns a safe mailto href for a final-copy CTA email.
 *
 * @param string $email Email address.
 * @return string
 */
function solanique_get_final_mailto( string $email ): string {
	$email = sanitize_email( $email );

	return is_email( $email ) ? 'mailto:' . $email : '';
}
