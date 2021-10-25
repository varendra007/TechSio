<?php

    session_start();
    include_once("../config.php");

    $sql = mysqli_query($conn, "SELECT * FROM users");
    $output = "";

    if(mysqli_num_rows($sql) == 1){
        // no users are available except you
        $output .= "No contacts are available.";
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