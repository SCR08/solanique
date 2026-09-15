<?php
/**
 * Shared helpers and theme constants.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'SOLANIQUE_VERSION' ) ) {
	$solanique_theme = wp_get_theme();

	define( 'SOLANIQUE_VERSION', $solanique_theme->get( 'Version' ) ?: '0.1.0' );
}

if ( ! defined( 'SOLANIQUE_DIST_DIR' ) ) {
	define( 'SOLANIQUE_DIST_DIR', 'assets/dist' );
}

if ( ! defined( 'SOLANIQUE_ASSET_SRC_DIR' ) ) {
	define( 'SOLANIQUE_ASSET_SRC_DIR', 'src/assets' );
}

if ( ! defined( 'SOLANIQUE_VITE_SERVER' ) ) {
	define( 'SOLANIQUE_VITE_SERVER', 'http://localhost:5173' );
}

/**
 * Determines whether Vite dev-server assets may be used.
 *
 * Production should always use assets/dist. The dev server is reserved for
 * local/development environments or explicit debug workflows.
 *
 * @return bool
 */
function solanique_should_use_vite_dev_server(): bool {
	$environment = function_exists( 'wp_get_environment_type' ) ? wp_get_environment_type() : 'production';
	$is_debug    = defined( 'WP_DEBUG' ) && WP_DEBUG;
	$allowed     = $is_debug || in_array( $environment, array( 'local', 'development' ), true );

	return (bool) apply_filters( 'solanique_use_vite_dev_server', $allowed );
}

/**
 * Returns the absolute filesystem path for a compiled dist asset.
 *
 * @param string $asset Relative asset path from the dist directory.
 * @return string
 */
function solanique_get_dist_asset_path( string $asset ): string {
	return get_theme_file_path( trailingslashit( SOLANIQUE_DIST_DIR ) . ltrim( $asset, '/' ) );
}

/**
 * Returns the public URI for a compiled dist asset.
 *
 * @param string $asset Relative asset path from the dist directory.
 * @return string
 */
function solanique_get_dist_asset_uri( string $asset ): string {
	return get_theme_file_uri( trailingslashit( SOLANIQUE_DIST_DIR ) . ltrim( $asset, '/' ) );
}

/**
 * Returns a cache-busting version for a compiled dist asset.
 *
 * @param string $asset Relative asset path from the dist directory.
 * @return string
 */
function solanique_get_dist_asset_version( string $asset ): string {
	$asset_path = solanique_get_dist_asset_path( $asset );

	if ( file_exists( $asset_path ) ) {
		return (string) filemtime( $asset_path );
	}

	return SOLANIQUE_VERSION;
}

/**
 * Returns the first available official logo asset for a display context.
 *
 * @param string $context Logo display context.
 * @return string
 */
function solanique_get_official_logo_asset( string $context = 'header' ): string {
	$asset_groups = array(
		'mobile' => array(
			'images/brand/solanique-logo-mark-gold.png',
			'images/brand/solanique-logo-compact-gold.png',
			'images/brand/solanique-logo-horizontal-gold.png',
		),
		'footer' => array(
			'images/brand/solanique-logo-horizontal-gold.png',
			'images/brand/solanique-logo-horizontal-silver.png',
		),
		'header' => array(
			'images/brand/solanique-logo-horizontal-gold.png',
			'images/brand/solanique-logo-horizontal-silver.png',
		),
	);
	$candidates   = $asset_groups[ $context ] ?? $asset_groups['header'];

	foreach ( $candidates as $asset ) {
		$path = get_theme_file_path( trailingslashit( SOLANIQUE_ASSET_SRC_DIR ) . $asset );

		if ( file_exists( $path ) ) {
			return $asset;
		}
	}

	return '';
}

/**
 * Returns accessible logo markup for a brand display context.
 *
 * @param bool   $is_priority Whether the logo should receive high fetch priority.
 * @param string $context     Logo display context.
 * @return string
 */
function solanique_get_site_logo( bool $is_priority = false, string $context = 'header' ): string {
	$site_name = get_bloginfo( 'name' );
	$context   = sanitize_html_class( $context );
	$context   = $context ?: 'header';
	$asset     = solanique_get_official_logo_asset( $context );

	if ( '' !== $asset ) {
		$args = array(
			'class'    => 'sg-brand-logo sg-brand-logo--' . $context . ' sg-site-header__logo-image',
			'width'    => 1000,
			'height'   => 1000,
			'decoding' => 'async',
		);

		if ( 'footer' === $context ) {
			$args['class'] = 'sg-brand-logo sg-brand-logo--footer sg-site-footer__logo-image';
		}

		if ( $is_priority ) {
			$args['loading']       = 'eager';
			$args['fetchpriority'] = 'high';
		}

		return sg_asset_img( $asset, __( 'Solanique Group', 'solanique' ), $args );
	}

	$logo_id   = (int) get_theme_mod( 'custom_logo' );

	if ( $logo_id ) {
		$image  = wp_get_attachment_image_src( $logo_id, 'full' );
		$srcset = wp_get_attachment_image_srcset( $logo_id, 'full' );
		$sizes  = wp_get_attachment_image_sizes( $logo_id, 'full' );
		$alt    = get_post_meta( $logo_id, '_wp_attachment_image_alt', true ) ?: $site_name;

		if ( $image ) {
			$attributes = array(
				'class'    => 'footer' === $context ? 'sg-site-footer__logo-image' : 'sg-site-header__logo-image',
				'src'      => $image[0],
				'width'    => (string) $image[1],
				'height'   => (string) $image[2],
				'alt'      => $alt,
				'decoding' => 'async',
			);

			if ( $srcset ) {
				$attributes['srcset'] = $srcset;
			}

			if ( $sizes ) {
				$attributes['sizes'] = $sizes;
			}

			if ( $is_priority ) {
				$attributes['fetchpriority'] = 'high';
			} else {
				$attributes['loading'] = 'lazy';
			}

			return '<img' . solanique_get_attribute_string( $attributes ) . '>';
		}
	}

	$text_class = 'footer' === $context ? 'sg-site-footer__logo-text' : 'sg-site-header__logo-text';

	return '<span class="' . esc_attr( $text_class ) . '">' . esc_html( $site_name ) . '</span>';
}

