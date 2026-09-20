<?php
/**
 * Solanique Club pathways.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$content  = solanique_get_final_page_copy( 'solanique_club' );
$pathways = (array) ( $content['pathways'] ?? array() );
?>

<?php if ( ! empty( $pathways ) ) : ?>
	<section id="sg-solanique-club-areas" class="sg-section sg-product-section sg-solanique-club-areas" aria-labelledby="sg-solanique-club-areas-title">
		<div class="sg-container sg-container--xl">
			<div class="sg-product-section__header sg-flow" data-sg-stagger>
				<p class="sg-product-section__eyebrow" data-sg-reveal="fade-up"><?php echo esc_html( $content['brand'] ?? '' ); ?></p>
				<h2 id="sg-solanique-club-areas-title" class="sg-product-section__title" data-sg-reveal="fade-up">
					<?php echo esc_html( $content['service'] ?? '' ); ?>
				</h2>
			</div>

			<div class="sg-solanique-club-areas__grid" data-sg-stagger>
				<?php foreach ( $pathways as $index => $pathway ) : ?>
					<article class="sg-solanique-club-card sg-flow" data-sg-reveal="fade-up">
						<span class="sg-solanique-club-card__number"><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						<div class="sg-solanique-club-card__body sg-flow">
							<h3 class="sg-solanique-club-card__title"><?php echo esc_html( $pathway['title'] ?? '' ); ?></h3>
							<?php if ( ! empty( $pathway['subheading'] ) ) : ?>
								<p class="sg-solanique-club-card__kicker"><?php echo esc_html( $pathway['subheading'] ); ?></p>
							<?php endif; ?>
							<?php if ( ! empty( $pathway['focus'] ) ) : ?>
								<p class="sg-solanique-club-card__text">
									<?php if ( ! empty( $pathway['focus_label'] ) ) : ?>
										<strong><?php echo esc_html( $pathway['focus_label'] ); ?></strong>
									<?php endif; ?>
									<?php echo esc_html( $pathway['focus'] ); ?>
								</p>
							<?php endif; ?>

							<?php if ( ! empty( $pathway['offers'] ) ) : ?>
								<div class="sg-solanique-club-card__group sg-flow">
									<?php if ( ! empty( $pathway['offers_label'] ) ) : ?>
										<h4 class="sg-solanique-club-card__label"><?php echo esc_html( $pathway['offers_label'] ); ?></h4>
									<?php endif; ?>
									<ul class="sg-solanique-club-card__list">
										<?php foreach ( (array) $pathway['offers'] as $offer ) : ?>
											<li><?php echo esc_html( $offer ); ?></li>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php endif; ?>

							<?php if ( ! empty( $pathway['areas'] ) ) : ?>
								<div class="sg-solanique-club-card__group sg-flow">
									<?php if ( ! empty( $pathway['areas_label'] ) ) : ?>
										<h4 class="sg-solanique-club-card__label"><?php echo esc_html( $pathway['areas_label'] ); ?></h4>
									<?php endif; ?>
									<ul class="sg-solanique-club-card__list sg-solanique-club-card__list--areas">
										<?php foreach ( (array) $pathway['areas'] as $area ) : ?>
											<li>
												<strong><?php echo esc_html( $area['title'] ?? '' ); ?></strong>
												<span><?php echo esc_html( $area['text'] ?? '' ); ?></span>
												<?php
												$area_url = solanique_get_final_mailto( $area['email'] ?? '' );
												if ( '' !== $area_url && ! empty( $area['action'] ) ) :
													?>
													<a class="sg-solanique-club-card__link" href="<?php echo esc_url( $area_url ); ?>"><?php echo esc_html( $area['action'] ); ?></a>
												<?php endif; ?>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php endif; ?>

							<?php if ( ! empty( $pathway['security'] ) ) : ?>
								<p class="sg-solanique-club-card__note">
									<?php if ( ! empty( $pathway['security_label'] ) ) : ?>
										<strong><?php echo esc_html( $pathway['security_label'] ); ?></strong>
									<?php endif; ?>
									<?php echo esc_html( $pathway['security'] ); ?>
								</p>
							<?php endif; ?>

							<?php if ( ! empty( $pathway['compliance'] ) ) : ?>
								<p class="sg-solanique-club-card__note">
									<?php if ( ! empty( $pathway['compliance_label'] ) ) : ?>
										<strong><?php echo esc_html( $pathway['compliance_label'] ); ?></strong>
									<?php endif; ?>
									<?php echo esc_html( $pathway['compliance'] ); ?>
								</p>
							<?php endif; ?>

							<?php
							$pathway_url = solanique_get_final_mailto( $pathway['email'] ?? '' );
							if ( '' !== $pathway_url && ! empty( $pathway['action'] ) ) :
								?>
								<a class="sg-button sg-button--ghost" href="<?php echo esc_url( $pathway_url ); ?>"><?php echo esc_html( $pathway['action'] ); ?></a>
							<?php endif; ?>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>
