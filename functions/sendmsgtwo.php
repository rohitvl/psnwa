<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "social_network");

if(!$con){
  die("connection failed " . mysqli_connect_error());
}



$user_email = $_SESSION['user_email'];


//GET SENDER ID
$getusr = "select * from users where user_email='$user_email'";
$run_getusr = mysqli_query($con, $getusr);

while($row5 = mysqli_fetch_assoc($run_getusr)){
  $sender = $row5['user_id'];
  $sendername = $row5['user_name'];
}


$reciever = $_POST['reciever'];
$message = $_POST['message'];



//GET RECIEVER ID
$getrec = "select * from users where user_id='$reciever'";
$run_getrec = mysqli_query($con, $getrec);

while($row6 = mysqli_fetch_assoc($run_getrec))
  $recname = $row6['user_name'];



//SEND THE MESSAGE
$send = "insert into messages (send_id, rec_id, send_name, rec_name, message) values
            ('$sender', '$reciever', '$sendername', '$recname', '$message')";
$run_send = mysqli_query($con, $send);

if($run_send){
  $succmsg = 'Message send successfully';
  echo "<script>
          window.open('../inbox.php?succ=$succmsg', '_self');
        </script>
        ";

}else{
  echo "hey";
}

?>
