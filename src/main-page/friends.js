const contacts = document.querySelector('.main-page__contacts');

console.log('contacts.js');

setInterval(() => {
	// console.log('xyz');
	let xhr = new XMLHttpRequest(); // creating XML object

	xhr.open('GET', '../backend/main-page/contacts.php', true);

	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				// console.log(data);
				contacts.innerHTML = data;
			}
		}
	};
	xhr.send();
}, 1000);
