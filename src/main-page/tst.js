const search = document.querySelector('.search__input');
const searchBtn = document.querySelector('.search__btn');
const contacts = document.querySelector('.main-page__contacts');
// console.log('lskdfjalsdfkj');
search.onkeyup = () => {
	let searchTerm = search.value;
	let xhr = new XMLHttpRequest();
	xhr.open('POST', '../backend/main-page/search.php', true);
	xhr.onload = () => {
		if (xhr.status === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				console.log(data);
				contacts.innerHTML = data;
			}
			console.log(data);
			console.log('aldkf');
		}
	};
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhr.send('searchTerm=' + searchTerm);
};

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
});
