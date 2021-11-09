
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
    <title>Message</title>
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
        background-color: var(--bg-color);
        color: var(--txt-color);
        /* box-shadow: rgba(50, 50, 93, 0.25) 0px 3px 6px -1px,
            rgba(0, 0, 0, 0.3) 0px 0px 3px -10px; */

        border: 0;
    }
   
    .middle,.footer {
        /* background-color: rgba(146, 230, 202, 0.178); */
        background:var(--bg-color);
        color: var(--txt-color);
    }
     .top {
        /* background: #87CEEB; */
        /* background-image: linear-gradient(to bottom right, #87ceeb, #20b1eb); */
        background-image: linear-gradient(to bottom right, #f27ef2, #7d2fcc);
    }
    
.right{
    flex: 1;
    background: var(--bg-color);
    color: var(--txt-color);
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
    background: var(--bg-color);
    color: var(--txt-color);
}
.box{
    width:100%;
    background: var(--bg-color);
    color: var(--txt-color);
    /* display: inline; */
    /* display: block; */
    justify-content: flex-start;
    /* top:0; */

}
/* .middle{
    background: var(--bg-color);
} */
.msg__form,.footer,.middle,.msg__input{
    background: var(--bg-color);
    color: var(--txt-color);
}
.right__top{
    color: var(--txt-color);
}
body{
    display: block;
    background: var(--bg-color);
    color: var(--txt-color);
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
                    <div class="right__top" style = "color: var(--txt-color);"> 
                    

                        <?php 
                            include_once("../backend/config.php");
                            $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '$user_id'");
                            if(mysqli_num_rows($sql)>0){
                                $row = mysqli_fetch_assoc($sql);
                            ?>

                            <img src="../backend/images/<?php echo $row['image']; ?>" class="avtar">
                            <div>
                                <h3 style = "color: var(--txt-color);"><?php echo $row['fname']." ". $row['lname']; ?></h3>
                                <p style="margin-left: 10px;"><span style="color: greenyellow;"><?php echo $row['status']; ?></span></p>
                            </div>
                                    <!-- <img src="../icons/TechSio.png" alt=""> -->

                        <?php        
                            }
                        ?>
                    </div> 

                    <div class="middle chat-area" style ="color: var(--txt-color);"> </div>
                    
                    



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

