<?php
/**
 * Theme footer.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$social_links = function_exists( 'solanique_get_footer_social_links' ) ? solanique_get_footer_social_links() : array();
$social_labels = function_exists( 'solanique_get_footer_social_network_labels' ) ? solanique_get_footer_social_network_labels() : array();
$legal_links  = function_exists( 'solanique_get_footer_legal_links' ) ? solanique_get_footer_legal_links() : array();
?>
</main>

<footer class="sg-site-footer">
	<div class="sg-container sg-site-footer__inner">
		<div class="sg-site-footer__main">
			<div class="sg-site-footer__brand-area sg-flow">
				<?php echo solanique_get_brand_link( false, 'footer' ); ?>
			</div>

			<nav class="sg-nav sg-nav--footer sg-site-footer__nav" aria-label="<?php esc_attr_e( 'Footer navigation', 'solanique' ); ?>">
				<?php solanique_render_footer_navigation( 'sg-footer-menu' ); ?>
			</nav>

			<?php if ( ! empty( $social_links ) ) : ?>
				<nav class="sg-site-footer__social" aria-label="<?php esc_attr_e( 'Social media', 'solanique' ); ?>">
					<ul class="sg-site-footer__social-list">
						<?php foreach ( $social_links as $network => $link ) : ?>
							<li class="sg-site-footer__social-item">
								<a class="sg-site-footer__social-link" href="<?php echo esc_url( $link['url'] ); ?>" aria-label="<?php echo esc_attr( $link['label'] ); ?>" rel="me noopener">
									<?php echo solanique_get_social_icon_svg( $network ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Icons are static SVG strings selected by key. ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</nav>
			<?php elseif ( ! empty( $social_labels ) ) : ?>
				<?php // Add official social media URLs before production. ?>
				<div class="sg-site-footer__social sg-site-footer__social--pending" role="group" aria-label="<?php esc_attr_e( 'Social media links pending', 'solanique' ); ?>">
					<ul class="sg-site-footer__social-list">
						<?php foreach ( $social_labels as $network => $label ) : ?>
							<li class="sg-site-footer__social-item">
								<span class="sg-site-footer__social-link sg-site-footer__social-link--placeholder" aria-hidden="true" title="<?php echo esc_attr( $label ); ?>">
									<?php echo solanique_get_social_icon_svg( $network ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Icons are static SVG strings selected by key. ?>
								</span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
		</div>

		<div class="sg-site-footer__bottom">
			<?php if ( ! empty( $legal_links ) ) : ?>
				<nav class="sg-site-footer__legal" aria-label="<?php esc_attr_e( 'Legal navigation', 'solanique' ); ?>">
					<ul class="sg-site-footer__legal-list">
						<?php foreach ( $legal_links as $link ) : ?>
							<li class="sg-site-footer__legal-item">
								<a class="sg-site-footer__legal-link" href="<?php echo esc_url( $link['url'] ); ?>">
									<?php echo esc_html( $link['label'] ); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</nav>
			<?php endif; ?>

			<p class="sg-site-footer__meta">
				&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php esc_html_e( 'Solanique Group. All rights reserved.', 'solanique' ); ?>
			</p>
		</div>
	</div>
</footer>

<?php get_template_part( 'template-parts/components/video-modal' ); ?>
<?php wp_footer(); ?>
</body>
</html>
