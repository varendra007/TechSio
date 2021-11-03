<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
    include_once("../backend/config.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="media-style.css">
    <link rel="stylesheet" href="../components/header/header.css">
    
    <style>
    body{
        display: block;
        /* overflow: hidden; */
        background: var(--bg-color);
        color: var(--txt-color);

    }
    h1,h2,h3,h4,h5,h6,p{
        color: var(--txt-color);
    }
    .screen{
        display:flex;
        flex-direction: row;
        /* justify-content: space-evenly */
        overflow: hidden;
        justify-content: space-between;
        /* height: 100%; */
    }
    .new-post_container{
        display:flex;
        flex-direction:column;
        /* flex:0.6; */
        /* width: 100%; */
        flex:1;
    }
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
        <link rel="stylesheet" href="../global-styles.css">
</head>

<body>
    <div style = "width: 100%; top:0;" >

    <!-- <div class="background-image"></div> -->
   <?php include_once("../components/header/index.php") ?>
   


    <!-- main screen -->
        <div class= "screen" style  = "background: var(--bg-color);">
            

               <?php include_once("../components/shortcuts/index.php");?>
            <div class = "new-post_container" style = "flex:1; background: var(--bg-color);">

            <header>
                <h3 class="gradient-text">Add New Post</h3>
            </header>
            <div class="form" style="display: flex; width: 100%; justify-content: center;">

                <form action="#" class="new-post__form" enctype="multipart/form-data" style="width: 100%;">
                <div class="error-text post__error-text" >This is an error message!</div>
                    <div class="field">
                        <label for="">Select Image<font style="color: red;">*</font></label>
                        <input type="file" name="image" class="select-image" required>
                    </div>
                    <div class="field input">
                        <label for="">Comment<font style="color: red;">*</font></label>
                        <textarea style = "background: var(--dark-box); color: var(--txt-color);" type="text" name="comment" placeholder="Add few words..." required></textarea>
                    </div>

                    <div class="field">
                        <input style = "background: linear-gradient(to bottom right, #f27ef2, #7d2fcc)"  type="submit" value="Add new post" class="post__btn__submit">
                    </div>
                </form>
            </div>
            </div>

            
            <!-- <div class="right-sidebar" style="height: 100%; overflow-x: auto;">
                
                <div class="search__container" style="width: 100%;">
                    <input class="search__input" type="text" placeholder="Search" style="width: 90%;">
                    <div class="lens" style="background-color: white;">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <div class="main-page__contacts"></div>
              

            </div> -->
            <?php include_once("../components/friends-right/index.php"); ?>
        </div>
    </div>
    <script src="script.js" async defer></script>
    <script src = "../components/header/header.js" async defer></script>
    <script src = "../components/header/s.js"></script>
    <script src = "friends.js" async defer></script>
</body>

</html>