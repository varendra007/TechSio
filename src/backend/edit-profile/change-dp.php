<?php
    session_start();
    include_once "../config.php";
   
    

    
 
    if(isset($_FILES['profile-image'])){
      // if image/file is uploded
      // echo "37";
      $img_name = $_FILES['profile-image']['name']; // name of image file
      $temp_name = $_FILES['profile-image']['tmp_name']; // this tmeporary name is used to save/move file in our folder

      // Now explode image to get its extension
      $img_explode = explode('.',$img_name);
      $img_ext = end($img_explode);  // will get extension of file/image in our case

      $valid_extenstions = ['png','jpg','jpeg'];  // valid image extensions

      if(in_array($img_ext, $valid_extenstions) === true){
        // image extension is valid
        $time = time(); // this will return current time
        // TODO we'll use this time to rename user image with this name so that image name remains unique HIGHLIGHT may be wrong
        $unique_id = $_SESSION['unique_id'];
        $new_image_name = $time.$unique_id.$img_name; // changing imagename

        // now storing userImage to images folder
        if(move_uploaded_file($temp_name, "../images/".$new_image_name)){
            
          $sql = "UPDATE users SET image = '{$new_image_name}' WHERE unique_id ='{$unique_id}'";
          if($conn->query($sql)){
            echo "success";
          }else{
            echo "Unable to change DP";
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

?>