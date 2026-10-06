<?php
/**
 * The Mandate page template.
 *
 * Template Name: The Mandate
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

get_header();

$solanique_mandate_copy = solanique_get_final_page_copy( 'the_mandate' );

get_template_part( 'template-parts/pages/the-mandate/hero' );
get_template_part( 'template-parts/pages/the-mandate/mission-vision' );


get_template_part( 'template-parts/pages/the-mandate/origin' );
get_template_part( 'template-parts/pages/the-mandate/dna' );
get_template_part( 'template-parts/pages/the-mandate/words' );
get_template_part( 'template-parts/pages/the-mandate/pathways' );

get_footer();
