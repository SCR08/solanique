<?php
/** Front page template. @package Solanique */
defined( 'ABSPATH' ) || exit;

get_header();
get_template_part( 'template-parts/home/hero' );
get_template_part( 'template-parts/home/manifesto' );
solanique_render_content_scene( array(
	'id' => 'home-geography', 'modifier' => 'home-global',
	'image' => 'images/estates/toronto-skyline-real-estate-investment.jpg',
	'speed' => '0.22', 'parts' => array( 'template-parts/home/ecosystem' ),
) );
get_template_part( 'template-parts/home/why' );
solanique_render_content_scene( array(
	'id' => 'home-experience', 'modifier' => 'home-global',
	'image' => 'images/estates/modern-office-towers-commercial-real-estate.jpg',
	'speed' => '0.18', 'parts' => array( 'template-parts/home/presence' ),
) );
get_template_part( 'template-parts/home/reviews' );
get_template_part( 'template-parts/home/cta' );
get_footer();
