const search = document.querySelector('#user_search');
// const searchBtn = document.querySelector('.search__btn');
// const contact = document.querySelector('.main-page__contacts');
console.log('lskdfjalsdfkj');
search.onkeyup = () => {
	console.log(search.value);
	let searchTerm = search.value;
	let xhr = new XMLHttpRequest();
	xhr.open('POST', '../backend/main-page/search.php', true);
	xhr.onload = () => {
		if (xhr.status === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				console.log(data);
				// contact.innerHTML = data;
			} else {
				console.log(data);
				console.log('aldkf');
			}
		}
	};
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhr.send('searchTerm=' + searchTerm);
};
