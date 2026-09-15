<?php
/**
 * Theme header.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$solanique_theme_mode = 'dark';
?>
<!doctype html>
<html <?php language_attributes(); ?> data-sg-theme="<?php echo esc_attr( $solanique_theme_mode ); ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'sg-body' ); ?>>
<?php wp_body_open(); ?>

<a class="sg-u--skip-link" href="#sg-main"><?php esc_html_e( 'Skip to content', 'solanique' ); ?></a>

<header class="sg-site-header" data-sg-header>
	<div class="sg-container sg-site-header__inner">
		<div class="sg-site-header__utility sg-site-header__utility--right">
			<?php echo solanique_get_illumination_toggle( 'header' ); ?>
			<?php echo solanique_get_language_selector( __( 'Change language', 'solanique' ) ); ?>
		</div>

		<div class="sg-site-header__main">
			<div class="sg-site-header__brand-wrap">
				<?php echo solanique_get_brand_link( true ); ?>
			</div>

			<button class="sg-menu-toggle" type="button" aria-controls="sg-mobile-navigation" aria-expanded="false" data-sg-menu-toggle>
				<span class="sg-u--sr-only"><?php esc_html_e( 'Open menu', 'solanique' ); ?></span>
				<span class="sg-menu-toggle__line" aria-hidden="true"></span>
				<span class="sg-menu-toggle__line" aria-hidden="true"></span>
			</button>
		</div>

		<nav class="sg-nav sg-nav--primary sg-site-header__nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'solanique' ); ?>">
			<?php solanique_render_primary_navigation( 'sg-primary-menu' ); ?>
		</nav>
	</div>

	<div id="sg-mobile-navigation" class="sg-mobile-nav" aria-hidden="true" inert data-sg-mobile-overlay>
		<div class="sg-mobile-nav__panel" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Mobile navigation', 'solanique' ); ?>" tabindex="-1" data-sg-mobile-panel>
			<div class="sg-mobile-nav__top">
				<?php echo solanique_get_brand_link( false, 'mobile' ); ?>

				<button class="sg-menu-toggle sg-menu-toggle--close" type="button" aria-controls="sg-mobile-navigation" aria-expanded="false" data-sg-menu-close>
					<span class="sg-u--sr-only"><?php esc_html_e( 'Close menu', 'solanique' ); ?></span>
					<span class="sg-menu-toggle__line" aria-hidden="true"></span>
					<span class="sg-menu-toggle__line" aria-hidden="true"></span>
				</button>
			</div>

			<nav class="sg-nav sg-nav--mobile" aria-label="<?php esc_attr_e( 'Mobile primary navigation', 'solanique' ); ?>">
				<?php solanique_render_primary_navigation( 'sg-mobile-menu' ); ?>
			</nav>

			<div class="sg-mobile-nav__footer">
				<?php echo solanique_get_illumination_toggle( 'mobile' ); ?>
				<?php echo solanique_get_language_selector( __( 'Change language', 'solanique' ) ); ?>
			</div>
		</div>
	</div>
</header>

<main id="sg-main" class="sg-main">
