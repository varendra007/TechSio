<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
    include_once("../backend/config.php");
    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
    $sql = mysqli_query($conn, "SELECT * FROM friends WHERE user_id = {$_SESSION['unique_id']}");
    $isFriend  = 0;
        if(mysqli_num_rows($sql) > 0){
            while($row = mysqli_fetch_assoc($sql)){
                if($row['friend_id'] == $user_id){
                    $isFriend = 1;
                }
            }

        }
       
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
        }

    </style>
</head>

<body>
 
      
        <?php include_once("../components/header/index.php"); ?>
    <!--Profile Page-->
    <!-- HIGHLIGHT -->
    <div class="profile-container">
        <!--Profile container starts-->


        <img src="../icons/cover.png" alt="cover photo" class="cover-img">

        <div class="profile-details">
            <!--profile-details starts-->

            <div class="pd-left">
                <!--pd left starts-->

                <div class="pd-row">
                    <!--pd row starts-->
                    <!-- HIGHLIGHT -->
                    <?php 

                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
                    if(mysqli_num_rows($sql) > 0){

                    $row = mysqli_fetch_assoc($sql);

                    ?> 
                        <img src="../backend/images/<?php echo $row['image'];?>" class="pd-image">
                        <div>
                            <h3><?php echo $row['fname'].' '. $row['lname']; ?></h3>
                            <!--User name should br taken from database-->
                            <p>120 friends - 20 mutual</p>
                            <!--No. of friends should be static and should change according to data in the database-->
                            <!-- <img src="Images/member-1.png">
                            <img src="Images/member-2.png">
                            <img src="Images/member-3.png">
                            <img src="Images/member-4.png"> -->
                        </div>

                    <?php } ?>

                </div>
                <!--pd row ends-->

            </div>
            <!--pd-left ends-->


            <div class="pd-right profile-page__frnd-actions">

                <!--pd-right starts-->
                <?php if($isFriend == 0){?>

                <form  method="post" class="profile-page__add-friend-form">
                      <input type="text" name = "user_id" value = "<?php echo $_SESSION['unique_id'];?>" hidden >
                    <input type="text" name = "friend_id" value = "<?php echo $user_id; ?>" hidden >
                    <button type="submit" class="add-friend-btn" style = "background-color:#e4e6eb;"> <img src="../icons/add-friends.png">Friend</button>
                </form>

               <?php } ?>
                

                <a href="../chat/chat.php?user_id=<?php echo $user_id; ?>" style = "background: #1876f2;border: 0; outline: 0; padding: 6px 10px; display: inline-flex; align-items: center; color: #fff; border-radius: 3px; margin-left: 10px; cursor: pointer; text-decoration:none; "><img src = "../icons/message.png" style = "height: 15px; margin: 0 5px 0; padding: 0;"> Message</a>
              
                <!--button for adding friends-->
                <br>
                <a href="#"><img src="../icons/more.png"></a>

            </div>
            <!--pd-right ends-->

        </div>
        <!--profile-details ends-->

        <div class="profile-info">
            <!--profile info starts-->

            <div class="info-col">
                <!--info col starts-->

                <div class="profile-intro">
                    <!--profile intro starts-->
                    <h3> Intro </h3>
                    <p class="intro-text">Believe, Become !!!<img src="../icons/feeling.png"></p>
                    <hr>
                    <ul>
                        <li> <img src="../icons/profile-study.png">Student at XYZ university.</li>
                        <li> <img src="../icons/profile-location.png">Lives in India.</li>
                        <li> <img src="../icons/profile-job.png">Started working at ABC Company.</li>
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

             
                <!--write post container ends-->
                <div class="profile-page__post-container">
                    <?php
                        $sql = mysqli_query($conn, "SELECT p.user_id, p.image AS post_image, p.likes, p.comment, p.date, u.image AS user_image, u.fname, u.lname FROM posts AS p JOIN users AS u WHERE u.unique_id = p.user_id and p.user_id = {$user_id}");
                        // $output = "";

                        if(mysqli_num_rows($sql) == 0){
                            ?> <p style="text-align:center; width:100%;">No posts are available</p><?php
                        }elseif(mysqli_num_rows($sql) > 0){
                        while( $row = mysqli_fetch_assoc($sql)){


                    ?>


                        <div class="post-container">
                            <div class="post-row">

                                <div class="user-profile">
                                    <img src="../backend/images/<?php echo $row['user_image'];?>">
                                    <div>
                                        <p><?php echo $row['fname'].' ' .$row['lname'];?></p><br>
                                        <span><?php echo $row['date'];?></span>
                                    </div>
                                </div>
                                <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                            </div>

                            <p class="post-text"><?php echo $row['comment'];?></p>
                            <img  src="../backend/images/post/<?php echo $row['post_image'];?>"  class="post-img">


                            <div class="post-row">
                                <div class="activity-icons">
                                    <div><img src="../icons/like-blue.png"><? echo $row['likes'];?></div>
                                    <div><img src="../icons/comments.png">40</div>
                                    <div><img src="../icons/share.png">10</div>
                                </div>

                                <div class="post-profile-icon">
                                    <img src="../backend/images/<?php echo $row['user_image'];?>"><i class="fas fa-caret-down"></i>
                                </div>
                            </div>
                        </div>


                    <?php }
                        }
                    ?>






                </div>

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
    <script src = "add-friend.js"></script>
    <script src = "../components/header/header.js"></script>
    <script src = "../components/header/s.js"></script>
    <!-- <script src = "getUserPosts.js"></script> -->

</body>

</html>