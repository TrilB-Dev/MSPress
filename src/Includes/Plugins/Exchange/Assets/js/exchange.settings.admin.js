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
		const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
		let validatedEmail = '';
		let validationTimer = null;
		const request = (action, values) => fetch(root.dataset.ajaxUrl, {
			method: 'POST',
			headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
			body: new URLSearchParams({ action, nonce: root.dataset.nonce, ...values })
		}).then((response) => response.json());

		const clearValidationState = () => {
			email.classList.remove('is-valid', 'is-invalid');
			email.setAttribute('aria-invalid', 'false');
		};

		const setEmailState = (isValid, message = '') => {
			clearValidationState();
			if (isValid) {
				email.classList.add('is-valid');
				email.setAttribute('aria-invalid', 'false');
			} else {
				email.classList.add('is-invalid');
				email.setAttribute('aria-invalid', 'true');
			}
			if (message) {
				status.textContent = message;
			}
		};

		const showDetails = (mailboxEmail, mailboxName) => {
			validatedEmail = mailboxEmail;
			email.value = validatedEmail;
			name.value = mailboxName || validatedEmail;
			emailStep.classList.add('d-none');
			detailsStep.classList.remove('d-none');
			nextButton.classList.add('d-none');
			saveButton.classList.remove('d-none');
			saveButton.disabled = false;
			status.textContent = 'Mailbox validated and ready to save.';
		};

		const validateMailboxLive = () => {
			const value = email.value.trim();
			validatedEmail = '';
			clearValidationState();
			if (!value) {
				status.textContent = '';
				nextButton.disabled = true;
				return;
			}
			if (!emailPattern.test(value)) {
				setEmailState(false, 'Enter a valid email address before continuing.');
				nextButton.disabled = true;
				return;
			}
			status.textContent = 'Checking mailbox access...';
			nextButton.disabled = true;
			request('mspress_exchange_validate_mailbox', { email: value })
				.then((response) => {
					if (!response.success) {
						throw new Error(response.data?.message || 'Mailbox validation failed.');
					}
					const mailboxEmail = response.data.email || value;
					const mailboxName = response.data.name || mailboxEmail;
					setEmailState(true, 'Mailbox access confirmed.');
					showDetails(mailboxEmail, mailboxName);
				})
				.catch((error) => {
					setEmailState(false, error.message || 'This mailbox could not be validated.');
					emailStep.classList.remove('d-none');
					detailsStep.classList.add('d-none');
					nextButton.classList.remove('d-none');
					saveButton.classList.add('d-none');
				})
				.finally(() => {
					nextButton.disabled = false;
				});
		};

		const reset = () => {
			validatedEmail = '';
			email.value = '';
			name.value = '';
			emailStep.classList.remove('d-none');
			detailsStep.classList.add('d-none');
			nextButton.classList.remove('d-none');
			nextButton.disabled = true;
			saveButton.classList.add('d-none');
			saveButton.disabled = true;
			status.textContent = '';
			clearValidationState();
		};

		addButton.addEventListener('click', () => { reset(); modal.show(); });
		email.addEventListener('input', () => {
			window.clearTimeout(validationTimer);
			validationTimer = window.setTimeout(() => {
				if (!email.value.trim()) {
					reset();
					return;
				}
				validateMailboxLive();
			}, 350);
		});
		email.addEventListener('blur', () => {
			window.clearTimeout(validationTimer);
			validateMailboxLive();
		});
		nextButton.addEventListener('click', () => {
			if (validatedEmail) {
				showDetails(validatedEmail, name.value || validatedEmail);
				return;
			}
			validateMailboxLive();
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