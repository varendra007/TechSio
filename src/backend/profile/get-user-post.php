<?php

    session_start();
    include_once("../config.php");
     $user_id  = $_SESSION['unique_id'];

    // $sql = mysqli_query($conn, "SELECT * FROM posts WHERE user_id = {$user_id}");
    $sql = mysqli_query($conn, "SELECT p.user_id, p.image AS post_image, p.likes, p.comment, p.date, u.image AS user_image, u.fname, u.lname FROM posts AS p JOIN users AS u WHERE u.unique_id = p.user_id and p.user_id = {$user_id}");
    $output = "";

    if(mysqli_num_rows($sql) == 0){
        // no users are available except you
        $output .= "No Posts are available.";
    }elseif(mysqli_num_rows($sql) > 0){
                // </a>
    // <a href = "chat.php?user_id='.$row['unique_id'].'">
     // <img src="../images/'.$row['image'] .'"
                                //     class="avtar">
       while( $row = mysqli_fetch_assoc($sql)){
            $output .= '
                    <div class="post-container">
                        <div class="post-row">

                            <div class="user-profile">
                                <img src="../backend/images/'.$row['user_image'].'">
                                <div>
                                    <p>'.$row['fname'].' ' .$row['lname'].'</p><br>
                                    <span>'.$row['date'].'</span>
                                </div>
                            </div>
                            <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                        </div>

                        <p class="post-text">'.$row['comment'].'</p>
                        <img  src="../backend/images/post/'.$row['post_image'].'"  class="post-img">


                        <div class="post-row">
                            <div class="activity-icons">
                                <div><img src="../icons/like-blue.png">'.$row['likes'].'</div>
                                <div><img src="../icons/comments.png">40</div>
                                <div><img src="../icons/share.png">10</div>
                            </div>

                            <div class="post-profile-icon">
                                <img src="../backend/images/'.$row['user_image'].'"><i class="fas fa-caret-down"></i>
                            </div>
                        </div>
                    </div>
            ';

       }
    }
    echo $output;

?>