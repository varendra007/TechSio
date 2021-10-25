<?php

    session_start();
    include_once("../config.php");

    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    if(!empty($comment)){

        if(isset($_FILES['image'])){

            $img_name = $_FILES['image']['name']; // name of image file
            $temp_name = $_FILES['image']['tmp_name']; // this tmeporary name is used to save/move file in our folder

            // Now explode image to get its extension
            $img_explode = explode('.',$img_name);
            $img_ext = end($img_explode);  // will get extension of file/image in our case

            $valid_extenstions = ['png','jpg','jpeg'];  // valid image extensions

            if(in_array($img_ext, $valid_extenstions) === true){

                $time = time(); // this will return current time
                // TODO we'll use this time to rename user image with this name so that image name remains unique HIGHLIGHT may be wrong

                $new_image_name = $time.$_SESSION['unique_id'].$img_name; // changing imagename
                $zero = 0;
                $current_date = date("Y/m/d");
                
                // now storing userImage to images folder
                if(move_uploaded_file($temp_name, "../images/post/".$new_image_name)){
                    $user_id = $_SESSION['unique_id'];

                    $sql = "INSERT INTO posts (user_id, image, likes, comment, date) 
                            VALUES('{$user_id}', '{$new_image_name}', '{$zero}', '{$comment}','{$current_date}')";
                    if($conn->query($sql)){ 
                        echo "success";
                    }else{
                        echo "Something went wrong with database 500";
                    }

                }else{
                    echo "Image not uploaded! Something went wrong!";
                }

            }else{
                echo "Please select some valid extension of image: jpg, png, jpeg.";
            }

        }else{
        echo "Please select image!";
        }

    }else{
        echo "Please enter few text in comment section!";
    }


?>