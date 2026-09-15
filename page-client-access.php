<?php
/**
 * Client Access page template.
 *
 * Template Name: Client Access
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

get_header();

get_template_part( 'template-parts/pages/client-access/hero' );
get_template_part( 'template-parts/pages/client-access/gateway' );
get_template_part( 'template-parts/pages/client-access/pathways' );

get_footer();
