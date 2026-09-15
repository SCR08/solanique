<?php
/**
 * Estate page final custody services section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content = solanique_get_final_page_copy( 'estate' );
$section = $content['services'] ?? array();
$items   = (array) ( $section['items'] ?? array() );
$assets  = array(
	array(
		'slug'      => 'renovations',
		'image'     => 'images/estates/architectural-planning-smart-home-blueprint.jpg',
		'image_alt' => __( 'Architectural planning documents representing luxury project management.', 'solanique' ),
		'width'     => 2048,
		'height'    => 1366,
	),
	array(
		'slug'      => 'technical-preservation',
		'image'     => 'images/estates/proptech-smart-home-network-analytics.jpg',
		'image_alt' => __( 'Smart home systems visualization representing technical preservation.', 'solanique' ),
		'width'     => 2048,
		'height'    => 1137,
	),
	array(
		'slug'      => 'owner-portal',
		'image'     => 'images/estates/property-management-real-estate-icons-laptop.jpg',
		'image_alt' => __( 'Property management interface representing owner visibility.', 'solanique' ),
		'width'     => 2048,
		'height'    => 1365,
	),
	array(
		'slug'      => 'seasonal-custody',
		'image'     => 'images/estates/luxury-backyard-pool-garden-landscaping.jpg',
		'image_alt' => __( 'Luxury backyard and landscaping representing seasonal custody.', 'solanique' ),
		'width'     => 2048,
		'height'    => 1365,
	),
	array(
		'slug'      => 'asset-protection',
		'image'     => 'images/estates/modern-home-exterior-landscape-lighting.jpg',
		'image_alt' => __( 'Modern home exterior lighting representing physical asset protection.', 'solanique' ),
		'width'     => 2048,
		'height'    => 1365,
	),
);
?>

<section id="sg-estates-advisory" class="sg-section sg-product-section sg-product-services sg-estates-advisory" aria-labelledby="sg-estates-advisory-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-product-section__layout sg-estates-advisory__layout">
			<div class="sg-product-section__header sg-estates-advisory__header sg-flow" data-sg-stagger>
				<p class="sg-product-section__eyebrow sg-estates-advisory__eyebrow sg-estates-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $content['service'] ?? '' ); ?>
				</p>

				<h2 id="sg-estates-advisory-title" class="sg-product-section__title sg-estates-advisory__title sg-estates-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $section['heading'] ?? '' ); ?>
				</h2>
			</div>

			<div class="sg-service-explorer sg-estates-advisory__explorer sg-estates-reveal" data-sg-service-explorer data-sg-reveal="fade-up">
				<div class="sg-service-explorer__controls" aria-label="<?php echo esc_attr( $section['heading'] ?? '' ); ?>" data-sg-stagger>
					<?php foreach ( $items as $index => $item ) : ?>
						<?php
						$is_active = 0 === $index;
						$asset     = $assets[ $index ] ?? $assets[0];
						?>
						<button
							class="sg-service-explorer__trigger<?php echo $is_active ? ' is-active' : ''; ?>"
							type="button"
							aria-controls="<?php echo esc_attr( 'sg-estate-service-' . $asset['slug'] ); ?>"
							aria-current="<?php echo $is_active ? 'true' : 'false'; ?>"
							data-sg-service-explorer-trigger
							data-sg-reveal="fade-up"
						>
							<span class="sg-service-explorer__trigger-number"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
							<span class="sg-service-explorer__trigger-title"><?php echo esc_html( $item['title'] ?? '' ); ?></span>
						</button>
					<?php endforeach; ?>
				</div>

				<div class="sg-service-explorer__stage" tabindex="0" aria-label="<?php echo esc_attr( $section['heading'] ?? '' ); ?>" data-sg-service-explorer-stage>
					<?php foreach ( $items as $index => $item ) : ?>
						<?php
						$is_active = 0 === $index;
						$asset     = $assets[ $index ] ?? $assets[0];
						?>
						<article
							id="<?php echo esc_attr( 'sg-estate-service-' . $asset['slug'] ); ?>"
							class="sg-service-explorer__panel sg-estates-advisory__panel<?php echo $is_active ? ' is-active' : ''; ?>"
							data-sg-service-explorer-panel
						>
							<figure class="sg-service-explorer__media sg-estates-advisory__media">
								<?php
								echo sg_asset_img(
									$asset['image'],
									$asset['image_alt'],
									array(
										'class'  => 'sg-service-explorer__image sg-estates-advisory__image sg-img sg-img--cover',
										'width'  => $asset['width'],
										'height' => $asset['height'],
										'sizes'  => '(min-width: 64rem) 60vw, 100vw',
									)
								);
								?>
							</figure>

							<div class="sg-service-explorer__content sg-flow">
								<span class="sg-service-explorer__number"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
								<h3 class="sg-service-explorer__title"><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
								<p class="sg-service-explorer__text"><?php echo esc_html( $item['text'] ?? '' ); ?></p>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
