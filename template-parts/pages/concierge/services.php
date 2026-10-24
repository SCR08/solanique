<?php
/** Concierge services, with complete descriptions. @package Solanique */
defined( 'ABSPATH' ) || exit;
get_template_part( 'template-parts/components/service-explorer', null, array(
	'page' => 'concierge', 'id' => 'sg-concierge-services',
	'links' => array( 1 => array(
		'url' => solanique_get_page_url( 'international-student-program', '/international-student-program/' ),
		'label' => sg_is_spanish() ? 'Programa de Estudiantes Internacionales' : 'Programa de Estudiantes Internacionales (Español)',
		'lang' => 'es',
	) ),
	'images' => array(
		array( 'images/concierge/hotel-room-welcome-towels-housekeeping-service.jpg', 2048, 1365 ),
		array( 'images/estates/toronto-skyline-real-estate-investment.jpg', 2048, 1365 ),
		array( 'images/concierge/modern-bathroom-amenities-towel-service.jpg', 2048, 1365 ),
		array( 'images/concierge/hotel-housekeeping-making-bed-service.jpg', 2047, 1487 ),
		array( 'images/concierge/chauffeur-opening-car-door-luxury-transport.jpg', 2048, 1365 ),
		array( 'images/concierge/dog-bathing-pet-grooming-service.jpg', 2048, 1365 ),
		array( 'images/concierge/hotel-receptionist-phone-customer-service.jpg', 2048, 1365 ),
	),
) );
