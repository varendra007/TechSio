<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- <link rel="stylesheet" href="media-style.css"> -->
  <!-- <link rel="stylesheet" href="header.css"> -->
  <!-- <link rel="stylesheet" href=""> -->
  <style>
    body {
      display: block;
    }

    .screen {
      display: flex;
      flex-direction: row;
      /* justify-content: space-evenly */
    }

    
    .left-sidebar {
      background: #ffff;
      flex-basis: 25%;
      position: sticky;
      top: 70px;
      align-self: flex-start;
      overflow:auto;
      top: 0;
    }

    .imp-links a,
    .shortcut-links a {
      display: flex;
      align-items: center;
      margin-bottom: 30px;
      color: #626262;
      width: fit-content;
    }

    .imp-links a img {
      width: 30px;
      margin-right: 20px;
    }

    .imp-links a:last-child {
      color: indigo;
    }

    .imp-links {
      border-bottom: 3px #626262;
      border-style: solid;
    }

    .shortcut-links a img {
      width: 50px;
      border-radius: 3px;
      margin-right: 10px;
    }

    .shortcut-links p {
      margin: 20px 0;
      color: #626262;
      font-weight: 500;
    }
  </style>
</head>

<body>
  <!-- <div style="width: 100%; top:0;"> -->

    <!-- <div class="background-image"></div> -->

    <!-- main screen -->
    <!-- <div class="screen"> -->

      <div class="left-sidebar" style="overflow-x: auto; height: 100%;">
        <!-- <div style="height: 200px; width: 100%; color: red;"></div> -->

        <!--Left-sidebar Starts HIGHLIGHT-->
        <div class="imp-links">
          <a href="https://indianexpress.com/section/trending/"><img src="../icons/news.png" alt="Trending News">Latest
            News</a>
          <a href="../friends-overview/index.php"><img src="../icons/friends.png" alt="Friends">Friends</a>
          <a href="#"><img src="../icons/group.png" alt="Group">Group</a>
          <a href="#"><img src="../icons/marketplace.png" alt="Market Place">Market Place</a>
          <a href="#"><img src="../icons/watch.png" alt="Watch">Watch</a>
          <a href="#">More</a>
        </div>

        <div class="shortcut-links">
          <p>Shortcuts</p>
          <!-- <a href="#"><img src="Images/shortcut-1.png">Stories</a> -->
          <a href="#"><img src="../icons/shortcut-2.png">Posts</a>
          <a href="../chat/contacts.php"><img src="../icons/shortcut-3.png">Contact Details</a>
          <a href="#"><img src="../icons/shortcut-4.png">History management</a>
        </div>


      </div>

    <!-- </div> -->
  <!-- </div> -->
  <!-- <script src="script.js" async defer></script> -->
  <!-- <script src="header.js" async defer></script> -->
</body>

<!-- </html> -->