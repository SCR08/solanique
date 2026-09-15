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
		'eyebrow'  => __( 'Private ecosystem', 'solanique' ),
		'title'    => __( 'Two private areas. One standard of alignment.', 'solanique' ),
		'text'     => __( 'Solanique Club organizes network, service provider, and private capital conversations without promising access, outcomes, returns, or unapproved structures.', 'solanique' ),
		'secondary_eyebrow' => __( 'Private ecosystem', 'solanique' ),
		'secondary_title'   => __( 'JV Network and Investor Club conversations remain separated by intent.', 'solanique' ),
		'secondary_text'    => __( 'Service-provider interest can identify expertise, while investor interest remains responsible and does not imply guaranteed access or outcomes.', 'solanique' ),
		'image'    => 'images/estates/commercial-real-estate-skyscrapers-financial-district.jpg',
		'width'    => 2048,
		'height'   => 1365,
		'speed'    => '0.22',
	)
);

get_template_part( 'template-parts/pages/solanique-club/areas' );

solanique_render_pending_content_panel(
	array(
		'id'       => 'sg-solanique-club-agent-levels',
		'modifier' => 'club',
		'title'    => __( 'Agent levels pending approved client content.', 'solanique' ),
		'text'     => __( 'This structure is reserved for the approved agent-level names, descriptions, requirements, and distinctions.', 'solanique' ),
		'items'    => array(
			__( 'Agent level names', 'solanique' ),
			__( 'Approved descriptions', 'solanique' ),
			__( 'Requirements or distinctions', 'solanique' ),
			__( 'Associated broker or license disclosures if required', 'solanique' ),
		),
	)
);

solanique_render_pending_content_panel(
	array(
		'id'       => 'sg-solanique-club-partners',
		'modifier' => 'club',
		'title'    => __( 'Partner logos and descriptions pending authorization.', 'solanique' ),
		'text'     => __( 'Only client-approved logos and approved service descriptions should be published. The business-loan partner logo is intentionally withheld until authorization is confirmed.', 'solanique' ),
		'items'    => array(
			__( 'Approved partner logo files', 'solanique' ),
			__( 'Approved company names', 'solanique' ),
			__( 'Approved service descriptions', 'solanique' ),
			__( 'Business-loan partner logo authorization', 'solanique' ),
		),
	)
);

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
