document.addEventListener('DOMContentLoaded', () => {
  const root = document;
  const scope = root.querySelector('#mspress-reset-scope');
  const plugins = root.querySelector('[data-mspress-reset-plugins]');

  if (scope && plugins) {
    const fields = plugins.querySelectorAll('input[name="plugins[]"]');
    const updatePluginFields = () => {
      const isPluginScope = 'plugins' === scope.value;
      plugins.hidden = ! isPluginScope;
      fields.forEach((field) => {
        field.disabled = ! isPluginScope;
      });
    };

    scope.addEventListener('change', updatePluginFields);
    updatePluginFields();
  }

  root.querySelectorAll('.mspress-editor-form').forEach((form) => {
    form.addEventListener('submit', () => {
      const submit = form.querySelector('[type="submit"]');
      if (submit) submit.disabled = true;
    });
  });
});