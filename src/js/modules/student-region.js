/** Native buttons keep the regional explorer usable with keyboard and touch. */
export const initStudentRegion = () => {
	document.querySelectorAll('[data-sg-region]').forEach((region) => {
		const choices = region.querySelector('.sg-student-region__choices');
		const buttons = [...region.querySelectorAll('[data-region-select]')];
		const details = [...region.querySelectorAll('[data-region-detail]')];
		const points = [...region.querySelectorAll('[data-region-point]')];
		if (!choices || !buttons.length || !details.length) return;

		const select = (id) => {
			buttons.forEach((button) => button.setAttribute('aria-pressed', String(button.dataset.regionSelect === id)));
			details.forEach((detail) => { detail.hidden = detail.dataset.regionDetail !== id; });
			points.forEach((point) => point.classList.toggle('is-selected', point.dataset.regionPoint === id));
		};
		buttons.forEach((button) => button.addEventListener('click', () => select(button.dataset.regionSelect)));
		select(buttons[0].dataset.regionSelect);
		choices.hidden = false;
	});
};
