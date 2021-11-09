<?php include_once("./backend/db.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSio Signup</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./global-styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <style>
       
    </style>
</head>

<body>
    <div class="background-image"></div>
    <!-- header -->
    <div class="header">
        <!-- <h3>kasdf</h3> -->
        <a href="index.php">SIGNUP</a>
        <a href="./authentication/login.php">SIGNIN</a>
    </div>


    <!-- body -->

    <div class="wrapper">
        <section class="form signup">
            <header class = "gradient-text" style = "text-align: center;">
                TechSio
            </header>
            <form action="#" class="signup-form" enctype="multipart/form-data">
                <div class="error-text signup__error-text">This is an error message!</div>
                <div class="name-details">

                    <div class="field input">
                        <label for="">First Name<font style="color: red;">*</font></label>
                        <input type="text" name="fname" placeholder="First Name" require>
                    </div>
                    <div class="field input">
                        <label for="">Last Name<font style="color: red;">*</font></label>
                        <input type="text" name="lname" placeholder="Last Name" reqired>
                    </div>
                </div>

                <div class="field input">
                    <label for="">Email<font style="color: red;">*</font><label>
                    <input type="text" name="email" placeholder=" Email" required>
                </div>
                <div class="field input password">
                    <label for="">Password<font style="color: red;">*</font></label>
                    <input type="text" name="password" placeholder="Enter Password" required>
                    <!-- <i class="fa fa-eye"></i> -->
                </div>
                <div class="field">
                    <label for="">Select Image<font style="color: red;">*</font></label>
                    <input type="file" name="image" class="select-image" required>
                </div>
                <div class="field">
                    <input type="submit" value="Continue to Chat" class="signup__btn__submit">
                </div>

            </form>
            <div class="link">Already signed up? <a href="./authentication/login.php">Login now</a></div>
        </section>
    </div>
        <h2 class="gradient-text" style = "position:absolute; bottom: 10px; right:10px;">TECH PHANTOMS</h2>

    <script src="script.js" async defer></script>
</body>

</html>
