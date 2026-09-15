/**
 * Homepage ecosystem expanding panels.
 */

const SELECTORS = {
	root: '[data-sg-ecosystem-panels]',
	panel: '[data-sg-ecosystem-panel]',
	trigger: '[data-sg-ecosystem-trigger]',
	content: '[data-sg-ecosystem-content]',
};

const CLASSES = {
	active: 'is-active',
};

const DATA_KEYS = {
	initialized: 'sgEcosystemPanelsInitialized',
	activePanel: 'sgActivePanel',
};

/**
 * Set the visible ecosystem panel and keep ARIA state in sync.
 *
 * @param {HTMLElement} root The panel group element.
 * @param {HTMLElement[]} panels The available panels.
 * @param {number} nextIndex The panel index to activate.
 * @param {boolean} shouldFocus Whether to move focus to the active trigger.
 */
const setActivePanel = (root, panels, nextIndex, shouldFocus = false) => {
	const safeIndex = Math.max(0, Math.min(nextIndex, panels.length - 1));

	root.dataset[DATA_KEYS.activePanel] = String(safeIndex);

	panels.forEach((panel, index) => {
		const isActive = index === safeIndex;
		const trigger = panel.querySelector(SELECTORS.trigger);
		const content = panel.querySelector(SELECTORS.content);

		panel.classList.toggle(CLASSES.active, isActive);

		if (trigger) {
			trigger.setAttribute('aria-expanded', String(isActive));
		}

		if (content) {
			if (isActive) {
				content.removeAttribute('aria-hidden');
			} else {
				content.setAttribute('aria-hidden', 'true');
			}

			content.toggleAttribute('inert', ! isActive);
		}
	});

	if (shouldFocus) {
		panels[safeIndex]?.querySelector(SELECTORS.trigger)?.focus();
	}
};

/**
 * Handle arrow-key navigation across panel triggers.
 *
 * @param {KeyboardEvent} event Keydown event.
 * @param {HTMLElement} root The panel group element.
 * @param {HTMLElement[]} panels The available panels.
 * @param {number} currentIndex The current panel index.
 */
const handleTriggerKeydown = (event, root, panels, currentIndex) => {
	const lastIndex = panels.length - 1;
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
	setActivePanel(root, panels, nextIndex, true);
};

/**
 * Initialize interactive homepage ecosystem panels.
 *
 * @param {Document|HTMLElement} scope Root scope to search within.
 */
export const initEcosystemPanels = (scope = document) => {
	const roots = Array.from(scope.querySelectorAll(SELECTORS.root));

	roots.forEach((root) => {
		if (root.dataset[DATA_KEYS.initialized] === 'true') {
			return;
		}

		const panels = Array.from(root.querySelectorAll(SELECTORS.panel));

		if (! panels.length) {
			return;
		}

		root.dataset[DATA_KEYS.initialized] = 'true';
		setActivePanel(root, panels, Number(root.dataset[DATA_KEYS.activePanel] || 0));

		panels.forEach((panel, index) => {
			const trigger = panel.querySelector(SELECTORS.trigger);

			panel.addEventListener('click', (event) => {
				if (event.target instanceof Element && event.target.closest('a[href]')) {
					return;
				}

				setActivePanel(root, panels, index);
			}, { passive: true });

			if (! trigger) {
				return;
			}

			trigger.addEventListener('keydown', (event) => {
				handleTriggerKeydown(event, root, panels, index);
			});
		});
	});
};
