<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "../config.php";
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['msg']);

        if(!empty($message)){
            // $sql = mysqli_query($conn,);
            $sql =  "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, message) VALUES ('{$incoming_id}', '{$outgoing_id}', '{$message}')";
            if($conn->query($sql)){
                echo "success";
            }else{
                echo "err";
            }
        }else{
            echo "please enter text";
        }
    }else{
         header("../../authentication/login.php");
    }



?>