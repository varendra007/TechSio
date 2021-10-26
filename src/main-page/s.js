const searchInput = document.querySelector('#user_search');
// const searchBtn = document.querySelector('.search__btn');
// const contact = document.querySelector('.main-page__contacts');
const searchList = document.querySelector('#search__list');
console.log('lskdfjalsdfkj');
searchInput.onkeyup = () => {
	console.log(searchInput.value);
	let searchTerm = searchInput.value;
	let xhr = new XMLHttpRequest();
	xhr.open('POST', '../backend/main-page/search.php', true);
	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				console.log(data);
				searchList.innerHTML = data;
			}
		}
	};
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhr.send('searchTerm=' + searchTerm);
};

document.addEventListener('click', () => {
	if (
		searchInput === document.activeElement ||
		searchList === document.activeElement
	) {
		console.log('active');
		searchList.classList.add('search__list-toggle');
	} else {
		console.log('inactive');
		searchList.classList.remove('search__list-toggle');
		searchInput.value = '';
		searchList.innerHTML = '';
	}
});
