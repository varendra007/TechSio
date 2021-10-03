<?php
    session_start();
    include_once("../config.php");

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($email) && !empty($password)){
        // All fileds are entered

        // Todo will check later if email format is correct or not as we did at time of login
        $sql  = mysqli_query($conn, "SELECT * FROM users WHERE password = '$password' AND email = '$email'");
        if(mysqli_num_rows($sql) > 0){
            // user credentials are correct
            $row = mysqli_fetch_assoc($sql);
            $_SESSION['unique_id'] = $row['unique_id']; // using this session we used user unique_id in other php
            echo "success";
        }else{
            echo "Please enter valid credentials";
        }
    }else{

        echo "All fields are required";
    }

?>