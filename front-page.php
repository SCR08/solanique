<?php
/**
 * Front page template.
 *
 * The page body is composed from template parts to keep each homepage section
 * independently maintainable.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

get_header();

$solanique_home_copy = solanique_get_final_page_copy( 'home' );

get_template_part( 'template-parts/home/hero' );
sg_render_service_video_slot( 'brand', array( 'class' => 'sg-video-slot--home' ) );
get_template_part( 'template-parts/home/manifesto' );

solanique_render_immersive_section(
	array(
		'id'       => 'sg-home-immersive-geography',
		'modifier' => 'home-global',
		'eyebrow'  => $solanique_home_copy['headline'] ?? '',
		'title'    => $solanique_home_copy['geography']['heading'] ?? '',
		'text'     => $solanique_home_copy['geography']['intro'] ?? '',
		'secondary_eyebrow' => $solanique_home_copy['headline'] ?? '',
		'secondary_title'   => $solanique_home_copy['difference']['heading'] ?? '',
		'secondary_text'    => $solanique_home_copy['difference']['intro'] ?? '',
		'image'    => 'images/estates/toronto-skyline-real-estate-investment.jpg',
		'width'    => 2048,
		'height'   => 1365,
		'speed'    => '0.22',
	)
);

get_template_part( 'template-parts/home/ecosystem' );
get_template_part( 'template-parts/home/why' );

solanique_render_immersive_section(
	array(
		'id'       => 'sg-home-immersive-experience',
		'modifier' => 'home-global',
		'eyebrow'  => $solanique_home_copy['headline'] ?? '',
		'title'    => $solanique_home_copy['experience']['heading'] ?? '',
		'text'     => $solanique_home_copy['experience']['intro'] ?? '',
		'secondary_eyebrow' => $solanique_home_copy['headline'] ?? '',
		'secondary_title'   => $solanique_home_copy['cta']['heading'] ?? '',
		'secondary_text'    => $solanique_home_copy['cta']['text'] ?? '',
		'image'    => 'images/estates/modern-office-towers-commercial-real-estate.jpg',
		'width'    => 2048,
		'height'   => 1365,
		'speed'    => '0.18',
	)
);

get_template_part( 'template-parts/home/founder' );
get_template_part( 'template-parts/home/presence' );
sg_render_service_video_slot( 'brand', array( 'placement' => 'closing', 'class' => 'sg-video-slot--home' ) );
get_template_part( 'template-parts/home/cta' );

get_footer();
