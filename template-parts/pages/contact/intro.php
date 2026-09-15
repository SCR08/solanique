<?php
/**
 * Contact page private conversation intro section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="sg-section sg-product-intro sg-contact-intro" aria-labelledby="sg-contact-intro-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-product-intro__layout sg-contact-intro__layout">
			<div class="sg-contact-intro__aside sg-contact-reveal" aria-hidden="true" data-sg-reveal="line">
				<span class="sg-contact-intro__rule"></span>
			</div>

			<div class="sg-product-intro__content sg-contact-intro__content sg-flow" data-sg-stagger>
				<h2 id="sg-contact-intro-title" class="sg-product-intro__title sg-contact-intro__title sg-contact-reveal" data-sg-reveal="fade-up">
					<?php esc_html_e( 'Your first conversation', 'solanique' ); ?>
					<span><?php esc_html_e( 'should feel considered.', 'solanique' ); ?></span>
				</h2>

				<p class="sg-product-intro__text sg-contact-intro__text sg-contact-reveal" data-sg-reveal="fade-up">
					<?php esc_html_e( 'Solanique Group works with clients who value clarity, privacy, and one trusted point of coordination. Whether the priority is capital, estates, concierge, or a combination of all three, the first step is a confidential introduction.', 'solanique' ); ?>
				</p>
			</div>
		</div>
	</div>
</section>
