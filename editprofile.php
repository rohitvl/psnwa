<?php
session_start();

include 'functions/editprofilescripts.js';

include 'functions/editprofile.php';

//Return to login page if no user is logged in
if(!isset($_SESSION['user_email'])){
  echo "<script>alert('Please Login first');</script>";
  echo "<script>window.open('index.php', '_self');</script>";
}


$user = $_SESSION['user_email'];
$get_user = "select * from users where user_email='$user'";
$run_user = mysqli_query($con, $get_user);

$row = mysqli_fetch_array($run_user);



$user_name = $row['user_name'];
$user_bday = $row['user_b_day'];
$user_image = $row['user_image'];



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
        <h2 style="text-align:center; padding: 25px 0;">Edit your Profile :</h2>
      </div>







      <!--EDIT FORMs -->
      <div class="m-5">

        <!--SUCCESS MESSAGE -->
        <p id="success" class="text-success"></p>

      <!--UPDATE NAME -->
      <form action="editprofile.php" method="post">
        <div class="form-group">
          <strong><label for="name" class="text-primary">Change Name :</label></strong>
          <input type="text" class="form-control" id="name" name="u_name" value='<?php echo $user_name; ?>'>
        </div>
        <button type="submit" class="btn btn-dark text-white mb-5" name="submit_name">Update Name</button>
      </form>




      <!-- UPDATE PASSWORD -->
      <form action="editprofile.php" method="post">
        <div class="form-group">
          <strong><label for="pwd" class="text-primary">Change Password : </label></strong>
          <input type="password" class="form-control" id="pwd" name="u_pass" value='*****'>
        </div>
        <button type="submit" class="btn btn-dark text-white mb-5" name="submit_pass">Update Password</button>
      </form>




      <!-- UPDATE COUNTRY-->
      <form action="editprofile.php" method="post">
        <div class="form-group">
          <strong><label for="country" class="text-primary">Change Country : </label></strong>
          <select class="form-control" id="country" name="u_country" required="required">
            <option>Select your Country</option>
            <option>India</option>
            <option>USA</option>
            <option>UAE</option>
            <option>Pakistan</option>
          </select>
        </div>
        <button type="submit" class="btn btn-dark text-white mb-5" name="submit_country">Update Country</button>
      </form>




      <!-- UPDATE BIRTHDAY-->
      <form action="editprofile.php" method="post">
        <div class="form-group">
          <strong><label for="bday">Change Birthday :</label></strong>
          <input type="date" class="form-control" id="bday" name="u_birthday">
        </div>
        <button type="submit" name="submit_bday" class="btn btn-dark text-white mb-5">Update Birthday</button>
      </form>





    <!-- UPDATE DP-->
    <form action="editprofile.php" method="post" enctype="multipart/form-data">
          <div class="form-group" >
            <input type="file" class="form-control-file border" name="file">
          </div>
          <button type="submit" name="submit_pic" class="btn btn-dark text-white mb-6">Update Picture</button>
    </form>



    </div>
  </div>
  </body>
</html>
