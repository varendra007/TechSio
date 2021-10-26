
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
    <title>Chat window</title>
    <link rel="stylesheet" href="styles-chat.css">
    <link rel="stylesheet" href="../components/header/header.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
        
    <style>
         .msg__my {
        border-radius: 200px;
        background: #2cf13c;
        color: #ffffff;
    }

    .msg__frnd {
        border-radius: 200px;
        background-color: #ffffff;
        /* box-shadow: rgba(50, 50, 93, 0.25) 0px 3px 6px -1px,
            rgba(0, 0, 0, 0.3) 0px 0px 3px -10px; */

        border: 0;
    }

    .middle,.footer {
        /* background-color: rgba(146, 230, 202, 0.178); */
        background:#ffff;
    }
     .top {
        /* background: #87CEEB; */
        background-image: linear-gradient(to bottom right, #87ceeb, #20b1eb);
    }
    
.right{
    flex: 1;
}
.send{
    display: flex;
    align-items: "center";
    justify-content: "center";
    flex: 0.05;
}
.send:hover{
    cursor: pointer;
}
/* .msg__input{
    min-height: 50px;
    z-index: 5;
} */
.msg__input{
    padding-left: 10px;
    padding-right: 10px;
}
.box{
    width:100%;
    /* display: inline; */
    /* display: block; */
    justify-content: flex-start;
    /* top:0; */

}
body{
    display: block;
}
    </style>
</head>

<body>
    <div style = "">
        <?php include_once("../components/header/index.php");?>


        <div style ="display:flex; flex-direction:row;">

            <div class = "left" style = "width:25%;">
                <?php include_once("../components/shortcuts/index.php"); ?>
            </div>
        
            <div class= "right">

                <div >
                    <div class="right__top"> 
                    

                        <?php 
                            include_once("../backend/config.php");
                            $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '$user_id'");
                            if(mysqli_num_rows($sql)>0){
                                $row = mysqli_fetch_assoc($sql);
                            ?>

                            <img src="../backend/images/<?php echo $row['image']; ?>" class="avtar">
                            <div>
                                <h3><?php echo $row['fname']." ". $row['lname']; ?></h3>
                                <p style="margin-left: 10px;"><span style="color: greenyellow;"><?php echo $row['status']; ?></span></p>
                            </div>


                        <?php        
                            }
                        ?>
                    </div> 

                    <div class="middle chat-area" style =""> </div>
                    
                    



                    <div class="footer">
                        <form action = "#" class="msg__form">

                            <input type="text" name = "msg" class="msg__input">
                            <input type="text" name = "outgoing_id" value = "<?php echo $_SESSION['unique_id'];?>" hidden>
                            <input type="text" name = "incoming_id" value = "<?php echo $user_id; ?>" hidden>
                            <i class = "fab fa-telegram-plane fa-3x send"></i>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src = "chat.js" async defer></script>
    <script src = "../components/header/header.js"></script>
    <script src = "../components/header/s.js"></script>
</body>
</html>

