<?php
/**
 * Homepage hero section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content = solanique_get_final_page_copy( 'home' );
?>

<section class="sg-home-hero" aria-labelledby="solanique-home-hero-title">
	<div class="sg-home-hero__media" aria-hidden="true" data-sg-reveal="fade-in">
		<?php
		echo sg_asset_img(
			'images/estates/commercial-real-estate-skyscrapers-sunlight.jpg',
			'',
			array(
				'class'         => 'sg-home-hero__image sg-img sg-img--cover',
				'width'         => 2048,
				'height'        => 1381,
				'loading'       => 'eager',
				'fetchpriority' => 'high',
				'sizes'         => '100vw',
			)
		);
		?>
	</div>

	<div class="sg-container sg-home-hero__inner">
		<div class="sg-home-hero__content sg-flow" data-sg-stagger>
			<span class="sg-home-hero__line" aria-hidden="true" data-sg-reveal="line"></span>

			<p class="sg-home-hero__eyebrow sg-home-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['brand'] ?? '' ); ?>
			</p>

			<h1 id="solanique-home-hero-title" class="sg-home-hero__title sg-home-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['headline'] ?? '' ); ?>
			</h1>

			<p class="sg-home-hero__scope sg-home-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['tagline'] ?? '' ); ?>
			</p>
		</div>

	</div>
</section>
