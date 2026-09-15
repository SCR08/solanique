<?php
/**
 * The Mandate origin section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content = solanique_get_final_page_copy( 'the_mandate' );
$origin  = $content['origin'] ?? array();
$paragraphs = (array) ( $origin['paragraphs'] ?? array() );
$origin_intro_paragraphs   = array_slice( $paragraphs, 0, 2 );
$origin_closing_paragraphs = array_slice( $paragraphs, 2 );
?>

<section class="sg-section sg-product-intro sg-mandate-origin sg-parallax sg-parallax-scene sg-parallax-scene--mandate sg-parallax--mandate" aria-labelledby="sg-mandate-origin-title" data-sg-parallax data-sg-parallax-scene data-parallax-id="mandate-origin" data-parallax-speed="0.22">
	<div class="sg-mandate-origin__backdrop sg-parallax-scene__media sg-parallax__media" data-sg-parallax-media aria-hidden="true">
		<?php
		echo sg_asset_img(
			'images/about/illuminated-commercial-office-buildings-night.jpg',
			'',
			array(
				'class'  => 'sg-mandate-origin__backdrop-image sg-parallax-scene__image sg-parallax__image sg-img sg-img--cover',
				'width'  => 2048,
				'height' => 1365,
				'sizes'  => '100vw',
			)
		);
		?>
		<div class="sg-mandate-origin__overlay sg-parallax-scene__overlay sg-parallax__overlay" aria-hidden="true"></div>
	</div>

	<div class="sg-parallax-scene__panels">
		<div class="sg-parallax-panel sg-parallax-panel--glass">
			<div class="sg-container sg-container--xl sg-parallax-panel__inner">
				<div class="sg-product-intro__layout">
					<div class="sg-product-intro__content sg-flow" data-sg-stagger>
						<p class="sg-product-section__eyebrow" data-sg-reveal="fade-up"><?php echo esc_html( $content['title'] ?? '' ); ?></p>
						<h2 id="sg-mandate-origin-title" class="sg-product-intro__title" data-sg-reveal="fade-up">
							<?php echo esc_html( $origin['heading'] ?? '' ); ?>
						</h2>
						<?php foreach ( $origin_intro_paragraphs as $paragraph ) : ?>
							<p class="sg-product-intro__text" data-sg-reveal="fade-up">
								<?php echo esc_html( $paragraph ); ?>
							</p>
						<?php endforeach; ?>
					</div>

					<figure class="sg-product-intro__frame sg-mandate-origin__frame" data-sg-reveal="scale-in">
						<?php
						echo sg_asset_img(
							'images/about/illuminated-commercial-office-buildings-night.jpg',
							'',
							array(
								'class'  => 'sg-product-intro__frame-image sg-img sg-img--cover',
								'width'  => 2048,
								'height' => 1365,
								'sizes'  => '(min-width: 64rem) 42vw, 100vw',
							)
						);
						?>
					</figure>
				</div>
			</div>
		</div>

		<div class="sg-parallax-panel sg-parallax-panel--solid" aria-hidden="true">
			<div class="sg-container sg-parallax-panel__inner">
				<span class="sg-parallax-panel__rule"></span>
			</div>
		</div>

		<?php if ( ! empty( $origin_closing_paragraphs ) ) : ?>
			<div class="sg-parallax-panel sg-parallax-panel--glass sg-parallax-panel--secondary">
				<div class="sg-container sg-container--xl sg-parallax-panel__inner">
					<div class="sg-product-intro__content sg-flow" data-sg-stagger>
						<?php foreach ( $origin_closing_paragraphs as $paragraph ) : ?>
							<p class="sg-product-intro__text" data-sg-reveal="fade-up">
								<?php echo esc_html( $paragraph ); ?>
							</p>
						<?php endforeach; ?>

						<div class="sg-mandate-signature" data-sg-reveal="fade-up" aria-label="<?php esc_attr_e( 'Founder signature', 'solanique' ); ?>">
							<span class="sg-mandate-signature__rule" aria-hidden="true"></span>
							<p class="sg-mandate-signature__name">Sandra Lorena Medina Solano</p>
							<p class="sg-mandate-signature__title">Founder and CEO of Solanique Group</p>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
