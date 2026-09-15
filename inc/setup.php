<?php
/**
 * Theme feature setup.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

/**
 * Registers core WordPress theme supports.
 *
 * @return void
 */
function solanique_setup(): void {
	add_theme_support( 'title-tag' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'navigation-widgets',
			'script',
			'search-form',
			'style',
		)
	);
	add_theme_support( 'responsive-embeds' );

	add_editor_style( 'src/css/main.css' );
}
add_action( 'after_setup_theme', 'solanique_setup' );
