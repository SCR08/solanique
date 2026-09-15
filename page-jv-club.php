<?php
/**
 * JV Club page template.
 *
 * Template Name: JV Club
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

get_header();

get_template_part( 'template-parts/pages/jv-club/hero' );
get_template_part( 'template-parts/pages/jv-club/overview' );
get_template_part( 'template-parts/pages/jv-club/focus' );
get_template_part( 'template-parts/pages/jv-club/principles' );
get_template_part( 'template-parts/pages/jv-club/pathway' );

get_footer();
