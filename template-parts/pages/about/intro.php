<?php
/**
 * About page firm intro section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="sg-section sg-product-intro sg-about-intro" aria-labelledby="sg-about-intro-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-product-intro__layout sg-about-intro__layout">
			<div class="sg-about-intro__aside sg-about-reveal" aria-hidden="true" data-sg-reveal="line">
				<span class="sg-about-intro__rule"></span>
			</div>

			<div class="sg-product-intro__content sg-about-intro__content sg-flow" data-sg-stagger>
				<h2 id="sg-about-intro-title" class="sg-product-intro__title sg-about-intro__title sg-about-reveal" data-sg-reveal="fade-up">
					<?php esc_html_e( 'Beyond the transaction,', 'solanique' ); ?>
					<span><?php esc_html_e( 'there is a larger vision.', 'solanique' ); ?></span>
				</h2>

				<p class="sg-product-intro__text sg-about-intro__text sg-about-reveal" data-sg-reveal="fade-up">
					<?php esc_html_e( 'Solanique Group was created to solve the fragmentation between wealth, homes, and time. The firm brings capital strategy, real estate intelligence, and private lifestyle coordination into one refined advisory experience for clients who expect transformation over transactions.', 'solanique' ); ?>
				</p>
			</div>
		</div>
	</div>
</section>
