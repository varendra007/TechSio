<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "../config.php";
       
        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $friend_id = mysqli_real_escape_string($conn, $_POST['friend_id']);

        $sql1 = "DELETE FROM `friends` WHERE (user_id = '{$user_id}' AND friend_id = '{$friend_id}') OR (user_id = '{$friend_id}' AND friend_id = '{$user_id}')";
        // $sql2 = "INSERT INTO friends (user_id,friend_id) VALUES ('{$friend_id}','{$user_id}')";
        
        if($conn->query($sql1)){
          echo "success";
        }else{
            echo "Something went wrong! Unable to add as a friend1";
        }
     

    }else{
         header("../../authentication/login.php");
    }



?>