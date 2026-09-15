<?php
/**
 * Estates page intro section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content   = solanique_get_final_page_copy( 'estate' );
$manifesto = $content['manifesto'] ?? array();
?>

<section class="sg-section sg-product-intro sg-estates-intro" aria-labelledby="sg-estates-intro-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-product-intro__layout sg-estates-intro__layout">
			<div class="sg-product-intro__content sg-estates-intro__content sg-flow" data-sg-stagger>
				<h2 id="sg-estates-intro-title" class="sg-product-intro__title sg-estates-intro__title sg-estates-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $manifesto['heading'] ?? '' ); ?>
				</h2>

				<p class="sg-product-intro__text sg-estates-intro__text sg-estates-reveal" data-sg-reveal="fade-up">
					<?php echo esc_html( $manifesto['text'] ?? '' ); ?>
				</p>
			</div>

			<div class="sg-product-intro__frame sg-estates-intro__frame sg-estates-reveal" data-sg-reveal="scale-in">
				<?php
				echo sg_asset_img(
					'images/estates/architectural-planning-smart-home-blueprint.jpg',
					__( 'Architectural planning and smart home blueprint representing Solanique Estates stewardship.', 'solanique' ),
					array(
						'class'  => 'sg-product-intro__frame-image sg-estates-intro__image sg-img sg-img--cover',
						'width'  => 2048,
						'height' => 1366,
						'sizes'  => '(min-width: 64rem) 38vw, 100vw',
					)
				);
				?>
				<span class="sg-estates-intro__frame-line sg-estates-intro__frame-line--one"></span>
				<span class="sg-estates-intro__frame-line sg-estates-intro__frame-line--two"></span>
			</div>
		</div>
	</div>
</section>
