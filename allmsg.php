<?php
session_start();
include 'functions/functions.php';

//Return to login page if no user is logged in
if(!isset($_SESSION['user_email'])){
  echo "<script>alert('Please Login first');</script>";
  echo "<script>window.open('index.php', '_self');</script>";
}


function getallconvo(){

          global $con;

          $useremail = $_SESSION['user_email'];

          //GET LOGGED IN USER ID
          $getuserid = "select * from users where user_email='$useremail'";
          $run_getuserid = mysqli_query($con, $getuserid);

          while($row = mysqli_fetch_assoc($run_getuserid))
              $userID = $row['user_id'];


          $recid = $_GET['id'];

          $getmsg = "select * from messages where (send_id = '$userID' AND rec_id = '$recid')
                      OR (send_id = '$recid' AND rec_id = '$userID')";


          $run_getmsg = mysqli_query($con, $getmsg);

          while($rowwww = mysqli_fetch_assoc($run_getmsg)){
              $msg = $rowwww['message'];
              $time = $rowwww['time'];
              $sender = $rowwww['send_name'];


              echo "
                  <div class='mb-3 bg-primary text-white' style='border-radius:20px;'>
                    <h4 class='p-2'><span>$sender</span> : $msg </h4>
                    <small class='px-5'>$time</small>
                  </div>


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
        <h2 style="text-align:center; padding: 25px 0;">Messages between you and <?php echo $_GET['name'] ?></h2>
      </div>

      


      <div>
        <?php getallconvo(); ?>
      </div>

      <form action='functions/sendmsgtwo.php' method='post'>
        <div class='form-group text-center mt-5'>
          <label for='msg'><strong>Message:</strong></label>
          <input type='text' class='form-control' id='msg' placeholder='Your Message' name='message' required='required'>
        </div>
        <div class='form-inline'>
          Send To &nbsp; &nbsp;<input type='text' class='form-control' value=<?php echo $_GET['id']; ?> name='reciever' readonly='readonly'>
        </div><br />
        <button type='submit' class='btn btn-primary'>Send</button>
      </form>

    </div>



  </body>
</html>
