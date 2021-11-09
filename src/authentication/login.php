<?php include_once("../backend/db.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSio Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../global-styles.css">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<body>

    <div class="background-image"></div>
    <!-- header -->
    <div class="header">
        <!-- <h3>kasdf</h3> -->
        <a href="../index.php">SIGNUP</a>
        <a href="login.php">SIGNIN</a>
        <!-- <a href="../media/new-post.php"></a> -->

    </div>


    <div class="wrapper">
        <section class="form login">
            <header class = "gradient-text" style = "text-align: center;">
                TechSio
            </header>
            <form action="#" class="login__form">
                <div class="error-text login__error-text">This is an error message!</div>


                <div class="field input">
                    <label for="">Email<font style="color: red;">*</font></label>
                    <input type="email" id = "email" name="email" placeholder=" Email" required>
                </div>
                <div class="field input password">
                    <label for="">Password<font style="color: red;">*</font><label>
                    <input type="password" id="user_password" name="password" placeholder="Enter Password" required>
                    <i class="fa fa-eye"></i>
                </div>
                <div class="field">
                    <input type="submit" class="login__btn__submit" value="Continue to Chat">
                </div>


            </form>
            <div class="link">Don't have account? <a href="../index.php">Signup now</a></div>

        </section>

    </div>
    <h2 class="gradient-text" style = "position:absolute; bottom: 10px; right:10px;">TECH PHANTOMS</h2>
    <script src="login.js" async defer></script>
</body>

</html>