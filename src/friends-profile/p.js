const frndActions = document.querySelector('.frnd-actions');
const frndForm = document.querySelector('.frnd-form');
console.log('kalsdfjlasdfjlaksd');
//

console.log('contacts.js');

setInterval(() => {
	// console.log('xyz');
	let xhr = new XMLHttpRequest(); // creating XML object

	xhr.open('GET', '../backend/friends-profile/check-friend.php', true);

	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				// console.log(data);
				// contacts.innerHTML = data;
				frndActions.innerHTML = data;
			}
		}
	};
	// let formData = new FormData(frndForm);
	xhr.send();
}, 1000);
