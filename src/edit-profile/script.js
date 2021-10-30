// console.log('Hello world');

const form = document.querySelector('.edit-profile_form');
const submitBtn = document.querySelector('.edit__btn__submit');
const errText = document.querySelector('.edit__error-text');

submitBtn.addEventListener('click', function (e) {
	e.preventDefault();

	// console.log('clicked');
	// HIGHLIGHT AJAX
	let xhr = new XMLHttpRequest(); // creating XML object

	xhr.open('POST', '../backend/edit-profile/edit.php', true);

	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				if (data == 'success') {
					location.href = '../profile/profile-page.php'; // TODO wil change later for direct to home page
				} else {
					errText.textContent = data;
					errText.style.display = 'block';
				}
				// console.log(data);
			}
		}
	};
	let formData = new FormData(form);
	xhr.send(formData);
});

// ! change password
const passwordForm = document.querySelector('.change-password');
const passsBtn = document.querySelector('.change-password-btn');
const passErr = document.querySelector('.pass__error-text');

passsBtn.addEventListener('click', (e) => {
	e.preventDefault();

	let xhr = new XMLHttpRequest(); // creating XML object

	xhr.open('POST', '../backend/edit-profile/change-password.php', true);

	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				if (data == 'success') {
					location.href = '../profile/profile-page.php'; // TODO wil change later for direct to home page
				} else {
					passErr.textContent = data;
					passErr.style.display = 'block';
				}
				// console.log(data);
			}
		}
	};
	let formData = new FormData(passwordForm);
	xhr.send(formData);
});

// ! change dp
const dpForm = document.querySelector('.change-dp');
const dpBtn = document.querySelector('.change-dp-btn');
const dpErr = document.querySelector('.dp__error-text');

dpBtn.addEventListener('click', (e) => {
	e.preventDefault();

	let xhr = new XMLHttpRequest(); // creating XML object

	xhr.open('POST', '../backend/edit-profile/change-dp.php', true);

	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				if (data == 'success') {
					location.href = '../profile/profile-page.php'; // TODO wil change later for direct to home page
				} else {
					dpErr.textContent = data;
					dpErr.style.display = 'block';
				}
				// console.log(data);
			}
		}
	};
	let formData = new FormData(dpForm);
	xhr.send(formData);
});
// ! change cover
const cover = document.querySelector('.change-cover-image');
const coverBtn = document.querySelector('.change-cover-btn');
const coverErr = document.querySelector('.cover__error-text');

coverBtn.addEventListener('click', (e) => {
	e.preventDefault();

	let xhr = new XMLHttpRequest(); // creating XML object

	xhr.open('POST', '../backend/edit-profile/change-cover.php', true);

	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				if (data == 'success') {
					location.href = '../profile/profile-page.php'; // TODO wil change later for direct to home page
				} else {
					coverErr.textContent = data;
					coverErr.style.display = 'block';
				}
				// console.log(data);
			}
		}
	};
	let formData = new FormData(cover);
	xhr.send(formData);
});
