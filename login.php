<?php

include "includes/connection.php";

    if(isset($_POST['login'])){

      $email = mysqli_real_escape_string($con, $_POST['email']);
      $password = mysqli_real_escape_string($con, $_POST['pass']);


      $get_user = "select * from users where user_email='$email' AND user_pass='$password'";
      $run_email = mysqli_query($con, $get_user);
      $count = mysqli_num_rows($run_email);

      if($count == 1){
          $_SESSION['user_email'] = $email;
          lastloginupdate();
      }else {
          echo "<script type='text/javascript'> showerror(); </script>";
      }


  }





function lastloginupdate() {

    global $con;

    $lastlogin = date('Y-m-d H:i:s');

    $user = $_SESSION['user_email'];


    $updatell = "UPDATE users SET last_login='$lastlogin' where user_email='$user'";

    $run_updatell = mysqli_query($con, $updatell);

    if($run_updatell){
        echo "<script>window.open('home.php', '_self');</script>";
    }
}

?>
