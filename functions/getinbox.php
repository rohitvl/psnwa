<?php

include 'includes/connection.php';

function getinboxmsg() {
    global $con;

    $useremail = $_SESSION['user_email'];

    //GET LOGGED IN USER ID
    $getuserid = "select * from users where user_email='$useremail'";
    $run_getuserid = mysqli_query($con, $getuserid);

    while($row = mysqli_fetch_assoc($run_getuserid))
        $userID = $row['user_id'];

    //
    $getinboxlook = "select distinct rec_id from messages where send_id = '$userID'";
    $run_getinboxlook = mysqli_query($con, $getinboxlook);

    while($row1 = mysqli_fetch_assoc($run_getinboxlook)){
        //get info of users to whom we have sent message.

          $recuserID = $row1['rec_id'];
        //  $sendId = $row1['send_id'];

          $getrecuser = "select * from users where user_id='$recuserID'";
          $run_getrecuser = mysqli_query($con, $getrecuser);

          //retrieve Last message  sent or recieved by breaking the while loop
          $getmsg = "select * from messages where (send_id = '$userID' AND rec_id = '$recuserID')
                      OR (send_id = '$recuserID' AND rec_id = '$userID')
                       ORDER BY msg_id DESC";

          $run_getmsg= mysqli_query($con, $getmsg);
          while($row2 = mysqli_fetch_assoc($run_getmsg)){
            $message = $row2['message'];
            break;
          }



          while($row1 = mysqli_fetch_assoc($run_getrecuser)){
                  $username = strtoupper($row1['user_name']);
                  $userpic = $row1['user_image'];

                  echo "
                    <div class='row' style='border:1px solid black; padding:10px; margin:10px;'>
                      <div class='col-md-6' style='text-align:center;'>
                        <img src='images/$userpic' width='100px;'>
                      </div>
                      <div class='col-md-6 text-center'>
                        <p>Name : <b>$username</b></p>
                        <p>Last Message : <b>$message</b></p>
                        <a href='allmsg.php?id=$recuserID&name=$username' class='btn btn-info' >See Entire conversation</a>
                      </div>
                    </div>
                    ";
            }

    }











}


 ?>
