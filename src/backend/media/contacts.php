<?php

    session_start();
    include_once("../config.php");
    $user_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn, "SELECT u.unique_id, u.fname, u.lname, u.email, u.image, u.status FROM users AS u JOIN friends AS f WHERE f.friend_id = u.unique_id AND f.user_id = '{$user_id}'");
    $output = "";

    if(mysqli_num_rows($sql) == 0){
        // no users are available except you
        $output .= '<p style="text-align:center;">You don\'t have any friends yet.<br> Add some</p>';
    }elseif(mysqli_num_rows($sql) > 0){
                // </a>
    // <a href = "chat.php?user_id='.$row['unique_id'].'">
     // <img src="../images/'.$row['image'] .'"
                                //     class="avtar">
        $user_id = $_SESSION['unique_id'];
                                
       while( $row = mysqli_fetch_assoc($sql)){
           if($row['unique_id'] != $user_id){
            $output .= '
                <a href = "../friends-profile/profile-page.php?user_id='.$row['unique_id'].'" style="text-decoration: none; color: black;">
                <div class="online-list">
                        
                        <div class="online image-friend">
                            <img src="../backend/images/'.$row['image'].'">
                        </div>
                        <p>'.$row['fname'].' ' .$row['lname'].'</p>
                    </div>
                </a>
            ';
           }
           

       }
    }
    echo $output;

?>