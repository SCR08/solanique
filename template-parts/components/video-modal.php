<?php
/**
 * Accessible video modal shell.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="sg-video-modal" aria-hidden="true" inert data-sg-video-modal>
	<div class="sg-video-modal__backdrop" data-sg-video-close></div>
	<div class="sg-video-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="sg-video-modal-title" tabindex="-1" data-sg-video-dialog>
		<div class="sg-video-modal__header">
			<h2 id="sg-video-modal-title" class="sg-video-modal__title" data-sg-video-title><?php esc_html_e( 'Solanique video', 'solanique' ); ?></h2>
			<button class="sg-video-modal__close" type="button" aria-label="<?php esc_attr_e( 'Close video', 'solanique' ); ?>" data-sg-video-close>
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
			</button>
		</div>

		<div class="sg-video-modal__frame">
			<video class="sg-video-modal__player" controls playsinline preload="metadata" data-sg-video-player>
				<?php esc_html_e( 'Your browser does not support embedded video playback.', 'solanique' ); ?>
			</video>
		</div>
	</div>
</div>
