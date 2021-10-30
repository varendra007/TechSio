<?php
    session_start();
    include_once ("../config.php");
    //  $conn = mysqli_connect("localhost","root","","chat");

    // if(!$conn){
    //     echo "Error while connecting to database ". mysqli_connect_error();
    // }
    $old_password = mysqli_real_escape_string($conn, $_POST['old-password']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new-password']);
 

    $unique_id = $_SESSION['unique_id'];

    if(!empty($old_password) && !empty($new_password)){
     
      $sql0 = mysqli_query($conn, "SELECT password from users WHERE unique_id = '{$unique_id}'");
      if(mysqli_num_rows($sql0) > 0){
        while($row = mysqli_fetch_assoc($sql0)){
          if($row['password'] === $old_password){
            $sql = "UPDATE users SET password = '{$new_password}' WHERE unique_id = '{$unique_id}'";
            if($conn->query($sql)){
              echo "success";
            }else{
              echo "Something went wrong! Unable to change password";
            }

          }else{
            echo "Incorrect old password";
          }
        }
      }else{
        echo "Error 500! Something went wrong with Database, Please login again!";
      }
        
    }else{
        //TODO all fileds are not filled
        echo "All fields are important";
    }
        

        
     

?>