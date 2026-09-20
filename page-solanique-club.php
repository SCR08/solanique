<?php
/**
 * Solanique Club page template.
 *
 * Template Name: Solanique Club
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

get_header();

$solanique_club_copy     = solanique_get_final_page_copy( 'solanique_club' );
$solanique_club_pathways = (array) ( $solanique_club_copy['pathways'] ?? array() );
$solanique_club_first    = $solanique_club_pathways[0] ?? array();
$solanique_club_second   = $solanique_club_pathways[1] ?? array();

get_template_part( 'template-parts/pages/solanique-club/hero' );
get_template_part( 'template-parts/pages/solanique-club/overview' );

if ( function_exists( 'sg_render_service_video_slot' ) ) {
	sg_render_service_video_slot(
		'brand',
		array(
			'eyebrow' => __( 'Network media', 'solanique' ),
			'title'   => __( 'Approved Solanique Club media placement.', 'solanique' ),
			'intro'   => __( 'This placement appears only when an approved brand or network video is available and enabled.', 'solanique' ),
			'class'   => 'sg-video-slot--club',
		)
	);
}

solanique_render_current_page_editor_slot(
	array(
		'id'       => 'sg-solanique-club-editor-content',
		'modifier' => 'club',
		'label'    => __( 'Additional Solanique Club content', 'solanique' ),
	)
);

solanique_render_immersive_section(
	array(
		'id'       => 'sg-solanique-club-immersive-network',
		'modifier' => 'club-global',
		'eyebrow'  => $solanique_club_copy['service'] ?? '',
		'title'    => $solanique_club_first['title'] ?? '',
		'text'     => $solanique_club_first['focus'] ?? '',
		'secondary_eyebrow' => $solanique_club_copy['service'] ?? '',
		'secondary_title'   => $solanique_club_second['title'] ?? '',
		'secondary_text'    => $solanique_club_second['focus'] ?? '',
		'image'    => 'images/estates/commercial-real-estate-skyscrapers-financial-district.jpg',
		'width'    => 2048,
		'height'   => 1365,
		'speed'    => '0.22',
	)
);

get_template_part( 'template-parts/pages/solanique-club/areas' );

get_template_part( 'template-parts/pages/solanique-club/pathway' );

if ( function_exists( 'sg_render_crm_form_slot' ) ) {
	sg_render_crm_form_slot(
		function_exists( 'sg_is_spanish' ) && sg_is_spanish() ? 'solanique-club-inquiry-es' : 'solanique-club-inquiry-en',
		array(
			'title' => __( 'Solanique Club intake', 'solanique' ),
			'class' => 'sg-crm-slot--club',
		)
	);
}

get_footer();
