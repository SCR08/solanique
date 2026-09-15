<?php
/**
 * Investor Club page template.
 *
 * Template Name: Investor Club
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

get_header();

get_template_part( 'template-parts/pages/investor-club/hero' );
get_template_part( 'template-parts/pages/investor-club/overview' );
get_template_part( 'template-parts/pages/investor-club/focus' );
get_template_part( 'template-parts/pages/investor-club/principles' );
get_template_part( 'template-parts/pages/investor-club/pathway' );

get_footer();
