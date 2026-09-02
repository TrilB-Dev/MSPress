document.addEventListener('DOMContentLoaded', () => {
  const root = document;

  const toggleCollapse = (button) => {
    const target = root.querySelector(button.dataset.bsTarget);
    if (!target || target.classList.contains('collapsing')) return;

    const isOpen = target.classList.contains('show');
    button.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
    button.classList.toggle('collapsed', isOpen);
    target.classList.add('collapsing');
    target.classList.remove('collapse', 'show');
    target.style.height = isOpen ? `${target.scrollHeight}px` : '0px';
    target.offsetHeight;
    target.style.height = isOpen ? '0px' : `${target.scrollHeight}px`;

    window.setTimeout(() => {
      target.classList.remove('collapsing');
      target.classList.add('collapse');
      if (!isOpen) target.classList.add('show');
      target.style.height = '';
    }, 350);
  };

  root.addEventListener('click', (event) => {
    const button = event.target.closest?.('[data-bs-toggle="collapse"]');
    if (!button) return;

    event.preventDefault();
    toggleCollapse(button);
  });

  root.querySelectorAll('[data-bs-toggle="tooltip"]').forEach((element) => {
    window.bootstrap?.Tooltip.getOrCreateInstance(element);
  });

});