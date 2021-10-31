<?php
  session_start();
  if(isset($_SESSION['unique_id'])){
    include_once("../config.php");
    $unique_id = $_SESSION['unique_id'];
    $status = "Offline now";
    
    $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$unique_id}");
    if($sql){
      session_unset();
      session_destroy();
       header("location: ../../authentication/login.php");
    }

  }else{
    header("location: ../../authentication/login.php");
  }

?>