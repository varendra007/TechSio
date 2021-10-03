
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
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>
<style>

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
</style>

<body>

    <div class="top"></div>



    <div class="box">

      
        <!--  RIGHT CONTAINER-->
        <div class="right">
            <!-- header HIGHLIGHT-->
            <div class="right__top">
                <!-- <img src="https://hi-static.z-dn.net/files/dc7/055c58c94e76a79c44fffbb9982ae325.jpg" class="avtar">
                <div>
                    <h3>Varendra Maurya</h3>
                    <p style="margin-left: 10px;"><span style="color: greenyellow;">Typing...</span></p>
                </div> -->

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

            <!-- middle HIGHLIGHT -->
            <div class="middle chat-area">
                <!-- <div class="msg__my">
                    <p>Hello world!</p>
                </div>
                <div class="msg__my">
                    <p>Hello world!</p>
                </div>
                <div class="msg__frnd">
                    <p>Hello world!</p>
                </div>
                <div class="msg__my">
                    <p>Hello world!</p>
                </div>
                <div class="msg__frnd">
                    <p>Hello world!</p>
                </div>
                <div class="msg__my">
                    <p>Hello world!</p>
                </div>
                <div class="msg__frnd">
                    <p>Hello JarLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been
                        the industry'svis!</p>
                </div>
                <div class="msg__my">
                    <p>Hello worLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been
                        the industry'sld!</p>
                </div>
                <div class="msg__frnd">
                    <p>Hello Jarvis!Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been
                        the industry's</p>
                </div> -->


            </div>

            <!-- footer HIGHLIGHT -->
            <div class="footer">
                <form action = "#" class="msg__form">

                    <input type="text" name = "msg" class="msg__input">
                    <input type="text" name = "outgoing_id" value = "<?php echo $_SESSION['unique_id'];?>" hidden>
                    <input type="text" name = "incoming_id" value = "<?php echo $user_id; ?>" hidden>
                     <!-- <textarea name="" id="" class= "msg__input" cols="30" rows="10"></textarea> -->
                    <!-- <h3 class="send">Send</h3> -->
                    <i class = "fab fa-telegram-plane fa-3x send"></i>

                </form>
            </div>
        </div>
    </div>

    <script src = "chat.js" async defer></script>
</body>

</html>