<?php

session_start();

date_default_timezone_set("Asia/Kolkata"); //set timezone of india


//redirect to home if user is logged in
if(isset($_SESSION['user_email'])){
  echo "<script>window.open('home.php', '_self');</script>";
}


include 'templates/header.php';
include 'templates/content.php';
include 'templates/footer.php';


//LOGIN PAGE IS BELOW ALL THE CONTENT BCS THE HEADER FILE HAS A SCRIPT FOR LOGIN ERROR,
//IT HAS showerror function definition WHICH FIRST NEEDS TO BE LOADED and then
//THE showerror function IS DEFINED IN THE LOGIN PAGE WILL BE EXECUTED
include 'user_insert.php';
include 'login.php';
?>
