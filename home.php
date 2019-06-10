<?php
session_start();


include 'includes/connection.php';
include 'functions/functions.php';

//Return to login page if no user is logged in
if(!isset($_SESSION['user_email'])){
  echo "<script>alert('Please Login first');</script>";
  echo "<script>window.open('index.php', '_self');</script>";
}

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ChitChat | welcome <?php echo $_SESSION['user_email'];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/style.css">
  </head>



  <body>


    <!--HOME menu-->
      <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
          <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" width="200px">
          </a>


          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>


          <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">

              <li class="nav-item">
                <a class="nav-link p-5 text-white" href="matched.php">Matched</a>
              </li>


              <li class="nav-item">
                <a class="nav-link p-5 text-white" href="people.php">People</a>
              </li>

              <?php

              $get_topics = "select * from topics";
              $run_topics = mysqli_query($con, $get_topics);

              while($row = mysqli_fetch_assoc($run_topics)){
                /*topic_id and topic_title are columns of topics table*/
                  $topic_id = $row['topic_id'];
                  $topic_title = $row['topic_title'];
                  $topicurl = strtolower($topic_title . '.php');

                  echo "
                  <li class='nav-item'>
                    <a class='nav-link p-5 text-white' href='$topicurl'>$topic_title</a>
                  </li>
                  ";
              }
            ?>
            </ul>
        </div>
      </nav><br /><br />



      <!--HOME CONTENT-->
      <div class="container-fluid">
        <div class="row">

          <!--USER PROFILE-->
          <div class="col-xl-3 col-lg-6 col-md-6 USERPROF">
            <div style="border: 1px solid black;">

            <?php
                $user = $_SESSION['user_email'];
                $get_user = "select * from users where user_email='$user'";
                $run_user = mysqli_query($con, $get_user);

                $row = mysqli_fetch_array($run_user);

                $user_id = $row['user_id'];
                $user_name = strtoupper($row['user_name']);
                $user_name_smallcaps = $row['user_name'];
                $user_country = $row['user_country'];
                $register_date = $row['register_date'];
                $last_login = $row['last_login'];
                $user_image = $row['user_image'];


                //get post Count
                $userpostcount = getpostcount();

                echo "
                  <div>
                    <img src='images/$user_image' style='height: 100%; width: 100%; object-fit: contain;'>
                  </div>

                  <p class='mt-3'><strong>Name : </strong>$user_name</p>
                  <p><strong>Country : </strong>$user_country</p>
                  <p><strong>Last Login : </strong>$last_login</p>
                  <p><strong>Joined : </strong>$register_date</p>

                  <p><a href='inbox.php' style='font-weight: bolder;
                  text-decoration: none;'>Inbox </a></p>

                  <p><a href='myposts.php' style='font-weight: bolder;
                  text-decoration: none;'>My Posts ($userpostcount)</a></p>

                  <p><a href='myinterest.php' style='font-weight: bolder;
                  text-decoration: none;'>My Interests</a></p>

                  <p><a href='editprofile.php' style='font-weight: bolder;
                  text-decoration: none;'>Edit Profile</a></p>

                  <p><a href='logout.php' style='font-weight: bolder;
                  text-decoration: none;'>Logout</a></p>
                ";

              ?>
            </div>

          </div>


          <!--TIMELINE-->
          <div class="col-xl-9 col-lg-6 col-md-6">

            <!--insert post-->
            <form action="home.php?id=<?php echo $user_id;?>" method="post">
              <h2>What's on mind?</h2>

              <div class="form-group">
                <label for="title">Title : &nbsp;</label>
                <input type="text" class="form-control" id="email" placeholder="Enter title" name="title" required="required">
              </div>

              <div class="form-group">
                <label for="tcontent">Comment : &nbsp;</label>
                <textarea name="content" class="form-control" rows="5" id="tcontent" placeholder="write content"></textarea>
              </div>


              <div class="form-group">
                <label for="topics">Select Topics : &nbsp;</label>
                <select class="form-control" id="topics" name="topic">
                  <option>Select topic</option>
                  <?php getTopic(); ?>
                </select>
              </div>


              <button name="sub" class="btn btn-primary">Post to Timeline</button><br /><hr />

            </form>
            <?php insertPost(); ?>

            <!--Show posts -->
            <div class="mt-3">
              <h2 class="text-primary" style="text-align:center; padding: 25px 0;">Recent Posts : </h2>
              <?php getPosts(); ?>
            </div>
          </div>


        </div>
      </div>




  </body>
</html>
