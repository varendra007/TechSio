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
            $unique_id = $row['unique_id'];
            $sql2 = mysqli_query($conn, "SELECT user_id from user_info");
            if(mysqli_num_rows($sql2) == 0){
                $sql4 = "INSERT INTO user_info (user_id) VALUES ('{$unique_id}')";
                if(!$conn->query($sql4)){
                echo "Unable to login! Please try again later";
                }
            }
            $status = "Active now";
            $sql_s = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$unique_id}");

            if($sql_s){
                
                $_SESSION['unique_id'] = $row['unique_id']; // using this session we used user unique_id in other php
                echo "success";
            }else{
                echo "Error 500. Something went wrong!";
            }

            
        }else{
            echo "Please enter valid credentials";
        }
    }else{

        echo "All fields are required";
    }

?>