const posts = document.querySelector('.main-page__posts');
const loadMore = document.querySelector('.load-more-btn');

console.log('posts.js');

// setInterval(() => {
// 	// console.log('xyz');
// }, 1000);
let xhr = new XMLHttpRequest(); // creating XML object

xhr.open('GET', '../backend/main-page/get-post.php', true);

xhr.onload = () => {
	if (xhr.readyState === XMLHttpRequest.DONE) {
		if (xhr.status === 200) {
			let data = xhr.response;
			// console.log(data);
			posts.innerHTML = data;
		}
	}
};
xhr.send();

loadMore.addEventListener('click', () => {
	console.log('olasdk');
	let xhr = new XMLHttpRequest(); // creating XML object

	xhr.open('GET', '../backend/main-page/get-post.php', true);

	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				// console.log(data);
				posts.innerHTML = data;
			}
		}
	};
	xhr.send();
});
