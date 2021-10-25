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
            width: 100px;
            margin-right: 20px;
            border-radius: 6px;
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
</head>

<body>
    
      
    <?php 
    include_once("../header/index.php");

        $sql = mysqli_query($conn, "SELECT f.friend_id, u.unique_id, u.lname, u.fname, u.email, u.image, u.status FROM friends AS f JOIN users AS u ON f.friend_id = u.unique_id WHERE f.user_id = {$_SESSION['unique_id']}");
        if(mysqli_num_rows($sql) > 0){

        while($row = mysqli_fetch_assoc($sql)){
        ?>


        <div class="profile-details">
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

            

                <a href="../chat/chat.php?user_id=<?php echo $user_id; ?>"
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
    <!-- <script src="script.js" ></script> -->
    <!-- <script src = "header.js"></script> -->
</body>

</html>