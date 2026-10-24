<?php
/**
 * Solanique Club page template.
 * Template Name: Solanique Club
 * @package Solanique
 */
defined( 'ABSPATH' ) || exit;

get_header();
get_template_part( 'template-parts/pages/solanique-club/hero' );
solanique_render_content_scene( array(
	'id' => 'club-pathways', 'modifier' => 'club-global',
	'image' => 'images/estates/commercial-real-estate-skyscrapers-financial-district.jpg',
	'speed' => '0.22', 'parts' => array( 'template-parts/pages/solanique-club/areas' ),
) );
solanique_render_current_page_editor_slot( array(
	'id' => 'sg-solanique-club-editor-content', 'modifier' => 'club',
	'label' => __( 'Additional Solanique Club content', 'solanique' ),
) );
get_template_part( 'template-parts/pages/solanique-club/pathway' );
get_footer();
