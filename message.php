<?php
session_start();
include 'functions/msgfunction.php';

//Return to login page if no user is logged in
if(!isset($_SESSION['user_email'])){
  echo "<script>alert('Please Login first');</script>";
  echo "<script>window.open('index.php', '_self');</script>";
}


$sendtoId = $_GET['id'];


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

    <div class="container">

      <div class="jumbotron">
        <center>
          <h2>You are logged in as : <span style='color:#800080;' ><?php echo $_SESSION['user_email']; ?></span></h2>
          <a class="btn btn-primary mx-3" type="button" href="home.php">HOME</a>
          <a class="btn btn-primary mx-3" type="button" href="inbox.php">INBOX</a>
        </center>
      </div>

      <div class="mt-10 bg-light text-primary">
        <h2 style="text-align:center; padding: 25px 0;">Send Message :</h2>
      </div>

    </div>

    <div class="container mb-5 text-center">
      <h1 class="font-weight-bolder text-success" id="msgsucc">
        <?php
            if(isset($_GET['succ'])){
              echo $_GET['succ'];
            }
         ?>
      </h1>
      <a href="inbox.php" class="btn btn-info">Check Inbox</a>
      <?php sendmsg(); ?>
    </div>

  </body>
</html>
