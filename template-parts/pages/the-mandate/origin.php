<?php
/** Continuous approved founder story over the existing pinned backdrop. @package Solanique */
defined( 'ABSPATH' ) || exit;
$content = solanique_get_final_page_copy( 'the_mandate' );
$origin  = $content['origin'] ?? array();
?>
<section class="sg-content-scene sg-mandate-origin sg-parallax sg-parallax-scene sg-parallax-scene--mandate" aria-labelledby="sg-mandate-origin-title" data-sg-parallax-scene data-parallax-id="mandate-origin" data-parallax-speed="0.22">
	<div class="sg-parallax-scene__media sg-parallax__media" data-sg-parallax-media aria-hidden="true">
		<?php echo sg_asset_img( 'images/about/illuminated-commercial-office-buildings-night.jpg', '', array( 'class' => 'sg-parallax-scene__image', 'width' => 2048, 'height' => 1365, 'sizes' => '100vw' ) ); ?>
		<div class="sg-parallax-scene__overlay"></div>
	</div>
	<div class="sg-parallax-scene__panels">
		<div class="sg-section sg-mandate-origin__reading">
			<div class="sg-container sg-container--lg">
				<div class="sg-product-intro__content sg-flow">
					<h2 id="sg-mandate-origin-title" class="sg-product-intro__title"><?php echo esc_html( $origin['heading'] ?? '' ); ?></h2>
					<?php foreach ( (array) ( $origin['paragraphs'] ?? array() ) as $paragraph ) : ?>
						<p class="sg-product-intro__text"><?php echo esc_html( $paragraph ); ?></p>
					<?php endforeach; ?>
					<div class="sg-mandate-signature" aria-label="<?php esc_attr_e( 'Founder signature', 'solanique' ); ?>">
						<span class="sg-mandate-signature__rule" aria-hidden="true"></span>
						<p class="sg-mandate-signature__name">Sandra Lorena Medina Solano</p>
						<p class="sg-mandate-signature__title">Founder and CEO of Solanique Group</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
