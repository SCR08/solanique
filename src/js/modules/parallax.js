/**
 * Sticky scene parallax enhancement for immersive media scenes.
 */

const SELECTORS = {
	root: '[data-sg-parallax-scene], [data-sg-parallax]',
	media: '[data-sg-parallax-media]',
	mediaTarget: 'img, video',
};

const CLASSES = {
	active: 'is-parallax-active',
	ready: 'is-parallax-ready',
	debug: 'sg-debug-parallax',
	debugLabel: 'sg-parallax-debug-label',
};

const DATA_KEYS = {
	initialized: 'sgParallaxInitialized',
};

const REDUCED_MOTION_QUERY = '(prefers-reduced-motion: reduce)';
const MOBILE_QUERY = '(max-width: 47.98rem)';
const DEFAULT_SPEED = 0.2;
const BASE_SPEED = 0.18;
const DEFAULT_SCALE = 1.12;
const MAX_OFFSET = 132;
const MOBILE_MAX_OFFSET = 0;

let parallaxItems = [];
let parallaxItemMap = new WeakMap();
let parallaxObserver = null;
let isTicking = false;
let listenersBound = false;
let isDebugEnabled = false;
let reducedMotionMedia = null;
let mobileMedia = null;

const getMediaQuery = (query) => window.matchMedia(query);

const shouldDisableParallax = () => {
	reducedMotionMedia = reducedMotionMedia || getMediaQuery(REDUCED_MOTION_QUERY);
	mobileMedia = mobileMedia || getMediaQuery(MOBILE_QUERY);

	return reducedMotionMedia.matches || mobileMedia.matches;
};

const parseSpeed = (value) => {
	const speed = Number.parseFloat(value);

	if (!Number.isFinite(speed)) {
		return DEFAULT_SPEED;
	}

	return Math.max(-0.5, Math.min(0.5, speed));
};

const shouldRunDebug = () => {
	try {
		return new URLSearchParams(window.location.search).has('debugParallax');
	} catch (error) {
		return false;
	}
};

const resetItem = (item) => {
	item.root.classList.remove(CLASSES.active, CLASSES.ready);
	item.target.style.removeProperty('transform');
	item.target.style.removeProperty('will-change');
};

const updateItem = (item) => {
	const rect = item.root.getBoundingClientRect();
	const viewportHeight = window.innerHeight || document.documentElement.clientHeight;
	const travel = viewportHeight + rect.height;
	const progress = travel > 0 ? ((viewportHeight - rect.top) / travel) - 0.5 : 0;
	const maxOffset = mobileMedia && mobileMedia.matches ? MOBILE_MAX_OFFSET : MAX_OFFSET;
	const speedFactor = Math.max(0.45, Math.abs(item.speed) / BASE_SPEED);
	const direction = item.speed < 0 ? -1 : 1;
	const offset = Math.max(-maxOffset, Math.min(maxOffset, progress * maxOffset * speedFactor * direction));

	item.target.style.transform = `translate3d(0, ${offset.toFixed(2)}px, 0) scale(${item.scale})`;
};

const updateVisibleItems = () => {
	isTicking = false;

	if (shouldDisableParallax()) {
		parallaxItems.forEach(resetItem);
		return;
	}

	if (document.visibilityState === 'hidden') {
		return;
	}

	parallaxItems.forEach((item) => {
		if (!item.visible) {
			return;
		}

		item.root.classList.add(CLASSES.ready);
		item.target.style.willChange = 'transform';
		updateItem(item);
	});
};

const hasVisibleItems = () => parallaxItems.some((item) => item.visible);

const queueUpdate = ({ force = false } = {}) => {
	if (isTicking) {
		return;
	}

	if (!force && (!hasVisibleItems() || document.visibilityState === 'hidden' || shouldDisableParallax())) {
		return;
	}

	isTicking = true;
	window.requestAnimationFrame(updateVisibleItems);
};

const addDebugLabel = (root) => {
	if (!isDebugEnabled || root.querySelector(`.${CLASSES.debugLabel}`)) {
		return;
	}

	const label = document.createElement('span');
	label.className = CLASSES.debugLabel;
	label.textContent = `parallax scene · ${root.dataset.parallaxId || root.id || 'unlabeled'} · ${root.dataset.parallaxSpeed || DEFAULT_SPEED}`;
	label.setAttribute('aria-hidden', 'true');
	root.append(label);
};

