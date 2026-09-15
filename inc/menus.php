<?php
/**
 * Navigation menu registration.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

/**
 * Registers theme navigation locations.
 *
 * @return void
 */
function solanique_register_menus(): void {
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Navigation', 'solanique' ),
			'footer'  => esc_html__( 'Footer Navigation', 'solanique' ),
		)
	);
}
add_action( 'after_setup_theme', 'solanique_register_menus' );

/**
 * Renders the primary navigation menu.
 *
 * @param string $menu_id Menu element ID.
 * @return void
 */
function solanique_render_primary_navigation( string $menu_id ): void {
	solanique_render_core_navigation( $menu_id );
}

/**
 * Renders one side of the split desktop primary navigation.
 *
 * @param string   $menu_id Menu element ID.
 * @param string[] $slugs   Ordered page slugs for this segment.
 * @return void
 */
function solanique_render_primary_navigation_segment( string $menu_id, array $slugs ): void {
	$items = solanique_get_primary_navigation_segment_items( $slugs );

	echo '<ul id="' . esc_attr( $menu_id ) . '" class="sg-nav__list">';

	foreach ( $items as $item ) {
		$classes = 'sg-nav__item' . ( $item['current'] ? ' sg-nav__item--current current-menu-item' : '' );

		echo '<li class="' . esc_attr( $classes ) . '">';
		echo '<a class="sg-nav__link" href="' . esc_url( $item['url'] ) . '"' . ( $item['current'] ? ' aria-current="page"' : '' ) . '>';
		echo esc_html( $item['label'] );
		echo '</a>';
		echo '</li>';
	}

	echo '</ul>';
}

/**
 * Returns segment items from the assigned primary menu, with preview fallback.
 *
 * @param string[] $slugs Ordered page slugs.
 * @return array<int,array{slug:string,label:string,url:string,current:bool}>
 */
function solanique_get_primary_navigation_segment_items( array $slugs ): array {
	$slugs          = array_values( array_map( 'sanitize_title', $slugs ) );
	$assigned_items = array();
	$items          = array();

	foreach ( $slugs as $slug ) {
		if ( isset( $assigned_items[ $slug ] ) ) {
			$items[] = $assigned_items[ $slug ];
			continue;
		}

		$fallback_items = solanique_get_fallback_menu_items( true );

		foreach ( $fallback_items as $fallback_item ) {
			if ( $slug !== $fallback_item['slug'] ) {
				continue;
			}

			$items[] = array(
				'slug'    => $fallback_item['slug'],
				'label'   => $fallback_item['label'],
				'url'     => $fallback_item['url'],
				'current' => solanique_is_fallback_menu_item_current( $fallback_item['slug'] ),
			);
			break;
		}
	}

	return $items;
}

/**
 * Returns assigned primary menu items keyed by their likely page slug.
 *
 * @return array<string,array{slug:string,label:string,url:string,current:bool}>
 */
function solanique_get_assigned_primary_menu_items_by_slug(): array {
	$locations = get_nav_menu_locations();

	if ( empty( $locations['primary'] ) ) {
		return array();
	}

	$menu_items = wp_get_nav_menu_items( $locations['primary'] );

	if ( empty( $menu_items ) || ! is_array( $menu_items ) ) {
		return array();
	}

	$items = array();

	foreach ( $menu_items as $menu_item ) {
		if ( (int) $menu_item->menu_item_parent > 0 ) {
			continue;
		}

		$slug = solanique_get_menu_item_slug( $menu_item );

		if ( '' === $slug ) {
			continue;
		}

		$label = apply_filters( 'the_title', $menu_item->title, $menu_item->ID );
		$label = function_exists( 'sg_t' ) ? sg_t( wp_strip_all_tags( $label ), $label ) : $label;

		$items[ $slug ] = array(
			'slug'    => $slug,
			'label'   => $label,
			'url'     => function_exists( 'sg_localize_url' ) ? sg_localize_url( $menu_item->url ) : $menu_item->url,
			'current' => in_array( 'current-menu-item', (array) $menu_item->classes, true ) || in_array( 'current_page_item', (array) $menu_item->classes, true ),
		);
	}

	return $items;
}

