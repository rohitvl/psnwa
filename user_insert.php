<?php

/*SINCE THIS PAGE IS INCLUDED IN INDEX SO HERE WE DON'T NEED TO START SESSION
SINCE IN INDEX WE HAVE STARTED IT ALREADY.*/

include 'includes/connection.php';

if (isset($_POST['sign_up'])){

  $name = mysqli_real_escape_string($con, $_POST['u_name']);
  $password = mysqli_real_escape_string($con, $_POST['u_pass']);
  $email = mysqli_real_escape_string($con, $_POST['u_email']);
  $country = mysqli_real_escape_string($con, $_POST['u_country']);
  $gender = mysqli_real_escape_string($con, $_POST['u_gender']);
  $b_day = mysqli_real_escape_string($con, $_POST['u_birthday']);
  $status = "unverified";
  $posts = "No";

  /*hold the sql uery*/
  $get_email = "select * from users where user_email='$email'";
  /*run query*/
  $run_email = mysqli_query($con, $get_email);
  /*mysqli_num_rows will return the count of number of records returned after executing above query*/
  $count = mysqli_num_rows($run_email);

  if($count == 1){
    echo "<script>alert('email already exists')</script>";
    exit();
  }



  if(strlen($password)<6){
    echo "<script>alert('password should be more than 6 characters');</script>";
    exit();
  }else {
    $insert = "INSERT INTO users (user_name, user_pass, user_email, user_country, user_gender, user_b_day,
                          user_image, register_date, last_login, status, posts)
              VALUES ('$name', '$password', '$email', '$country', '$gender', '$b_day', 'avatar.png', NOW(), NOW(), '$status', '$posts')";

    $run_insert = mysqli_query($con, $insert);

    /*if insert query is run successfully then display the success message*/
    if($run_insert){
      $_SESSION['user_name'] = $name;
      $_SESSION['user_email'] = $email;
      echo "<script>alert('registration successful');</script>";
      echo "<script>window.open('home.php', '_self');</script>";
    }
  }

}


?>
