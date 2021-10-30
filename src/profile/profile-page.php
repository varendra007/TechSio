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
    <link rel="stylesheet" href="../components/header/header.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
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
            height:100%;
        }
        .cover-img__container{
            width:100%;
            height: 300px;
            overflow: hidden;
            border-radius: 6px;
            margin-bottom: 14px;
        }
        .cover-img{
            /* height:100%; */
            /* width:auto; */
        }

    </style>
</head>

<body>
 
       
    <?php include_once("../components/header/index.php");  ?>
    <!--Profile Page-->
    <div class="profile-container">
        <!--Profile container starts-->


        <!-- <img src="" alt="cover photo" class="cover-img"> -->
        <!-- <img src = "" -->
        <?php 
            $sql0 = mysqli_query($conn, "SELECT cover_image FROM user_info WHERE user_id = '{$user_id}'");
            if(mysqli_num_rows($sql) > 0){
                while($row = mysqli_fetch_assoc($sql0)){?>
                <div class="cover-img__container">

                    <img src="../backend/images/cover/<?php echo $row['cover_image']; ?>" alt="cover photo" class="cover-img">
                </div>
                    <!-- <img src="../backend/images/cover/163558253158343108lambo0.jpg" alt=""> -->
                    <?php
                }
            }
        ?>

 

        <div class="profile-info">
            <!--profile info starts-->

            <div class="info-col">
                <!--info col starts-->

                <div class="profile-intro">
                    <!--profile intro starts-->
                    <h3> Intro </h3>
                    <?php 
                        $sqli = mysqli_query($conn, "SELECT * FROM user_info WHERE user_id = '{$user_id}'");
                        if(mysqli_num_rows($sqli) > 0){
                            while($row = mysqli_fetch_assoc($sqli)){?>
                                <?php if($row['status']){?>
                                    <p class="intro-text"><?php echo $row['status']; ?></p>
                                <?php } ?>
                                
                                <hr>
                                <ul>
                                    <?php if($row['education']){?>
                                        <li> <img src="../icons/profile-study.png"><?php echo $row['education']; ?> </li>
                                    <?php } ?>

                                    <?php if($row['address']){?>
                                       <li> <img src="../icons/profile-location.png">Lives in <?php echo $row['address']; ?>.</li>
                                    <?php } ?>

                                    <?php if($row['hobbies']) {?>
                                       <li>I am Interested in <?php echo $row['hobbies'];  ?>. </li>
                                    <?php } ?>
                                   
                                    <!-- <li> <img src="../icons/profile-job.png">Started working at ABC Company.</li> -->
                                </ul>

                        <?php  }
                        }
                    ?>
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
    <script src ="../components/header/header.js"></script>
    <script src ="../components/header/s.js"></script>

</body>

</html>