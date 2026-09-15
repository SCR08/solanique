/**
 * Optional brighter dark-mode illumination control.
 */

const SELECTOR = '[data-sg-illumination-toggle]';
const STORAGE_KEY = 'solanique:illumination';
const ENHANCED_VALUE = 'enhanced';

const getStoredPreference = () => {
	try {
		return window.localStorage.getItem(STORAGE_KEY);
	} catch (error) {
		return null;
	}
};

const setStoredPreference = (isEnhanced) => {
	try {
		if (isEnhanced) {
			window.localStorage.setItem(STORAGE_KEY, ENHANCED_VALUE);
			return;
		}

		window.localStorage.removeItem(STORAGE_KEY);
	} catch (error) {
		// Storage access can be unavailable in restricted browser contexts.
	}
};

const updateButtons = (buttons, isEnhanced) => {
	buttons.forEach((button) => {
		const label = isEnhanced
			? button.dataset.sgIlluminationOnLabel
			: button.dataset.sgIlluminationOffLabel;
		const text = button.querySelector('[data-sg-illumination-text]');

		button.setAttribute('aria-pressed', isEnhanced ? 'true' : 'false');

		if (label) {
			button.setAttribute('aria-label', label);
		}

		if (text instanceof HTMLElement && label) {
			text.textContent = label;
		}
	});
};

const setIllumination = (buttons, isEnhanced) => {
	if (isEnhanced) {
		document.documentElement.dataset.sgIllumination = ENHANCED_VALUE;
	} else {
		delete document.documentElement.dataset.sgIllumination;
	}

	updateButtons(buttons, isEnhanced);
	setStoredPreference(isEnhanced);
};

export const initIlluminationToggle = (scope = document) => {
	const buttons = Array.from(scope.querySelectorAll(SELECTOR)).filter((button) => button instanceof HTMLButtonElement);

	if (!buttons.length || document.documentElement.dataset.sgIlluminationInitialized === 'true') {
		return;
	}

	document.documentElement.dataset.sgIlluminationInitialized = 'true';

	let isEnhanced = getStoredPreference() === ENHANCED_VALUE;
	setIllumination(buttons, isEnhanced);

	buttons.forEach((button) => {
		button.addEventListener('click', () => {
			isEnhanced = !isEnhanced;
			setIllumination(buttons, isEnhanced);
		});
	});
};
