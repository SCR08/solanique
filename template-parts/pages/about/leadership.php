<?php
/**
 * About page private standard section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="sg-section sg-product-section sg-about-leadership" aria-labelledby="sg-about-leadership-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-about-leadership__layout">
			<div class="sg-about-leadership__content sg-flow" data-sg-stagger>
				<p class="sg-product-section__eyebrow sg-about-leadership__eyebrow sg-about-reveal" data-sg-reveal="fade-up">
					<?php esc_html_e( 'Private Standard', 'solanique' ); ?>
				</p>

				<h2 id="sg-about-leadership-title" class="sg-product-section__title sg-about-leadership__title sg-about-reveal" data-sg-reveal="fade-up">
					<?php esc_html_e( 'Strategic Authority with a Human Heart', 'solanique' ); ?>
				</h2>

				<p class="sg-about-leadership__text sg-about-reveal" data-sg-reveal="fade-up">
					<?php esc_html_e( 'The Solanique tone is empowered sophistication: precise enough for complex advisory work and human enough to protect the private world behind every decision.', 'solanique' ); ?>
				</p>

				<p class="sg-about-leadership__text sg-about-reveal" data-sg-reveal="fade-up">
					<?php esc_html_e( 'We reject high-pressure noise in favor of refined intelligence, direct communication, and a standard of care that honors the client\'s goals.', 'solanique' ); ?>
				</p>

				<p class="sg-about-leadership__signature sg-about-reveal" data-sg-reveal="fade-up">
					<?php esc_html_e( 'Solanique Group Leadership', 'solanique' ); ?>
				</p>
			</div>

			<div class="sg-about-leadership__frame sg-about-reveal" data-sg-reveal="scale-in">
				<?php
				echo sg_asset_img(
					'images/about/illuminated-commercial-office-buildings-night.jpg',
					__( 'Illuminated commercial buildings representing Solanique Group advisory perspective.', 'solanique' ),
					array(
						'class'  => 'sg-about-leadership__image sg-img sg-img--cover',
						'width'  => 2048,
						'height' => 1149,
						'sizes'  => '(min-width: 64rem) 36vw, 100vw',
					)
				);
				?>
				<span class="sg-about-leadership__frame-line sg-about-leadership__frame-line--one"></span>
				<span class="sg-about-leadership__frame-line sg-about-leadership__frame-line--two"></span>
				<span class="sg-about-leadership__frame-mark"></span>
			</div>
		</div>
	</div>
</section>
