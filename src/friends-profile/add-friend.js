const form = document.querySelector('.profile-page__add-friend-form');
const addBtn = document.querySelector('.add-friend-btn');
const actionContainer = document.querySelector('.profile-page__frnd-actions');
console.log('add friend');

addBtn.addEventListener('click', function (e) {
	e.preventDefault();

	// console.log('clicked');
	// HIGHLIGHT AJAX
	let xhr = new XMLHttpRequest(); // creating XML object

	xhr.open('POST', '../backend/friends-profile/add-friend.php', true);

	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				if (data == 'success') {
					// console.log(data);
					// msgInput.value = '';
					// console.log(data);
					form.innerHTML = '';
				} else {
				}
				// console.log(data);
				// console.log(data);
			}
		}
	};
	let formData = new FormData(form);
	xhr.send(formData);
});
