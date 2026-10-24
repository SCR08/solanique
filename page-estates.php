<?php
/** Estates page template. @package Solanique */
defined( 'ABSPATH' ) || exit;

get_header();
get_template_part( 'template-parts/pages/estates/hero' );
get_template_part( 'template-parts/pages/estates/advisory' );
solanique_render_content_scene( array(
	'id' => 'estate-philosophy', 'modifier' => 'estate-architecture',
	'image' => 'images/estates/luxury-home-exterior-night-lighting.jpg',
	'speed' => '0.22',
	'parts' => array( 'template-parts/pages/estates/intro', 'template-parts/pages/estates/intelligence' ),
) );
get_template_part( 'template-parts/pages/estates/process' );
get_template_part( 'template-parts/pages/estates/cta' );
get_footer();