/**
 * Returns the reusable site brand link.
 *
 * @param bool   $is_priority Whether the logo should receive high fetch priority.
 * @param string $context     Logo display context.
 * @return string
 */
function solanique_get_brand_link( bool $is_priority = false, string $context = 'header' ): string {
	$context      = sanitize_html_class( $context );
	$context      = $context ?: 'header';
	$link_classes = 'footer' === $context ? 'sg-site-footer__brand' : 'sg-site-header__brand';

	if ( 'mobile' === $context ) {
		$link_classes .= ' sg-site-header__brand--mobile';
	}

	$attributes = array(
		'class'      => $link_classes,
		'href'       => function_exists( 'sg_localize_url' ) ? sg_localize_url( home_url( '/' ) ) : home_url( '/' ),
		'aria-label' => __( 'Solanique Group home', 'solanique' ),
	);

	return '<a' . solanique_get_attribute_string( $attributes ) . '>' . solanique_get_site_logo( $is_priority, $context ) . '</a>';
}

/**
 * Converts an associative array of attributes into an escaped HTML string.
 *
 * @param array<string,string> $attributes Attribute names and values.
 * @return string
 */
function solanique_get_attribute_string( array $attributes ): string {
	$output = '';

	foreach ( $attributes as $name => $value ) {
		$name    = sanitize_key( $name );
		$escaped = in_array( $name, array( 'action', 'href', 'src' ), true ) ? esc_url( $value ) : esc_attr( $value );
		$output .= ' ' . $name . '="' . $escaped . '"';
	}

	return $output;
}

/**
 * Returns sanitized Block Editor content for the current page when it exists.
 *
 * This keeps coded templates stable while giving selected pages a controlled
 * editable body slot through native WordPress content.
 *
 * @return string
 */
function solanique_get_current_page_editor_content(): string {
	$post_id = get_the_ID();

	if ( ! $post_id ) {
		return '';
	}

	$raw_content = get_post_field( 'post_content', $post_id );

	if ( ! is_string( $raw_content ) || '' === trim( $raw_content ) ) {
		return '';
	}

	$meaningful_content = preg_replace( '/<!--.*?-->/s', '', $raw_content );
	$meaningful_content = trim( wp_strip_all_tags( strip_shortcodes( (string) $meaningful_content ) ) );

	if ( '' === $meaningful_content ) {
		return '';
	}

	return apply_filters( 'the_content', $raw_content );
}

/**
 * Renders an optional controlled editor slot for the current page.
 *
 * The slot appears only when the WordPress page editor contains meaningful
 * content, keeping coded launch templates stable by default.
 *
 * @param array<string,mixed> $args Slot arguments.
 * @return void
 */
