<?php
/**
 * Future CRM and Go High Level integration manifest.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

/**
 * Returns planned CRM form entries.
 *
 * Entries are disabled until approved embed code or approved external form URLs
 * are supplied. The theme does not collect personal information natively.
 *
 * @param string $page     Optional page key.
 * @param string $service  Optional service key.
 * @param string $language Optional language code.
 * @return array<int,array<string,mixed>>
 */
function sg_get_crm_forms( string $page = '', string $service = '', string $language = '' ): array {
	$forms = array(
		array(
			'id'             => 'general-inquiry-en',
			'page'           => 'inquiry',
			'service'        => 'general',
			'language'       => 'en',
			'embed_code'     => '',
			'external_url'   => '',
			'enabled'        => false,
			'fallback_email' => '',
			'notes'          => 'Future General Inquiry GHL form.',
		),
		array(
			'id'             => 'general-inquiry-es',
			'page'           => 'inquiry',
			'service'        => 'general',
			'language'       => 'es',
			'embed_code'     => '',
			'external_url'   => '',
			'enabled'        => false,
			'fallback_email' => '',
			'notes'          => 'Future Spanish General Inquiry GHL form.',
		),
		array(
			'id'             => 'capital-inquiry-en',
			'page'           => 'capital',
			'service'        => 'capital',
			'language'       => 'en',
			'embed_code'     => '',
			'external_url'   => '',
			'enabled'        => false,
			'fallback_email' => '',
			'notes'          => 'Future Capital-specific GHL form.',
		),
		array(
			'id'             => 'capital-inquiry-es',
			'page'           => 'capital',
			'service'        => 'capital',
			'language'       => 'es',
			'embed_code'     => '',
			'external_url'   => '',
			'enabled'        => false,
			'fallback_email' => '',
			'notes'          => 'Future Spanish Capital-specific GHL form.',
		),
		array(
			'id'             => 'estate-inquiry-en',
			'page'           => 'estate',
			'service'        => 'estate',
			'language'       => 'en',
			'embed_code'     => '',
			'external_url'   => '',
			'enabled'        => false,
			'fallback_email' => '',
			'notes'          => 'Future Estate-specific GHL form.',
		),
		array(
			'id'             => 'estate-inquiry-es',
			'page'           => 'estate',
			'service'        => 'estate',
			'language'       => 'es',
			'embed_code'     => '',
			'external_url'   => '',
			'enabled'        => false,
			'fallback_email' => '',
			'notes'          => 'Future Spanish Estate-specific GHL form.',
		),
		array(
			'id'             => 'concierge-inquiry-en',
			'page'           => 'concierge',
			'service'        => 'concierge',
			'language'       => 'en',
			'embed_code'     => '',
			'external_url'   => '',
			'enabled'        => false,
			'fallback_email' => '',
			'notes'          => 'Future Concierge-specific GHL form.',
		),
		array(
			'id'             => 'concierge-inquiry-es',
			'page'           => 'concierge',
			'service'        => 'concierge',
			'language'       => 'es',
			'embed_code'     => '',
			'external_url'   => '',
			'enabled'        => false,
			'fallback_email' => '',
			'notes'          => 'Future Spanish Concierge-specific GHL form.',
		),
		array(
			'id'             => 'solanique-club-inquiry-en',
			'page'           => 'solanique-club',
			'service'        => 'solanique-club',
			'language'       => 'en',
			'embed_code'     => '',
			'external_url'   => '',
			'enabled'        => false,
			'fallback_email' => '',
			'notes'          => 'Future Solanique Club, JV Network, and Investor Club intake form.',
		),
		array(
			'id'             => 'solanique-club-inquiry-es',
			'page'           => 'solanique-club',
			'service'        => 'solanique-club',
			'language'       => 'es',
			'embed_code'     => '',
			'external_url'   => '',
			'enabled'        => false,
			'fallback_email' => '',
			'notes'          => 'Future Spanish Solanique Club, JV Network, and Investor Club intake form.',
		),
	);

	foreach ( $forms as &$form ) {
		$has_output      = '' !== trim( (string) ( $form['embed_code'] ?? '' ) ) || '' !== esc_url_raw( (string) ( $form['external_url'] ?? '' ) );
		$form['enabled'] = (bool) ( $form['enabled'] ?? false ) && $has_output;
	}
	unset( $form );

	$page     = sanitize_key( $page );
	$service  = sanitize_key( $service );
	$language = sanitize_key( $language );

	return array_values(
		array_filter(
			$forms,
			static function ( array $form ) use ( $page, $service, $language ): bool {
				if ( '' !== $page && $page !== (string) $form['page'] ) {
					return false;
				}

				if ( '' !== $service && $service !== (string) $form['service'] ) {
					return false;
				}

				if ( '' !== $language && $language !== (string) $form['language'] ) {
					return false;
				}

				return true;
			}
		)
	);
}

/**
 * Returns one CRM form entry by ID.
 *
 * @param string $id CRM form ID.
 * @return array<string,mixed>|null
 */
function sg_get_crm_form( string $id ): ?array {
	$id = sanitize_key( $id );

	foreach ( sg_get_crm_forms() as $form ) {
		if ( $id === (string) $form['id'] ) {
			return $form;
		}
	}

	return null;
}

/**
 * Renders an approved CRM/GHL slot only when an entry is explicitly enabled.
 *
 * @param string              $id   CRM form ID.
 * @param array<string,mixed> $args Optional render arguments.
 * @return void
 */
function sg_render_crm_form_slot( string $id, array $args = array() ): void {
	$form = sg_get_crm_form( $id );

	if ( empty( $form ) || empty( $form['enabled'] ) ) {
		return;
	}

	$defaults = array(
		'title' => __( 'Private intake', 'solanique' ),
		'class' => '',
	);
	$args     = wp_parse_args( $args, $defaults );
	$classes  = trim( 'sg-crm-slot ' . preg_replace( '/[^A-Za-z0-9_ -]/', '', (string) $args['class'] ) );
	$title_id = wp_unique_id( 'sg-crm-slot-title-' );
	?>
	<section class="<?php echo esc_attr( $classes ); ?>" aria-labelledby="<?php echo esc_attr( $title_id ); ?>">
		<div class="sg-container sg-container--md">
			<h2 id="<?php echo esc_attr( $title_id ); ?>" class="sg-u--sr-only"><?php echo esc_html( (string) $args['title'] ); ?></h2>
			<?php if ( ! empty( $form['embed_code'] ) ) : ?>
				<div class="sg-crm-slot__embed">
					<?php
					// Future GHL registration/inquiry embed goes here.
					echo wp_kses(
						(string) $form['embed_code'],
						array(
							'iframe' => array(
								'allow'           => true,
								'allowfullscreen' => true,
								'class'           => true,
								'height'          => true,
								'loading'         => true,
								'name'            => true,
								'referrerpolicy'  => true,
								'sandbox'         => true,
								'src'             => true,
								'style'           => true,
								'title'           => true,
								'width'           => true,
							),
							'script' => array(
								'src'   => true,
								'async' => true,
								'defer' => true,
								'type'  => true,
							),
						)
					);
					?>
				</div>
			<?php elseif ( ! empty( $form['external_url'] ) ) : ?>
				<a class="sg-button" href="<?php echo esc_url( (string) $form['external_url'] ); ?>" rel="noopener">
					<?php esc_html_e( 'Start Inquiry', 'solanique' ); ?>
				</a>
			<?php endif; ?>
		</div>
	</section>
	<?php
}
