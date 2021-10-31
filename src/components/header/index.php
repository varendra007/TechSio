<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="header.css">
</head>
<body> -->
    <!-- <div class="background-image"></div> -->
     <nav>
        <div class="nav-left">
            <!--nav left starts-->
            <img src="../icons/TechSio.png" height="150px" width="200px" class="logo" alt="Company Logo">
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
            <!-- <div class="nav-right">
                <div class="search-box">
                    <i class="fas fa-search fa-2x" style="padding: 0 5px 0 0;"></i>
                    <input type="text" placeholder="Search">
                </div>
                <div class="nav-user-icon online" onclick="settingsMenuToggle()">
                    <img src="../backend/images/<?php /* echo $row['image']; */ ?>"  height = "70px" class="avtar">
                </div>
            </div> -->
          <div style = "width:65%;">
                <div class="nav-right" style = "width:100%;">
                    <!--Nav right starts-->
                    <div class="search-box" style = "width:100%; margin-right:10%;">
                        <!-- <img src="Images/search.png" alt="Search Bar"> -->
                        <i class="fas fa-search fa-2x" style="padding: 0 5px 0 0;"></i>
                        <input type="text" placeholder="Search" id = "user_search">
                    </div>
                    <div class="nav-user-icon online" onclick="settingsMenuToggle()">
                        <!-- <img src="Images/profile-pic.png" height="70px"> -->
                        <img src="../backend/images/<?php echo $row['image']; ?>"  height = "70px" class="avtar">
                    </div>
                </div>
            
                <div id = "search__list" class = "search_list" style = ""></div>
                
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

                <a href="../profile/profile-page.php" style = "text-decoration:none;color:#000;">
                    <div class="user-profile" style="display:flex; align-items:center; ">
                        <!--User profile starts-->
                        <img style="width: 45px; height: 45px; border-radius: 50%; margin-right: 10px;" src="../backend/images/<?php echo $row['image']; ?>" class="avtar">
                        <div>
                            <p> <?php echo $row['fname']." ". $row['lname']; ?></p>
                            <p><span class="status__active" style = "color:rgb(30,216,46);">
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
                    <img src="../icons/feedback.png">
                    
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
                    <a href="../edit-profile/index.php">Edit Profile<img src="../icons/arrow.png" width="10px"></a>
                </div>
                <!--Setting links ends-->

                <div class="settings-links">
                    <!--help starts-->
                    <img src="../icons/help.png" class="settings-icon">
                    <a href="#">Help <img src="../icons/arrow.png" width="10px"></a>
                </div>
                <!--help ends-->

                <div class="settings-links">
                    <!--Display starts-->
                    <img src="../icons/display.png" class="settings-icon">
                    <a href="#">Display & Accessibilty <img src="../icons/arrow.png" width="10px"></a>
                </div>
                <!--Display ends-->

                <div class="settings-links">
                    <!--Logout starts-->
                    <img src="../icons/logout.png" class="settings-icon">
                    <a href="../backend/authentication/logout.php">Logout<img src="../icons/arrow.png" width="10px"></a>
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
    <!-- <script src= "header.js"></script>
</body>
</html> -->