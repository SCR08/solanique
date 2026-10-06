export function initIntakeModal() {
	const dialog = document.querySelector('[data-sg-intake]');
	if (!dialog || typeof dialog.showModal !== 'function') return;
	const frame = dialog.querySelector('iframe');
	const close = dialog.querySelector('[data-sg-intake-close]');
	const status = dialog.querySelector('[data-sg-intake-status]');
	const emails = {
		Capital: 'capital@solaniquegroup.com',
		Estates: 'estate@solaniquegroup.com',
		Concierge: 'concierge@solaniquegroup.com',
		Inquiry: 'inquiry@solaniquegroup.com',
	};
	let opener;
	let previousOverflow;
	frame.addEventListener('load', () => {
		if (frame.hasAttribute('src')) status.hidden = true;
	});
	close.addEventListener('click', () => dialog.close());
	dialog.addEventListener('click', (event) => {
		const bounds = dialog.getBoundingClientRect();
		if (event.target === dialog && (event.clientX < bounds.left || event.clientX > bounds.right || event.clientY < bounds.top || event.clientY > bounds.bottom)) dialog.close();
	});
	dialog.addEventListener('close', () => {
		document.body.style.overflow = previousOverflow;
		opener?.focus();
	});
	document.querySelectorAll('main a[href^="mailto:"]').forEach((link) => {
		if (link.classList.contains('sg-email-tab')) return;
		const email = link.getAttribute('href').slice(7).split('?')[0].toLowerCase();
		if (email !== emails[frame.title]) return;
		link.setAttribute('aria-haspopup', 'dialog');
		link.setAttribute('aria-controls', dialog.id);
		link.addEventListener('click', (event) => {
			if (event.ctrlKey || event.metaKey || event.shiftKey || event.altKey) return;
			event.preventDefault();
			opener = link;
			previousOverflow = document.body.style.overflow;
			dialog.showModal();
			document.body.style.overflow = 'hidden';
			close.focus();
			if (!frame.hasAttribute('src')) {
				status.hidden = false;
				frame.src = frame.dataset.src;
				if (!document.querySelector('script[data-sg-ghl-embed]')) {
					const script = document.createElement('script');
					script.src = 'https://link.msgsndr.com/js/form_embed.js';
					script.dataset.sgGhlEmbed = '';
					document.body.append(script);
				}
			}
		});
	});
}
