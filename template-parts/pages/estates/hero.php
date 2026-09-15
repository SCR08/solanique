<?php
/**
 * Estates page hero section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content       = solanique_get_final_page_copy( 'estate' );
$primary_url   = solanique_get_final_mailto( $content['cta']['email'] ?? '' );
$secondary_url = '#sg-estates-advisory';
$hero_cta      = $content['hero_cta'] ?? ( $content['cta']['label'] ?? '' );
?>

<section class="sg-product-hero sg-estates-hero" aria-labelledby="sg-estates-hero-title">
	<div class="sg-product-hero__visual sg-estates-hero__visual sg-estates-reveal" data-sg-reveal="scale-in">
		<div class="sg-product-hero__visual-shell sg-product-hero__image-frame sg-estates-hero__plan">
			<?php
			echo sg_asset_img(
				'images/estates/luxury-real-estate-modern-glass-building.jpg',
				__( 'Modern glass building representing Solanique Estates real estate advisory.', 'solanique' ),
				array(
					'class'         => 'sg-product-hero__image sg-estates-hero__image sg-img sg-img--cover',
					'width'         => 2048,
					'height'        => 1366,
					'loading'       => 'eager',
					'fetchpriority' => 'high',
					'sizes'         => '100vw',
				)
			);
			?>
			<span class="sg-estates-hero__wall sg-estates-hero__wall--one"></span>
			<span class="sg-estates-hero__wall sg-estates-hero__wall--two"></span>
			<span class="sg-estates-hero__wall sg-estates-hero__wall--three"></span>
			<span class="sg-estates-hero__wall sg-estates-hero__wall--four"></span>
			<span class="sg-estates-hero__room sg-estates-hero__room--primary"></span>
			<span class="sg-estates-hero__room sg-estates-hero__room--secondary"></span>
			<span class="sg-estates-hero__room sg-estates-hero__room--tertiary"></span>
		</div>
	</div>

	<div class="sg-container sg-container--xl sg-product-hero__inner sg-estates-hero__inner">
		<div class="sg-product-hero__content sg-estates-hero__content sg-flow" data-sg-stagger>
			<span class="sg-product-hero__line sg-estates-hero__line" aria-hidden="true" data-sg-reveal="line"></span>

			<p class="sg-product-hero__eyebrow sg-estates-hero__eyebrow sg-estates-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['service'] ?? '' ); ?>
			</p>

			<h1 id="sg-estates-hero-title" class="sg-product-hero__title sg-estates-hero__title sg-estates-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['headline'] ?? '' ); ?>
			</h1>

			<p class="sg-product-hero__text sg-estates-hero__text sg-estates-reveal" data-sg-reveal="fade-up">
				<?php echo esc_html( $content['intro'] ?? '' ); ?>
			</p>

			<div class="sg-cluster sg-product-hero__actions sg-estates-hero__actions sg-estates-reveal" data-sg-reveal="fade-up">
				<?php if ( '' !== $primary_url && '' !== $hero_cta ) : ?>
					<a class="sg-button sg-button--lg" href="<?php echo esc_url( $primary_url ); ?>">
						<?php echo esc_html( $hero_cta ); ?>
					</a>
				<?php endif; ?>
				<a class="sg-button sg-button--ghost sg-product-hero__secondary-link sg-estates-hero__secondary-link" href="<?php echo esc_url( $secondary_url ); ?>">
					<?php echo esc_html( $content['services']['heading'] ?? '' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>
