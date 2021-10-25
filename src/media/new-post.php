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
    <!-- <link rel="stylesheet" href="header.css"> -->
    <!-- <link rel="stylesheet" href=""> -->
    <style>
    body{
        display: block;
        /* overflow: hidden; */

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
</head>

<body>
    <div style = "width: 100%; top:0;" >

    <!-- <div class="background-image"></div> -->
   <?php include_once("../components/header/index.php") ?>
    <!--    
     <nav>
        <div class="nav-left">
            <img src="../TechSio.png" height="150px" width="200px" class="logo" alt="Company Logo">
            <ul>
            <li style="color: #fff; margin: 0 15px;"><i class="fas fa-bell fa-2x" style="color: #ffff;"></i></li>
            <li style="margin: 0 15px;"><i class="fas fa-envelope fa-2x" style="color: #fff;"></i></li>
            <li style="margin: 0 15px;"><i class="fas fa-comment-alt fa-2x" style="color: #fff;"></i></li>
            </ul>
        </div>
        <?php 

        // ! header info and settings

        include_once("../backend/config.php");

        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
        if(mysqli_num_rows($sql)>0){
            $row = mysqli_fetch_assoc($sql);
        ?> 
        <div class="nav-right">
            <div class="search-box">
                <i class="fas fa-search fa-2x" style="padding: 0 5px 0 0;"></i>
                <input type="text" placeholder="Search">
            </div>
            <div class="nav-user-icon online" onclick="settingsMenuToggle()">
                <img src="../backend/images/<?php echo $row['image']; ?>"  height = "70px" class="avtar">
            </div>
        </div>

        <div class="settings-menu">

            <div id="dark-btn">
                <span></span>
            </div>


            <div class="settings-menu-inner">

                    <div class="user-profile" style="display:flex; align-items:center; ">
                        <img style="width: 45px; height: 45px; border-radius: 50%; margin-right: 10px;" src="../backend/images/<?php echo $row['image']; ?>" class="avtar">
                        <div>
                            <p> <?php echo $row['fname']." ". $row['lname']; ?></p>
                            <p><span class="status__active">
                                <?php echo $row['status']; ?>
                                </span></p>
                        </div>
                    </div>
                <hr>
                <div class="user-profile">
                    <img src="Images/feedback.png">
                    
                    <div>
                        <p> FeedBack </p><br>
                        <a href="#">Help us to Improve</a>
                    </div>
                </div>
                <hr>

                <div class="settings-links">
                    <img src="Images/setting.png" class="settings-icon">
                    <a href="#">Settings & Privacy <img src="Images/arrow.png" width="10px"></a>
                </div>

                <div class="settings-links">
                    <img src="Images/help.png" class="settings-icon">
                    <a href="#">Help <img src="Images/arrow.png" width="10px"></a>
                </div>

                <div class="settings-links">
                    <img src="Images/display.png" class="settings-icon">
                    <a href="#">Display & Accessibilty <img src="Images/arrow.png" width="10px"></a>
                </div>

                <div class="settings-links">
                    <img src="Images/logout.png" class="settings-icon">
                    <a href="#">Logout<img src="Images/arrow.png" width="10px"></a>
                </div>


            </div>

        </div>
        <?php        
            }
        ?> 

    </nav> -->


    <!-- main screen -->
        <div class= "screen">
            
            <!-- <div class="left-sidebar" style="overflow-x: auto; height: 100%;">

                Left-sidebar Starts HIGHLIGHT
                <div class="imp-links">
                    <a href="https://indianexpress.com/section/trending/"><img src="Images/news.png" alt="Trending News">Latest News</a>
                    <a href="../friends-overview/index.php"><img src="Images/friends.png" alt="Friends">Friends</a>
                    <a href="#"><img src="Images/group.png" alt="Group">Group</a>
                    <a href="#"><img src="Images/marketplace.png" alt="Market Place">Market Place</a>
                    <a href="#"><img src="Images/watch.png" alt="Watch">Watch</a>
                    <a href="#">More</a>
                </div>

                <div class="shortcut-links">
                    <p>Shortcuts</p>
                    <a href="#"><img src="Images/shortcut-1.png">Stories</a>
                    <a href="#"><img src="Images/shortcut-2.png">Posts</a>
                    <a href="../chat/contacts.php"><img src="Images/shortcut-3.png">Contact Details</a>
                    <a href="#"><img src="Images/shortcut-4.png">History management</a>
                </div>


            </div> -->
            <?php include_once("../components/shortcuts/index.php");?>
            <div class = "new-post_container" style = "flex:1;">

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
                        <textarea type="text" name="comment" placeholder="Add few words..." required></textarea>
                    </div>

                    <div class="field">
                        <input type="submit" value="Add new post" class="post__btn__submit">
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
    <script src = "friends.js" async defer></script>
</body>

</html>