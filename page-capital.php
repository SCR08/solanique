<?php
/** Capital page template. @package Solanique */
defined( 'ABSPATH' ) || exit;

get_header();
get_template_part( 'template-parts/pages/capital/hero' );
get_template_part( 'template-parts/pages/capital/services' );
solanique_render_content_scene( array(
	'id' => 'capital-philosophy', 'modifier' => 'capital-city',
	'image' => 'images/estates/london-commercial-real-estate-financial-district.jpg',
	'speed' => '0.24',
	'parts' => array( 'template-parts/pages/capital/intro', 'template-parts/pages/capital/strategy' ),
) );
get_template_part( 'template-parts/pages/capital/process' );
get_template_part( 'template-parts/pages/capital/broker-partners' );
get_template_part( 'template-parts/pages/capital/cta' );
get_footer();
