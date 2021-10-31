<?php

    $conn = mysqli_connect("localhost","root","");

    if(!$conn){
        // echo "Error while connecting to database ";
        die("Connection failed: ");
    }

    // $sql = "CREATE DATABASE chat";
    // if()
    $sql = mysqli_query($conn,"CREATE DATABASE chat" );
    $conn->close();
    
    $conn = mysqli_connect("localhost","root","","chat");
    
    $sql1 = mysqli_query($conn,"CREATE TABLE `chat`.`friends` ( `id` INT NOT NULL , `user_id` INT(255) NOT NULL , `friend_id` INT(255) NOT NULL ) ENGINE = InnoDB");

    $sql2 = mysqli_query($conn,"CREATE TABLE `chat`.`messages` ( `msg_id` INT NOT NULL ,  `incoming_msg_id` INT(255) NOT NULL ,  `outgoing_msg_id` INT(255) NOT NULL ,  `message` VARCHAR(10000) NOT NULL ) ENGINE = InnoDB");

    $sql3 = mysqli_query($conn,"CREATE TABLE `chat`.`posts` (`post_id` INT NOT NULL AUTO_INCREMENT, `user_id` INT(255) NOT NULL , `image` VARCHAR(255) NOT NULL , `likes` INT NOT NULL , `comment` VARCHAR(200) NOT NULL , `date` DATE NOT NULL, PRIMARY KEY (`post_id`) ) ENGINE = InnoDB");

    $sql4 = mysqli_query($conn,"CREATE TABLE `chat`.`users` ( `id` INT NOT NULL ,  `unique_id` INT(255) NOT NULL ,  `fname` VARCHAR(200) NOT NULL ,  `lname` VARCHAR(100) NOT NULL ,  `email` VARCHAR(200) NOT NULL ,  `password` VARCHAR(200) NOT NULL ,  `image` VARCHAR(400) NOT NULL ,  `status` VARCHAR(100) NOT NULL ) ENGINE = InnoDB");

    $sql5 = mysqli_query($conn,"CREATE TABLE `chat`.`user_info` ( `id` INT NOT NULL ,  `user_id` INT(255) NOT NULL ,  `status` VARCHAR(200) NOT NULL ,  `education` VARCHAR(200) NOT NULL ,  `address` VARCHAR(300) NOT NULL ,  `website` VARCHAR(500) NOT NULL ,  `hobbies` VARCHAR(400) NOT NULL, `cover_image` VARCHAR(400) NOT NULL ) ENGINE = InnoDB");

    $sql6 = mysqli_query($conn, "CREATE TABLE `chat`.`post_manager` ( `id` INT NOT NULL , `post_id` INT NOT NULL , `user_id` INT NOT NULL ) ENGINE = InnoDB");
$conn->close();

?>