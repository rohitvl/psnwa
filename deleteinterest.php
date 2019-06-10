<?php

session_start();

include "includes/connection.php";


//SECURITY BEFORE DELETING THE POST
if(!isset($_SESSION['user_email'])){
  echo "<script>alert('Please Login first');</script>";
  echo "<script>window.open('index.php', '_self');</script>";
}
else{

  $delIntId = $_GET['id'];

  //GET USER ID LIKE THIS SO THAT OTHER USER CAN'T DELETE YOUR POST BY VISITING link DIRECTLY

  $user = $_SESSION['user_email'];
  $getuser = "select * from users where user_email='$user'";
  $run_getuser = mysqli_query($con, $getuser);

  while ($row = mysqli_fetch_assoc($run_getuser))
    $userid = $row['user_id'];


  $delint = "delete from userinterest where interest_id='$delIntId' AND user_id='$userid'";
  $run_delint = mysqli_query($con, $delint);

  if($run_delint){
    $msg='Interest Deleted Successfully';
    echo "<script>
            window.open('myinterest.php?msg=$msg', '_self');
          </script>";
  }

}

 ?>
