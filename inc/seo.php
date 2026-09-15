<?php
/**
 * Lightweight public-page SEO output.
 *
 * The theme provides only safe baseline metadata and backs off when a common
 * SEO plugin is active so dedicated SEO tools remain the source of truth.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

/**
 * Returns the public organization name used in conservative schema output.
 *
 * @return string
 */
function solanique_get_organization_name(): string {
	return (string) apply_filters( 'solanique_organization_name', __( 'Solanique Group', 'solanique' ) );
}

/**
 * Returns an exact first-sentence excerpt for metadata.
 *
 * @param string $text Source text.
 * @return string
 */
function solanique_get_exact_sentence_excerpt( string $text ): string {
	$text = trim( wp_strip_all_tags( $text ) );

	if ( preg_match( '/^.+?[.!?](?:\s|$)/u', $text, $matches ) ) {
		return trim( $matches[0] );
	}

	return $text;
}

/**
 * Returns a nested value from the final page copy.
 *
 * @param string $page Final-copy page key.
 * @param string $path Dot-notated array path.
 * @return string
 */
function solanique_get_final_copy_text_value( string $page, string $path ): string {
	if ( ! function_exists( 'solanique_get_final_page_copy' ) ) {
		return '';
	}

	$value = solanique_get_final_page_copy( $page );

	foreach ( explode( '.', $path ) as $key ) {
		if ( ! is_array( $value ) || ! array_key_exists( $key, $value ) ) {
			return '';
		}

		$value = $value[ $key ];
	}

	return is_string( $value ) ? $value : '';
}

/**
 * Returns an exact metadata excerpt from final page copy.
 *
 * @param string $page     Final-copy page key.
 * @param string $path     Dot-notated copy path.
 * @param string $fallback Fallback copy.
 * @return string
 */
function solanique_get_final_copy_meta_excerpt( string $page, string $path, string $fallback ): string {
	$text = solanique_get_final_copy_text_value( $page, $path );
	$text = '' !== $text ? $text : $fallback;

	return solanique_get_exact_sentence_excerpt( $text );
}

/**
 * Determines whether a URL belongs to a local/development host.
 *
 * @param string $url URL to inspect.
 * @return bool
 */
function solanique_is_development_url( string $url ): bool {
	$host = wp_parse_url( $url, PHP_URL_HOST );

	if ( ! is_string( $host ) || '' === $host ) {
		return false;
	}

	$host = strtolower( $host );

	if ( in_array( $host, array( 'localhost', '127.0.0.1', '::1' ), true ) ) {
		return true;
	}

	if ( str_ends_with( $host, '.local' ) || str_ends_with( $host, '.test' ) || str_ends_with( $host, '.localhost' ) ) {
		return true;
	}

	return false;
}

/**
 * Returns the public SEO configuration for the current language.
 *
 * @return array<string,array<string,mixed>>
 */
