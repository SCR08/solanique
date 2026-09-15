/**
 * Solanique JavaScript entry point.
 *
 * Feature modules should be imported here once they expose browser behavior.
 */

import { initNavigation } from './modules/navigation.js';
import { initReveal } from './modules/reveal.js';
import { initEcosystemPanels } from './modules/ecosystem-panels.js';
import { initServiceExplorer } from './modules/service-explorer.js';
import { initParallax } from './modules/parallax.js';
import { initVideoModal } from './modules/video-modal.js';
import { initIlluminationToggle } from './modules/illumination-toggle.js';

window.SG = window.SG || {};
window.SG.initNavigation = initNavigation;
window.SG.initReveal = initReveal;
window.SG.initEcosystemPanels = initEcosystemPanels;
window.SG.initServiceExplorer = initServiceExplorer;
window.SG.initParallax = initParallax;
window.SG.initVideoModal = initVideoModal;
window.SG.initIlluminationToggle = initIlluminationToggle;

const initApp = () => {
	document.documentElement.dataset.sgTheme = 'dark';
	window.SG.initNavigation();
	window.SG.initReveal();
	window.SG.initEcosystemPanels();
	window.SG.initServiceExplorer();
	window.SG.initParallax();
	window.SG.initVideoModal();
	window.SG.initIlluminationToggle();
};

if (document.readyState === 'loading') {
	document.addEventListener('DOMContentLoaded', initApp, { once: true });
} else {
	initApp();
}
