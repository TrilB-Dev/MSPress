(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {
		var root = document.querySelector('[data-exchange-settings]');
		if (!root || typeof bootstrap === 'undefined') return;
		var importModalElement = document.getElementById('mspress-exchange-profile-import');
		var editModalElement = document.getElementById('mspress-exchange-profile-edit');
		var importModal = new bootstrap.Modal(importModalElement);
		var editModal = new bootstrap.Modal(editModalElement);
		var rows = importModalElement.querySelector('[data-exchange-import-rows]');
		var status = importModalElement.querySelector('[data-exchange-import-status]');
		var profiles = root.querySelector('[data-exchange-profiles]');
		root.querySelector('[data-exchange-profile-import]').addEventListener('click', function () {
			status.textContent = 'Loading directory mailboxes...';
			rows.innerHTML = '';
			importModal.show();
			var body = new URLSearchParams({ action: 'mspress_exchange_directory_mailboxes', nonce: root.dataset.nonce });
			Array.prototype.forEach.call(profiles.querySelectorAll('input[type="email"]'), function (input) { body.append('known[]', input.value); });
			fetch(root.dataset.ajaxUrl, { method: 'POST', headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' }, body: body })
				.then(function (response) { return response.json(); })
				.then(function (response) {
					if (!response.success) throw new Error(response.data && response.data.message ? response.data.message : 'Mailbox lookup failed.');
					status.textContent = response.data.mailboxes.length ? '' : 'No new directory mailboxes were found.';
					response.data.mailboxes.forEach(function (mailbox) {
						var row = document.createElement('tr');
						row.innerHTML = '<td>' + escapeHtml(mailbox.email) + '</td><td>' + escapeHtml(mailbox.name) + '</td><td><select><option value="user">User</option><option value="shared">Shared mailbox</option></select></td><td><input type="checkbox" checked></td>';
						var add = row.querySelector('input');
						add.addEventListener('change', function () { if (add.checked) appendProfile(mailbox, row.querySelector('select').value); else removeProfile(mailbox.email); });
						row.querySelector('select').addEventListener('change', function () { if (add.checked) appendProfile(mailbox, this.value); });
						rows.appendChild(row);
						appendProfile(mailbox, 'user');
					});
				})
				.catch(function (error) { status.textContent = error.message; });
		});
		profiles.addEventListener('click', function (event) {
			var deleteButton = event.target.closest('[data-exchange-profile-delete]');
			if (deleteButton) deleteButton.closest('tr').remove();
		});
		root.querySelector('[data-exchange-profile-edit]').addEventListener('click', function () { editModal.show(); });
		root.querySelector('[data-exchange-profile-save]').addEventListener('click', function () { editModal.hide(); });
		function appendProfile(mailbox, type) {
			removeProfile(mailbox.email);
			var index = profiles.querySelectorAll('tr').length;
			var row = document.createElement('tr');
			row.dataset.email = mailbox.email.toLowerCase();
			row.innerHTML = '<td><input type="email" name="settings[sender_profiles][' + index + '][email]" value="' + escapeAttr(mailbox.email) + '" readonly></td><td><input type="text" name="settings[sender_profiles][' + index + '][name]" value="' + escapeAttr(mailbox.name) + '"></td><td><select name="settings[sender_profiles][' + index + '][type]"><option value="user"' + (type === 'user' ? ' selected' : '') + '>User</option><option value="shared"' + (type === 'shared' ? ' selected' : '') + '>Shared mailbox</option></select></td><td><input type="hidden" name="settings[sender_profiles][' + index + '][enabled]" value="0"><input type="checkbox" class="form-check-input" name="settings[sender_profiles][' + index + '][enabled]" value="1" checked aria-label="Enable sender profile"></td><td><button type="button" class="btn btn-danger" data-exchange-profile-delete aria-label="Delete profile"><i class="fa-solid fa-trash" aria-hidden="true"></i></button></td>';
			profiles.appendChild(row);
		}
		function removeProfile(email) { var existing = profiles.querySelector('tr[data-email="' + CSS.escape(email.toLowerCase()) + '"]'); if (existing) existing.remove(); }
		function escapeHtml(value) { var div = document.createElement('div'); div.textContent = value; return div.innerHTML; }
		function escapeAttr(value) { return escapeHtml(value).replace(/"/g, '&quot;'); }
	});

	document.addEventListener('DOMContentLoaded', function () {
		var root = document.querySelector('[data-exchange-email-templates]');
		if (!root || typeof bootstrap === 'undefined') return;
		var modalElement = document.getElementById('mspress-email-edit');
		if (!modalElement) return;
		var modal = new bootstrap.Modal(modalElement);
		var form = root.querySelector('form');
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
