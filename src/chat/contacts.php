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
    <title>Contacts</title>
    <link rel="stylesheet" href="styles-chat.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>
<style>
    .friend:hover {
        background: rgba(255, 255, 255, 0.226);
    }

    .box {
        justify-content: "center";
    }
    .left__top a{
        text-decoration: none;
        color: #000;
    }
</style>

<body>

    <div class="top"></div>
    <!-- header -->
    <div class="header">
        <!-- <h3>kasdf</h3> -->
        <a href="../media/new-post.php">NEW POST</a>
        <a href="../profile/index.php">PROFILE</a>
        <a href="../main-page/main-page.php">HOME</a>

    </div>



    <div class="box" style="width: 400px;">

        <!-- LEFT CONTAINER -->
        <div class="left" id="chat-page__contact-list" style="width: 100%; border-bottom: 1px solid #eaeaea;">

            <!-- Header -->
            <div class="left__top" style="width: 100%; ">
                <!-- <h2>MESSAGE</h2> -->
                <a href="../profile/index.php" style="width:100%;">
                    <?php 
                    include_once("../backend/config.php");
                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                    if(mysqli_num_rows($sql)>0){
                        $row = mysqli_fetch_assoc($sql);
                    ?> 
                        <div class="friend" style="width: 100%; margin:auto;">
                            <div class="img__name">
                                <img src="../backend/images/<?php echo $row['image']; ?>" class="avtar">
                                <!-- <img src="https://hi-static.z-dn.net/files/dc7/055c58c94e76a79c44fffbb9982ae325.jpg"
                                    class="avtar"> -->
                                <div>
                                    <h3 style="font-weight: 500;">
                                        <?php echo $row['fname']." ". $row['lname']; ?>
                                    </h3>
                                    <p><span class="status__active">
                                            <?php echo $row['status']; ?>
                                        </span></p>
                                </div>

                            </div>

                        </div>
                    <?php        
                        }
                    ?> 
                </a>
                

            </div>
            <div class="search__container" style="width: 100%;">
                <input class="search__input" type="text" placeholder="Search" style="width: 90%;">
                <div class="lens" style="background-color: white;">
                    <i class="fas fa-search"></i>
                </div>
            </div>


            <!-- Main Contacts -->
            <ul class="chat__contact-list">


                <!-- <li>
                    <div class="friend">
                        <div class="img__name">
                            <img src="https://hi-static.z-dn.net/files/dc7/055c58c94e76a79c44fffbb9982ae325.jpg"
                                class="avtar">
                            <div>
                                <h3 style="font-weight: 500;">Varendra Maurya</h3>
                                <p>What's up!!</p>
                            </div>

                        </div>
                        <div class="time">
                            <p>Today</p>
                        </div>
                    </div>
                </li> -->

            </ul>


        </div>

        <script src="contacts.js" async defer></script>
</body>

</html>