function solanique_get_public_seo_config(): array {
	$config = array(
		'home'          => array(
			'title'       => __( 'Solanique Group', 'solanique' ),
			'description' => solanique_get_final_copy_meta_excerpt( 'home', 'target.intro', __( 'The Ecosystem of Integrated Excellence.', 'solanique' ) ),
			'path'        => '/',
			'slugs'       => array(),
		),
		'capital'       => array(
			'title'       => __( 'Solanique Capital', 'solanique' ),
			'description' => solanique_get_final_copy_meta_excerpt( 'capital', 'intro', __( 'Strategic Architecture and Financial Sovereignty.', 'solanique' ) ),
			'path'        => '/capital/',
			'slugs'       => array( 'capital' ),
		),
		'estate'        => array(
			'title'       => __( 'Solanique Estate', 'solanique' ),
			'description' => solanique_get_final_copy_meta_excerpt( 'estate', 'intro', __( 'Absolute Custody and Asset Preservation.', 'solanique' ) ),
			'path'        => '/estates/',
			'slugs'       => array( 'estates', 'estate' ),
		),
		'concierge'     => array(
			'title'       => __( 'Solanique Concierge', 'solanique' ),
			'description' => solanique_get_final_copy_meta_excerpt( 'concierge', 'intro', __( 'Lifestyle Management and Time Optimization.', 'solanique' ) ),
			'path'        => '/concierge/',
			'slugs'       => array( 'concierge' ),
		),
		'the_mandate'   => array(
			'title'          => __( 'The Mandate | Solanique Group', 'solanique' ),
			'document_title' => __( 'The Mandate', 'solanique' ),
			'description'    => solanique_get_final_copy_meta_excerpt( 'the_mandate', 'mission.text', __( 'Mission and vision for Solanique Group.', 'solanique' ) ),
			'path'           => '/the-mandate/',
			'slugs'          => array( 'the-mandate', 'about' ),
		),
		'inquiry'       => array(
			'title'          => __( 'Inquiry | Solanique Group', 'solanique' ),
			'document_title' => __( 'Inquiry', 'solanique' ),
			'description'    => __( 'A discreet starting point for clients who require Capital, Estate, Concierge, or Solanique Club guidance through the right private channel.', 'solanique' ),
			'path'           => '/inquiry/',
			'slugs'          => array( 'inquiry', 'contact' ),
		),
		'solanique_club' => array(
			'title'          => __( 'Solanique Club | Solanique Group', 'solanique' ),
			'document_title' => __( 'Solanique Club', 'solanique' ),
			'description'    => __( 'A private front-end gateway for JV Network and Service Providers and Investor Club conversations.', 'solanique' ),
			'path'           => '/solanique-club/',
			'slugs'          => array( 'solanique-club' ),
		),
		'privacy_policy' => array(
			'title'          => __( 'Privacy Policy | Solanique Group', 'solanique' ),
			'document_title' => __( 'Privacy Policy', 'solanique' ),
			'description'    => __( 'Privacy Policy for the Solanique Group website, Inquiry pathways, email links, and approved CRM or partner-system integrations.', 'solanique' ),
			'path'           => '/privacy-policy/',
			'slugs'          => array( 'privacy-policy', 'privacy' ),
		),
		'terms_conditions' => array(
			'title'          => __( 'Terms & Conditions | Solanique Group', 'solanique' ),
			'document_title' => __( 'Terms & Conditions', 'solanique' ),
			'description'    => __( 'Final Terms & Conditions copy has not been supplied. This page is reserved for approved legal terms content.', 'solanique' ),
			'path'           => '/terms-conditions/',
			'slugs'          => array( 'terms-conditions', 'terms-and-conditions', 'terms', 'terms-of-use' ),
		),
	);

	return (array) apply_filters( 'solanique_public_seo_config', $config );
}

/**
 * Returns the public SEO key for the current route.
 *
 * @return string
 */
function solanique_get_current_public_seo_key(): string {
	if ( is_front_page() ) {
		return 'home';
	}

	if ( ! is_page() ) {
		return '';
	}

	$page = get_queried_object();

	if ( ! $page instanceof WP_Post ) {
		return '';
	}

	$slug    = sanitize_title( $page->post_name );
	$config  = solanique_get_public_seo_config();
	$aliases = array(
		'about'   => 'the_mandate',
		'contact' => 'inquiry',
	);

	if ( isset( $aliases[ $slug ] ) ) {
		return $aliases[ $slug ];
	}

	foreach ( $config as $key => $item ) {
		$slugs = isset( $item['slugs'] ) && is_array( $item['slugs'] ) ? $item['slugs'] : array();

		if ( in_array( $slug, $slugs, true ) ) {
			return $key;
		}
	}

	return '';
}

/**
 * Returns the canonical URL for a public page.
 *
 * @param string              $key  SEO config key.
 * @param array<string,mixed> $item SEO config item.
 * @return string
 */
function solanique_get_public_page_canonical_url( string $key, array $item ): string {
	$slugs = isset( $item['slugs'] ) && is_array( $item['slugs'] ) ? array_values( $item['slugs'] ) : array();
	$page  = null;

	foreach ( $slugs as $slug ) {
		$candidate = get_page_by_path( sanitize_title( (string) $slug ) );

		if ( $candidate instanceof WP_Post ) {
			$page = $candidate;
			break;
		}
	}

	$path = isset( $item['path'] ) && is_string( $item['path'] ) ? $item['path'] : '/';
	$url  = $page instanceof WP_Post ? get_permalink( $page ) : home_url( $path, 'https' );
	$url  = remove_query_arg( 'lang', $url );
	$url  = set_url_scheme( $url, 'https' );

	if ( solanique_is_development_url( $url ) ) {
		return '';
	}

	return (string) apply_filters( 'solanique_public_page_canonical_url', $url, $key, $item );
}

/**
 * Detects common SEO plugins to avoid duplicate theme metadata.
 *
 * @return bool
 */
