<?php

    $conn = mysqli_connect("localhost","root","","chat");

    if(!$conn){
        echo "Error while connecting to database ". mysqli_connect_error();
    }


?>