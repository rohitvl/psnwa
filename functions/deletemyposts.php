<?php

session_start();


$con = mysqli_connect("localhost", "root", "", "social_network");

if(!$con){
  die("connection failed " . mysqli_connect_error());
}


if(!isset($_SESSION['user_email'])){
  echo "<script>alert('Please Login first');</script>";
  echo "<script>window.open('../index.php', '_self');</script>";
}

//Just to prevent the non logged in user from deleting the post directly by the link
else{

//SENDING SUCCESS MESSAGE BACK WITH GET METHOD
$successmsg = 'POST DELETED';

$postId = $_GET['id'];


$deletepost = "delete from posts where post_id='$postId'";
$run_deletepost = mysqli_query($con, $deletepost);

if($run_deletepost){

  // .. is used to go back to one directory back. deletemyposts is in functions directory, it will go back to SN directory
  // and then /myposts.php is appended
  echo "<script>
            window.open('../myposts.php?deleted=$successmsg', '_self');
        </script>

        ";
}

}


?>
