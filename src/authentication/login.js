// console.log('Hello world');

const form = document.querySelector('.login__form');
const submitBtn = document.querySelector('.login__btn__submit');
const errText = document.querySelector('.login__error-text');

submitBtn.addEventListener('click', function (e) {
	e.preventDefault();

	// console.log('clicked');
	// HIGHLIGHT AJAX
	let xhr = new XMLHttpRequest(); // creating XML object

	xhr.open('POST', '../backend/authentication/login.php', true);

	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				if (data == 'success') {
					console.log('shu');
					location.href = '../chat/contacts.php'; // TODO wil change later for direct to home page
				} else {
					errText.textContent = data;
					errText.style.display = 'block';
				}
				console.log(data);
			}
		}
	};
	let formData = new FormData(form);
	xhr.send(formData);
});
