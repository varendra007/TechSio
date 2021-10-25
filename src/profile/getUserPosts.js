const posts = document.querySelector('.profile-page__post-container');
// const loadMore = document.querySelector('.load-more-btn');

console.log('posts.js');

setInterval(() => {
	let xhr = new XMLHttpRequest(); // creating XML object

	xhr.open('GET', '../backend/profile/get-user-post.php', true);

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
}, 1000);

// loadMore.addEventListener('click', () => {
// 	console.log('olasdk');
// 	let xhr = new XMLHttpRequest(); // creating XML object

// 	xhr.open('GET', '../backend/main-page/get-post.php', true);

// 	xhr.onload = () => {
// 		if (xhr.readyState === XMLHttpRequest.DONE) {
// 			if (xhr.status === 200) {
// 				let data = xhr.response;
// 				// console.log(data);
// 				posts.innerHTML = data;
// 			}
// 		}
// 	};
// 	xhr.send();
// });
