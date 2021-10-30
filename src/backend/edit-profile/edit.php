<?php
    session_start();
    include_once "../config.php";
    //  $conn = mysqli_connect("localhost","root","","chat");

    // if(!$conn){
    //     echo "Error while connecting to database ". mysqli_connect_error();
    // }
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $status = mysqli_real_escape_string($conn, $_POST['about-me']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $education = mysqli_real_escape_string($conn, $_POST['education']);
    $hobby = mysqli_real_escape_string($conn, $_POST['hobbies']);

    $unique_id = $_SESSION['unique_id'];

    if(!empty($fname) && !empty($lname) && !empty($email)){
      // all fileds are filled
      // check validity of email
      if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        
        $sql = "UPDATE users SET fname = '{$fname}', lname = '{$lname}', email = '{$email}' WHERE unique_id = '{$unique_id}'";
        $sql1 = "UPDATE user_info SET status = '{$status}', education = '{$education}', address = '{$address}', hobbies = '{$hobby}' where user_id = '{$unique_id}'";

        if($conn->query($sql) and $conn->query($sql1)){
          echo "success";
        }else{
          echo "Something went wrong! Please try again later!";
        }

        
      }else{
        //TODO email is not valid
        echo "Please enter valid email";
      }
    }else{
        //TODO all fileds are not filled
        echo "All fields are important";
    }

?>