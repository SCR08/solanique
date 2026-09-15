/**
 * Lightweight Intersection Observer reveal utility.
 *
 * This module intentionally handles only class toggling so pages can own their
 * visual timing and motion through CSS.
 */

const DEFAULT_SELECTOR = '[data-sg-reveal]';
const LEGACY_SELECTOR = '[data-sg-home-reveal]';
const VISIBLE_CLASS = 'is-visible';
const JS_CLASS = 'sg-js';
const REDUCED_MOTION_QUERY = '(prefers-reduced-motion: reduce)';
const OBSERVED_FLAG = 'sgRevealObserved';
const OBSERVER_OPTIONS = {
	rootMargin: '0px 0px -12% 0px',
	threshold: 0.16,
};

let revealObserver = null;

/**
 * Reveals matching elements as they enter the viewport.
 *
 * @param {Object} options Reveal options.
 * @param {ParentNode} [options.root=document] Search root.
 * @param {string} [options.selector] Element selector.
 * @return {void}
 */
export function initReveal(options = {}) {
	const root = options.root || document;
	const selector = options.selector || getDefaultSelector();
	const elements = getRevealElements(root, selector);

	if (!elements.length) {
		return;
	}

	document.documentElement.classList.add(JS_CLASS);

	if (shouldRevealImmediately()) {
		revealAll(elements);
		return;
	}

	const observer = getRevealObserver();

	elements.forEach((element) => {
		element.dataset[OBSERVED_FLAG] = 'true';
		observer.observe(element);
	});
}

/**
 * Returns the default selector including the previous homepage reveal API.
 *
 * @return {string}
 */
function getDefaultSelector() {
	return `${DEFAULT_SELECTOR}, ${LEGACY_SELECTOR}`;
}

/**
 * Returns reveal targets that have not already been handled.
 *
 * @param {ParentNode} root Search root.
 * @param {string} selector Element selector.
 * @return {HTMLElement[]}
 */
function getRevealElements(root, selector) {
	return Array.from(root.querySelectorAll(selector)).filter((element) => {
		return element instanceof HTMLElement && !element.classList.contains(VISIBLE_CLASS) && element.dataset[OBSERVED_FLAG] !== 'true';
	});
}

/**
 * Returns the shared reveal observer.
 *
 * @return {IntersectionObserver}
 */
function getRevealObserver() {
	if (revealObserver) {
		return revealObserver;
	}

	revealObserver = new IntersectionObserver((entries, observer) => {
		entries.forEach((entry) => {
			if (!entry.isIntersecting) {
				return;
			}

			revealElement(entry.target);
			observer.unobserve(entry.target);
		});
	}, OBSERVER_OPTIONS);

	return revealObserver;
}

/**
 * Determines whether motion-sensitive users or older browsers should skip IO.
 *
 * @return {boolean}
 */
function shouldRevealImmediately() {
	return window.matchMedia(REDUCED_MOTION_QUERY).matches || !('IntersectionObserver' in window);
}

/**
 * Reveals every target immediately.
 *
 * @param {HTMLElement[]} elements Reveal targets.
 * @return {void}
 */
function revealAll(elements) {
	elements.forEach((element) => revealElement(element));
}

/**
 * Marks a target as visible.
 *
 * @param {Element} element Reveal target.
 * @return {void}
 */
function revealElement(element) {
	element.classList.add(VISIBLE_CLASS);

	if (element instanceof HTMLElement) {
		delete element.dataset[OBSERVED_FLAG];
	}
}
