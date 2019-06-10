<?php

include "includes/connection.php";


function sendmsg() {
  global $con;
  global $sendtoId;

  $getUserdetails = "select * from users where user_id='$sendtoId'";
  $run_getUserdetails = mysqli_query($con, $getUserdetails);

  while($row = mysqli_fetch_assoc($run_getUserdetails)){
      $username = strtoupper($row['user_name']);
      $userpic = $row['user_image'];
      $usergender = $row['user_gender'];
      $usercountry = $row['user_country'];
      $useremail = $row['user_email'];

}


      echo "
        <div class='row' style='border:1px solid black; padding:10px; margin:10px;'>
          <div class='col-md-6' style='text-align:center;'>
            <img src='images/$userpic' width='100px;'>
          </div>
          <div class='col-md-6'>
            <p>Name : <b>$username</b></p>
            <p>Gender : <b>$usergender</b></p>
            <p>Country : <b>$usercountry</b></p>
          </div>
        </div>

        <form action='functions/sendmsg.php' method='post'>
          <div class='form-group text-center mt-5'>
            <label for='msg'><strong>Message:</strong></label>
            <input type='text' class='form-control' id='msg' placeholder='Your Message' name='message' required='required'>
          </div>
          <div class='form-inline'>
            Send To &nbsp; &nbsp;<input type='text' class='form-control' value=$useremail name='reciever' readonly='readonly'>
          </div><br />
          <button type='submit' class='btn btn-primary'>Send</button>
        </form>

      ";


}



 ?>
