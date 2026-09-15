/**
 * Accessible modal playback for approved local service videos.
 */

const SELECTORS = {
	trigger: '[data-sg-video-trigger]',
	modal: '[data-sg-video-modal]',
	dialog: '[data-sg-video-dialog]',
	player: '[data-sg-video-player]',
	title: '[data-sg-video-title]',
	close: '[data-sg-video-close]',
};

const CLASSES = {
	open: 'sg-video-modal--open',
	bodyLocked: 'sg-is-video-modal-open',
};

const FOCUSABLE_SELECTOR = [
	'a[href]',
	'button:not([disabled])',
	'video[controls]',
	'[tabindex]:not([tabindex="-1"])',
].join(',');

const REDUCED_MOTION_QUERY = '(prefers-reduced-motion: reduce)';
const MOBILE_QUERY = '(max-width: 47.98rem)';

export const initVideoModal = (scope = document) => {
	const modal = document.querySelector(SELECTORS.modal);
	const triggers = Array.from(scope.querySelectorAll(SELECTORS.trigger));

	if (!(modal instanceof HTMLElement) || !triggers.length || modal.dataset.sgVideoModalInitialized === 'true') {
		return;
	}

	const dialog = modal.querySelector(SELECTORS.dialog);
	const player = modal.querySelector(SELECTORS.player);
	const title = modal.querySelector(SELECTORS.title);
	const closeButtons = Array.from(modal.querySelectorAll(SELECTORS.close));

	if (!(dialog instanceof HTMLElement) || !(player instanceof HTMLVideoElement)) {
		return;
	}

	modal.dataset.sgVideoModalInitialized = 'true';

	let previousFocus = null;

	const setModalInert = (isInert) => {
		if ('inert' in modal) {
			modal.inert = isInert;
			return;
		}

		if (isInert) {
			modal.setAttribute('inert', '');
			return;
		}

		modal.removeAttribute('inert');
	};

	const closeModal = ({ restoreFocus = true } = {}) => {
		modal.classList.remove(CLASSES.open);
		modal.setAttribute('aria-hidden', 'true');
		setModalInert(true);
		document.body.classList.remove(CLASSES.bodyLocked);
		player.pause();
		player.removeAttribute('src');
		player.removeAttribute('poster');
		player.load();

		if (restoreFocus && previousFocus instanceof HTMLElement) {
			previousFocus.focus();
		}
	};

	const openModal = (trigger) => {
		const src = trigger.dataset.videoSrc || '';

		if (!src) {
			return;
		}

		previousFocus = document.activeElement;
		player.src = src;

		if (trigger.dataset.videoPoster) {
			player.poster = trigger.dataset.videoPoster;
		}

		if (title instanceof HTMLElement && trigger.dataset.videoTitle) {
			title.textContent = trigger.dataset.videoTitle;
		}

		modal.classList.add(CLASSES.open);
		modal.setAttribute('aria-hidden', 'false');
		setModalInert(false);
		document.body.classList.add(CLASSES.bodyLocked);

		window.requestAnimationFrame(() => {
			dialog.focus();
		});
	};

	const trapFocus = (event) => {
		if (!modal.classList.contains(CLASSES.open) || event.key !== 'Tab') {
			return;
		}

		const focusable = Array.from(dialog.querySelectorAll(FOCUSABLE_SELECTOR)).filter((element) => (
			element instanceof HTMLElement && element.getClientRects().length > 0
		));

		if (!focusable.length) {
			event.preventDefault();
			dialog.focus();
			return;
		}

		const first = focusable[0];
		const last = focusable[focusable.length - 1];

		if (event.shiftKey && document.activeElement === first) {
			event.preventDefault();
			last.focus();
			return;
		}

		if (!event.shiftKey && document.activeElement === last) {
			event.preventDefault();
			first.focus();
		}
	};

	triggers.forEach((trigger) => {
		if (!(trigger instanceof HTMLElement)) {
			return;
		}

		trigger.addEventListener('click', () => openModal(trigger));
	});

	closeButtons.forEach((button) => {
		button.addEventListener('click', () => closeModal());
	});

	document.addEventListener('keydown', (event) => {
		if (!modal.classList.contains(CLASSES.open)) {
			return;
		}

		if (event.key === 'Escape') {
			event.preventDefault();
			closeModal();
			return;
		}

		trapFocus(event);
	});

	const reducedMotion = window.matchMedia(REDUCED_MOTION_QUERY);
	const mobile = window.matchMedia(MOBILE_QUERY);

	triggers.forEach((trigger) => {
		if (!(trigger instanceof HTMLElement) || trigger.dataset.videoAutoplayMode !== 'section-once') {
			return;
		}

		if (reducedMotion.matches || mobile.matches || !('IntersectionObserver' in window)) {
			return;
		}

		const key = `solanique-video-seen:${trigger.dataset.videoId || trigger.dataset.videoSrc || ''}`;

		if (window.sessionStorage.getItem(key)) {
			return;
		}

		const observer = new IntersectionObserver((entries) => {
			entries.forEach((entry) => {
				if (!entry.isIntersecting || window.sessionStorage.getItem(key)) {
					return;
				}

				window.sessionStorage.setItem(key, 'true');
				openModal(trigger);
				observer.disconnect();
			});
		}, { threshold: 0.68 });

		observer.observe(trigger);
	});
};
