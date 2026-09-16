const root = document;

const initializeField = (field, options = {}) => {
  const modal = field.closest?.('.modal');
  if (modal && !modal.classList.contains('show')) {
    if (!field.__mspressModalSelectHandler) {
      field.__mspressModalSelectHandler = () => {
        field.__mspressModalSelectHandler = null;
        initializeField(field, options);
      };
      modal.addEventListener('shown.bs.modal', field.__mspressModalSelectHandler, { once: true });
    }
    return null;
  }

  return Selectpicker.getOrCreateInstance(field, options);
};

window.mspressBootstrapSelect = {
  initialize: initializeField,
};

const initialize = (scope = root) => {
  if (!scope.querySelectorAll) return;

  scope.querySelectorAll('.selectpicker').forEach((field) => {
    initializeField(field);
  });
};

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', () => initialize(), { once: true });
} else {
  initialize();
}

