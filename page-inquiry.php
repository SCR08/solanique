<?php
/**
 * Inquiry page template.
 * Template Name: Inquiry
 * @package Solanique
 */
defined( 'ABSPATH' ) || exit;

get_header();
get_template_part( 'template-parts/pages/inquiry/hero' );
get_template_part( 'template-parts/pages/inquiry/gateway' );
solanique_render_content_scene( array(
	'id' => 'inquiry-pathways', 'modifier' => 'inquiry-private',
	'image' => 'images/concierge/hotel-receptionist-phone-customer-service.jpg',
	'speed' => '0.18', 'parts' => array( 'template-parts/pages/inquiry/pathways' ),
) );
solanique_render_current_page_editor_slot( array(
	'id' => 'sg-inquiry-editor-content', 'modifier' => 'inquiry',
	'label' => __( 'Additional Inquiry content', 'solanique' ),
) );
get_template_part( 'template-parts/pages/inquiry/access-note' );
get_footer();
