<?php
  session_start();
  include_once("../config.php");
  // $likes_count = mysqli_real_escape_string($conn,$_POST['likes']);

  $id = mysqli_real_escape_string($conn,$_POST['id']);
  // $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
  $user_id = $_SESSION['unique_id'];
  $sql0 = mysqli_query($conn, "SELECT likes FROM posts WHERE post_id = '{$id}'");
  $likes_count = 0;
  if(mysqli_num_rows($sql0) > 0){
    while($row = mysqli_fetch_assoc($sql0)){
      // echo $row['likes'];
      $likes_count = $row['likes'] + 1;

    }
  }
  // echo $likes_count;
  $sql = mysqli_query($conn, "UPDATE posts SET likes = '{$likes_count}' WHERE post_id = '{$id}' ");
  $sql1 = mysqli_query($conn, "INSERT INTO post_manager (post_id, user_id) VALUES ('{$id}', '{$user_id}')");
  // echo $id;
  // $sql = mysqli_query($conn, "SELECT *")

?>