(function() {
	const form = document.querySelector('.contact-form-section form');
	if (!form) return;

	const submitBtn = form.querySelector('button[type="submit"]');
	const originalBtnText = submitBtn ? submitBtn.textContent : 'Отправить заявку';
	const feedbackEl = document.createElement('div');
	feedbackEl.className = 'mt-4 text-sm font-medium';
	form.appendChild(feedbackEl);

	// Get form fields
	const nameInput = form.querySelector('input[type="text"]');
	const contactInput = form.querySelector('input[type="tel"]');
	const messageTextarea = form.querySelector('textarea');

	// Real-time validation for name input
	if (nameInput) {
		nameInput.addEventListener('input', function() {
			const cleaned = this.value.replace(/[^a-zA-Zа-яА-ЯёЁ\s'-]/g, '');
			if (cleaned !== this.value) this.value = cleaned;
		});
	}

	// Real-time validation for phone input
	if (contactInput) {
		contactInput.addEventListener('input', function() {
			const cleaned = this.value.replace(/[^0-9\s\+\-\(\)]/g, '');
			if (cleaned !== this.value) this.value = cleaned;
		});
	}

	// Form submission
	form.addEventListener('submit', function(e) {
		e.preventDefault();
		
		feedbackEl.textContent = '';
		feedbackEl.className = 'mt-4 text-sm font-medium';

		const name = nameInput ? nameInput.value.trim() : '';
		const contact = contactInput ? contactInput.value.trim() : '';
		const message = messageTextarea ? messageTextarea.value.trim() : '';

		const errors = [];
		if (!name) errors.push('Введите ваше имя');
		else if (name.length < 2) errors.push('Имя должно быть не менее 2 символов');

		if (!contact) errors.push('Укажите телефон или e-mail');
		else {
			const isEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(contact);
			const isPhone = /^[\d\s\+\-\(\)]{7,20}$/.test(contact);
			const digitsOnly = contact.replace(/\D/g, '');
			
			if (!isEmail && !isPhone) errors.push('Введите корректный телефон или e-mail');
			else if (!isEmail && digitsOnly.length < 7) errors.push('Введите корректный телефон');
		}

		if (!message) errors.push('Введите комментарий');

		if (errors.length > 0) {
			feedbackEl.textContent = errors.join(', ');
			feedbackEl.classList.add('text-red-600');
			return;
		}

		// Prepare data
		const formData = new FormData();
		formData.append('action', 'belsks_contact_submit');
		formData.append('name', name);
		formData.append('contact', contact);
		formData.append('message', message);

		submitBtn.disabled = true;
		submitBtn.textContent = 'Отправка...';

		fetch('/wp-admin/admin-ajax.php', {
			method: 'POST',
			body: formData
		})
		.then(response => response.json())
		.then(data => {
			if (data.success) {
				form.reset();
				feedbackEl.textContent = 'Спасибо! Ваша заявка отправлена.';
				feedbackEl.classList.add('text-green-600');
			} else {
				feedbackEl.textContent = data.data.message;
				feedbackEl.classList.add('text-red-600');
			}
		})
		.catch(error => {
			feedbackEl.textContent = 'Ошибка сети. Попробуйте позже.';
			feedbackEl.classList.add('text-red-600');
			console.error('Error:', error);
		})
		.finally(() => {
			submitBtn.disabled = false;
			submitBtn.textContent = originalBtnText;
		});
	});
})();
