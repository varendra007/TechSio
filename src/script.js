console.log('Hello world');

const form = document.querySelector('.signup-form');
const submitBtn = document.querySelector('.signup__btn__submit');
const errText = document.querySelector('.signup__error-text');

submitBtn.addEventListener('click', function (e) {
	e.preventDefault();

	// console.log('clicked');
	// HIGHLIGHT AJAX
	let xhr = new XMLHttpRequest(); // creating XML object

	xhr.open('POST', './backend/authentication/signup.php', true);

	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				if (data == 'success') {
					location.href = './main-page/main-page.php'; // TODO wil change later for direct to home page
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
