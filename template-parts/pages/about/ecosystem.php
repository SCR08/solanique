<?php
/**
 * About page integrated ecosystem section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$ecosystem_items = array(
	array(
		'slug'        => 'capital',
		'number'      => '01',
		'title'       => __( 'Solanique Capital', 'solanique' ),
		'description' => __( 'Capital architecture, strategic acquisition, private opportunity review, and business advisory for clients building durable growth.', 'solanique' ),
		'details'     => array(
			__( 'Capital strategy, acquisition planning, and business advisory', 'solanique' ),
			__( 'Capital and mortgage planning', 'solanique' ),
			__( 'Private JV and off-market conversations', 'solanique' ),
		),
		'cta'         => __( 'Explore Capital', 'solanique' ),
		'url'         => solanique_get_page_url( 'capital', '/capital/' ),
		'image'       => 'images/estates/commercial-real-estate-investment-meeting.jpg',
		'image_alt'   => __( 'Professional meeting environment representing Solanique Capital strategy.', 'solanique' ),
		'width'       => 2048,
		'height'      => 1365,
	),
	array(
		'slug'        => 'estates',
		'number'      => '02',
		'title'       => __( 'Solanique Estates', 'solanique' ),
		'description' => __( 'Development oversight, property management, owner visibility, and estate stewardship for physical assets that require disciplined care.', 'solanique' ),
		'details'     => array(
			__( 'Real estate stewardship, development, and property management', 'solanique' ),
			__( 'Property management and owner visibility', 'solanique' ),
			__( 'Seasonal asset care and maintenance coordination', 'solanique' ),
		),
		'cta'         => __( 'Explore Estates', 'solanique' ),
		'url'         => solanique_get_page_url( 'estates', '/estates/' ),
		'image'       => 'images/estates/luxury-real-estate-modern-glass-building.jpg',
		'image_alt'   => __( 'Modern glass real estate building representing Solanique Estates advisory.', 'solanique' ),
		'width'       => 2048,
		'height'      => 1366,
	),
	array(
		'slug'        => 'concierge',
		'number'      => '03',
		'title'       => __( 'Solanique Concierge', 'solanique' ),
		'description' => __( 'Lifestyle logistics, household coordination, family support, and personal assistance designed to restore time and remove friction.', 'solanique' ),
		'details'     => array(
			__( 'Private concierge, lifestyle logistics, and household coordination', 'solanique' ),
			__( 'Family care and transition support', 'solanique' ),
			__( 'Private transport and household operations', 'solanique' ),
		),
		'cta'         => __( 'Explore Concierge', 'solanique' ),
		'url'         => solanique_get_page_url( 'concierge', '/concierge/' ),
		'image'       => 'images/concierge/chauffeur-opening-car-door-luxury-transport.jpg',
		'image_alt'   => __( 'Chauffeur opening a car door representing Solanique Concierge coordination.', 'solanique' ),
		'width'       => 2048,
		'height'      => 1365,
	),
);
?>

<section id="sg-about-ecosystem" class="sg-section sg-home-ecosystem sg-about-ecosystem" aria-labelledby="sg-about-ecosystem-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-home-ecosystem__header sg-about-ecosystem__header sg-flow" data-sg-stagger>
			<p class="sg-home-ecosystem__eyebrow sg-about-ecosystem__eyebrow sg-about-reveal" data-sg-reveal="fade-up">
				<?php esc_html_e( 'Integrated Ecosystem', 'solanique' ); ?>
			</p>

			<h2 id="sg-about-ecosystem-title" class="sg-home-ecosystem__title sg-about-ecosystem__title sg-about-reveal" data-sg-reveal="fade-up">
				<?php esc_html_e( 'One Ecosystem. Three Disciplines.', 'solanique' ); ?>
			</h2>

			<p class="sg-home-ecosystem__intro sg-about-ecosystem__intro sg-about-reveal" data-sg-reveal="fade-up">
				<?php esc_html_e( 'Solanique Group fuses three connected disciplines so clients can move from fragmented service providers into one clear private advisory ecosystem.', 'solanique' ); ?>
			</p>
		</div>

		<div class="sg-home-panels sg-about-ecosystem__panels sg-about-reveal" data-sg-ecosystem-panels data-sg-active-panel="0" data-sg-reveal="fade-up">
			<?php foreach ( $ecosystem_items as $index => $item ) : ?>
				<?php
				$is_active  = 0 === $index;
				$panel_id   = 'sg-about-panel-' . sanitize_html_class( $item['slug'] );
				$panel_attr = $is_active ? '' : ' aria-hidden="true" inert';
				?>
				<article class="sg-home-panel sg-about-ecosystem__panel<?php echo $is_active ? ' is-active' : ''; ?>" data-sg-ecosystem-panel>
					<figure class="sg-home-panel__media sg-about-ecosystem__media">
						<?php
						echo sg_asset_img(
							$item['image'],
							$item['image_alt'] ?? '',
							array(
								'class'  => 'sg-home-panel__image sg-about-ecosystem__image sg-img sg-img--cover',
								'width'  => $item['width'],
								'height' => $item['height'],
								'sizes'  => '(min-width: 64rem) 80vw, 86vw',
							)
						);
						?>
					</figure>

					<button
						id="<?php echo esc_attr( $panel_id . '-trigger' ); ?>"
						class="sg-home-panel__trigger sg-about-ecosystem__trigger"
						type="button"
						aria-controls="<?php echo esc_attr( $panel_id . '-content' ); ?>"
						aria-expanded="<?php echo $is_active ? 'true' : 'false'; ?>"
						data-sg-ecosystem-trigger
					>
						<span class="sg-home-panel__trigger-number"><?php echo esc_html( $item['number'] ); ?></span>
						<span class="sg-home-panel__trigger-title"><?php echo esc_html( $item['title'] ); ?></span>
					</button>

					<div
						id="<?php echo esc_attr( $panel_id . '-content' ); ?>"
						class="sg-home-panel__content sg-about-ecosystem__content sg-flow"
						data-sg-ecosystem-content
						<?php echo $panel_attr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<span class="sg-home-panel__number"><?php echo esc_html( $item['number'] ); ?></span>
						<h3 class="sg-home-panel__title"><?php echo esc_html( $item['title'] ); ?></h3>
						<p class="sg-home-panel__text"><?php echo esc_html( $item['description'] ); ?></p>
						<ul class="sg-home-panel__details" aria-label="<?php echo esc_attr( sprintf( __( '%s service highlights', 'solanique' ), $item['title'] ) ); ?>">
							<?php foreach ( $item['details'] as $detail ) : ?>
								<li><?php echo esc_html( $detail ); ?></li>
							<?php endforeach; ?>
						</ul>
						<a class="sg-home-panel__link" href="<?php echo esc_url( $item['url'] ); ?>">
							<?php echo esc_html( $item['cta'] ); ?>
						</a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
