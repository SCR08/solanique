<?php
/**
 * Solanique theme bootstrap.
 *
 * This file intentionally stays small and loads feature-specific modules from
 * the inc directory.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$solanique_includes = array(
	'inc/helpers.php',
	'inc/i18n.php',
	'inc/content.php',
	'inc/partners.php',
	'inc/videos.php',
	'inc/crm.php',
	'inc/setup.php',
	'inc/menus.php',
	'inc/enqueue.php',
	'inc/seo.php',
);

foreach ( $solanique_includes as $solanique_include ) {
	require_once get_theme_file_path( $solanique_include );
}
