/**
 * Solanique navigation behavior.
 *
 * Handles fixed header state and the accessible fullscreen mobile menu.
 */

const SELECTORS = {
	header: '[data-sg-header]',
	menuToggle: '[data-sg-menu-toggle]',
	menuClose: '[data-sg-menu-close]',
	mobileOverlay: '[data-sg-mobile-overlay]',
	mobilePanel: '[data-sg-mobile-panel]',
};

const CLASSES = {
	scrolled: 'sg-site-header--scrolled',
	menuOpenHeader: 'sg-site-header--menu-open',
	menuOpenOverlay: 'sg-mobile-nav--open',
	bodyLocked: 'sg-is-menu-open',
};

const FOCUSABLE_SELECTOR = [
	'a[href]',
	'button:not([disabled])',
	'input:not([disabled])',
	'select:not([disabled])',
	'textarea:not([disabled])',
	'[tabindex]:not([tabindex="-1"])',
].join(',');

const SCROLL_THRESHOLD = 12;
const DESKTOP_QUERY = '(min-width: 80rem)';

/**
 * Initializes the Solanique navigation once per document.
 *
 * @return {void}
 */
export function initNavigation() {
	const header = document.querySelector(SELECTORS.header);

	if (!header || header.dataset.sgNavigationInitialized === 'true') {
		return;
	}

	const navigation = createNavigationController(header);
	header.dataset.sgNavigationInitialized = 'true';
	navigation.init();
}

/**
 * Creates an isolated controller for the navigation instance.
 *
 * @param {HTMLElement} header Header element.
 * @return {{init: Function}}
 */
function createNavigationController(header) {
	const menuToggle = header.querySelector(SELECTORS.menuToggle);
	const menuClose = header.querySelector(SELECTORS.menuClose);
	const mobileOverlay = header.querySelector(SELECTORS.mobileOverlay);
	const mobilePanel = header.querySelector(SELECTORS.mobilePanel);
	const desktopMedia = window.matchMedia(DESKTOP_QUERY);

	let isMenuOpen = false;
	let isScrollQueued = false;
	let previousFocus = null;

	/**
	 * Binds behavior once all required elements are present.
	 *
	 * @return {void}
	 */
	function init() {
		updateHeaderState();
		window.addEventListener('scroll', handleScroll, { passive: true });

		if (!menuToggle || !mobileOverlay || !mobilePanel) {
			return;
		}

		menuToggle.addEventListener('click', openMenu);
		menuClose?.addEventListener('click', closeMenu);
		mobileOverlay.addEventListener('click', handleOverlayClick);
		mobilePanel.addEventListener('click', handlePanelClick);
		document.addEventListener('keydown', handleDocumentKeydown);
		addMediaChangeListener(desktopMedia, handleViewportChange);
	}

	/**
	 * Uses requestAnimationFrame to throttle visual scroll updates.
	 *
	 * @return {void}
	 */
	function handleScroll() {
		if (isScrollQueued) {
			return;
		}

		isScrollQueued = true;

		window.requestAnimationFrame(() => {
			updateHeaderState();
			isScrollQueued = false;
		});
	}

	/**
	 * Applies the compact header state after the page scrolls.
	 *
	 * @return {void}
	 */
	function updateHeaderState() {
		header.classList.toggle(CLASSES.scrolled, window.scrollY > SCROLL_THRESHOLD);
	}

	/**
	 * Opens the mobile navigation and moves focus into it.
	 *
	 * @return {void}
	 */
	function openMenu() {
		if (isMenuOpen) {
			return;
		}

		isMenuOpen = true;
		previousFocus = document.activeElement;

		header.classList.add(CLASSES.menuOpenHeader);
		mobileOverlay.classList.add(CLASSES.menuOpenOverlay);
		setOverlayInert(false);
		mobileOverlay.setAttribute('aria-hidden', 'false');
		menuToggle.setAttribute('aria-expanded', 'true');
		menuClose?.setAttribute('aria-expanded', 'true');
		document.body.classList.add(CLASSES.bodyLocked);

		window.requestAnimationFrame(() => {
			focusFirstElement(mobilePanel);
		});
	}

	/**
	 * Closes the mobile navigation and restores trigger focus.
	 *
	 * @return {void}
	 */
	function closeMenu({ restoreFocus = true } = {}) {
		if (!isMenuOpen) {
			return;
		}

		isMenuOpen = false;

		header.classList.remove(CLASSES.menuOpenHeader);
		mobileOverlay.classList.remove(CLASSES.menuOpenOverlay);
		setOverlayInert(true);
		mobileOverlay.setAttribute('aria-hidden', 'true');
		menuToggle.setAttribute('aria-expanded', 'false');
		menuClose?.setAttribute('aria-expanded', 'false');
		document.body.classList.remove(CLASSES.bodyLocked);

		if (restoreFocus && previousFocus instanceof HTMLElement) {
			previousFocus.focus();
		}
	}

	/**
	 * Keeps hidden overlay contents out of the tab order.
	 *
	 * @param {boolean} isInert Whether the overlay should be inert.
	 * @return {void}
	 */
	function setOverlayInert(isInert) {
		if ('inert' in mobileOverlay) {
			mobileOverlay.inert = isInert;
			return;
		}

		if (isInert) {
			mobileOverlay.setAttribute('inert', '');
			return;
		}

		mobileOverlay.removeAttribute('inert');
	}

	/**
	 * Closes the menu when the overlay itself is clicked.
	 *
	 * @param {MouseEvent} event Click event.
	 * @return {void}
	 */
	function handleOverlayClick(event) {
		if (event.target === mobileOverlay) {
			closeMenu();
		}
	}

	/**
	 * Closes the menu after following a mobile navigation link.
	 *
	 * @param {MouseEvent} event Click event.
	 * @return {void}
	 */
	function handlePanelClick(event) {
		if (event.target instanceof Element && event.target.closest('a[href]')) {
			closeMenu({ restoreFocus: false });
		}
	}

	/**
	 * Clears mobile-only state when the desktop layout becomes active.
	 *
	 * @param {MediaQueryListEvent} event Media query change event.
	 * @return {void}
	 */
	function handleViewportChange(event) {
		if (event.matches) {
			closeMenu({ restoreFocus: false });
		}
	}

	/**
	 * Handles Escape and focus trapping while the menu is open.
	 *
	 * @param {KeyboardEvent} event Keyboard event.
	 * @return {void}
	 */
	function handleDocumentKeydown(event) {
		if (!isMenuOpen) {
			return;
		}

		if (event.key === 'Escape') {
			event.preventDefault();
			closeMenu();
			return;
		}

		if (event.key === 'Tab') {
			trapFocus(event, mobilePanel);
		}
	}

	return { init };
}