function solanique_is_common_seo_plugin_active(): bool {
	$is_active = false;
	$constants = array(
		'WPSEO_VERSION',
		'RANK_MATH_VERSION',
		'AIOSEO_VERSION',
		'SEOPRESS_VERSION',
		'SLIM_SEO_VERSION',
		'THE_SEO_FRAMEWORK_VERSION',
	);

	foreach ( $constants as $constant ) {
		if ( defined( $constant ) ) {
			$is_active = true;
			break;
		}
	}

	$classes = array(
		'WPSEO_Frontend',
		'RankMath',
		'AIOSEO\\Plugin\\AIOSEO',
		'SEOPress\\Core\\Kernel',
		'The_SEO_Framework\\Load',
	);

	if ( ! $is_active ) {
		foreach ( $classes as $class ) {
			if ( class_exists( $class, false ) ) {
				$is_active = true;
				break;
			}
		}
	}

	$functions = array(
		'rank_math',
		'aioseo',
		'seopress_activation',
		'slim_seo',
	);

	if ( ! $is_active ) {
		foreach ( $functions as $function ) {
			if ( function_exists( $function ) ) {
				$is_active = true;
				break;
			}
		}
	}

	return (bool) apply_filters( 'solanique_is_common_seo_plugin_active', $is_active );
}

/**
 * Determines whether the theme should output its baseline SEO tags.
 *
 * @return bool
 */
function solanique_should_output_theme_seo(): bool {
	if ( '' === solanique_get_current_public_seo_key() ) {
		return false;
	}

	if ( (bool) apply_filters( 'solanique_disable_theme_seo', false ) ) {
		return false;
	}

	return ! solanique_is_common_seo_plugin_active();
}

/**
 * Returns a conservative service schema node for public service-like pages.
 *
 * @param string $key             SEO config key.
 * @param string $canonical_url   Canonical public URL.
 * @param string $organization_id Organization schema ID.
 * @return array<string,mixed>|null
 */
function solanique_get_public_service_schema_node( string $key, string $canonical_url, string $organization_id ): ?array {
	$services = array(
		'capital'        => array(
			'name'        => __( 'Solanique Capital', 'solanique' ),
			'serviceType' => __( 'Capital guidance', 'solanique' ),
		),
		'estate'         => array(
			'name'        => __( 'Solanique Estate', 'solanique' ),
			'serviceType' => __( 'Estate guidance', 'solanique' ),
		),
		'concierge'      => array(
			'name'        => __( 'Solanique Concierge', 'solanique' ),
			'serviceType' => __( 'Lifestyle and private service guidance', 'solanique' ),
		),
		'solanique_club' => array(
			'name'        => __( 'Solanique Club', 'solanique' ),
			'serviceType' => __( 'Private network and inquiry pathway', 'solanique' ),
		),
		'inquiry'        => array(
			'name'        => __( 'Inquiry', 'solanique' ),
			'serviceType' => __( 'Private inquiry routing', 'solanique' ),
		),
	);

	if ( empty( $services[ $key ] ) ) {
		return null;
	}

	return array(
		'@type'       => 'Service',
		'@id'         => trailingslashit( $canonical_url ) . '#service',
		'name'        => $services[ $key ]['name'],
		'serviceType' => $services[ $key ]['serviceType'],
		'provider'    => array(
			'@id' => $organization_id,
		),
		'url'         => $canonical_url,
	);
}

/**
 * Outputs safe JSON-LD graph for public pages.
 *
 * @param string              $key           SEO config key.
 * @param array<string,mixed> $item          SEO config item.
 * @param string              $canonical_url Canonical public URL.
 * @param string              $description   Page description.
 * @return void
 */
function solanique_output_public_schema( string $key, array $item, string $canonical_url, string $description ): void {
	if ( '' === $canonical_url ) {
		return;
	}

	$organization_name = solanique_get_organization_name();
	$site_url          = trailingslashit( set_url_scheme( home_url( '/' ), 'https' ) );

	if ( solanique_is_development_url( $site_url ) ) {
		return;
	}

	$organization_id = $site_url . '#organization';
	$website_id      = $site_url . '#website';
	$page_title      = isset( $item['document_title'] ) && is_string( $item['document_title'] ) ? $item['document_title'] : ( $item['title'] ?? $organization_name );
	$page_schema     = array(
		'@type'       => 'WebPage',
		'@id'         => trailingslashit( $canonical_url ) . '#webpage',
		'url'         => $canonical_url,
		'name'        => is_string( $page_title ) ? $page_title : $organization_name,
		'description' => $description,
		'isPartOf'    => array(
			'@id' => $website_id,
		),
		'about'       => array(
			'@id' => $organization_id,
		),
		'inLanguage'  => function_exists( 'solanique_get_current_language' ) ? solanique_get_current_language() : get_bloginfo( 'language' ),
	);
	$graph           = array(
		array(
			'@type'       => 'Organization',
			'@id'         => $organization_id,
			'name'        => $organization_name,
			'url'         => $site_url,
			'description' => solanique_get_final_copy_meta_excerpt( 'home', 'target.intro', __( 'The Ecosystem of Integrated Excellence.', 'solanique' ) ),
		),
		array(
			'@type'       => 'WebSite',
			'@id'         => $website_id,
			'name'        => $organization_name,
			'url'         => $site_url,
			'publisher'   => array(
				'@id' => $organization_id,
			),
			'inLanguage'  => function_exists( 'solanique_get_current_language' ) ? solanique_get_current_language() : get_bloginfo( 'language' ),
		),
		$page_schema,
	);

	$service_schema = solanique_get_public_service_schema_node( $key, $canonical_url, $organization_id );

	if ( null !== $service_schema ) {
		$graph[] = $service_schema;
	}

	$schema = array(
		'@context' => 'https://schema.org',
		'@graph'   => $graph,
	);
	$json   = wp_json_encode(
		$schema,
		JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
	);

	if ( ! is_string( $json ) || '' === $json ) {
		return;
	}

	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- wp_json_encode with JSON_HEX_* safely serializes schema data.
	echo '<script type="application/ld+json">' . $json . '</script>' . "\n";
}

