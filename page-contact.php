<?php
/**
 * Inquiry compatibility page template.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

get_header();

get_template_part( 'template-parts/pages/inquiry/hero' );
get_template_part( 'template-parts/pages/inquiry/gateway' );
get_template_part( 'template-parts/pages/inquiry/pathways' );
get_template_part( 'template-parts/pages/inquiry/access-note' );

get_footer();
