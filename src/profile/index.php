
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
    <title>Document</title>
    <link rel="stylesheet" href="profile-style.css">
    <link rel="stylesheet" href="../style.css">
    <style>

    </style>
</head>

<body>
    <div class="background-image"></div>
    <!-- header -->
    <div class="header">
        <!-- <h3>kasdf</h3> -->
        <a href="../index.php">SIGNUP</a>
        <a href="login.php">SIGNIN</a>

    </div>

    <!-- main page -->

    <div class="profile__screen">
        <div class="profile__info">
            <?php 
                include_once("../backend/config.php");
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if(mysqli_num_rows($sql)>0){
                    $row = mysqli_fetch_assoc($sql);
            ?> 
                <img src="../backend/images/<?php echo $row['image']; ?>" alt="avtar"
                    class="profile-pic">
                <h3 class="username"><?php echo $row['fname']." ".$row['lname']; ?></h3>
                <p class="about-me">Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem
                    ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum</p>
                <!-- <a href="http://github.com/varendra007/"></a> -->
            <?php        
            }
            ?> 
        </div>
    </div>

</body>

</html>