/**
 * Returns the best slug for a WordPress menu item.
 *
 * @param WP_Post $menu_item Menu item.
 * @return string
 */
function solanique_get_menu_item_slug( WP_Post $menu_item ): string {
	if ( 'post_type' === $menu_item->type && $menu_item->object_id ) {
		$page = get_post( (int) $menu_item->object_id );

		if ( $page instanceof WP_Post ) {
			return sanitize_title( $page->post_name );
		}
	}

	return sanitize_title( $menu_item->title );
}

/**
 * Renders the footer navigation menu.
 *
 * @param string $menu_id Menu element ID.
 * @return void
 */
function solanique_render_footer_navigation( string $menu_id ): void {
	solanique_render_core_navigation( $menu_id );
}

/**
 * Renders the approved Solanique navigation for preview/client review.
 *
 * @param string $menu_id Menu element ID.
 * @return void
 */
function solanique_render_core_navigation( string $menu_id ): void {
	$items = solanique_get_core_navigation_items();

	echo '<ul id="' . esc_attr( $menu_id ) . '" class="sg-nav__list">';

	foreach ( $items as $item ) {
		$classes = 'sg-nav__item' . ( $item['current'] ? ' sg-nav__item--current current-menu-item' : '' );

		echo '<li class="' . esc_attr( $classes ) . '">';
		echo '<a class="sg-nav__link" href="' . esc_url( $item['url'] ) . '"' . ( $item['current'] ? ' aria-current="page"' : '' ) . '>';
		echo esc_html( $item['label'] );
		echo '</a>';
		echo '</li>';
	}

	echo '</ul>';
}

/**
 * Normalizes menu item classes to the Solanique BEM convention.
 *
 * @param string[] $classes Existing menu item classes.
 * @param WP_Post|null  $menu_item Menu item object.
 * @param stdClass|null $args      wp_nav_menu() arguments.
 * @param int           $depth     Menu item depth.
 * @return string[]
 */
function solanique_nav_menu_css_class( array $classes, ?WP_Post $menu_item = null, ?stdClass $args = null, int $depth = 0 ): array {
	$item_classes = array( 'sg-nav__item' );

	if ( array_intersect( array( 'current-menu-item', 'current-menu-ancestor', 'current_page_item', 'current_page_ancestor' ), $classes ) ) {
		$item_classes[] = 'sg-nav__item--current';
		$item_classes[] = 'current-menu-item';
	}

	if ( in_array( 'menu-item-has-children', $classes, true ) ) {
		$item_classes[] = 'sg-nav__item--has-children';
	}

	return $item_classes;
}
add_filter( 'nav_menu_css_class', 'solanique_nav_menu_css_class', 10, 4 );

/**
 * Normalizes submenu classes to the Solanique BEM convention.
 *
 * @param string[] $classes Existing submenu classes.
 * @param stdClass|null $args  wp_nav_menu() arguments.
 * @param int           $depth Submenu depth.
 * @return string[]
 */
function solanique_nav_menu_submenu_css_class( array $classes, ?stdClass $args = null, int $depth = 0 ): array {
	return array( 'sg-nav__sub-menu' );
}
add_filter( 'nav_menu_submenu_css_class', 'solanique_nav_menu_submenu_css_class', 10, 3 );

/**
 * Adds the Solanique BEM link class to WordPress menu anchors.
 *
 * @param array<string,string> $atts Menu link attributes.
 * @param WP_Post|null        $menu_item Menu item object.
 * @param stdClass|null       $args      wp_nav_menu() arguments.
 * @param int                 $depth     Menu item depth.
 * @return array<string,string>
 */