function solanique_render_current_page_editor_slot( array $args = array() ): void {
	$editor_content = solanique_get_current_page_editor_content();

	if ( '' === $editor_content ) {
		return;
	}

	$defaults = array(
		'id'        => '',
		'modifier'  => '',
		'label'     => __( 'Additional page content', 'solanique' ),
		'container' => 'lg',
	);
	$args     = wp_parse_args( $args, $defaults );
	$slot_id  = sanitize_html_class( (string) $args['id'] );
	$modifier = sanitize_html_class( (string) $args['modifier'] );
	$label    = (string) $args['label'];
	$size     = sanitize_html_class( (string) $args['container'] );
	$classes  = 'sg-editor-slot' . ( '' !== $modifier ? ' sg-editor-slot--' . $modifier : '' );
	$container_classes = 'sg-container' . ( '' !== $size ? ' sg-container--' . $size : '' );

	$attributes = array_filter(
		array(
			'id'         => $slot_id,
			'class'      => $classes,
			'aria-label' => $label,
		)
	);
	?>
	<section<?php echo solanique_get_attribute_string( $attributes ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Attributes are sanitized above. ?>>
		<div class="<?php echo esc_attr( $container_classes ); ?>">
			<article class="sg-editor-slot__content sg-flow">
				<?php echo wp_kses_post( $editor_content ); ?>
			</article>
		</div>
	</section>
	<?php
}

/**
 * Normalizes a theme asset path to a safe path below src/assets.
 *
 * @param string $path Relative asset path.
 * @return string
 */
function solanique_normalize_theme_asset_path( string $path ): string {
	$path          = wp_normalize_path( $path );
	$asset_src_dir = preg_quote( SOLANIQUE_ASSET_SRC_DIR, '#' );
	$path          = preg_replace( '#^/?(?:' . $asset_src_dir . '|assets)/#', '', $path );
	$path          = ltrim( (string) $path, '/' );
	$parts         = array();

	foreach ( explode( '/', $path ) as $part ) {
		if ( '' === $part || '.' === $part || '..' === $part ) {
			continue;
		}

		$parts[] = sanitize_file_name( $part );
	}

	return implode( '/', $parts );
}

/**
 * Returns a Vite manifest file path for a theme asset when one exists.
 *
 * Most theme media is copied from src/assets into assets/dist by Vite. This
 * manifest lookup keeps the helper compatible with future imported assets that
 * may receive hashed filenames.
 *
 * @param string $asset Relative asset path below src/assets.
 * @return string
 */
function solanique_get_theme_asset_manifest_file( string $asset ): string {
	if ( ! function_exists( 'solanique_get_vite_manifest' ) ) {
		return '';
	}

	$manifest = solanique_get_vite_manifest();
	$key      = trailingslashit( SOLANIQUE_ASSET_SRC_DIR ) . $asset;

	if ( isset( $manifest[ $key ]['file'] ) && is_string( $manifest[ $key ]['file'] ) ) {
		return $manifest[ $key ]['file'];
	}

	return '';
}

/**
 * Returns the public URI for a theme media asset.
 *
 * @param string $path Relative asset path below src/assets.
 * @return string
 */
function sg_asset_uri( string $path ): string {
	$asset = solanique_normalize_theme_asset_path( $path );

	if ( '' === $asset ) {
		return '';
	}

	if (
		function_exists( 'solanique_should_use_vite_dev_server' )
		&& solanique_should_use_vite_dev_server()
		&& function_exists( 'solanique_is_vite_dev_server_running' )
		&& solanique_is_vite_dev_server_running()
	) {
		return untrailingslashit( SOLANIQUE_VITE_SERVER ) . '/' . $asset;
	}

	$manifest_file = solanique_get_theme_asset_manifest_file( $asset );

	if ( '' !== $manifest_file ) {
		return solanique_get_dist_asset_uri( $manifest_file );
	}

	return solanique_get_dist_asset_uri( $asset );
}

/**
 * Returns sanitized image attributes for a theme asset img tag.
 *
 * @param array<string,mixed> $args Optional image attributes.
 * @param string              $path Relative asset path below src/assets.
 * @return array<string,string>
 */
function solanique_get_asset_img_attributes( array $args, string $path = '' ): array {
	$attributes = array(
		'loading'  => 'lazy',
		'decoding' => 'async',
	);
	$loading_values       = array( 'eager', 'lazy' );
	$decoding_values      = array( 'async', 'sync', 'auto' );
	$fetchpriority_values = array( 'high', 'low', 'auto' );

	if ( ! empty( $args['class'] ) ) {
		$attributes['class'] = (string) $args['class'];
	}

	foreach ( array( 'width', 'height' ) as $dimension ) {
		if ( ! empty( $args[ $dimension ] ) ) {
			$value = absint( $args[ $dimension ] );

			if ( $value > 0 ) {
				$attributes[ $dimension ] = (string) $value;
			}
		}
	}

	if ( ( empty( $attributes['width'] ) || empty( $attributes['height'] ) ) && '' !== $path ) {
		$dimensions = solanique_get_theme_asset_image_dimensions( $path );

		if ( empty( $attributes['width'] ) && ! empty( $dimensions['width'] ) ) {
			$attributes['width'] = (string) $dimensions['width'];
		}

		if ( empty( $attributes['height'] ) && ! empty( $dimensions['height'] ) ) {
			$attributes['height'] = (string) $dimensions['height'];
		}
	}

	if ( ! empty( $args['loading'] ) && in_array( $args['loading'], $loading_values, true ) ) {
		$attributes['loading'] = (string) $args['loading'];
	}

	if ( ! empty( $args['decoding'] ) && in_array( $args['decoding'], $decoding_values, true ) ) {
		$attributes['decoding'] = (string) $args['decoding'];
	}

	if (
		! empty( $args['fetchpriority'] ) &&
		in_array( $args['fetchpriority'], $fetchpriority_values, true )
	) {
		$attributes['fetchpriority'] = (string) $args['fetchpriority'];
	}

	if ( 'high' === ( $attributes['fetchpriority'] ?? '' ) ) {
		$attributes['loading'] = 'eager';
	} elseif ( 'lazy' === ( $attributes['loading'] ?? '' ) && empty( $attributes['fetchpriority'] ) ) {
		$attributes['fetchpriority'] = 'low';
	}

	if ( ! empty( $args['sizes'] ) ) {
		$attributes['sizes'] = (string) $args['sizes'];
	}

	if ( ! empty( $attributes['sizes'] ) && '' !== $path ) {
		$srcset = solanique_get_theme_asset_srcset( $path );

		if ( '' !== $srcset ) {
			$attributes['srcset'] = $srcset;
		}
	}

	return $attributes;
}

/**
 * Returns intrinsic dimensions for a local theme image asset when available.
 *
 * @param string $path Relative asset path below src/assets.
 * @return array{width?:int,height?:int}
 */
function solanique_get_theme_asset_image_dimensions( string $path ): array {
	static $dimensions_cache = array();

	$asset = solanique_normalize_theme_asset_path( $path );

	if ( '' === $asset ) {
		return array();
	}

	if ( isset( $dimensions_cache[ $asset ] ) ) {
		return $dimensions_cache[ $asset ];
	}

	$asset_path = get_theme_file_path( trailingslashit( SOLANIQUE_ASSET_SRC_DIR ) . $asset );

	if ( ! file_exists( $asset_path ) ) {
		$dimensions_cache[ $asset ] = array();
		return $dimensions_cache[ $asset ];
	}

	if ( function_exists( 'wp_getimagesize' ) ) {
		$size = wp_getimagesize( $asset_path );
	} else {
		$size = getimagesize( $asset_path ); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
	}

	if ( ! is_array( $size ) || empty( $size[0] ) || empty( $size[1] ) ) {
		$dimensions_cache[ $asset ] = array();
		return $dimensions_cache[ $asset ];
	}

	$dimensions_cache[ $asset ] = array(
		'width'  => absint( $size[0] ),
		'height' => absint( $size[1] ),
	);

	return $dimensions_cache[ $asset ];
}

/**
 * Returns a responsive srcset for generated sidecar variants of a theme image.
 *
 * @param string $path Relative asset path below src/assets.
 * @return string
 */
function solanique_get_theme_asset_srcset( string $path ): string {
	static $srcset_cache = array();

	$asset = solanique_normalize_theme_asset_path( $path );

	if ( '' === $asset ) {
		return '';
	}

	if ( isset( $srcset_cache[ $asset ] ) ) {
		return $srcset_cache[ $asset ];
	}

	$extension = strtolower( pathinfo( $asset, PATHINFO_EXTENSION ) );

	if ( ! in_array( $extension, array( 'jpg', 'jpeg', 'png' ), true ) ) {
		$srcset_cache[ $asset ] = '';
		return $srcset_cache[ $asset ];
	}

	$dimensions = solanique_get_theme_asset_image_dimensions( $asset );
	$width      = absint( $dimensions['width'] ?? 0 );

	if ( 0 === $width ) {
		$srcset_cache[ $asset ] = '';
		return $srcset_cache[ $asset ];
	}

	$dirname   = pathinfo( $asset, PATHINFO_DIRNAME );
	$filename  = pathinfo( $asset, PATHINFO_FILENAME );
	$prefix    = '.' === $dirname ? '' : trailingslashit( $dirname );
	$widths    = array( 640, 768, 960, 1440, 1920 );
	$sources   = array();

	foreach ( $widths as $candidate_width ) {
		if ( $candidate_width >= $width ) {
			continue;
		}

		$candidate = $prefix . $filename . '-' . $candidate_width . 'w.' . $extension;

		if ( file_exists( get_theme_file_path( trailingslashit( SOLANIQUE_ASSET_SRC_DIR ) . $candidate ) ) ) {
			$sources[] = esc_url( sg_asset_uri( $candidate ) ) . ' ' . absint( $candidate_width ) . 'w';
		}
	}

	if ( ! empty( $sources ) ) {
		$sources[] = esc_url( sg_asset_uri( $asset ) ) . ' ' . $width . 'w';
	}

	$srcset_cache[ $asset ] = count( $sources ) > 1 ? implode( ', ', $sources ) : '';

	return $srcset_cache[ $asset ];
}

/**
 * Returns a safe img tag for a theme media asset.
 *
 * Empty alt text is allowed for decorative images, but meaningful images should
 * always pass descriptive alt text.
 *
 * @param string              $path Relative asset path below src/assets.
 * @param string              $alt  Image alt text.
 * @param array<string,mixed> $args Optional image attributes.
 * @return string
 */
function sg_asset_img( string $path, string $alt = '', array $args = array() ): string {
	$src = sg_asset_uri( $path );

	if ( '' === $src ) {
		return '';
	}

	$attributes        = solanique_get_asset_img_attributes( $args, $path );
	$attributes['src'] = $src;
	$attributes['alt'] = $alt;

	return '<img' . solanique_get_attribute_string( $attributes ) . '>';
}

/**
 * Returns sanitized source attributes for a picture element.
 *
 * @param array<string,mixed> $source Picture source attributes.
 * @return array<string,string>
 */
function solanique_get_asset_source_attributes( array $source ): array {
	$attributes = array();

	if ( empty( $source['srcset'] ) ) {
		return $attributes;
	}

	$srcset = sg_asset_uri( (string) $source['srcset'] );

	if ( '' === $srcset ) {
		return $attributes;
	}

	$attributes['srcset'] = $srcset;

	foreach ( array( 'type', 'media', 'sizes' ) as $attribute ) {
		if ( ! empty( $source[ $attribute ] ) ) {
			$attributes[ $attribute ] = (string) $source[ $attribute ];
		}
	}

	foreach ( array( 'width', 'height' ) as $dimension ) {
		if ( ! empty( $source[ $dimension ] ) ) {
			$value = absint( $source[ $dimension ] );

			if ( $value > 0 ) {
				$attributes[ $dimension ] = (string) $value;
			}
		}
	}

	return $attributes;
}

/**
 * Returns a picture element for theme assets.
 *
 * @param array<int,array<string,mixed>|string> $sources Source definitions.
 * @param array<string,mixed>                   $img     Fallback image definition.
 * @return string
 */
function sg_asset_picture( array $sources, array $img ): string {
	$img_path = isset( $img['path'] ) ? (string) $img['path'] : (string) ( $img['src'] ?? '' );
	$img_alt  = isset( $img['alt'] ) ? (string) $img['alt'] : '';

	if ( '' === solanique_normalize_theme_asset_path( $img_path ) ) {
		return '';
	}

	unset( $img['path'], $img['src'], $img['alt'] );

	$output = '<picture>';

	foreach ( $sources as $source ) {
		$source     = is_array( $source ) ? $source : array( 'srcset' => $source );
		$attributes = solanique_get_asset_source_attributes( $source );

		if ( empty( $attributes ) ) {
			continue;
		}

		$output .= '<source' . solanique_get_attribute_string( $attributes ) . '>';
	}

	$output .= sg_asset_img( $img_path, $img_alt, $img );
	$output .= '</picture>';

	return $output;
}

/**
 * Renders a reusable immersive image section.
 *
 * The media is atmospheric and the section copy carries the accessible meaning.
 * Keep supplied copy exact when passing approved client text into this helper.
 *
 * @param array<string,mixed> $args Section arguments.
 * @return void
 */
function solanique_render_immersive_section( array $args ): void {
	$defaults = array(
		'id'       => '',
		'modifier' => '',
		'eyebrow'  => '',
		'title'    => '',
		'text'     => '',
		'secondary_eyebrow' => '',
		'secondary_title'   => '',
		'secondary_text'    => '',
		'image'    => '',
		'alt'      => '',
		'width'    => 2048,
		'height'   => 1365,
		'speed'    => '0.2',
	);
	$args     = wp_parse_args( $args, $defaults );
	$image    = solanique_normalize_theme_asset_path( (string) $args['image'] );

	if ( '' === $image ) {
		return;
	}

	$section_id = sanitize_html_class( (string) $args['id'] );
	$modifier   = sanitize_html_class( (string) $args['modifier'] );
	$classes    = 'sg-immersive-section sg-parallax sg-parallax-scene' . ( '' !== $modifier ? ' sg-immersive-section--' . $modifier . ' sg-parallax-scene--' . $modifier : '' );
	$title_id   = '' !== $section_id ? $section_id . '-title' : wp_unique_id( 'sg-immersive-section-title-' );
	$speed      = is_numeric( $args['speed'] ) ? (string) $args['speed'] : '0.2';
	$attributes = array(
		'class'               => $classes,
		'aria-labelledby'     => $title_id,
		'data-sg-parallax'    => 'true',
		'data-sg-parallax-scene' => 'true',
		'data-parallax-id'    => '' !== $section_id ? $section_id : $modifier,
		'data-parallax-speed' => $speed,
	);

	if ( '' !== $section_id ) {
		$attributes['id'] = $section_id;
	}
	?>
	<section<?php echo solanique_get_attribute_string( $attributes ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Attributes are sanitized above. ?>>
		<div class="sg-parallax-scene__media sg-immersive-section__media sg-parallax__media" data-sg-parallax-media aria-hidden="true">
			<?php
			echo sg_asset_img(
				$image,
				(string) $args['alt'],
				array(
					'class'  => 'sg-parallax-scene__image sg-immersive-section__image sg-parallax__image sg-img sg-img--cover',
					'width'  => absint( $args['width'] ),
					'height' => absint( $args['height'] ),
					'sizes'  => '100vw',
				)
			);
			?>
			<div class="sg-parallax-scene__overlay sg-immersive-section__overlay sg-parallax__overlay" aria-hidden="true"></div>
		</div>

		<div class="sg-parallax-scene__panels">
			<div class="sg-parallax-panel sg-parallax-panel--glass">
				<div class="sg-container sg-immersive-section__inner sg-parallax__content sg-parallax-panel__inner">
					<div class="sg-immersive-section__content sg-flow" data-sg-stagger>
						<?php if ( '' !== (string) $args['eyebrow'] ) : ?>
							<p class="sg-immersive-section__eyebrow" data-sg-reveal="fade-up"><?php echo esc_html( (string) $args['eyebrow'] ); ?></p>
						<?php endif; ?>

						<?php if ( '' !== (string) $args['title'] ) : ?>
							<h2 id="<?php echo esc_attr( $title_id ); ?>" class="sg-immersive-section__title" data-sg-reveal="fade-up"><?php echo esc_html( (string) $args['title'] ); ?></h2>
						<?php endif; ?>

						<?php if ( '' !== (string) $args['text'] ) : ?>
							<p class="sg-immersive-section__text" data-sg-reveal="fade-up"><?php echo esc_html( (string) $args['text'] ); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<div class="sg-parallax-panel sg-parallax-panel--solid" aria-hidden="true">
				<div class="sg-container sg-parallax-panel__inner">
					<span class="sg-parallax-panel__rule"></span>
				</div>
			</div>

			<?php if ( '' !== (string) $args['secondary_title'] || '' !== (string) $args['secondary_text'] ) : ?>
				<div class="sg-parallax-panel sg-parallax-panel--glass sg-parallax-panel--secondary">
					<div class="sg-container sg-immersive-section__inner sg-parallax__content sg-parallax-panel__inner">
						<div class="sg-immersive-section__content sg-flow" data-sg-stagger>
							<?php if ( '' !== (string) $args['secondary_eyebrow'] ) : ?>
								<p class="sg-immersive-section__eyebrow" data-sg-reveal="fade-up"><?php echo esc_html( (string) $args['secondary_eyebrow'] ); ?></p>
							<?php endif; ?>

							<?php if ( '' !== (string) $args['secondary_title'] ) : ?>
								<h2 class="sg-immersive-section__title" data-sg-reveal="fade-up"><?php echo esc_html( (string) $args['secondary_title'] ); ?></h2>
							<?php endif; ?>

							<?php if ( '' !== (string) $args['secondary_text'] ) : ?>
								<p class="sg-immersive-section__text" data-sg-reveal="fade-up"><?php echo esc_html( (string) $args['secondary_text'] ); ?></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
	<?php
}

/**
 * Renders a restrained pending-information panel for unsupplied client content.
 *
 * @param array<string,mixed> $args Panel arguments.
 * @return void
 */
function solanique_render_pending_content_panel( array $args ): void {
	$defaults = array(
		'id'       => '',
		'modifier' => '',
		'eyebrow'  => __( 'Pending client content', 'solanique' ),
		'title'    => __( 'Approved wording required before production.', 'solanique' ),
		'text'     => __( 'This section is reserved for client-supplied information and is intentionally not populated with invented copy.', 'solanique' ),
		'items'    => array(),
	);
	$args     = wp_parse_args( $args, $defaults );
	$panel_id = sanitize_html_class( (string) $args['id'] );
	$modifier = sanitize_html_class( (string) $args['modifier'] );
	$classes  = 'sg-pending-panel' . ( '' !== $modifier ? ' sg-pending-panel--' . $modifier : '' );
	$title_id = '' !== $panel_id ? $panel_id . '-title' : wp_unique_id( 'sg-pending-panel-title-' );
	?>
	<section<?php echo solanique_get_attribute_string( array_filter( array( 'id' => $panel_id, 'class' => $classes, 'aria-labelledby' => $title_id ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Attributes are sanitized above. ?>>
		<div class="sg-container sg-container--xl">
			<div class="sg-pending-panel__inner sg-flow" data-sg-stagger>
				<p class="sg-pending-panel__eyebrow" data-sg-reveal="fade-up"><?php echo esc_html( (string) $args['eyebrow'] ); ?></p>
				<h2 id="<?php echo esc_attr( $title_id ); ?>" class="sg-pending-panel__title" data-sg-reveal="fade-up"><?php echo esc_html( (string) $args['title'] ); ?></h2>
				<p class="sg-pending-panel__text" data-sg-reveal="fade-up"><?php echo esc_html( (string) $args['text'] ); ?></p>

				<?php if ( ! empty( $args['items'] ) && is_array( $args['items'] ) ) : ?>
					<ul class="sg-pending-panel__list" data-sg-stagger>
						<?php foreach ( $args['items'] as $item ) : ?>
							<li class="sg-pending-panel__item" data-sg-reveal="fade-up"><?php echo esc_html( (string) $item ); ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php
}

/**
 * Returns a URL for a page slug with a predictable preview fallback.
 *
 * This keeps template parts from hardcoding absolute WordPress URLs while
 * still allowing the first visual preview to link to planned destinations.
 *
 * @param string $slug          Page slug to resolve.
 * @param string $fallback_path Relative fallback path from the site root.
 * @return string
 */
function solanique_get_page_url( string $slug, string $fallback_path = '/' ): string {
	$slug          = sanitize_title( $slug );
	$fallback_path = '/' . trim( $fallback_path, '/' );
	$fallback_path = '/' === $fallback_path ? '/' : trailingslashit( $fallback_path );
	$aliases       = (array) apply_filters(
		'solanique_page_url_aliases',
		array(
			'estates' => array( 'estate' ),
		)
	);
	$candidates    = array_filter( array_merge( array( $slug ), $aliases[ $slug ] ?? array() ) );
	$page          = null;

	foreach ( $candidates as $candidate_slug ) {
		$candidate = get_page_by_path( sanitize_title( (string) $candidate_slug ) );

		if ( $candidate instanceof WP_Post ) {
			$page = $candidate;
			break;
		}
	}

	$url           = $page instanceof WP_Post ? get_permalink( $page ) : '';
	$url           = $url ?: home_url( $fallback_path );
	$url           = function_exists( 'sg_localize_url' ) ? sg_localize_url( $url ) : $url;

	return (string) apply_filters( 'solanique_page_url', $url, $slug, $fallback_path );
}

/**
 * Returns the best available URL for the Inquiry gateway.
 *
 * @return string
 */
function solanique_get_inquiry_url(): string {
	$url = solanique_get_page_url( 'inquiry', '/inquiry/' );

	return (string) apply_filters( 'solanique_inquiry_url', $url );
}

/**
 * Returns the current front-end URL.
 *
 * @return string
 */
function solanique_get_current_url(): string {
	$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '/';
	$parts       = wp_parse_url( $request_uri );

	if ( ! is_array( $parts ) ) {
		return home_url( '/' );
	}

	$path  = isset( $parts['path'] ) ? $parts['path'] : '/';
	$query = isset( $parts['query'] ) ? '?' . $parts['query'] : '';

	return esc_url_raw( home_url( $path . $query ) );
}

/**
 * Returns a language-specific URL for the current page.
 *
 * Multilingual plugins can override this URL with the solanique_language_url
 * filter while the fallback remains deterministic.
 *
 * @param string $language Language code.
 * @return string
 */
function solanique_get_language_url( string $language ): string {
	if ( function_exists( 'sg_lang_url' ) ) {
		return sg_lang_url( $language );
	}

	$language = sanitize_key( $language );
	$language = in_array( $language, array( 'en', 'es' ), true ) ? $language : 'en';
	$url      = add_query_arg( 'lang', rawurlencode( $language ), solanique_get_current_url() );

	return (string) apply_filters( 'solanique_language_url', $url, $language );
}

/**
 * Returns the active two-letter language code.
 *
 * @return string
 */
function solanique_get_current_language(): string {
	if ( function_exists( 'sg_current_lang' ) ) {
		return sg_current_lang();
	}

	$query_language = isset( $_GET['lang'] ) ? sanitize_key( wp_unslash( $_GET['lang'] ) ) : '';

	if ( in_array( $query_language, array( 'en', 'es' ), true ) ) {
		return $query_language;
	}

	$locale = determine_locale();

	return str_starts_with( $locale, 'es' ) ? 'es' : 'en';
}

/**
 * Returns the reusable language selector markup.
 *
 * @param string $aria_label Accessible label for the selector.
 * @return string
 */
function solanique_get_language_selector( string $aria_label ): string {
	$current_language = solanique_get_current_language();
	$languages        = array(
		'en' => array(
			'label' => 'EN',
			'name'  => __( 'English', 'solanique' ),
		),
		'es' => array(
			'label' => 'ES',
			'name'  => __( 'Spanish', 'solanique' ),
		),
	);
	$output           = '<nav class="sg-language" aria-label="' . esc_attr( $aria_label ) . '">';
	$output          .= '<ul class="sg-language__list">';

	if ( isset( $languages[ $current_language ] ) ) {
		$output .= solanique_get_language_selector_item( $current_language, $languages[ $current_language ]['label'], true, $languages[ $current_language ]['name'] );
	}

	foreach ( $languages as $code => $language ) {
		if ( $current_language === $code ) {
			continue;
		}

		$output .= solanique_get_language_selector_item( $code, $language['label'], false, $language['name'] );
	}

	$output .= '</ul>';
	$output .= '</nav>';

	return $output;
}

/**
 * Returns one language selector item.
 *
 * @param string $code       Language code.
 * @param string $label      Language label.
 * @param bool   $is_current Whether this item is the active language.
 * @param string $full_label Full accessible language label.
 * @return string
 */
function solanique_get_language_selector_item( string $code, string $label, bool $is_current, string $full_label = '' ): string {
	$classes    = 'sg-language__link' . ( $is_current ? ' sg-language__link--current' : ' sg-language__link--alternate' );
	$output     = '<li class="sg-language__item' . ( $is_current ? ' sg-language__item--current' : ' sg-language__item--alternate' ) . '">';
	$full_label = '' !== $full_label ? $full_label : $label;

	$output .= '<a class="' . esc_attr( $classes ) . '" href="' . esc_url( solanique_get_language_url( $code ) ) . '" hreflang="' . esc_attr( $code ) . '" aria-label="' . esc_attr( $full_label ) . '"' . ( $is_current ? ' aria-current="true"' : '' ) . '>';
	$output .= esc_html( $label );
	$output .= '</a>';
	$output .= '</li>';

	return $output;
}

/**
 * Returns the current theme mode from a safe cookie value.
 *
 * @return string
 */
function solanique_get_current_theme_mode(): string {
	return 'dark';
}

/**
 * Returns an accessible theme mode toggle.
 *
 * @param string $context Display context.
 * @return string
 */
function solanique_get_theme_toggle( string $context = 'header' ): string {
	return '';
}

/**
 * Returns an accessible illumination toggle for the dark visual system.
 *
 * This is intentionally not a light-mode switch. It only enables a brighter
 * dark treatment for overlays, surfaces, and metallic accents.
 *
 * @param string $context Display context.
 * @return string
 */
function solanique_get_illumination_toggle( string $context = 'header' ): string {
	$context = sanitize_html_class( $context );
	$context = $context ?: 'header';
	$label   = __( 'Increase visual illumination', 'solanique' );

	$attributes = array(
		'class'                      => 'sg-illumination-toggle sg-illumination-toggle--' . $context,
		'type'                       => 'button',
		'aria-label'                 => $label,
		'aria-pressed'               => 'false',
		'data-sg-illumination-toggle' => $context,
		'data-sg-illumination-label' => $label,
		'data-sg-illumination-on-label' => __( 'Reduce visual illumination', 'solanique' ),
		'data-sg-illumination-off-label' => $label,
	);

	return '<button' . solanique_get_attribute_string( $attributes ) . '>'
		. '<svg class="sg-illumination-toggle__icon" aria-hidden="true" viewBox="0 0 24 24" focusable="false">'
		. '<circle cx="12" cy="12" r="4.25"></circle>'
		. '<path d="M12 2.75v2.1M12 19.15v2.1M4.42 4.42l1.48 1.48M18.1 18.1l1.48 1.48M2.75 12h2.1M19.15 12h2.1M4.42 19.58l1.48-1.48M18.1 5.9l1.48-1.48"></path>'
		. '</svg>'
		. '<span class="sg-u--sr-only" data-sg-illumination-text>' . esc_html( $label ) . '</span>'
		. '</button>';
}

/**
 * Returns configured legal footer links when matching WordPress pages exist.
 *
 * @return array<int,array{label:string,url:string}>
 */
function solanique_get_footer_legal_links(): array {
	$pages = array(
		'privacy-policy' => array(
			'label'   => __( 'Privacy Policy', 'solanique' ),
			'aliases' => array( 'privacy' ),
		),
		'terms-conditions' => array(
			'label'   => __( 'Terms & Conditions', 'solanique' ),
			'aliases' => array( 'terms-and-conditions', 'terms', 'terms-of-use' ),
		),
	);
	$links = array();

	foreach ( $pages as $slug => $config ) {
		$candidates = array_merge( array( $slug ), (array) $config['aliases'] );
		$page       = null;

		foreach ( $candidates as $candidate_slug ) {
			$candidate = get_page_by_path( sanitize_title( (string) $candidate_slug ) );

			if ( $candidate instanceof WP_Post ) {
				$page = $candidate;
				break;
			}
		}

		if ( ! $page instanceof WP_Post ) {
			continue;
		}

		$url     = get_permalink( $page );
		$url     = function_exists( 'sg_localize_url' ) ? sg_localize_url( $url ) : $url;
		$links[] = array(
			'label' => $config['label'],
			'url'   => $url,
		);
	}

	return $links;
}

/**
 * Returns configured pillar email addresses with empty defaults.
 *
 * @return array{capital_email:string,estates_email:string,concierge_email:string}
 */
function solanique_get_pillar_email_config(): array {
	// Add official pillar email addresses before production if the client approves email reveal tabs.
	$config = (array) apply_filters(
		'solanique_pillar_email_config',
		array(
			'capital_email'   => '',
			'estates_email'   => '',
			'concierge_email' => '',
		)
	);

	return array(
		'capital_email'   => isset( $config['capital_email'] ) ? sanitize_email( (string) $config['capital_email'] ) : '',
		'estates_email'   => isset( $config['estates_email'] ) ? sanitize_email( (string) $config['estates_email'] ) : '',
		'concierge_email' => isset( $config['concierge_email'] ) ? sanitize_email( (string) $config['concierge_email'] ) : '',
	);
}

/**
 * Returns a configured pillar email address.
 *
 * @param string $pillar Pillar key.
 * @return string
 */
function solanique_get_pillar_email( string $pillar ): string {
	$pillar = sanitize_key( $pillar );
	$config = solanique_get_pillar_email_config();
	$key    = $pillar . '_email';

	return isset( $config[ $key ] ) && is_email( $config[ $key ] ) ? $config[ $key ] : '';
}

/**
 * Returns an optional accessible email reveal tab for a pillar.
 *
 * @param string $pillar Pillar key.
 * @param string $label  Visible label.
 * @return string
 */
function solanique_get_pillar_email_tab( string $pillar, string $label = '' ): string {
	$email = solanique_get_pillar_email( $pillar );

	if ( '' === $email ) {
		return '';
	}

	$label      = '' !== $label ? $label : __( 'Email', 'solanique' );
	$attributes = array(
		'class'      => 'sg-email-tab',
		'href'       => 'mailto:' . $email,
		'aria-label' => sprintf(
			/* translators: %s: pillar email address. */
			__( 'Email %s', 'solanique' ),
			$email
		),
	);

	return '<a' . solanique_get_attribute_string( $attributes ) . '>'
		. '<span class="sg-email-tab__icon" aria-hidden="true">Mail</span>'
		. '<span class="sg-email-tab__label">' . esc_html( $label ) . '</span>'
		. '<span class="sg-email-tab__address">' . esc_html( $email ) . '</span>'
		. '</a>';
}

/**
 * Returns supported footer social network labels.
 *
 * @return array<string,string>
 */
function solanique_get_footer_social_network_labels(): array {
	return array(
		'instagram' => __( 'Instagram', 'solanique' ),
		'linkedin'  => __( 'LinkedIn', 'solanique' ),
		'facebook'  => __( 'Facebook', 'solanique' ),
		'youtube'   => __( 'YouTube', 'solanique' ),
	);
}

/**
 * Returns configured footer social links with empty URLs removed.
 *
 * @return array<string,array{label:string,url:string}>
 */
function solanique_get_footer_social_links(): array {
	// Add official social media URLs before production.
	$links = (array) apply_filters(
		'solanique_footer_social_links',
		array(
			'instagram' => '',
			'linkedin'  => '',
			'facebook'  => '',
			'youtube'   => '',
		)
	);
	$labels = solanique_get_footer_social_network_labels();
	$output = array();

	foreach ( $labels as $key => $label ) {
		$url = isset( $links[ $key ] ) ? esc_url_raw( (string) $links[ $key ] ) : '';

		if ( '' === $url ) {
			continue;
		}

		$output[ $key ] = array(
			'label' => $label,
			'url'   => $url,
		);
	}

	return $output;
}

/**
 * Returns an inline SVG icon for a supported social network.
 *
 * @param string $network Social network key.
 * @return string
 */
function solanique_get_social_icon_svg( string $network ): string {
	$icons = array(
		'instagram' => '<svg class="sg-site-footer__social-svg" viewBox="0 0 24 24" focusable="false" aria-hidden="true"><rect x="4" y="4" width="16" height="16" rx="4"></rect><circle cx="12" cy="12" r="3.2"></circle><circle cx="17" cy="7" r="0.8"></circle></svg>',
		'linkedin'  => '<svg class="sg-site-footer__social-svg" viewBox="0 0 24 24" focusable="false" aria-hidden="true"><path d="M6.5 10v8"></path><path d="M10.5 18v-8"></path><path d="M10.5 13.4c0-2 1.2-3.4 3.2-3.4s3.3 1.3 3.3 3.7V18"></path><circle cx="6.5" cy="6.5" r="1"></circle></svg>',
		'facebook'  => '<svg class="sg-site-footer__social-svg" viewBox="0 0 24 24" focusable="false" aria-hidden="true"><path d="M14 8h2V5h-2.4C10.9 5 10 6.8 10 8.7V11H8v3h2v5h3v-5h2.4l0.6-3H13V8.9c0-.6.3-.9 1-.9Z"></path></svg>',
		'youtube'   => '<svg class="sg-site-footer__social-svg" viewBox="0 0 24 24" focusable="false" aria-hidden="true"><path d="M4.8 8.2c.2-1.1 1.1-1.9 2.2-2C8.6 6 10.4 6 12 6s3.4 0 5 .2c1.1.1 2 .9 2.2 2 .2 1.2.3 2.5.3 3.8s-.1 2.6-.3 3.8c-.2 1.1-1.1 1.9-2.2 2-1.6.2-3.4.2-5 .2s-3.4 0-5-.2c-1.1-.1-2-.9-2.2-2-.2-1.2-.3-2.5-.3-3.8s.1-2.6.3-3.8Z"></path><path d="m10 9.5 4 2.5-4 2.5Z"></path></svg>',
	);

	return $icons[ $network ] ?? '';
}
