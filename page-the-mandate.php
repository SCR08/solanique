<?php
/**
 * The Mandate page template.
 *
 * Template Name: The Mandate
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

get_header();

$solanique_mandate_copy = solanique_get_final_page_copy( 'the_mandate' );

get_template_part( 'template-parts/pages/the-mandate/hero' );
get_template_part( 'template-parts/pages/the-mandate/mission-vision' );

if ( function_exists( 'sg_render_service_video_slot' ) ) {
	sg_render_service_video_slot(
		'brand',
		array(
			'eyebrow' => __( 'Vision and luxury concept', 'solanique' ),
			'title'   => __( 'Approved brand media placement.', 'solanique' ),
			'intro'   => __( 'This placement appears only when approved brand video files are available and enabled.', 'solanique' ),
			'class'   => 'sg-video-slot--mandate',
		)
	);
}

get_template_part( 'template-parts/pages/the-mandate/origin' );
get_template_part( 'template-parts/pages/the-mandate/dna' );
get_template_part( 'template-parts/pages/the-mandate/words' );
get_template_part( 'template-parts/pages/the-mandate/pathways' );

get_footer();