function solanique_nav_menu_link_attributes( array $atts, ?WP_Post $menu_item = null, ?stdClass $args = null, int $depth = 0 ): array {
	$atts['class'] = 'sg-nav__link';

	if ( ! empty( $atts['href'] ) && function_exists( 'sg_localize_url' ) ) {
		$atts['href'] = sg_localize_url( $atts['href'] );
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'solanique_nav_menu_link_attributes', 10, 4 );

/**
 * Applies the lightweight language map to assigned WordPress menu labels.
 *
 * @param string $title Menu item title.
 * @return string
 */
function solanique_nav_menu_item_title( string $title ): string {
	if ( ! function_exists( 'sg_t' ) ) {
		return $title;
	}

	$plain_title = wp_strip_all_tags( $title );

	return sg_t( $plain_title, $title );
}
add_filter( 'nav_menu_item_title', 'solanique_nav_menu_item_title' );

/**
 * Renders a BEM-compatible fallback menu from existing WordPress pages.
 *
 * @param array<string,mixed> $args wp_nav_menu() arguments.
 * @return string|void
 */
function solanique_primary_menu_fallback( array $args ) {
	return solanique_render_menu_fallback( $args, true );
}

/**
 * Renders the footer fallback menu.
 *
 * @param array<string,mixed> $args wp_nav_menu() arguments.
 * @return string|void
 */
function solanique_footer_menu_fallback( array $args ) {
	return solanique_render_menu_fallback( $args, true );
}

/**
 * Renders a consistent fallback menu for fresh theme previews.
 *
 * @param array<string,mixed> $args         wp_nav_menu() arguments.
 * @param bool                $include_home Deprecated preview argument.
 * @return string|void
 */
function solanique_render_menu_fallback( array $args, bool $include_home = false ) {
	$menu_items = solanique_get_fallback_menu_items( $include_home );
	$menu_id    = ! empty( $args['menu_id'] ) ? $args['menu_id'] : 'sg-menu-fallback';
	$menu_class = ! empty( $args['menu_class'] ) ? $args['menu_class'] : 'sg-nav__list';

	$output = '<ul id="' . esc_attr( $menu_id ) . '" class="' . esc_attr( $menu_class ) . '">';

	foreach ( $menu_items as $item ) {
		$is_current = solanique_is_fallback_menu_item_current( $item['slug'] );
		$classes    = 'sg-nav__item' . ( $is_current ? ' sg-nav__item--current current-menu-item' : '' );

		$output .= '<li class="' . esc_attr( $classes ) . '">';
		$output .= '<a class="sg-nav__link" href="' . esc_url( $item['url'] ) . '"' . ( $is_current ? ' aria-current="page"' : '' ) . '>';
		$output .= esc_html( $item['label'] );
		$output .= '</a>';
		$output .= '</li>';
	}

	$output .= '</ul>';

	if ( isset( $args['echo'] ) && false === $args['echo'] ) {
		return $output;
	}

	echo $output;
}

/**
 * Returns the expected preview navigation items.
 *
 * @param bool $include_home Deprecated preview argument.
 * @return array<int,array{slug:string,label:string,url:string}>
 */
function solanique_get_fallback_menu_items( bool $include_home = false ): array {
	return solanique_get_core_navigation_items( false );
}

/**
 * Returns the approved Solanique public navigation.
 *
 * @param bool $include_current Whether to include current state.
 * @return array<int,array{slug:string,label:string,url:string,current:bool}>
 */
function solanique_get_core_navigation_items( bool $include_current = true ): array {
	$items = array();
	$pages = array(
		'capital'        => __( 'Capital', 'solanique' ),
		'estates'        => __( 'Estate', 'solanique' ),
		'concierge'      => __( 'Concierge', 'solanique' ),
		'solanique-club' => __( 'Solanique Club', 'solanique' ),
		'the-mandate'    => __( 'The Mandate', 'solanique' ),
		'inquiry'        => __( 'Inquiry', 'solanique' ),
	);

	foreach ( $pages as $slug => $label ) {
		$items[] = array(
			'slug'    => $slug,
			'label'   => $label,
			'url'     => solanique_get_page_url( $slug, '/' . $slug . '/' ),
			'current' => $include_current ? solanique_is_fallback_menu_item_current( $slug ) : false,
		);
	}

	return $items;
}

/**
 * Checks whether a fallback menu item points to the current page.
 *
 * @param string $slug Fallback item slug.
 * @return bool
 */
function solanique_is_fallback_menu_item_current( string $slug ): bool {
	if ( 'home' === $slug ) {
		return is_front_page();
	}

	if ( 'the-mandate' === $slug && is_page( 'about' ) ) {
		return true;
	}

	if ( 'inquiry' === $slug && is_page( 'contact' ) ) {
		return true;
	}

	if ( 'estates' === $slug && is_page( 'estate' ) ) {
		return true;
	}

	return is_page( $slug );
}
