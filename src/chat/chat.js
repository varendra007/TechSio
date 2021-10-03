console.log('Hello world');

const form = document.querySelector('.msg__form');
const sendBtn = document.querySelector('.send');
const msgInput = document.querySelector('.msg__input');
const chatArea = document.querySelector('.chat-area');

sendBtn.addEventListener('click', function (e) {
	e.preventDefault();

	// console.log('clicked');
	// HIGHLIGHT AJAX
	let xhr = new XMLHttpRequest(); // creating XML object

	xhr.open('POST', '../backend/chat/insert-chat.php', true);

	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				if (data == 'success') {
					// console.log(data);
					msgInput.value = '';
				} else {
				}
				// console.log(data);
			}
		}
	};
	let formData = new FormData(form);
	xhr.send(formData);
});

setInterval(() => {
	// console.log('xyz');
	let xhr = new XMLHttpRequest(); // creating XML object

	xhr.open('POST', '../backend/chat/get-chat.php', true);

	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				// console.log(data);
				// contacts.innerHTML = data;
				chatArea.innerHTML = data;
			}
		}
	};
	let formData = new FormData(form);
	xhr.send(formData);
}, 500);
