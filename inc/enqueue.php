<?php
/**
 * Front-end asset loading.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

/**
 * Enqueues Solanique front-end assets.
 *
 * Assets are served from the Vite dev server when it is available. Otherwise,
 * the compiled production manifest in assets/dist is used.
 *
 * @return void
 */
function solanique_enqueue_assets(): void {
	if ( solanique_should_use_vite_dev_server() && solanique_is_vite_dev_server_running() ) {
		solanique_enqueue_development_assets();
		return;
	}

	solanique_enqueue_production_assets();
}
add_action( 'wp_enqueue_scripts', 'solanique_enqueue_assets' );

/**
 * Prints one page-specific preload hint for the visible hero/LCP image.
 *
 * @return void
 */
function solanique_preload_lcp_image(): void {
	if ( is_admin() || is_feed() || is_robots() ) {
		return;
	}

	$asset = solanique_get_current_lcp_image_asset();

	if ( '' === $asset ) {
		return;
	}

	$href = sg_asset_uri( $asset );

	if ( '' === $href ) {
		return;
	}

	$attributes = array(
		'rel'           => 'preload',
		'as'            => 'image',
		'href'          => $href,
		'imagesizes'    => '100vw',
		'fetchpriority' => 'high',
	);
	$srcset     = solanique_get_theme_asset_srcset( $asset );

	if ( '' !== $srcset ) {
		$attributes['imagesrcset'] = $srcset;
	}

	echo '<link' . solanique_get_attribute_string( $attributes ) . '>' . "\n";
}
add_action( 'wp_head', 'solanique_preload_lcp_image', 1 );

/**
 * Returns the expected hero/LCP asset for the current front-end request.
 *
 * @return string
 */
function solanique_get_current_lcp_image_asset(): string {
	if ( is_front_page() ) {
		return 'images/estates/commercial-real-estate-skyscrapers-sunlight.jpg';
	}

	if ( is_page_template( 'page-capital.php' ) || is_page( 'capital' ) ) {
		return 'images/estates/commercial-real-estate-investment-meeting.jpg';
	}

	if ( is_page_template( 'page-estates.php' ) || is_page( array( 'estate', 'estates' ) ) ) {
		return 'images/estates/luxury-real-estate-modern-glass-building.jpg';
	}

	if ( is_page_template( 'page-concierge.php' ) || is_page( 'concierge' ) ) {
		return 'images/concierge/hotel-arrival-luggage-welcome-drink-sunset.jpg';
	}

	if ( is_page_template( 'page-the-mandate.php' ) || is_page( 'the-mandate' ) ) {
		return 'images/about/illuminated-commercial-office-buildings-night.jpg';
	}

	if ( is_page_template( 'page-inquiry.php' ) || is_page( 'inquiry' ) ) {
		return 'images/concierge/hotel-reception-desk-service-bell.jpg';
	}

	if ( is_page_template( 'page-solanique-club.php' ) || is_page( 'solanique-club' ) ) {
		return 'images/estates/smart-city-real-estate-development-map.jpg';
	}

	if ( is_page_template( 'page-privacy-policy.php' ) || is_page( 'privacy-policy' ) ) {
		return 'images/backgrounds/privacy-global-globe-background.jpg';
	}

	return '';
}

/**
 * Determines whether the local Vite dev server is reachable.
 *
 * @return bool
 */
function solanique_is_vite_dev_server_running(): bool {
	static $is_running = null;

	if ( null !== $is_running ) {
		return $is_running;
	}

	$response = wp_remote_get(
		untrailingslashit( SOLANIQUE_VITE_SERVER ) . '/@vite/client',
		array(
			'redirection' => 0,
			'timeout'     => 0.2,
		)
	);

	$is_running = ! is_wp_error( $response ) && 200 === wp_remote_retrieve_response_code( $response );

	return $is_running;
}

/**
 * Enqueues source assets from the Vite dev server.
 *
 * @return void
 */
function solanique_enqueue_development_assets(): void {
	$server_url = untrailingslashit( SOLANIQUE_VITE_SERVER );

	wp_enqueue_style(
		'solanique-main',
		$server_url . '/src/css/main.css',
		array(),
		null
	);

	solanique_enqueue_script_module(
		'solanique-vite-client',
		$server_url . '/@vite/client',
		array(),
		null
	);

	solanique_enqueue_script_module(
		'solanique-app',
		$server_url . '/src/js/app.js',
		array(),
		null
	);
}

/**
 * Enqueues compiled assets from the Vite manifest.
 *
 * @return void
 */
function solanique_enqueue_production_assets(): void {
	$manifest = solanique_get_vite_manifest();

	if ( empty( $manifest ) ) {
		wp_enqueue_style( 'solanique-style', get_stylesheet_uri(), array(), SOLANIQUE_VERSION );
		return;
	}

	$style_entry = $manifest['src/css/main.css'] ?? array();
	$app_entry   = $manifest['src/js/app.js'] ?? array();

	if ( is_array( $style_entry ) && ! empty( $style_entry['file'] ) ) {
		solanique_enqueue_manifest_style( 'solanique-main', $style_entry['file'] );
	}

	if ( is_array( $app_entry ) && ! empty( $app_entry['css'] ) && is_array( $app_entry['css'] ) ) {
		foreach ( $app_entry['css'] as $index => $css_file ) {
			solanique_enqueue_manifest_style( 'solanique-app-' . absint( $index ), $css_file );
		}
	}

	if ( is_array( $app_entry ) && ! empty( $app_entry['file'] ) ) {
		solanique_enqueue_script_module(
			'solanique-app',
			solanique_get_dist_asset_uri( $app_entry['file'] ),
			array(),
			solanique_get_dist_asset_version( $app_entry['file'] )
		);
	}
}

/**
 * Reads the compiled Vite manifest.
 *
 * @return array<string, mixed>
 */
function solanique_get_vite_manifest(): array {
	static $manifest = null;

	if ( null !== $manifest ) {
		return $manifest;
	}

	$manifest_path = get_theme_file_path( trailingslashit( SOLANIQUE_DIST_DIR ) . 'manifest.json' );

	if ( ! file_exists( $manifest_path ) ) {
		$manifest = array();
		return $manifest;
	}

	$decoded = wp_json_file_decode( $manifest_path, array( 'associative' => true ) );
	$manifest = is_array( $decoded ) ? $decoded : array();

	return $manifest;
}

/**
 * Enqueues a CSS asset referenced by the Vite manifest.
 *
 * @param string $handle Stylesheet handle.
 * @param string $file   Relative file path from the dist directory.
 * @return void
 */
function solanique_enqueue_manifest_style( string $handle, string $file ): void {
	wp_enqueue_style(
		$handle,
		solanique_get_dist_asset_uri( $file ),
		array(),
		solanique_get_dist_asset_version( $file )
	);
}

/**
 * Enqueues a JavaScript ES module with native WordPress support when possible.
 *
 * @param string            $handle  Script handle or module ID.
 * @param string            $src     Script source URL.
 * @param array<int,string> $deps    Script dependencies.
 * @param string|null       $version Script version.
 * @return void
 */
function solanique_enqueue_script_module( string $handle, string $src, array $deps = array(), ?string $version = null ): void {
	if ( function_exists( 'wp_enqueue_script_module' ) ) {
		wp_enqueue_script_module( $handle, $src, $deps, $version );
		return;
	}

	wp_enqueue_script(
		$handle,
		$src,
		$deps,
		$version,
		array(
			'in_footer' => true,
		)
	);
	wp_script_add_data( $handle, 'type', 'module' );
}
