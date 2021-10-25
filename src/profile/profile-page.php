<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
    include_once("../backend/config.php");
    $user_id = $_SESSION['unique_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Page</title>
    <link rel="stylesheet" href="profile-page.css">
    <script src="https://kit.fontawesome.com/cc5f467dfb.js" crossorigin="anonymous"></script>
    <style>
        .button {
        width: 100%;
        padding: 6px;
        font-size: 1em;
        font-weight: 500;
        color: #fff;
        background: linear-gradient(to bottom right, #f88bf8, #9141e2);
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
            
        }
        .button a{
            text-decoration: none;
            color: #fff;
        }
        .button:hover,
        .button:hover {
            background: linear-gradient(to bottom right, #f88bf8, #9141e2);
        }
        .main-page__add-new-post-btn{
            width: 100%;
        }

    </style>
</head>

<body>
 
        <nav>
            <div class="nav-left">
                <!--nav left starts-->
                <img src="Images/TechSio.png" height="150px" width="200px" class="logo" alt="Company Logo">
                <ul>
                    <li><img src="Images/notification.png" alt="Notifications"></li>
                    <li><img src="Images/inbox.png" alt="Inbox"></li>
                    <li><img src="Images/message.png" alt="Message"></li>
                </ul>
            </div>
            <?php 
            include_once("../backend/config.php");
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql)>0){
                $row = mysqli_fetch_assoc($sql);
            ?> 
            <div class="nav-right">
                <!--Nav right starts-->
                <div class="search-box">
                    <img src="Images/search.png" alt="Search Bar">
                    <input type="text" placeholder="Search">
                </div>
                <div class="nav-user-icon online" onclick="settingsMenuToggle()">
                    <!-- <img src="Images/profile-pic.png" height="70px"> -->
                    <img src="../backend/images/<?php echo $row['image']; ?>"  height = "70px" class="avtar">
                </div>
            </div>

            <div class="settings-menu">
                <!--Settings menu starts-->

                <div id="dark-btn">
                    <!--Dark btn starts-->
                    <span></span>
                </div>
                <!--Dark btn ends-->


                <div class="settings-menu-inner">
                    <!--Settings menu Inner  starts-->

                    <!-- <a href="../profile/profile-page.php"> -->
                        <div class="user-profile">
                            <!--User profile starts-->
                            <img src="../backend/images/<?php echo $row['image']; ?>" class="avtar">
                            <div>
                                <p> <?php echo $row['fname']." ". $row['lname']; ?></p>
                                <p><span class="status__active">
                                    <?php echo $row['status']; ?>
                                    </span></p>
                                <!-- <br> -->
                                <!-- <a href="#">Profile</a> -->
                            </div>
                        </div>
                    <!-- </a> -->
                    <!--User profile ends-->
                    <hr>
                    <div class="user-profile">
                        <!--User profile starts-->
                        <img src="Images/feedback.png">
                       
                        <div>
                            <p> FeedBack </p><br>
                            <a href="#">Help us to Improve</a>
                        </div>
                    </div>
                    <!--User profile ends-->
                    <hr>

                    <div class="settings-links">
                        <!--Setting links starts-->
                        <img src="Images/setting.png" class="settings-icon">
                        <a href="#">Settings & Privacy <img src="Images/arrow.png" width="10px"></a>
                    </div>
                    <!--Setting links ends-->

                    <div class="settings-links">
                        <!--help starts-->
                        <img src="Images/help.png" class="settings-icon">
                        <a href="#">Help <img src="Images/arrow.png" width="10px"></a>
                    </div>
                    <!--help ends-->

                    <div class="settings-links">
                        <!--Display starts-->
                        <img src="Images/display.png" class="settings-icon">
                        <a href="#">Display & Accessibilty <img src="Images/arrow.png" width="10px"></a>
                    </div>
                    <!--Display ends-->

                    <div class="settings-links">
                        <!--Logout starts-->
                        <img src="Images/logout.png" class="settings-icon">
                        <a href="#">Logout<img src="Images/arrow.png" width="10px"></a>
                    </div>
                    <!--Logout ends-->


                </div>
                <!--Settings menu inner ends-->

            </div>
            <?php        
                }
            ?> 
            <!--Settings menu ends-->

        </nav>

    <!--Profile Page-->
    <div class="profile-container">
        <!--Profile container starts-->


        <img src="Images/cover.png" alt="cover photo" class="cover-img">

 

        <div class="profile-info">
            <!--profile info starts-->

            <div class="info-col">
                <!--info col starts-->

                <div class="profile-intro">
                    <!--profile intro starts-->
                    <h3> Intro </h3>
                    <p class="intro-text">Believe, Become !!!<img src="Images/feeling.png"></p>
                    <hr>
                    <ul>
                        <li> <img src="Images/profile-study.png">Student at XYZ university.</li>
                        <li> <img src="Images/profile-location.png">Lives in India.</li>
                        <li> <img src="Images/profile-job.png">Started working at ABC Company.</li>
                    </ul>
                </div>
                <!--profile intro ends-->

                <div class="profile-intro">
                    <!--profile intro starts-->
                    <div class="title-box">
                        <h3>Photos</h3>
                        <a href="#">All photos</a>
                    </div>
                    <div class="photo-box">
                        <!--photo box starts-->
                         <?php
                        $sql = mysqli_query($conn, "SELECT p.user_id, p.image AS post_image, p.likes, p.comment, p.date, u.image AS user_image, u.fname, u.lname FROM posts AS p JOIN users AS u WHERE u.unique_id = p.user_id and p.user_id = {$user_id}");

                        if(mysqli_num_rows($sql) == 0){
                           ?> <p style="text-align:center; width:200px;">No posts are available</p><?php
                        }elseif(mysqli_num_rows($sql) > 0){
                        while( $row = mysqli_fetch_assoc($sql)){


                    ?>
                        <div><img  src="../backend/images/post/<?php echo $row['post_image'];?>"></div>

                    <?php }
                        }
                    ?>
                    </div>
                    <!--phtoto box ends-->
                </div>
                <!--profile intro ends-->

                <div class="profile-intro">
                    <!--profile intro starts-->
                    <div class="title-box">
                        <h3>Friends</h3>
                        <a href="#">All friends</a>
                    </div>
                    <p>120(10 mutual)</p>
                    <div class="friends-box">
                        <!--photo box starts-->
                        
                        <?php
                            $sql = mysqli_query($conn, "SELECT * FROM users");

                            if(mysqli_num_rows($sql) == 1){
                                // no users are available except you
                                // $output .= "No contacts are available.";
                            }elseif(mysqli_num_rows($sql) > 0){
                                    
                                while( $row = mysqli_fetch_assoc($sql)){
                                    if($row['unique_id'] != $_SESSION['unique_id']){
                                        ?>
                                        <div><img src="../backend/images/<?php echo $row['image'];?>">
                                         <p><?php echo $row['fname'].' '. $row['lname']; ?></p>
                                   </div> 

                            <?php
                                    }
                                }
                            }
                        ?>
                        
                    </div>
                    <!--phtoto box ends-->
                </div>
                <!--profile intro ends-->

            </div>
            <!--info-col ends-->

            <div class="post-col">
                <!--post-col starts-->

              <div class="write-post-container">
                <?php 
                include_once("../backend/config.php");
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if(mysqli_num_rows($sql)>0){
                    $row = mysqli_fetch_assoc($sql);
                ?> 
                    <!--Write post container Starts-->
                    <div class="user-profile">
                        <!--User profile starts-->
                        <!-- <img src="Images/profile-pic.png"> -->
                         <img src="../backend/images/<?php echo $row['image']; ?>" class="avtar">
                        <div>
                            <p>  <?php echo $row['fname']." ". $row['lname']; ?></p><br>
                            <small>Public <i class="fas fa-sort-down"></i></small>
                        </div>
                    </div>
                    <!--User profile ends-->
                    <div class="post-input-container">
                        <!--Post input container starts-->
                        <!-- <textarea rows="3" placeholder="Share Your Thoughts"></textarea>
                        <div class="add-post-links">
                            <a href="#"><img src="Images/live-video.png">Live Video</a>
                            <a href="#"><img src="Images/photo.png">Photo/Video</a>
                            <a href="#"><img src="Images/feeling.png">Emojis</a>
                        </div> -->
                        <div class = "button">

                            <a href="../media/new-post.php"  class = "main-page__add-new-post-btn" style = "width: 100%;">
                            <div style = "width: 100%;">NEW POST

                            </div>
                            </a>
                        </div>


                    </div>
                    <!--Post input container ends-->
                <?php        
                }
                ?> 
                </div>
                <!--write post container ends-->
                <div class="profile-page__post-container"></div>

            </div>
            <!--post-col ends-->

        </div>
        <!--profile-info ends-->

    </div> <!-- Profile container ends-->

    <div class="footer">
        <!--footer starts-->
        <p> Copyright 2021 - TechSio Social Media Site </p>
    </div>
    <!--footer ends-->

    <script src="profile-page.js"></script>
    <script src = "getUserPosts.js"></script>

</body>

</html>