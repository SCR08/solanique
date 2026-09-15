<?php
/**
 * Concierge page intro section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content   = solanique_get_final_page_copy( 'concierge' );
$manifesto = $content['manifesto'] ?? array();
?>

<section class="sg-section sg-product-intro sg-concierge-intro" aria-labelledby="sg-concierge-intro-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-product-intro__layout sg-concierge-intro__layout">
			<div class="sg-product-intro__content sg-concierge-intro__content sg-flow" data-sg-stagger>
				<h2 id="sg-concierge-intro-title" class="sg-product-intro__title sg-concierge-intro__title sg-concierge-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $manifesto['heading'] ?? '' ); ?>
				</h2>

				<p class="sg-product-intro__text sg-concierge-intro__text sg-concierge-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $manifesto['text'] ?? '' ); ?>
				</p>
			</div>

			<div class="sg-product-intro__frame sg-concierge-intro__frame sg-concierge-reveal" data-sg-reveal="scale-in">
				<?php
				echo sg_asset_img(
					'images/concierge/luxury-housekeeping-bedroom-towel-service.jpg',
					__( 'Luxury bedroom housekeeping detail representing Solanique Concierge household coordination.', 'solanique' ),
					array(
						'class'  => 'sg-product-intro__frame-image sg-concierge-intro__image sg-img sg-img--cover',
						'width'  => 2048,
						'height' => 1365,
						'sizes'  => '(min-width: 64rem) 38vw, 100vw',
					)
				);
				?>
				<span class="sg-concierge-intro__frame-line sg-concierge-intro__frame-line--one"></span>
				<span class="sg-concierge-intro__frame-line sg-concierge-intro__frame-line--two"></span>
			</div>
		</div>
	</div>
</section>
