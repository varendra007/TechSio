<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }

?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="Main_Page.css">
    <script src="https://kit.fontawesome.com/cc5f467dfb.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="../src/global-styles.css"> -->
    <style>
       .online-list .online img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 15px;
        }
                
        .search__container {
            width: 280px;
            height: 50px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            /* border-bottom: 1px solid #eaeaea; */
            margin-bottom: 10px;
        }

        .lens {
            background: greenyellow;
            padding: 50x;
            border-radius: 50px;
        }

        .search__icon {
            width: 23px;
            height: 23px;
        }

        .search__input {
            border: none;
            outline: none;
            background: #eaeaea;
            padding: 10px 15px;
            border-radius: 5px;
            width: 220px;
        }

    </style>
</head>

<body>
    <div style="height: 100vh; width: 100vw; overflow: hidden;">


        <nav style="position: fixed;width: 100%; height: 25%;">
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

                    <a href="#">
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
                    </a>
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
        <div class="container" style="height: 75%; overflow: hidden; bottom: 0; position: fixed;">
            <!--Container Starts -->

            <div class="left-sidebar" style="overflow-x: auto; height: 100%;">
                <!-- <div style="height: 200px; width: 100%; color: red;"></div> -->

                <!--Left-sidebar Starts-->
                <div class="imp-links">
                    <a href="https://indianexpress.com/section/trending/"><img src="Images/news.png"
                            alt="Trending News">Latest News</a>
                    <a href="#"><img src="Images/friends.png" alt="Friends">Friends</a>
                    <a href="#"><img src="Images/group.png" alt="Group">Group</a>
                    <a href="#"><img src="Images/marketplace.png" alt="Market Place">Market Place</a>
                    <a href="#"><img src="Images/watch.png" alt="Watch">Watch</a>
                    <a href="#">More</a>
                </div>

                <div class="shortcut-links">
                    <p>Shortcuts</p>
                    <!-- <a href="#"><img src="Images/shortcut-1.png">Stories</a> -->
                    <a href="#"><img src="Images/shortcut-2.png">Posts</a>
                    <a href="#"><img src="Images/shortcut-3.png">Contact Details</a>
                    <a href="#"><img src="Images/shortcut-4.png">History management</a>
                </div>


            </div>
            <!--Left-sidebar Ends-->


            <div class="main-content" style="overflow-x:auto; height: 100%;">
                <!--Main content starts-->
                <!-- <div style="height: 200px; width: 100%; color: red;"></div> -->

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
                        <textarea rows="3" placeholder="Share Your Thoughts"></textarea>
                        <div class="add-post-links">
                            <!--add post links starts-->
                            <a href="#"><img src="Images/live-video.png">Live Video</a>
                            <a href="#"><img src="Images/photo.png">Photo/Video</a>
                            <a href="#"><img src="Images/feeling.png">Emojis</a>
                        </div>
                        <!--add post links ends-->

                    </div>
                    <!--Post input container ends-->
                <?php        
                }
                ?> 
                </div>
                <!--Write post container end-->

                <div class="post-container">
                    <!--post container starts-->
                    <div class="post-row">
                        <!--post row starts-->

                        <div class="user-profile">
                            <!--User profile starts-->
                            <img src="Images/profile-pic.png">
                            <div>
                                <p> User </p><br>
                                <span>6 th October 2021</span>
                            </div>
                        </div>
                        <!--User profile ends-->
                        <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                    </div>
                    <!--post row ends-->

                    <p class="post-text">My post <span>Work-life</span>
                        <a href="#"> Microsoft <i class="fas fa-caret-down"> </i></a>
                    </p>
                    <img src="Images/feed-image-1.png" class="post-img">


                    <div class="post-row">
                        <!--Post row starts-->
                        <div class="activity-icons">
                            <!--Activity icon Starts-->
                            <div><img src="Images/like-blue.png">120</div>
                            <div><img src="Images/comments.png">40</div>
                            <div><img src="Images/share.png">10</div>
                        </div>
                        <!--Activity icons ends-->

                        <div class="post-profile-icon">
                            <!--post profile icon starts-->
                            <img src="Images/profile-pic.png"><i class="fas fa-caret-down"></i>
                        </div>
                        <!--Post profile icon ends-->
                    </div>
                    <!--Post row ends-->
                </div>
                <!--post container ends-->

                <div class="post-container">
                    <!--Post container starts-->
                    <div class="post-row">
                        <!--post row starts-->

                        <div class="user-profile">
                            <!--User profile starts-->
                            <img src="Images/profile-pic.png">
                            <div>
                                <p> User </p><br>
                                <span>2 nd October 2021</span>
                            </div>
                        </div>
                        <!--User profile ends-->
                        <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                    </div>
                    <!--post row ends-->

                    <p class="post-text">Vacation memory</b></p>
                    <img src="Images/feed-image-2.png" class="post-img">
                    <div class="post-row">
                        <!--Post row starts-->
                        <div class="activity-icons">
                            <!--Activity icon Starts-->
                            <div><img src="Images/like.png">1k</div>
                            <div><img src="Images/comments.png">350</div>
                            <div><img src="Images/share.png">100</div>
                        </div>
                        <!--Activity icons ends-->
                        <div class="post-profile-icon">
                            <!--post profile icon starts-->
                            <img src="Images/profile-pic.png"><i class="fas fa-caret-down"></i>
                        </div>
                        <!--Post profile icon ends-->
                    </div>
                    <!--Post row ends-->
                </div> <!-- post container ends-->

                <div class="post-container">
                    <!--Post container starts-->
                    <div class="post-row">
                        <!--post row starts-->

                        <div class="user-profile">
                            <!--User profile starts-->
                            <img src="Images/profile-pic.png">
                            <div>
                                <p> User </p><br>
                                <span>3rd October 2021</span>
                            </div>
                        </div>
                        <!--User profile ends-->
                        <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                    </div>
                    <!--post row ends-->

                    <p class="post-text">Work from home</b></p>
                    <img src="Images/feed-image-3.png" class="post-img">
                    <div class="post-row">
                        <!--Post row starts-->
                        <div class="activity-icons">
                            <!--Activity icon Starts-->
                            <div><img src="Images/like.png">2k</div>
                            <div><img src="Images/comments.png">255</div>
                            <div><img src="Images/share.png">65</div>
                        </div>
                        <!--Activity icons ends-->
                        <div class="post-profile-icon">
                            <!--post profile icon starts-->
                            <img src="Images/profile-pic.png"><i class="fas fa-caret-down"></i>
                        </div>
                        <!--Post profile icon ends-->
                    </div>
                    <!--Post row ends-->
                </div> <!-- post container ends-->

                <div class="post-container">
                    <!--Post container starts-->
                    <div class="post-row">
                        <!--post row starts-->

                        <div class="user-profile">
                            <!--User profile starts-->
                            <img src="Images/profile-pic.png">
                            <div>
                                <p> User </p><br>
                                <span>4th October 2021</span>
                            </div>
                        </div>
                        <!--User profile ends-->
                        <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                    </div>
                    <!--post row ends-->

                    <p class="post-text">Vacation memory</b></p>
                    <img src="Images/feed-image-4.png" class="post-img">
                    <div class="post-row">
                        <!--Post row starts-->
                        <div class="activity-icons">
                            <!--Activity icon Starts-->
                            <div><img src="Images/like.png">122</div>
                            <div><img src="Images/comments.png">4</div>
                            <div><img src="Images/share.png">15</div>
                        </div>
                        <!--Activity icons ends-->
                        <div class="post-profile-icon">
                            <!--post profile icon starts-->
                            <img src="Images/profile-pic.png"><i class="fas fa-caret-down"></i>
                        </div>
                        <!--Post profile icon ends-->
                    </div>
                    <!--Post row ends-->
                </div> <!-- post container ends-->

                <div class="post-container">
                    <!--Post container starts-->
                    <div class="post-row">
                        <!--post row starts-->

                        <div class="user-profile">
                            <!--User profile starts-->
                            <img src="Images/profile-pic.png">
                            <div>
                                <p> User </p><br>
                                <span>29th September 2021</span>
                            </div>
                        </div>
                        <!--User profile ends-->
                        <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                    </div>
                    <!--post row ends-->

                    <p class="post-text">Vacation memory</b></p>
                    <img src="Images/feed-image-5.png" class="post-img">
                    <div class="post-row">
                        <!--Post row starts-->
                        <div class="activity-icons">
                            <!--Activity icon Starts-->
                            <div><img src="Images/like.png">4k</div>
                            <div><img src="Images/comments.png">300</div>
                            <div><img src="Images/share.png">432</div>
                        </div>
                        <!--Activity icons ends-->
                        <div class="post-profile-icon">
                            <!--post profile icon starts-->
                            <img src="Images/profile-pic.png"><i class="fas fa-caret-down"></i>
                        </div>
                        <!--Post profile icon ends-->
                    </div>
                    <!--Post row ends-->
                </div> <!-- post container ends-->

                <button type="button" class="load-more-btn">Load More</button>

            </div>
            <!--Main content ends-->


            <div class="right-sidebar" style="height: 100%; overflow-x: auto;">
                <!--Right side bar starts-->
                <!-- <div style="height: 200px; width: 100%; color: red;"></div> -->
                <div class="search__container" style="width: 100%;">
                    <input class="search__input" type="text" placeholder="Search" style="width: 90%;">
                    <div class="lens" style="background-color: white;">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <div class="main-page__contacts"></div>
               
                

                <!-- <div class="online-list">
                    
                    <div class="online">
                        <img src="images/member-3.png">
                    </div>
                    <p>Friend-3</p>
                </div> -->
                <!--Friend 3 Ends-->

            </div>
            <!--Right side bar ends-->

        </div>
        <!--Container Ends-->

        <div class="footer">
            <!--footer starts-->
            <p> Copyright 2021 - TechSio Social Media Site </p>
        </div>
        <!--footer ends-->
    </div>
    <script src="Main_Page.js"></script>
    <!-- <script src="./contacts.js"></script>-->
    <script src = "friends.js"></script>

</body>

</html>