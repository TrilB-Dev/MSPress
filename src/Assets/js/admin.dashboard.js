document.addEventListener('DOMContentLoaded', () => {
	const root = document;
	root.querySelectorAll('[data-mspress-count]').forEach((element) => {
		element.classList.add('mspress-count-ready');
	});
});
