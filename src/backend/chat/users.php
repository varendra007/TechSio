<?php

    session_start();
    include_once("../config.php");

    $sql = mysqli_query($conn, "SELECT * FROM users");
    $output = "";

    if(mysqli_num_rows($sql) == 1){
        // no users are available except you
        $output .= "No contacts are available.";
    }elseif(mysqli_num_rows($sql) > 0){
         $user_id = $_SESSION['unique_id'];

       while( $row = mysqli_fetch_assoc($sql)){
           if($row['unique_id'] != $user_id){

               $output .= '
                   <li>
                   <a href = "chat.php?user_id='.$row['unique_id'].'" style="text-decoration: none; color: black;">
                       <div class="friend '.$row['unique_id'] .'" data-id= "'.$row['unique_id'].'" style = "" >
                              <div class="img__name">
                                 <img src="../backend/images/'.$row['image'].'"
                                   class="avtar">
                                   <div>
                                       <h3 style= "font-weight:500">'.$row['fname']." ". $row['lname'] .'</h3>
                                       <p><span style="color: greenyellow;">Typing...</span></p>
                                   </div>
   
                               </div>
                               <div class="time">
                                   <p>Today</p>
                               </div>
                           
                       </div>
                        </a>
                   </li>
               ';
           }

       }
    }
    echo $output;

?>