<?php
/**
 * Capital page final services section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content = solanique_get_final_page_copy( 'capital' );
$section = $content['services'] ?? array();
$items   = (array) ( $section['items'] ?? array() );
$assets  = array(
	array(
		'slug'      => 'acquisition',
		'image'     => 'images/estates/commercial-real-estate-investment-meeting.jpg',
		'image_alt' => __( 'Private meeting environment representing Solanique Capital strategy.', 'solanique' ),
		'width'     => 2048,
		'height'    => 1365,
	),
	array(
		'slug'      => 'capital-planning',
		'image'     => 'images/estates/mortgage-contract-real-estate-closing.jpg',
		'image_alt' => __( 'Real estate closing documents representing capital and mortgage planning.', 'solanique' ),
		'width'     => 2048,
		'height'    => 1365,
	),
	array(
		'slug'      => 'investment-club',
		'image'     => 'images/estates/digital-real-estate-investment-hologram.jpg',
		'image_alt' => __( 'Digital real estate investment visualization representing private opportunity review.', 'solanique' ),
		'width'     => 2047,
		'height'    => 1102,
	),
	array(
		'slug'      => 'corporate-incubation',
		'image'     => 'images/estates/real-estate-market-analysis-digital-dashboard.jpg',
		'image_alt' => __( 'Market analysis dashboard representing corporate advisory.', 'solanique' ),
		'width'     => 2048,
		'height'    => 1367,
	),
	array(
		'slug'      => 'business-transformation',
		'image'     => 'images/estates/real-estate-contract-handshake-closing.jpg',
		'image_alt' => __( 'Professional agreement moment representing business transformation.', 'solanique' ),
		'width'     => 2048,
		'height'    => 1365,
	),
	array(
		'slug'      => 'portfolio-alignment',
		'image'     => 'images/estates/commercial-property-analytics-real-estate-investment.jpg',
		'image_alt' => __( 'Commercial property analytics representing portfolio alignment.', 'solanique' ),
		'width'     => 2048,
		'height'    => 1074,
	),
);
?>

<section id="sg-capital-services" class="sg-section sg-product-section sg-product-services sg-capital-services" aria-labelledby="sg-capital-services-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-product-section__layout sg-capital-services__layout">
			<div class="sg-product-section__header sg-capital-services__header sg-flow" data-sg-stagger>
				<p class="sg-product-section__eyebrow sg-capital-services__eyebrow sg-capital-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $content['service'] ?? '' ); ?>
				</p>

				<h2 id="sg-capital-services-title" class="sg-product-section__title sg-capital-services__title sg-capital-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $section['heading'] ?? '' ); ?>
				</h2>
			</div>

			<div class="sg-service-explorer sg-capital-services__explorer sg-capital-reveal" data-sg-service-explorer data-sg-reveal="fade-up">
				<div class="sg-service-explorer__controls" aria-label="<?php echo esc_attr( $section['heading'] ?? '' ); ?>" data-sg-stagger>
					<?php foreach ( $items as $index => $item ) : ?>
						<?php
						$is_active = 0 === $index;
						$asset     = $assets[ $index ] ?? $assets[0];
						?>
						<button
							class="sg-service-explorer__trigger<?php echo $is_active ? ' is-active' : ''; ?>"
							type="button"
							aria-controls="<?php echo esc_attr( 'sg-capital-service-' . $asset['slug'] ); ?>"
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
							id="<?php echo esc_attr( 'sg-capital-service-' . $asset['slug'] ); ?>"
							class="sg-service-explorer__panel sg-capital-services__panel<?php echo $is_active ? ' is-active' : ''; ?>"
							data-sg-service-explorer-panel
						>
							<figure class="sg-service-explorer__media sg-capital-services__media">
								<?php
								echo sg_asset_img(
									$asset['image'],
									$asset['image_alt'],
									array(
										'class'  => 'sg-service-explorer__image sg-capital-services__image sg-img sg-img--cover',
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
