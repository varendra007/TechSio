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
        .cover-img_container{
            /* width:100px; */
            /* background-color:red; */
            height: 300px;
            overflow: hidden;
            border-radius: 6px;
            margin-bottom: 14px;
            display:block;
        }

    </style>
</head>

<body>
 
      
        <?php include_once("../components/header/index.php"); ?>
    <!--Profile Page-->
    <!-- HIGHLIGHT -->
    <div class="profile-container">
        <!--Profile container starts-->

                    <div class="cover-img__container"></div>

        <!-- <img src="../icons/cover.png" alt="cover photo" class="cover-img"> -->
        <?php 
        $sql0 = mysqli_query($conn, "SELECT cover_image FROM user_info WHERE user_id = '{$user_id}'");
        if(mysqli_num_rows($sql) > 0){
            while($row = mysqli_fetch_assoc($sql0)){?>
                <?php if($row['cover_image']){ ?>
                    <div class="cover-img__container">
                        <img src="../backend/images/cover/<?php echo $row['cover_image']; ?>" alt="cover photo" class="cover-img">
                    </div>

                    <?php
                } 
               ?>
                <!-- <img src="../backend/images/cover/163558253158343108lambo0.jpg" alt=""> -->
                <?php
            }
        }
        ?>

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
                <div class="frnd-actions">

                    <?php //!1111111111111111111111111111111
                     if($isFriend == 0){?>

                        <form  method="post" class="profile-page__add-friend-form" enctype="multipart/form-data">
                            <input type="text" name = "user_id" value = "<?php echo $_SESSION['unique_id'];?>" hidden >
                            <input type="text" name = "friend_id" value = "<?php echo $user_id; ?>" hidden >
                            <button type="submit" class="add-friend-btn" style = "background-color:#e4e6eb;"> <img src="../icons/add-friends.png">Friend</button>
                        </form>

                    <?php }else{ ?>
                        <form  method="post" class="profile-page__remove-friend-form" enctype="multipart/form-data">
                            <input type="text" name = "user_id" value = "<?php echo $_SESSION['unique_id'];?>" hidden >
                            <input type="text" name = "friend_id" value = "<?php echo $user_id; ?>" hidden >
                            <button style = "" type="submit" class="remove-friend-btn" style = "background-color:#e4e6eb;"> <i style="color:black;padding-right:5px;" class="fas fa-user-minus"></i> Remove Frined</button>
                        </form>
                        <?php
                    } ?>
                </div>
                

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
                        <?php
                            $sql = mysqli_query($conn, "SELECT p.user_id, p.image AS post_image, p.likes, p.comment, p.date, u.image AS user_image, u.fname, u.lname FROM posts AS p JOIN users AS u WHERE u.unique_id = p.user_id AND p.user_id = {$user_id}");

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
                         $sql = mysqli_query($conn, "SELECT p.user_id, p.image AS post_image, p.likes, p.comment, p.date,p.post_id, u.image AS user_image, u.fname, u.lname FROM posts AS p JOIN users AS u WHERE u.unique_id = p.user_id AND  p.user_id = {$user_id};");
    
                        // $output = "";

                        if(mysqli_num_rows($sql) == 0){
                            ?> <p style="text-align:center; width:100%;">No posts are available</p><?php
                        }elseif(mysqli_num_rows($sql) > 0){
                        while( $row = mysqli_fetch_assoc($sql)){


                    ?>


                        <div class="post-container">
                            <div class="post-row">

                                <div class="user-profile">
                                    <img src="../backend/images/<?php echo $row['user_image']; ?>">
                                    <div>
                                        <p><?php echo $row['fname'].' ' .$row['lname']; ?></p><br>
                                        <span><?php $row['date'] ?></span>
                                    </div>
                                </div>
                                <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                            </div>

                            <p class="post-text"><?php echo $row['comment']; ?></p>
                            <img  src="../backend/images/post/<?php echo $row['post_image'];?>"  class="post-img">


                            <div class="post-row">
                                <div class="activity-icons">
                                    <div style = "justify-content:center" >
                                        <div class = "likes-btn-handler<?php echo $row['post_id']; ?>">
                                            <?php
                                            // ! finding id of post since image name is unique
                                            //  $like = explode('.',$row['post_image'])[0];
                                            //  $ext =  explode('.',$row['post_image'])[1];
                                            $post_id  = $row['post_id'];
                                            
                                            $sql_likes = mysqli_query($conn, "SELECT * FROM post_manager WHERE post_id = {$post_id} AND user_id = {$_SESSION['unique_id']}");
                                            if(mysqli_num_rows($sql_likes) > 0){ ?>
                                                <i onclick = "unlike_update('<?php echo $row['post_id'];?>')" class="fas fa-heart" style = "color: red;"></i>
                                                <!-- <i onclick = "like_update('<?php echo $row['post_id'];?>')" class="far fa-heart" style = "color:#000; margin-right:10px;"></i> -->
                                            <?php  }else{ ?>
                                            <!-- <img onclick = "like_update('<?php echo $row['post_id'];?>')" src="Images/like-blue.png" class= "like_btn"> -->
                                            <i onclick = "like_update('<?php echo $row['post_id'];?>')" class="far fa-heart" style = "color:#000; "></i>

                                            <?php    }
                                            ?>
                                        </div>
                                        

                                        <span id  = "like_id<?php echo $row['post_id']; ?>"  >

                                            <?php echo $row['likes']; ?>
                                        </span> 
                                    
                                    </div>
                                
                                    <div><img src="Images/comments.png">40</div>
                                    <div><img src="Images/share.png">10</div>
                                </div>

                                <div class="post-profile-icon">
                                    <img src="../backend/images/<?php echo $row['user_image']; ?>"><i class="fas fa-caret-down"></i>
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
  <script>
        function like_update(id){
            // const elId = id.split()[0];
            const likeEl = document.querySelector(`#like_id${id}`);
            const likesBtn = document.querySelector(`.likes-btn-handler${id}`);

            let cur_count = +(likeEl.textContent);
            cur_count++;
            likeEl.textContent = cur_count;
            // console.log(cur_count);
            let xhr = new XMLHttpRequest();
            xhr.open('POST', '../backend/likes-counter/likes.php', true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        console.log(data);
                        // searchList.innerHTML = data;
                    }
                }
            };
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('id=' + (+id));
                // console.log('hi');
            // console.log(id + '.' + ext);
           likesBtn.innerHTML  = `<i onclick = "unlike_update('${id}')" class="fas fa-heart" style = "color: red; "></i>`;

            
        }
         function unlike_update (id){
            const likeEl = document.querySelector(`#like_id${id}`);
            const likesBtn = document.querySelector(`.likes-btn-handler${id}`);

            let cur_count = +(likeEl.textContent);
            cur_count--;
            likeEl.textContent = cur_count;
            // console.log(cur_count);
            let xhr = new XMLHttpRequest();
            xhr.open('POST', '../backend/likes-counter/unlike.php', true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        console.log(data);
                        // searchList.innerHTML = data;
                    }
                }
            };
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('id=' + (+id));
                // console.log('hi');
            // console.log(id + '.' + ext);
            likesBtn.innerHTML = `<i onclick = "like_update('${id}')" class="far fa-heart" style = "color:#000; "></i>`;
        }
     
    </script>
    <script src="profile-page.js"></script>
    <script src = "add-friend.js"></script>
    <script src = "../components/header/header.js"></script>
    <script src = "../components/header/s.js"></script>
    <script src= "remove-friend.js"></script>
    <!-- <script src="p.js"></script> -->
    <!-- <script src = "getUserPosts.js"></script> -->

</body>

</html>