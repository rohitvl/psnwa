<?php

include 'includes/connection.php';





//EDIT NAME
if (isset($_POST['submit_name'])){

  $user = $_SESSION['user_email'];

  $name = mysqli_real_escape_string($con, $_POST['u_name']);

  $updatename = "UPDATE users SET user_name='$name' where user_email='$user'";

  $run_updatename = mysqli_query($con, $updatename);

  if($run_updatename){

      echo "<script>successname();</script>";
  }
}


//EDIT NAME
if (isset($_POST['submit_pass'])){

  $user = $_SESSION['user_email'];

  $pass = mysqli_real_escape_string($con, $_POST['u_pass']);

  $updatepass = "UPDATE users SET user_pass='$pass' where user_email='$user'";

  $run_updatepass = mysqli_query($con, $updatepass);

  if($run_updatepass){

      echo "<script>successpass();</script>";
  }
}



//EDIT COUNTRY
if (isset($_POST['submit_country'])){

  $user = $_SESSION['user_email'];

  $country = mysqli_real_escape_string($con, $_POST['u_country']);

  $updatecountry = "UPDATE users SET user_country='$country' where user_email='$user'";

  $run_updatecountry = mysqli_query($con, $updatecountry);

  if($run_updatecountry){

      echo "<script>successcountry();</script>";
  }
}




//EDIT Bday
if (isset($_POST['submit_bday'])){

  $user = $_SESSION['user_email'];

  $bday = mysqli_real_escape_string($con, $_POST['u_birthday']);

  $updatebday = "UPDATE users SET user_b_day='$bday' where user_email='$user'";

  $run_updatebday = mysqli_query($con, $updatebday);

  if($run_updatebday){

      echo "<script>successbday();</script>";
  }
}




//IMAGE FILE UPLOAD
if (isset($_POST['submit_pic'])){

    $file_name = $_FILES['file']['name'];
    $file_temp_loc = $_FILES['file']['tmp_name'];
    $file_final_loc = 'images/' . $file_name;

    move_uploaded_file($file_temp_loc, $file_final_loc);


    $user = $_SESSION['user_email'];

    $updatepic = "UPDATE users SET user_image='$file_name' where user_email='$user'";

    $run_updatepic = mysqli_query($con, $updatepic);

    if($run_updatepic){

        echo "<script>successpic();</script>";
    }

}

?>
