/** Visitor-selected layouts for the approved video library. */
export const initVideoGallery = () => {
	const library = document.querySelector('.sg-film-library');
	if (!library || library.dataset.sgGalleryInitialized === 'true') return;
	library.dataset.sgGalleryInitialized = 'true';
	const modes = new Set(['editorial', 'masonry', 'cinema']);
	const views = library.querySelector('.gallery-views');
	const rail = library.querySelector('.gallery-collection');
	const controls = library.querySelector('.gallery-rail-controls');
	const previous = controls.querySelector('.gallery-arrow--previous');
	const next = controls.querySelector('.gallery-arrow--next');
	const status = library.querySelector('[data-gallery-status]');
	const filmCount = library.querySelectorAll('.gallery-film').length;
	const motion = matchMedia('(prefers-reduced-motion: reduce)');
	let frame = 0;

	const reduceMotion = () => motion.matches;
	const updateArrows = () => {
	  frame = 0;
	  const startInset = parseFloat(getComputedStyle(rail).paddingInlineStart) || 0;
	  previous.disabled = rail.scrollLeft <= startInset + 2;
	  next.disabled = rail.scrollLeft + rail.clientWidth >= rail.scrollWidth - 2;
	};
	const scheduleArrows = () => {
	  if (frame || document.hidden || library.dataset.galleryView !== 'cinema') return;
	  frame = requestAnimationFrame(updateArrows);
	};
	const setView = (view, announce = false) => {
	  if (!modes.has(view)) return;
	  library.dataset.galleryView = view;
	  views.querySelectorAll('input').forEach(input => { input.checked = input.value === view; });
	  controls.hidden = view !== 'cinema';
	  if (view === 'cinema') {
	    rail.tabIndex = 0;
	    rail.setAttribute('role', 'region');
	    rail.setAttribute('aria-label', rail.dataset.galleryRailLabel || 'Video filmstrip');
	    rail.scrollLeft = 0;
	    updateArrows();
	  } else {
	    rail.removeAttribute('tabindex');
	    rail.removeAttribute('role');
	    rail.removeAttribute('aria-label');
	  }
	  if (announce) {
	    const url = new URL(location.href);
	    url.searchParams.set('view', view);
	    history.replaceState(null, '', url);
	    status.textContent = `${view[0].toUpperCase() + view.slice(1)}. ${filmCount} ${rail.dataset.galleryCountLabel || 'films'}.`;
	    if (!reduceMotion()) rail.animate([{ opacity: .65, transform: 'translateY(8px)' }, { opacity: 1, transform: 'none' }], { duration: 240, easing: 'ease-out' });
	  }
	};
	const move = direction => rail.scrollBy({ left: direction * rail.clientWidth * .8, behavior: reduceMotion() ? 'instant' : 'smooth' });
	views.hidden = false;
	const requestedView = new URLSearchParams(location.search).get('view');
	setView(modes.has(requestedView) ? requestedView : 'masonry');
	views.addEventListener('change', event => setView(event.target.value, true));
	previous.addEventListener('click', () => move(-1));
	next.addEventListener('click', () => move(1));
	rail.addEventListener('scroll', scheduleArrows, { passive: true });
	rail.addEventListener('keydown', event => {
	  if (event.target !== rail || library.dataset.galleryView !== 'cinema' || !['ArrowLeft', 'ArrowRight'].includes(event.key)) return;
	  event.preventDefault();
	  move(event.key === 'ArrowRight' ? 1 : -1);
	});
	if ('ResizeObserver' in window) new ResizeObserver(scheduleArrows).observe(rail);
	document.addEventListener('visibilitychange', () => {
	  if (document.hidden && frame) { cancelAnimationFrame(frame); frame = 0; }
	  else scheduleArrows();
	});

};
