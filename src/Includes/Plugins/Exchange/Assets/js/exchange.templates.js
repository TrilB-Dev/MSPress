(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {
		var root = document.querySelector('[data-exchange-email-templates]');
		if (!root || typeof bootstrap === 'undefined') return;
		var modalElement = document.getElementById('mspress-email-edit');
		if (!modalElement) return;
		var modal = new bootstrap.Modal(modalElement);
		var form = root.querySelector('form');
		if (!form) return;
		var tags = ['{site_name}', '{site_url}', '{user_name}', '{user_email}', '{login_url}', '{reset_url}', '{comment_content}', '{post_title}'];
		var editor = document.getElementById('mspress-email-html');
		var fields = {
			sender: document.getElementById('mspress-email-sender'),
			recipient: document.getElementById('mspress-email-recipient'),
			subject: document.getElementById('mspress-email-subject'),
			html: editor
		};
		var tagContainer = modalElement.querySelector('[data-exchange-smart-tags]');
		if (tagContainer) tags.forEach(function (tag) {
			var button = document.createElement('button');
			button.type = 'button';
			button.className = 'btn btn-sm btn-outline-secondary me-1 mb-1';
			button.textContent = tag;
			button.dataset.tag = tag;
			tagContainer.appendChild(button);
		});
		root.addEventListener('click', function (event) {
			var button = event.target.closest('[data-exchange-email-edit]');
			if (!button) return;
			var data;
			try { data = JSON.parse(button.dataset.template || '{}'); } catch (error) { return; }
			var category = button.dataset.category || '';
			var id = button.dataset.templateId || '';
			modalElement.querySelector('[name="email_template_category"]').value = category;
			modalElement.querySelector('[name="email_template_id"]').value = id;
			modalElement.querySelector('#mspress-email-edit-title').textContent = data.name || 'Edit email template';
			Object.keys(fields).forEach(function (key) {
				if (fields[key]) fields[key].value = data[key] || '';
			});
			Object.keys(fields).forEach(function (key) {
				if (fields[key]) fields[key].name = 'settings[email_templates][' + category + '][' + id + '][' + key + ']';
			});
			if (window.tinymce && window.tinymce.get('mspress-email-html')) window.tinymce.get('mspress-email-html').setContent(data.html || '');
			if (window.jQuery && window.jQuery.fn.selectpicker) window.jQuery(fields.sender).selectpicker('refresh');
			modal.show();
		});
		modalElement.addEventListener('click', function (event) {
			var button = event.target.closest('[data-tag]');
			if (!button) return;
			var tag = button.dataset.tag || '';
			var target = document.activeElement && ['INPUT', 'TEXTAREA'].indexOf(document.activeElement.tagName) !== -1 ? document.activeElement : fields.subject;
			if (window.tinymce && window.tinymce.get('mspress-email-html') && (target === fields.html || target === editor)) {
				window.tinymce.get('mspress-email-html').insertContent(tag);
				return;
			}
			if (target) {
				var start = target.selectionStart || target.value.length;
				target.value = target.value.slice(0, start) + tag + target.value.slice(target.selectionEnd || start);
				target.focus();
			}
		});
		form.addEventListener('submit', function () {
			if (window.tinymce && window.tinymce.get('mspress-email-html')) window.tinymce.get('mspress-email-html').save();
			if (window.tinymce && window.tinymce.get('mspress-email-footer-html')) window.tinymce.get('mspress-email-footer-html').save();
		});
	});
})();