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
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        // all fileds are filled
        // check validity of email
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            // email is valid

            // now check if account is already registered with email or not
            // $sql = mysql_query($conn, "SELECT email from users WHERE email = '$email'");
            $sql = "SELECT email from users WHERE email = '$email'";
            if($conn->query($sql)->num_rows >0 ){
                // email is registered with different account
                echo "$email - is already in use";
            }else{
                // email is not present

                // now check for validity of image
                // TODO will do outside email individually
                if(isset($_FILES['image'])){
                    // if image/file is uploded
                    // echo "37";
                    $img_name = $_FILES['image']['name']; // name of image file
                    $temp_name = $_FILES['image']['tmp_name']; // this tmeporary name is used to save/move file in our folder

                    // Now explode image to get its extension
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);  // will get extension of file/image in our case

                    $valid_extenstions = ['png','jpg','jpeg'];  // valid image extensions

                    if(in_array($img_ext, $valid_extenstions) === true){
                        // image extension is valid
                        $time = time(); // this will return current time
                        // TODO we'll use this time to rename user image with this name so that image name remains unique HIGHLIGHT may be wrong

                        $new_image_name = $time.$img_name; // changing imagename

                        // now storing userImage to images folder
                        if(move_uploaded_file($temp_name, "../images/".$new_image_name)){
                            //  we successfully stored userImage in respective folder
                            $status = "Active now"; // TODO when user will signup he will be active since we also logged user in after signup
                            $random_id = rand(1, 100000000); // creating random user id valid for small scale only


                            // now storing user info in our database 

                            // $sql2 = mysql_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, image, status)
                            //                             VALUES ('{$random_id}','{$fname}','{$lname}','{$email}','{$password}','{$new_image_name}','{$status}')
                            // ");
                            $sql2 = "INSERT INTO users (unique_id, fname, lname, email, password, image, status)
                                                        VALUES ('{$random_id}','{$fname}','{$lname}','{$email}','{$password}','{$new_image_name}','{$status}')
                            ";
                            if($conn->query($sql2)){
                                // echo "sql2 success";
                                // data successfully stored in DB
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    // echo "sql3 success";
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id']; // using this session we used user unique_id in other php

                                    echo "success";
                                }else{
                                    echo "Connection error";
                                }

                            }else{
                                echo "Something went wrong!!!";
                            }
                        }else{
                            echo "Image not uploaded! Something went wrong!";
                        }



                    }else{
                        // image extension is not valid
                     echo "Please select some valid extension of image: jpg, png, jpeg.";
                            
                    }

                }else{
                    //TODO image is not uploaded
                    echo "Please select Image";

                }
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