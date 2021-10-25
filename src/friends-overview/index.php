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
    <link rel="stylesheet" href="../global-styles.css">
    <!-- <link rel="stylesheet" href="../headerStyles.css"> -->
    <title>Document</title>
    <style>
        body {
            background: #efefef;
            transition: background 0.3s;
        }
        .profile-details {
            background:#fff;
            padding: 20px;
            border-radius: 4px;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin: 10px 100px;
        }

        .pd-row {
            display: flex;
            align-items: flex-start;
        }

        .pd-image {
            height: 100px;
            margin-right: 20px;
            border-radius: 6px;
            width: 100px;

        }

        .pd-row div h3 {
            font-size: 25px;
            font-weight: 600;
        }

        .pd-row div p {
            font-size: 13px;
        }

        .pd-row div img {
            width: 25px;
            border-radius: 50%;
            margin-top: 12px;
        }

        .pd-right button {
            background: #1876f2;
            border: 0;
            outline: 0;
            padding: 6px 10px;
            display: inline-flex;
            align-items: center;
            color: #fff;
            border-radius: 3px;
            margin-left: 10px;
            cursor: pointer;
        }

        .pd-right button img {
            height: 15px;
            margin-right: 10px;
        }

        .pd-right button:first-child {
            background: #e4e6eb;
            color: #000;
        }

        .pd-right {
            text-align: right;
        }

        .pd-right a {
            background: #e4e6eb;
            border-radius: 3px;
            padding: 13px;
            display: inline-flex;
            margin-top: 30px;
        }

        .pd-right a img {
            width: 20px;
        }
    </style>
     <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src="script.js" async defer></script>
</head>

<body>
    <nav>
        <div class="nav-left">
            <!--nav left starts-->
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
            <!--Nav right starts-->
            <div class="search-box">
                <i class="fas fa-search fa-2x" style="padding: 0 5px 0 0;"></i>
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
                    <div class="user-profile" style="display:flex; align-items:center; ">
                        <!--User profile starts-->
                        <img style="width: 45px; height: 45px; border-radius: 50%; margin-right: 10px;" src="../backend/images/<?php echo $row['image']; ?>" class="avtar">
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

    <div >
    <?php 
    // include_once("../header/index.php");

        $sql = mysqli_query($conn, "SELECT f.friend_id, u.unique_id, u.lname, u.fname, u.email, u.image, u.status FROM friends AS f JOIN users AS u ON f.friend_id = u.unique_id WHERE f.user_id = {$_SESSION['unique_id']}");
        if(mysqli_num_rows($sql) > 0){

        while($row = mysqli_fetch_assoc($sql)){
        ?>


        <div class="profile-details" >
            <!--profile-details starts-->

            <div class="pd-left">
                <!--pd left starts-->

                <div class="pd-row">
                    <!--pd row starts-->
                    <!-- HIGHLIGHT -->
                
                        <img src="../backend/images/<?php echo $row['image'];?>" class="pd-image">
                        <div>
                        
                            <h3><?php echo $row['fname'].' '. $row['lname']; ?></h3>
                            
                            <!--User name should br taken from database-->
                            <p>120 friends - 20 mutual</p>
                            <!--No. of friends should be static and should change according to data in the database-->
                            <img src="Images/member-1.png">
                            <img src="Images/member-2.png">
                            <img src="Images/member-3.png">
                            <img src="Images/member-4.png">
                        </div>


                </div>
                <!--pd row ends-->

            </div>
            <!--pd-left ends-->


            <div class="pd-right profile-page__frnd-actions">

            

                <a href="../chat/chat.php?user_id=<?php echo $row['friend_id']; ?>"
                    style="background: #1876f2;border: 0; outline: 0; padding: 6px 10px; display: inline-flex; align-items: center; color: #fff; border-radius: 3px; margin-left: 10px; cursor: pointer; text-decoration:none; "><img
                        src="Images/message.png" style="height: 15px; margin: 0 5px 0; padding: 0;"> Message</a>

                <!--button for adding friends-->
                <br>
                <a href="#"><img src="Images/more.png"></a>

            </div>
            <!--pd-right ends-->

        </div>
        
    <?php }
        }
    ?>
    </div>
    <!-- <script src="script.js" ></script> -->
    <!-- <script src = "header.js"></script> -->
</body>

</html>