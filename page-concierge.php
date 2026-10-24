<?php
/** Concierge page template. @package Solanique */
defined( 'ABSPATH' ) || exit;

get_header();
get_template_part( 'template-parts/pages/concierge/hero' );
get_template_part( 'template-parts/pages/concierge/services' );
solanique_render_content_scene( array(
	'id' => 'concierge-philosophy', 'modifier' => 'concierge-lifestyle',
	'image' => 'images/concierge/luxury-black-car-headlights-transportation.jpg',
	'speed' => '0.2',
	'parts' => array( 'template-parts/pages/concierge/intro', 'template-parts/pages/concierge/approach' ),
) );
get_template_part( 'template-parts/pages/concierge/process' );
get_template_part( 'template-parts/pages/concierge/cta' );
get_footer();
