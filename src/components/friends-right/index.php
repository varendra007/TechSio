<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="media-style.css">
  <link rel="stylesheet" href="header.css">
  <!-- <link rel="stylesheet" href=""> -->
  <style>
    body {
      display: block;
      /* overflow: hidden; */

    }


    .right-sidebar {
      flex-basis: 25%;
      position: sticky;
      top: 70px;
      align-self: flex-start;
      background: #ffff;
      padding: 20px;
      border-radius: 4px;
      color: #626262;
      overflow: auto;
      min-height: 100vh;
    }

    .online-list .online img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 15px;
    }

    .online-list {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .online-list .online {
      width: 40px;
      border-radius: 50%;
      margin-right: 15px;
    }

    .online-list .online::after {
      top: unset;
      bottom: 5px;
    }

    .search__container {
      width: 280px;
      height: 50px;
      display: flex;
      justify-content: space-around;
      align-items: center;
      /* border-bottom: 1px solid #eaeaea; */
      margin-bottom: 10px;
    }

    .lens {
      background: greenyellow;
      padding: 50x;
      border-radius: 50px;
    }

    .search__icon {
      width: 23px;
      height: 23px;
    }

    .search__input {
      border: none;
      outline: none;
      background: #eaeaea;
      padding: 10px 15px;
      border-radius: 5px;
      width: 220px;
    }
  </style>
</head>

<body>




  <div class="right-sidebar" style="height: 100%; overflow-x: auto; background: var(--dark-box);">

    <!-- <div class="search__container" style="width: 100%;">
      <input class="search__input" type="text" placeholder="Search" style="width: 90%;">
      <div class="lens" style="background-color: white;">
        <i class="fas fa-search"></i>
      </div>
    </div> -->
    <div class="main-page__contacts" style = "color: var(--txt-color); height: 78vh; overflow-x: hidden;"></div>


  </div>
  <!-- <script src="script.js" async defer></script> -->
  <!-- <script src="header.js" async defer></script> -->
  <!-- <script src="friends.js" async defer></script> -->
</body>

</html>