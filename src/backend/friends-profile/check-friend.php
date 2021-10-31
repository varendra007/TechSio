<?php
session_start();
  include_once("../config.php");
  $x = $_SESSION['unique_id'];

  $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
  $sql = mysqli_query($conn, "SELECT * FROM friends WHERE user_id = {$x} AND friend_id = {$user_id}");
  $isFriend  = 0;
  if(mysqli_num_rows($sql) > 0){
    while($row = mysqli_fetch_assoc($sql)){
      // if($row['friend_id'] == $user_id){
        $isFriend = 1;
      // }
    }
  }
  $output = '';

  if($isFriend == 0){
    $output .= '
    <form  method="post" class="profile-page__add-friend-form frnd-form" enctype="multipart/form-data">
      <input type="text" name = "user_id" value = "'.$x.'" hidden >
      <input type="text" name = "friend_id" value = "'.$user_id.'" hidden >
      <button type="submit" class="add-friend-btn" style = "background-color:#e4e6eb;"> <img src="../icons/add-friends.png">Friend</button>
    </form>
    ';
  }else{
    $output .= '
    <form  method="post" class="profile-page__remove-friend-form frnd-form" enctype="multipart/form-data">
      <input type="text" name = "user_id" value = "'.$x.'" hidden >
      <input type="text" name = "friend_id" value = "'.$user_id.'" hidden >
      <button style = "" type="submit" class="remove-friend-btn" style = "background-color:#e4e6eb;"> <i style="color:black;padding-right:5px;" class="fas fa-user-minus"></i> Remove Frined</button>
    </form>
    ';
  }

  echo $output;

?>