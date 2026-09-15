/**
 * Accessible visual service explorer.
 */

const SELECTORS = {
	root: '[data-sg-service-explorer]',
	trigger: '[data-sg-service-explorer-trigger]',
	panel: '[data-sg-service-explorer-panel]',
	stage: '[data-sg-service-explorer-stage]',
};

const CLASSES = {
	active: 'is-active',
};

const DATA_KEYS = {
	initialized: 'sgServiceExplorerInitialized',
};

const REDUCED_MOTION_QUERY = '(prefers-reduced-motion: reduce)';

/**
 * Returns the preferred scroll behavior.
 *
 * @return {ScrollBehavior}
 */
const getScrollBehavior = () => {
	return window.matchMedia(REDUCED_MOTION_QUERY).matches ? 'auto' : 'smooth';
};

/**
 * Synchronizes the active service state.
 *
 * @param {HTMLElement[]} triggers Trigger buttons.
 * @param {HTMLElement[]} panels Content panels.
 * @param {number} nextIndex Panel index to activate.
 * @param {boolean} shouldFocus Whether focus should move to the active trigger.
 * @return {void}
 */
const activateService = (triggers, panels, nextIndex, shouldFocus = false) => {
	const safeIndex = Math.max(0, Math.min(nextIndex, panels.length - 1));

	triggers.forEach((trigger, index) => {
		const isActive = index === safeIndex;

		trigger.classList.toggle(CLASSES.active, isActive);
		trigger.setAttribute('aria-current', isActive ? 'true' : 'false');
	});

	panels.forEach((panel, index) => {
		const isActive = index === safeIndex;

		panel.classList.toggle(CLASSES.active, isActive);
	});

	if (shouldFocus) {
		triggers[safeIndex]?.focus();
	}
};

/**
 * Scrolls the requested panel into the native service stage.
 *
 * @param {HTMLElement[]} panels Content panels.
 * @param {number} nextIndex Panel index to scroll to.
 * @return {void}
 */
const scrollToPanel = (panels, nextIndex) => {
	const panel = panels[nextIndex];

	if (! panel) {
		return;
	}

	panel.scrollIntoView({
		behavior: getScrollBehavior(),
		block: 'nearest',
		inline: 'center',
	});
};

/**
 * Handles keyboard movement across service controls.
 *
 * @param {KeyboardEvent} event Keyboard event.
 * @param {HTMLElement[]} triggers Trigger buttons.
 * @param {HTMLElement[]} panels Content panels.
 * @param {number} currentIndex Current trigger index.
 * @return {void}
 */
const handleTriggerKeydown = (event, triggers, panels, currentIndex) => {
	const lastIndex = triggers.length - 1;
	let nextIndex = currentIndex;

	if (event.key === 'ArrowRight' || event.key === 'ArrowDown') {
		nextIndex = currentIndex === lastIndex ? 0 : currentIndex + 1;
	} else if (event.key === 'ArrowLeft' || event.key === 'ArrowUp') {
		nextIndex = currentIndex === 0 ? lastIndex : currentIndex - 1;
	} else if (event.key === 'Home') {
		nextIndex = 0;
	} else if (event.key === 'End') {
		nextIndex = lastIndex;
	} else {
		return;
	}

	event.preventDefault();
	activateService(triggers, panels, nextIndex, true);
	scrollToPanel(panels, nextIndex);
};

/**
 * Observes visible cards so native scrolling updates the active trigger.
 *
 * @param {HTMLElement} stage Scrollable stage.
 * @param {HTMLElement[]} triggers Trigger buttons.
 * @param {HTMLElement[]} panels Content panels.
 * @return {void}
 */
const observePanels = (stage, triggers, panels) => {
	if (!('IntersectionObserver' in window)) {
		return;
	}

	const observer = new IntersectionObserver((entries) => {
		const activeEntry = entries
			.filter((entry) => entry.isIntersecting)
			.sort((first, second) => second.intersectionRatio - first.intersectionRatio)[0];

		if (! activeEntry) {
			return;
		}

		const nextIndex = panels.indexOf(activeEntry.target);

		if (nextIndex >= 0) {
			activateService(triggers, panels, nextIndex);
		}
	}, {
		root: stage,
		threshold: [0.42, 0.58, 0.72],
	});

	panels.forEach((panel) => observer.observe(panel));
};

/**
 * Initializes all service explorers in the current document.
 *
 * @param {Document|HTMLElement} scope Root scope to search within.
 * @return {void}
 */
export const initServiceExplorer = (scope = document) => {
	const roots = Array.from(scope.querySelectorAll(SELECTORS.root));

	roots.forEach((root) => {
		if (root.dataset[DATA_KEYS.initialized] === 'true') {
			return;
		}

		const triggers = Array.from(root.querySelectorAll(SELECTORS.trigger));
		const panels = Array.from(root.querySelectorAll(SELECTORS.panel));
		const stage = root.querySelector(SELECTORS.stage) || root;

		if (! triggers.length || triggers.length !== panels.length) {
			return;
		}

		root.dataset[DATA_KEYS.initialized] = 'true';
		activateService(triggers, panels, 0);
		observePanels(stage, triggers, panels);

		triggers.forEach((trigger, index) => {
			trigger.addEventListener('click', () => {
				activateService(triggers, panels, index);
				scrollToPanel(panels, index);
			}, { passive: true });
			trigger.addEventListener('keydown', (event) => handleTriggerKeydown(event, triggers, panels, index));
		});
	});
};
