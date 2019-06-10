<!DOCTYPE html>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  </head>

</html>


<?php
session_start();
include 'functions/functions.php';
include "includes/connection.php";




//Return to login page if no user is logged in
if(!isset($_SESSION['user_email'])){
  echo "<script>alert('Please Login first');</script>";
  echo "<script>window.open('index.php', '_self');</script>";
}


if(isset($_POST['submit_interest'])){

//FIRST GET USER DETAILS
  $user = $_SESSION['user_email'];
  $getuser = "select * from users where user_email='$user'";
  $run_getuser = mysqli_query($con, $getuser);

  while ($row = mysqli_fetch_assoc($run_getuser)){
    $userid = $row['user_id'];
    $username = $row['user_name'];
  }

//GET INTEREST DETAILS
  $interestID = $_POST['interest'];
  $getinterestname = "select * from interests where interest_id = '$interestID'";
  $run_getinterestname = mysqli_query($con, $getinterestname);

  while ($row1 = mysqli_fetch_assoc($run_getinterestname))
    $interestname = $row1['interest_name'];


//CODE TO AVOID DUPLICATE ENTRY
  $avoidDuplicate = "select * from userinterest where interest_id='$interestID' AND
                      interest_name='$interestname' AND user_id='$userid'";
  $run_avoidDuplicate = mysqli_query($con, $avoidDuplicate);
  $count = mysqli_num_rows($run_avoidDuplicate);


//SET USER INTEREST IF DUPLICATE IS NOT FOUND
  if($count == 0){
  $setinterest = "insert into userinterest (interest_id, interest_name, user_id, u_name)
                  values ('$interestID', '$interestname', '$userid', '$username')";

  $run_setinterest = mysqli_query($con, $setinterest);

  echo "<script>
          $('document').ready(function(){
          $('#showsuccmsg').html('You have added <i><b>$interestname</b></i> as your Interest.');
          });
        </script>
        ";

}else {
  echo "<script>
          $('document').ready(function(){
          $('#showdupmsg').html('You have already added <i><b>$interestname</b></i> as your Interest.');
          });
        </script>
        ";
}

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

    <div class="container">

      <div class="jumbotron">
        <center>
          <h2>You are logged in as : <span style='color:#800080;' ><?php echo $_SESSION['user_email']; ?></span></h2>
          <a class="btn btn-primary" type="button" href="home.php">HOME</a>
        </center>
      </div>

      <div class="mt-10 bg-light text-primary">
        <h2 style="text-align:center; padding: 25px 0;">Your Interests :</h2>
      </div>




      <form action="myinterest.php" method="post">

        <p class="text-danger" id="showdupmsg"></p>
        <p class="text-success" id="showsuccmsg"></p>

        <div class="form-group">
          <strong><label for="interests" class="text-primary">Add Your Interest : </label></strong>
          <select class="form-control" id="interests" name="interest" required="required">

            <option>Select Interest</option>

            <?php getinterests(); ?>


          </select>
        </div>
        <button type="submit" class="btn btn-dark text-white mb-5" name="submit_interest">Add Interest</button>
      </form>


      <!--SHOWING THE INTERESTS-->
      <div class="mb-5">
        <p class="text-danger font-weight-bolder">
          <?php
              if(isset($_GET['msg'])){
                  echo $_GET['msg'];
              }
          ?>
        </p>

        <?php getuserinterests(); ?>
      </div>



    </div>

  </body>
</html>
