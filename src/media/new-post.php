<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="media-style.css">
    <!-- <link rel="stylesheet" href=""> -->
    <style>

    </style>
</head>

<body>
    <div class="background-image"></div>
    <!-- header -->
    <div class="header">
       <div class="header">
        <!-- <h3>kasdf</h3> -->
        <a href="../chat/contacts.js">CONTACTS</a>
        <a href="../profile/index.php">PROFILE</a>

    </div>

    </div>

    <!-- main screen -->

    <div class="media__screen">
        <header>
            <h3 class="gradient-text">Add New Post</h3>
        </header>
        <div class="form" style="display: flex; width: 100%; justify-content: center;">

            <form action="#" class="new-post__form" enctype="multipart/form-data" style="width: 100%;">
            <div class="error-text post__error-text" >This is an error message!</div>
                <div class="field">
                    <label for="">Select Image<font style="color: red;">*</font></label>
                    <input type="file" name="image" class="select-image" required>
                </div>
                <div class="field input">
                    <label for="">Comment<font style="color: red;">*</font></label>
                    <textarea type="text" name="comment" placeholder="Add few words..." required></textarea>
                </div>

                <div class="field">
                    <input type="submit" value="Add new post" class="post__btn__submit">
                </div>
            </form>
        </div>
    </div>
    <script src="script.js" async defer></script>
</body>

</html>