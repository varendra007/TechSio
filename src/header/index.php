<?php 
    // session_start();
    // if(!isset($_SESSION['unique_id'])){
    //     header("location: login.php");
    // }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src="script.js" async defer></script>

</head>

<body>
    <nav>
        <div class="nav-left">
            <!--nav left starts-->
            <img src="Images/TechSio.png" height="150px" width="200px" class="logo" alt="Company Logo">
            <ul>
                <li style="color: #fff; margin: 0 15px;"><i class="fas fa-bell fa-2x" style="color: #ffff;"></i></li>
                <li style="margin: 0 15px;"><i class="fas fa-envelope fa-2x" style="color: #fff;"></i></li>
                <li style="margin: 0 15px;"><i class="fas fa-comment-alt fa-2x" style="color: #fff;"></i></li>
                <!-- <li><img src="Images/message.png" alt="Message"></li> -->
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

                    <a href="../profile/profile-page.php">
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

    </nav>
</body>

</html>