<?php
/** Homepage Google review invitation and approved excerpts. @package Solanique */
defined( 'ABSPATH' ) || exit;
$reviews = sg_get_home_reviews();
?>
<section class="sg-section sg-home-reviews" lang="<?php echo esc_attr( sg_current_lang() ); ?>" aria-labelledby="sg-home-reviews-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-home-reviews__header">
			<h2 id="sg-home-reviews-title" class="sg-home-reviews__title"><?php esc_html_e( 'Your experience, in your words.', 'solanique' ); ?></h2>
			<div class="sg-home-reviews__invitation">
				<p><?php esc_html_e( 'Share your experience with Solanique Group on Google.', 'solanique' ); ?></p>
				<a class="sg-button sg-button--lg" href="<?php echo esc_url( sg_google_review_url() ); ?>" target="_blank" rel="noopener noreferrer">
					<?php esc_html_e( 'Write a Google review', 'solanique' ); ?>
					<span class="sg-u--sr-only"><?php esc_html_e( '(opens in a new tab)', 'solanique' ); ?></span>
				</a>
			</div>
		</div>
		<?php if ( $reviews ) : ?>
			<ul class="sg-home-reviews__list" role="list">
				<?php foreach ( $reviews as $review ) : ?>
					<li class="sg-home-reviews__item">
						<figure class="sg-home-reviews__quote">
							<blockquote lang="<?php echo esc_attr( $review['language'] ); ?>"><?php echo wpautop( esc_html( $review['text'] ) ); ?></blockquote>
							<figcaption>
								<span class="sg-home-reviews__name"><?php echo esc_html( $review['name'] ); ?></span>
								<?php if ( $review['other_brokerage'] ) : ?>
									<span><?php echo esc_html( 'es' === sg_current_lang() ? 'Experiencia con Sandra en otra correduría.' : 'Experience with Sandra at another brokerage.' ); ?></span>
								<?php endif; ?>
								<?php if ( '' !== $review['source'] ) : ?>
								<a href="<?php echo esc_url( $review['source'] ); ?>" target="_blank" rel="noopener noreferrer">
									<?php esc_html_e( 'Read on Google', 'solanique' ); ?>
									<span class="sg-u--sr-only"><?php echo esc_html( ' - ' . $review['name'] . ' ' . __( '(opens in a new tab)', 'solanique' ) ); ?></span>
								</a>
								<?php endif; ?>
							</figcaption>
						</figure>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
