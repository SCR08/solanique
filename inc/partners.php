<?php
/**
 * Approved professional credential and affiliation data.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

/**
 * Determines whether a partner logo exists in the theme source assets.
 *
 * @param string $logo_path Relative path below src/assets.
 * @return bool
 */
function sg_partner_logo_exists( string $logo_path ): bool {
	$logo_path = function_exists( 'solanique_normalize_theme_asset_path' ) ? solanique_normalize_theme_asset_path( $logo_path ) : ltrim( $logo_path, '/' );

	if ( '' === $logo_path ) {
		return false;
	}

	return file_exists( get_theme_file_path( trailingslashit( SOLANIQUE_ASSET_SRC_DIR ) . $logo_path ) );
}

/**
 * Filters and sorts authorized logo-based data.
 *
 * @param array<int,array<string,mixed>> $items           Data items.
 * @param bool                           $authorized_only Whether to return only authorized display items.
 * @return array<int,array<string,mixed>>
 */
function sg_filter_authorized_logo_items( array $items, bool $authorized_only = true ): array {
	foreach ( $items as &$item ) {
		$item['logo_present'] = sg_partner_logo_exists( (string) ( $item['logo_path'] ?? '' ) );
		$item['authorized']   = (bool) ( $item['authorized'] ?? false ) && (bool) $item['logo_present'];
	}
	unset( $item );

	usort(
		$items,
		static function ( array $first, array $second ): int {
			return (int) ( $first['display_order'] ?? 0 ) <=> (int) ( $second['display_order'] ?? 0 );
		}
	);

	if ( ! $authorized_only ) {
		return $items;
	}

	return array_values(
		array_filter(
			$items,
			static function ( array $item ): bool {
				return ! empty( $item['authorized'] );
			}
		)
	);
}

/**
 * Returns the structured professional credential data for Capital.
 *
 * Visible labels are limited to approved credential wording. Do not add license
 * numbers, regulatory claims, or personal brokerage details without approval.
 *
 * @param bool $authorized_only Whether to return only authorized display items.
 * @return array<int,array<string,mixed>>
 */
function sg_get_professional_credentials( bool $authorized_only = true ): array {
	$credentials = array(
		array(
			'id'              => 'century-21-c21hg-realtor',
			'logo_path'       => 'images/partners/brokers/century-21-c21hg-logo.png',
			'logo_alt'        => 'Century 21 / C21HG',
			'logo_width'      => 1984,
			'logo_height'     => 696,
			'visible_title'   => __( 'Realtor', 'solanique' ),
			'secondary_title' => '',
			'website_url'     => '',
			'authorized'      => true,
			'display_order'   => 10,
			'notes'           => 'Client-provided Century 21 / C21HG logo. Public card shows logo and credential label only.',
		),
		array(
			'id'              => 'csi-mortgages-agent-levels',
			'logo_path'       => 'images/partners/brokers/csi-mortgages-logo.png',
			'logo_alt'        => 'CSI Mortgages',
			'logo_width'      => 275,
			'logo_height'     => 103,
			'visible_title'   => __( 'Mortgage Agent Level 1 and 2', 'solanique' ),
			'secondary_title' => '',
			'website_url'     => 'https://www.csimortgages.com',
			'authorized'      => true,
			'display_order'   => 20,
			'notes'           => 'Client-provided CSI Mortgages logo and website. Public card shows logo and credential label only.',
		),
	);

	return sg_filter_authorized_logo_items( $credentials, $authorized_only );
}

/**
 * Returns approved professional affiliation logos for Capital.
 *
 * This intentionally returns no public items until separate affiliation logos
 * such as Scotiabank are supplied and approved for production use.
 *
 * @param bool $authorized_only Whether to return only authorized display items.
 * @return array<int,array<string,mixed>>
 */
function sg_get_professional_affiliations( bool $authorized_only = true ): array {
	$affiliations = array();

	return sg_filter_authorized_logo_items( $affiliations, $authorized_only );
}

/**
 * Backwards-compatible accessor for earlier Capital partner templates.
 *
 * @param bool $authorized_only Whether to return only authorized display items.
 * @return array<int,array<string,mixed>>
 */
function sg_get_capital_partners( bool $authorized_only = true ): array {
	return sg_get_professional_credentials( $authorized_only );
}
