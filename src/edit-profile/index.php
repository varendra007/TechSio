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
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global-styles.css">
    <link rel="stylesheet" href="../components/header/header.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <style>
      body{
        background: var(--bg-color);
        color: var(--txt-color);
      }
    
        
      .edit {
        /* width: 280px; */
        height: 600px;
        border-color: var(--c);
        border-right: 1px solid var(--c);
        flex: 0.3;
      }
    
      .form form .name-details {
          display: flex;
          justify-content: space-between;
      }

      .form form .name-details .field:first-child {
          margin-right: 10px;
          flex:1;
      }

      .form form .name-details .field:last-child {
          margin-left: 10px;
          flex:1;
      }

      .form form .input input {
          height: 40px;
          width: 100%;
          font-size: 15px;
          border: 1px solid #ccc;
          border-radius: 5px;
          padding: 0 10px;
          background: var(--dark-box);
          color: var(--txt-color);
      }

      .form {
          padding: 25px 30px;
      }

      .form header {
          font-size: 25px;
          font-weight: 600;
          padding-bottom: 10px;
          border-bottom: 1px solid#e6e6e6;
      }

      .form form {
          margin: 20px 0;
      }

      .form form .error-text {
          color: #721c24;
          background: #f8d7da;
          padding: 4px 10px;
          text-align: center;
          border-radius: 5px;
          margin-bottom: 10px;
          border: 1px solid;
          display: none;
      }

      .form form .field {
          display: flex;
          flex-direction: column;
          position: relative;
          margin-bottom: 10px;
      }

      .password i {
          position: absolute;
          right: 15px;
          top: 70%;
          transform: translateY(-50%);
          cursor: pointer;
      }

      .edit-profile__root {
          display: flex;
          flex:1
          /* background: var(--bg-color); */
      }
      .edit-screen{
        display: flex;
        justify-content: center;
      }
      .edit-profile{
        width: 70%;
        
      }
      .form form .error-text {
        color: #721c24;
        background: #f8d7da;
        padding: 4px 10px;
        text-align: center;
        border-radius: 5px;
        margin-bottom: 10px;
        border: 1px solid;
        display: none;
        /* display: flex; */
        justify-content: center;
      }

    </style>
</head>

<body>

  <?php include_once("../components/header/index.php"); ?>
  <div class="edit-screen">

    <div class="edit-shortcut"  style = "flex:0.29; ">
      <?php include_once("../components/shortcuts/index.php"); ?>
    </div>

    <div class="edit-profile__root">
        <section class="form edit-profile">
            <header class="gradient-text" style="text-align: center;">
                TechSio
            </header>
            <?php
              $unique_id = $_SESSION['unique_id'];
              $sql = mysqli_query($conn, "SELECT u.fname, u.lname, u.email, i.address, i.education, i.status, i.hobbies FROM users AS u JOIN user_info AS i WHERE u.unique_id = i.user_id  AND u.unique_id = '{$unique_id}'"); 
              if(mysqli_num_rows($sql) > 0){
                while($row = mysqli_fetch_assoc($sql)){?>
                  <form action="#" class="edit-profile_form" enctype="multipart/form-data">
                  <div class="error-text edit__error-text">This is an error message!</div>
                  <div class="name-details">

                      <div class="field input">
                        <label for="">First Name<font style="color: red;">*</font></label>
                        <input type="text" name="fname" placeholder="First Name" value = "<?php echo $row['fname']; ?>" require>
                      </div>
                      <div class="field input">
                        <label for="">Last Name<font style="color: red;">*</font></label>
                        <input type="text" name="lname" placeholder="Last Name" value = "<?php echo $row['lname']; ?>" reqired>
                      </div>
                  </div>

                  <div class="field input">
                      <label for="">Email<font style="color: red;">*</font><label>
                      <input type="text" name="email" placeholder="Email"  value = "<?php echo $row['email']; ?>"  required>
                  </div>
                  <div class="field input">
                      <label for="">About Me<label>
                      <input type="text" name="about-me" placeholder="Write some text about yourself" value = "<?php echo $row['status']; ?>" >
                  </div>
                  <div class="field input">
                      <label for="">Address<label>
                      <input type="text" name="address" placeholder="Address" value = "<?php echo $row['address']; ?>" >
                  </div>
                  <div class="field input">
                    <label for="">Education<label>
                    <input type="text" name="education" placeholder="Education"  value = "<?php echo $row['education']; ?>">
                  </div>
                  <div class="field input">
                    <label for="">Hobbies<label>
                    <input type="text" name="hobbies" placeholder="Enter your hobbies"  value = "<?php echo $row['hobbies']; ?>">
                  </div>
                
                  <div class="field">
                      <input type="submit" value="Update Details" class="edit__btn__submit button">
                  </div>
                </form>

                  <?php
                }
              } 
            ?>
            

        </section>
    </div>
   
      <section class="edit-right form" style = "display:flex; flex-direction:column; margin: 0 100px 0 -100px; max-width: 400px;">

      <form action="#" class= "change-password ">
         <div class="error-text pass__error-text">This is an error message!</div>

      <div class="field input password">
        <label for="">Enter Old Password<font style="color: red;">*</font></label>
        <input type="text" name="old-password" placeholder="Enter Old Password" required>
        <i class="fa fa-eye"></i>
      </div>
      
      <div class="field input password">
        <label for="">Enter New Password<font style="color: red;">*</font></label>
        <input type="text" name="new-password" placeholder="Enter New Password" required>
        <i class="fa fa-eye"></i>
      </div>

      <div class="field">
          <input type="submit" value="Change Password" class="change-password-btn button">
      </div>
      </form>


      <form action="#" class = "change-dp ">
         <div class="error-text dp__error-text">This is an error message!</div>

      <div class="field">
        <label for="">Change Profile Pic<font style="color: red;">*</font></label>
        <input type="file" name="profile-image" class="select-image" required>
      </div>

       <div class="field">
          <input type="submit" value="Change Profile Picture" class="change-dp-btn button">
      </div>
      </form>


      <form action="#" class="change-cover-image ">
         <div class="error-text cover__error-text">This is an error message!</div>

      <div class="field">
        <label for="">Select Cover Image<font style="color: red;"></font></label>
        <input type="file" name="cover-image" class="select-image" required>
      </div> 

       <div class="field">
          <input type="submit" value="Change Cover Image" class="change-cover-btn button">
      </div>
      </form>

  </section>
  <div>
   
    </div>
  </div>


  <!-- <script src="script.js" async defer></script> -->
  <script src="../components/header/header.js"></script>
  <script src="../components/header/s.js"></script>
  <script src="script.js"></script>
</body>


</html>