/**
 * Outputs minimal metadata for public pages.
 *
 * @return void
 */
function solanique_output_public_page_seo(): void {
	if ( ! solanique_should_output_theme_seo() ) {
		return;
	}

	$key    = solanique_get_current_public_seo_key();
	$config = solanique_get_public_seo_config();

	if ( ! isset( $config[ $key ] ) || ! is_array( $config[ $key ] ) ) {
		return;
	}

	$item              = $config[ $key ];
	$organization_name = solanique_get_organization_name();
	$site_name         = get_bloginfo( 'name' );
	$title             = isset( $item['title'] ) && is_string( $item['title'] ) ? $item['title'] : $organization_name;
	$description       = isset( $item['description'] ) && is_string( $item['description'] ) ? $item['description'] : '';
	$canonical_url     = esc_url_raw( solanique_get_public_page_canonical_url( $key, $item ) );

	echo "\n" . '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
	echo '<meta property="og:type" content="website">' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
	echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
	if ( '' !== $canonical_url ) {
		echo '<link rel="canonical" href="' . esc_url( $canonical_url ) . '">' . "\n";
		echo '<meta property="og:url" content="' . esc_url( $canonical_url ) . '">' . "\n";
	}
	echo '<meta property="og:site_name" content="' . esc_attr( $site_name ?: $organization_name ) . '">' . "\n";
	echo '<meta name="twitter:card" content="summary">' . "\n";
	echo '<meta name="twitter:title" content="' . esc_attr( $title ) . '">' . "\n";
	echo '<meta name="twitter:description" content="' . esc_attr( $description ) . '">' . "\n";

	solanique_output_public_schema( $key, $item, $canonical_url, $description );
}
add_action( 'wp_head', 'solanique_output_public_page_seo', 1 );

/**
 * Adds conservative crawler guidance to virtual robots.txt output.
 *
 * @param string $output Existing robots.txt content.
 * @param bool   $public Whether the site is public according to WordPress.
 * @return string
 */
function solanique_filter_robots_txt( string $output, bool $public ): string {
	if ( ! $public ) {
		return $output;
	}

	$lines = array(
		'',
		'# Solanique public discovery guidance.',
		'User-agent: Googlebot',
		'Allow: /',
		'',
		'User-agent: Bingbot',
		'Allow: /',
		'',
		'User-agent: OAI-SearchBot',
		'Allow: /',
		'',
		'Sitemap: ' . esc_url_raw( home_url( '/wp-sitemap.xml' ) ),
	);

	return rtrim( $output ) . "\n" . implode( "\n", $lines ) . "\n";
}
add_filter( 'robots_txt', 'solanique_filter_robots_txt', 20, 2 );

/**
 * Keeps WordPress title tags aligned with public routes when no SEO plugin owns titles.
 *
 * @param array<string,string> $parts Title parts.
 * @return array<string,string>
 */
function solanique_filter_public_document_title_parts( array $parts ): array {
	if ( solanique_is_common_seo_plugin_active() ) {
		return $parts;
	}

	$key    = solanique_get_current_public_seo_key();
	$config = solanique_get_public_seo_config();

	if ( '' === $key ) {
		return $parts;
	}

	$item  = $config[ $key ];
	$title = isset( $item['document_title'] ) && is_string( $item['document_title'] ) ? $item['document_title'] : ( $item['title'] ?? '' );

	if ( ! is_string( $title ) || '' === $title ) {
		return $parts;
	}

	$parts['title'] = $title;

	return $parts;
}
add_filter( 'document_title_parts', 'solanique_filter_public_document_title_parts', 20 );