const getItemId = (item, index) => (
	item.root.dataset.parallaxId ||
	item.root.id ||
	item.root.getAttribute('aria-labelledby') ||
	`parallax-${index + 1}`
);

const logDebugSummary = () => {
	if (!isDebugEnabled) {
		return;
	}

	const rows = parallaxItems.map((item, index) => ({
		id: getItemId(item, index),
		speed: item.speed,
		active: item.visible && !shouldDisableParallax(),
	}));

	// Debug-only logs, enabled explicitly with ?debugParallax=1.
	console.info('Solanique parallax scenes detected:');
	console.table(rows);
};

const getObserver = () => {
	if (parallaxObserver) {
		return parallaxObserver;
	}

	parallaxObserver = new IntersectionObserver((entries) => {
		entries.forEach((entry) => {
			const item = parallaxItemMap.get(entry.target);

			if (!item) {
				return;
			}

			item.visible = entry.isIntersecting;
			item.root.classList.toggle(CLASSES.active, entry.isIntersecting && !shouldDisableParallax());

			if (!entry.isIntersecting) {
				item.target.style.removeProperty('transform');
				item.target.style.removeProperty('will-change');
			}
		});

		logDebugSummary();
		queueUpdate({ force: true });
	}, {
		rootMargin: '18% 0px',
		threshold: 0,
	});

	return parallaxObserver;
};

const addMediaChangeListener = (mediaQueryList, callback) => {
	if (typeof mediaQueryList.addEventListener === 'function') {
		mediaQueryList.addEventListener('change', callback);
		return;
	}

	mediaQueryList.addListener(callback);
};

const handleParallaxStateChange = () => {
	parallaxItems.forEach(resetItem);
	queueUpdate({ force: true });
};

const handleVisibilityChange = () => {
	if (document.visibilityState === 'hidden') {
		parallaxItems.forEach(resetItem);
		return;
	}

	queueUpdate({ force: true });
};

export const initParallax = (scope = document) => {
	isDebugEnabled = shouldRunDebug();
	document.documentElement.classList.toggle(CLASSES.debug, isDebugEnabled);

	const roots = Array.from(scope.querySelectorAll(SELECTORS.root));

	if (!roots.length || !('IntersectionObserver' in window) || !('requestAnimationFrame' in window)) {
		return;
	}

	const observer = getObserver();

	roots.forEach((root) => {
		if (!(root instanceof HTMLElement) || root.dataset[DATA_KEYS.initialized] === 'true') {
			return;
		}

		const media = root.querySelector(SELECTORS.media);

		if (!(media instanceof HTMLElement)) {
			return;
		}

		const target = media.querySelector(SELECTORS.mediaTarget);

		root.dataset[DATA_KEYS.initialized] = 'true';
		addDebugLabel(root);
		const item = {
			root,
			media,
			target: target instanceof HTMLElement ? target : media,
			speed: parseSpeed(root.dataset.parallaxSpeed),
			scale: Number.parseFloat(root.dataset.parallaxScale || '') || DEFAULT_SCALE,
			visible: false,
		};

		parallaxItems.push(item);
		parallaxItemMap.set(root, item);
		observer.observe(root);
	});

	reducedMotionMedia = reducedMotionMedia || getMediaQuery(REDUCED_MOTION_QUERY);
	mobileMedia = mobileMedia || getMediaQuery(MOBILE_QUERY);

	if (!listenersBound) {
		window.addEventListener('scroll', queueUpdate, { passive: true });
		window.addEventListener('resize', queueUpdate, { passive: true });
		window.addEventListener('load', () => queueUpdate({ force: true }), { passive: true });
		document.addEventListener('visibilitychange', handleVisibilityChange);
		addMediaChangeListener(reducedMotionMedia, handleParallaxStateChange);
		addMediaChangeListener(mobileMedia, handleParallaxStateChange);
		listenersBound = true;
	}

	logDebugSummary();
	queueUpdate({ force: true });
};
