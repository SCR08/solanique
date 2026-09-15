<?php
/**
 * Inquiry page template.
 *
 * Template Name: Inquiry
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

get_header();

get_template_part( 'template-parts/pages/inquiry/hero' );
get_template_part( 'template-parts/pages/inquiry/gateway' );

solanique_render_current_page_editor_slot(
	array(
		'id'       => 'sg-inquiry-editor-content',
		'modifier' => 'inquiry',
		'label'    => __( 'Additional Inquiry content', 'solanique' ),
	)
);

solanique_render_immersive_section(
	array(
		'id'       => 'sg-inquiry-immersive-private',
		'modifier' => 'inquiry-private',
		'eyebrow'  => __( 'Private gateway', 'solanique' ),
		'title'    => __( 'Registration will be handled through the approved private intake system.', 'solanique' ),
		'text'     => __( 'This section is prepared for a future GHL or approved partner integration. The theme does not collect data, create accounts, or simulate registration.', 'solanique' ),
		'secondary_eyebrow' => __( 'Private gateway', 'solanique' ),
		'secondary_title'   => __( 'Select a Solanique Pillar before the intake layer is introduced.', 'solanique' ),
		'secondary_text'    => __( 'Capital, Estate, Concierge, and Solanique Club pathways remain front-end routes until approved GHL or partner-provided forms are supplied.', 'solanique' ),
		'image'    => 'images/concierge/hotel-receptionist-phone-customer-service.jpg',
		'width'    => 2048,
		'height'   => 1365,
		'speed'    => '0.18',
	)
);

get_template_part( 'template-parts/pages/inquiry/pathways' );

if ( function_exists( 'sg_render_crm_form_slot' ) ) {
	sg_render_crm_form_slot(
		function_exists( 'sg_is_spanish' ) && sg_is_spanish() ? 'general-inquiry-es' : 'general-inquiry-en',
		array(
			'title' => __( 'General inquiry intake', 'solanique' ),
			'class' => 'sg-crm-slot--inquiry',
		)
	);
}

get_template_part( 'template-parts/pages/inquiry/integration' );
get_template_part( 'template-parts/pages/inquiry/access-note' );

get_footer();
