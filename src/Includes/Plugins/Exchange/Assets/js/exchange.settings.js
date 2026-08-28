(() => {
	'use strict';

	document.addEventListener('DOMContentLoaded', () => {
		const root = document.querySelector('[data-exchange-settings]');
		if (!root || typeof bootstrap === 'undefined') return;
		const modalElement = document.getElementById('mspress-exchange-profile-import');
		const addButton = root.querySelector('[data-exchange-profile-import]');
		const email = modalElement?.querySelector('#mspress-exchange-profile-email');
		const name = modalElement?.querySelector('#mspress-exchange-profile-name');
		const type = modalElement?.querySelector('#mspress-exchange-profile-type');
		const status = modalElement?.querySelector('[data-exchange-import-status]');
		const emailStep = modalElement?.querySelector('[data-exchange-profile-step-email]');
		const detailsStep = modalElement?.querySelector('[data-exchange-profile-step-details]');
		const nextButton = modalElement?.querySelector('[data-exchange-profile-next]');
		const saveButton = modalElement?.querySelector('[data-exchange-profile-save-new]');
		if (!modalElement || !addButton || !email || !name || !type || !status || !emailStep || !detailsStep || !nextButton || !saveButton) return;

		const modal = new bootstrap.Modal(modalElement);
		let validatedEmail = '';
		const request = (action, values) => fetch(root.dataset.ajaxUrl, {
			method: 'POST',
			headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
			body: new URLSearchParams({ action, nonce: root.dataset.nonce, ...values })
		}).then((response) => response.json());

		const reset = () => {
			validatedEmail = '';
			email.value = '';
			name.value = '';
			emailStep.classList.remove('d-none');
			detailsStep.classList.add('d-none');
			nextButton.classList.remove('d-none');
			saveButton.classList.add('d-none');
			status.textContent = '';
		};

		addButton.addEventListener('click', () => { reset(); modal.show(); });
		nextButton.addEventListener('click', () => {
			if (!email.reportValidity()) return;
			status.textContent = 'Validating mailbox access...';
			nextButton.disabled = true;
			request('mspress_exchange_validate_mailbox', { email: email.value })
				.then((response) => {
					if (!response.success) throw new Error(response.data?.message || 'Mailbox validation failed.');
					validatedEmail = response.data.email;
					email.value = validatedEmail;
					name.value = response.data.name || validatedEmail;
					emailStep.classList.add('d-none');
					detailsStep.classList.remove('d-none');
					nextButton.classList.add('d-none');
					saveButton.classList.remove('d-none');
					status.textContent = 'Mailbox validated.';
				})
				.catch((error) => { status.textContent = error.message; })
				.finally(() => { nextButton.disabled = false; });
		});

		saveButton.addEventListener('click', () => {
			if (!validatedEmail || !name.reportValidity()) return;
			status.textContent = 'Saving sender profile...';
			saveButton.disabled = true;
			request('mspress_exchange_save_profile', { email: validatedEmail, name: name.value, type: type.value })
				.then((response) => {
					if (!response.success) throw new Error(response.data?.message || 'Sender profile could not be saved.');
					window.location.reload();
				})
				.catch((error) => { status.textContent = error.message; saveButton.disabled = false; });
		});
	});
})();