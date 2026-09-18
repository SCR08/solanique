<?php
/**
 * Capital professional credentials and affiliation logo sections.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$credentials  = function_exists( 'sg_get_professional_credentials' ) ? sg_get_professional_credentials() : array();
$affiliations = function_exists( 'sg_get_professional_affiliations' ) ? sg_get_professional_affiliations() : array();

if ( empty( $credentials ) && empty( $affiliations ) ) {
	return;
}
?>

<section class="sg-section sg-product-section sg-capital-partners" aria-labelledby="sg-capital-credentials-title">
	<div class="sg-container sg-container--xl">
		<?php if ( ! empty( $credentials ) ) : ?>
			<div class="sg-capital-credentials" data-sg-stagger>
				<div class="sg-product-section__header sg-flow">
					<p class="sg-product-section__eyebrow" data-sg-reveal="fade-up"><?php esc_html_e( 'Professional Credentials', 'solanique' ); ?></p>
					<h2 id="sg-capital-credentials-title" class="sg-product-section__title" data-sg-reveal="fade-up"><?php esc_html_e( 'Credentials aligned with Capital guidance.', 'solanique' ); ?></h2>
				</div>

				<div class="sg-capital-credentials__grid" aria-label="<?php esc_attr_e( 'Professional credential logos', 'solanique' ); ?>">
					<?php foreach ( $credentials as $credential ) : ?>
						<?php
						$credential_lines = ! empty( $credential['credential_lines'] ) && is_array( $credential['credential_lines'] )
							? array_filter( array_map( 'strval', $credential['credential_lines'] ) )
							: array_filter(
								array(
									(string) ( $credential['visible_title'] ?? '' ),
									(string) ( $credential['secondary_title'] ?? '' ),
								)
							);
						?>
						<article class="sg-capital-credential-card" data-sg-reveal="fade-up" aria-label="<?php echo esc_attr( (string) $credential['logo_alt'] ); ?>">
							<div class="sg-capital-credential-card__logo-wrap">
								<?php
								echo sg_asset_img(
									(string) $credential['logo_path'],
									(string) $credential['logo_alt'],
									array(
										'class'  => 'sg-capital-credential-card__logo',
										'width'  => absint( $credential['logo_width'] ?? 1200 ),
										'height' => absint( $credential['logo_height'] ?? 600 ),
										'sizes'  => '(min-width: 64rem) 22rem, 72vw',
									)
								);
								?>
							</div>

							<?php if ( ! empty( $credential_lines ) ) : ?>
								<p class="sg-capital-credential-card__label">
									<?php foreach ( $credential_lines as $line ) : ?>
										<span><?php echo esc_html( $line ); ?></span>
									<?php endforeach; ?>
								</p>
							<?php endif; ?>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $affiliations ) ) : ?>
			<div class="sg-capital-affiliations" data-sg-stagger>
				<div class="sg-product-section__header sg-flow">
					<p class="sg-product-section__eyebrow" data-sg-reveal="fade-up"><?php esc_html_e( 'Professional Affiliations', 'solanique' ); ?></p>
				</div>

				<div class="sg-capital-affiliations__grid" aria-label="<?php esc_attr_e( 'Professional affiliation logos', 'solanique' ); ?>">
					<?php foreach ( $affiliations as $affiliation ) : ?>
						<article class="sg-capital-affiliation-card" data-sg-reveal="fade-up" aria-label="<?php echo esc_attr( (string) $affiliation['logo_alt'] ); ?>">
							<?php
							echo sg_asset_img(
								(string) $affiliation['logo_path'],
								(string) $affiliation['logo_alt'],
								array(
									'class'  => 'sg-capital-affiliation-card__logo',
									'width'  => absint( $affiliation['logo_width'] ?? 1200 ),
									'height' => absint( $affiliation['logo_height'] ?? 600 ),
									'sizes'  => '(min-width: 64rem) 14rem, 46vw',
								)
							);
							?>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
