<?php
/**
 * About page mission and vision section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="sg-section sg-product-section sg-about-mission" aria-labelledby="sg-about-mission-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-product-section__header sg-about-mission__header sg-flow" data-sg-stagger>
			<p class="sg-product-section__eyebrow sg-about-mission__eyebrow sg-about-reveal" data-sg-reveal="fade-up">
				<?php esc_html_e( 'Mission & Vision', 'solanique' ); ?>
			</p>

			<h2 id="sg-about-mission-title" class="sg-product-section__title sg-about-mission__title sg-about-reveal" data-sg-reveal="fade-up">
				<?php esc_html_e( 'Mission & Vision', 'solanique' ); ?>
			</h2>
		</div>

		<div class="sg-about-mission__grid" data-sg-stagger>
			<article class="sg-about-mission__item sg-about-mission__item--mission sg-flow sg-about-reveal" data-sg-reveal="fade-up">
				<span class="sg-about-mission__line" aria-hidden="true"></span>
				<h3 class="sg-about-mission__item-title"><?php esc_html_e( 'Our Mission', 'solanique' ); ?></h3>
				<p class="sg-about-mission__text">
					<?php esc_html_e( 'To deliver an integrated ecosystem of capital strategy, development vision, real estate stewardship, and lifestyle mastery that empowers global visionaries with clarity, discretion, and long-term intent.', 'solanique' ); ?>
				</p>
			</article>

			<article class="sg-about-mission__item sg-about-mission__item--vision sg-flow sg-about-reveal" data-sg-reveal="fade-up">
				<span class="sg-about-mission__line" aria-hidden="true"></span>
				<h3 class="sg-about-mission__item-title"><?php esc_html_e( 'Our Vision', 'solanique' ); ?></h3>
				<p class="sg-about-mission__text">
					<?php esc_html_e( 'To set a trusted private standard where every property represents potential, prestige, prosperity, and legacy, connecting local roots with a borderless advisory vision.', 'solanique' ); ?>
				</p>
			</article>
		</div>
	</div>
</section>
