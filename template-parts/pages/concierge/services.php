<?php
/**
 * Concierge page final services section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content = solanique_get_final_page_copy( 'concierge' );
$section = $content['services'] ?? array();
$items   = (array) ( $section['items'] ?? array() );
$assets  = array(
	array(
		'slug'      => 'family-care',
		'image'     => 'images/concierge/hotel-room-welcome-towels-housekeeping-service.jpg',
		'image_alt' => __( 'Prepared room detail representing family care coordination.', 'solanique' ),
		'width'     => 2048,
		'height'    => 1365,
	),
	array(
		'slug'      => 'senior-care',
		'image'     => 'images/concierge/modern-bathroom-amenities-towel-service.jpg',
		'image_alt' => __( 'Refined bathroom amenity detail representing care-focused household support.', 'solanique' ),
		'width'     => 2048,
		'height'    => 1365,
	),
	array(
		'slug'      => 'domestic-staffing',
		'image'     => 'images/concierge/hotel-housekeeping-making-bed-service.jpg',
		'image_alt' => __( 'Housekeeping service preparing a bed representing domestic staffing.', 'solanique' ),
		'width'     => 2047,
		'height'    => 1487,
	),
	array(
		'slug'      => 'chauffeur',
		'image'     => 'images/concierge/chauffeur-opening-car-door-luxury-transport.jpg',
		'image_alt' => __( 'Chauffeur opening a car door representing private driver services.', 'solanique' ),
		'width'     => 2048,
		'height'    => 1365,
	),
	array(
		'slug'      => 'pet-services',
		'image'     => 'images/concierge/dog-bathing-pet-grooming-service.jpg',
		'image_alt' => __( 'Dog grooming care representing luxury pet services.', 'solanique' ),
		'width'     => 2048,
		'height'    => 1365,
	),
	array(
		'slug'      => 'personal-assistance',
		'image'     => 'images/concierge/hotel-receptionist-phone-customer-service.jpg',
		'image_alt' => __( 'Private service phone coordination representing personal assistance.', 'solanique' ),
		'width'     => 2048,
		'height'    => 1365,
	),
);
?>

<section id="sg-concierge-services" class="sg-section sg-product-section sg-product-services sg-concierge-services" aria-labelledby="sg-concierge-services-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-product-section__layout sg-concierge-services__layout">
			<div class="sg-product-section__header sg-concierge-services__header sg-flow" data-sg-stagger>
				<p class="sg-product-section__eyebrow sg-concierge-services__eyebrow sg-concierge-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $content['service'] ?? '' ); ?>
				</p>

				<h2 id="sg-concierge-services-title" class="sg-product-section__title sg-concierge-services__title sg-concierge-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $section['heading'] ?? '' ); ?>
				</h2>
			</div>

			<div class="sg-service-explorer sg-concierge-services__explorer sg-concierge-reveal" data-sg-service-explorer data-sg-reveal="fade-up">
				<div class="sg-service-explorer__controls" aria-label="<?php echo esc_attr( $section['heading'] ?? '' ); ?>" data-sg-stagger>
					<?php foreach ( $items as $index => $item ) : ?>
						<?php
						$is_active = 0 === $index;
						$asset     = $assets[ $index ] ?? $assets[0];
						?>
						<button
							class="sg-service-explorer__trigger<?php echo $is_active ? ' is-active' : ''; ?>"
							type="button"
							aria-controls="<?php echo esc_attr( 'sg-concierge-service-' . $asset['slug'] ); ?>"
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
							id="<?php echo esc_attr( 'sg-concierge-service-' . $asset['slug'] ); ?>"
							class="sg-service-explorer__panel sg-concierge-services__panel<?php echo $is_active ? ' is-active' : ''; ?>"
							data-sg-service-explorer-panel
						>
							<figure class="sg-service-explorer__media sg-concierge-services__media">
								<?php
								echo sg_asset_img(
									$asset['image'],
									$asset['image_alt'],
									array(
										'class'  => 'sg-service-explorer__image sg-concierge-services__image sg-img sg-img--cover',
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
