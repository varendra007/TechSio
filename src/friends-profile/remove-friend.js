const form = document.querySelector('.profile-page__remove-friend-form');
const removeBtn = document.querySelector('.remove-friend-btn');
const actionContainer = document.querySelector('.frnd-actions');
console.log('remove friend');

removeBtn.addEventListener('click', function (e) {
	e.preventDefault();

	// console.log('clicked');
	// HIGHLIGHT AJAX
	let xhr = new XMLHttpRequest(); // creating XML object

	xhr.open('POST', '../backend/friends-profile/remove-friend.php', true);

	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				if (data == 'success') {
					// console.log(data);
					// msgInput.value = '';
					// console.log(data);
					actionContainer.innerHTML = ` <form  method="post" class="profile-page__add-friend-form">
                      <input type="text" name = "user_id" value = "<?php echo $_SESSION['unique_id'];?>" hidden >
                    <input type="text" name = "friend_id" value = "<?php echo $user_id; ?>" hidden >
                    <button type="submit" class="add-friend-btn" style = "background-color:#e4e6eb;"> <img src="../icons/add-friends.png">Friend</button>
                </form>`;
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
