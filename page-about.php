<?php
/**
 * The Mandate compatibility page template.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

get_header();

get_template_part( 'template-parts/pages/the-mandate/hero' );
get_template_part( 'template-parts/pages/the-mandate/mission-vision' );
get_template_part( 'template-parts/pages/the-mandate/dna' );
get_template_part( 'template-parts/pages/the-mandate/origin' );
get_template_part( 'template-parts/pages/the-mandate/words' );
get_template_part( 'template-parts/pages/the-mandate/pathways' );

get_footer();
