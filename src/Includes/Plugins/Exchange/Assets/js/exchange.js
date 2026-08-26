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
			row.innerHTML = '<td><input type="email" name="settings[sender_profiles][' + index + '][email]" value="' + escapeAttr(mailbox.email) + '" readonly></td><td><input type="text" name="settings[sender_profiles][' + index + '][name]" value="' + escapeAttr(mailbox.name) + '"></td><td><select name="settings[sender_profiles][' + index + '][type]"><option value="user"' + (type === 'user' ? ' selected' : '') + '>User</option><option value="shared"' + (type === 'shared' ? ' selected' : '') + '>Shared mailbox</option></select></td><td><button type="button" class="btn btn-danger" data-exchange-profile-delete aria-label="Delete profile"><i class="fa-solid fa-trash" aria-hidden="true"></i></button></td>';
			profiles.appendChild(row);
		}
		function removeProfile(email) { var existing = profiles.querySelector('tr[data-email="' + CSS.escape(email.toLowerCase()) + '"]'); if (existing) existing.remove(); }
		function escapeHtml(value) { var div = document.createElement('div'); div.textContent = value; return div.innerHTML; }
		function escapeAttr(value) { return escapeHtml(value).replace(/"/g, '&quot;'); }
	});
})();
