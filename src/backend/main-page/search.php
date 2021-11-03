<?php
  include_once("../config.php");
  // echo "success";
  $search = mysqli_real_escape_string($conn, $_POST['searchTerm']);
  $name = explode(" ",$search);
  $output = "";
  $sql  = mysqli_query($conn, "SELECT * FROM users WHERE fname LIKE '%{$name[0]}%' OR lname LIKE '%{$name[0]}%' ");
  if(mysqli_num_rows($sql) > 0){
                              
    while( $row = mysqli_fetch_assoc($sql)){
      $output .= '
        <a href = "../friends-profile/profile-page.php?user_id='.$row['unique_id'].'" style="text-decoration: none; color: black;">
          <div class="online-list" style = "padding:5px 10px;">
                  
            <div class="online image-friend">
              <img src="../backend/images/'.$row['image'].'">
            </div>
            <p style = "color: var(--txt-color);">'.$row['fname'].' ' .$row['lname'].'</p>
          </div>
        </a>
      ';
    }
  }else{
    $output .= '<p style ="padding:20px 10px; text-align:center;color: var(--txt-color);" >No users found.</p>';
  }

  echo $output;
  // echo "ald";

  // echo "success:";
?>