/**
 * Subscribes to media query changes with a small compatibility fallback.
 *
 * @param {MediaQueryList} mediaQuery Media query list.
 * @param {Function} callback Change callback.
 * @return {void}
 */
function addMediaChangeListener(mediaQuery, callback) {
	if (typeof mediaQuery.addEventListener === 'function') {
		mediaQuery.addEventListener('change', callback);
		return;
	}

	mediaQuery.addListener(callback);
}

/**
 * Returns visible, focusable children from a container.
 *
 * @param {HTMLElement} container Focus container.
 * @return {HTMLElement[]}
 */
function getFocusableElements(container) {
	return Array.from(container.querySelectorAll(FOCUSABLE_SELECTOR)).filter((element) => {
		return element instanceof HTMLElement && !element.hasAttribute('disabled') && element.getClientRects().length > 0;
	});
}

/**
 * Moves focus to the first available focus target.
 *
 * @param {HTMLElement} container Focus container.
 * @return {void}
 */
function focusFirstElement(container) {
	const focusableElements = getFocusableElements(container);
	const target = focusableElements[0] || container;

	target.focus();
}

/**
 * Keeps keyboard focus inside the mobile navigation dialog.
 *
 * @param {KeyboardEvent} event Keyboard event.
 * @param {HTMLElement} container Focus container.
 * @return {void}
 */
function trapFocus(event, container) {
	const focusableElements = getFocusableElements(container);

	if (!focusableElements.length) {
		event.preventDefault();
		container.focus();
		return;
	}

	const firstElement = focusableElements[0];
	const lastElement = focusableElements[focusableElements.length - 1];

	if (event.shiftKey && document.activeElement === firstElement) {
		event.preventDefault();
		lastElement.focus();
		return;
	}

	if (!event.shiftKey && document.activeElement === lastElement) {
		event.preventDefault();
		firstElement.focus();
	}
}
