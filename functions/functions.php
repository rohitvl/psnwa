<?php

include "includes/connection.php";


//function to get topics
function getTopic(){
  global $con;
  $get_topics = "select * from topics";
  $run_topics = mysqli_query($con, $get_topics);

  while($row = mysqli_fetch_assoc($run_topics)){
    /*topic_id and topic_title are columns of topics table*/
      $topic_id = $row['topic_id'];
      $topic_title = $row['topic_title'];

      echo "<option value='$topic_id'>$topic_title</option>";
  }
}


//function to insert post from users.
function insertPost(){
  global $con;
  global $user_id;
  global $user_name_smallcaps;
  if(isset($_POST['sub'])){

    $title = $_POST['title'];
    $content = $_POST['content'];
    $topic = $_POST['topic'];

    /*The option element in form where we post to timeline has a value attribute which has value
    of the topic id and that will be sent via form to this page.*/

    $insert = "insert into posts (user_id, user_name, topic_id, post_title, post_content, post_date)
                values ('$user_id', '$user_name_smallcaps', '$topic', '$title', '$content', NOW())";

    $run = mysqli_query($con, $insert);

    if($run){
      echo "<h2 class='text-success'>New Post Inserted &#x2705;</h2>";

      $update = "update users set posts='yes' where user_id='$user_id'";
      $run_update = mysqli_query($con, $update);
    }
  }
}


//get posts to show
function getPosts(){
  global $con;
  $get_posts = "select * from posts ORDER BY post_id DESC";
  $run_posts = mysqli_query($con, $get_posts);


  while($row = mysqli_fetch_assoc($run_posts)){

      $post_title = $row['post_title'];
      $post_content = $row['post_content'];
      $user_post_id = $row['user_id'];
      $user_post_name = strtoupper($row['user_name']);
      $date = $row['post_date'];

      echo "<div style='border:1px solid black;'>
            <div style='padding:5px;'>
            <h2>Post title :</h2> $post_title
            <h3>Post content :</h3> $post_content
            <p style='border:1px solid grey; margin-top:5px;'>posted by user :
              <span class='text-primary'><b><i>$user_post_name</i></b></span>
              on <span class='text-danger'>$date</span>
            </p>
            </div>
            </div>
            <br /><br />
            ";

  }
}



//GET FUN POSTS
  function getfun(){
    global $con;
    $gettitleid = "select * from topics where topic_title='Fun'";
    $run_gettitleid= mysqli_query($con, $gettitleid);

    while($row = mysqli_fetch_assoc($run_gettitleid))
      $var = $row['topic_id'];


    $getpost = "select * from posts where topic_id='$var' ORDER BY post_id DESC";
    $run_getpost = mysqli_query($con, $getpost);

    while($roww = mysqli_fetch_assoc($run_getpost)){

      $post_title = $roww['post_title'];
      $post_content = $roww['post_content'];
      $user_post_id = $roww['user_id'];
      $user_post_name = strtoupper($roww['user_name']);
      $date = $roww['post_date'];

      echo "<div style='border:1px solid black;'>
            <div style='padding:5px;'>
            <h2>Post title :</h2> $post_title
            <h3>Post content :</h3> $post_content
            <p style='border:1px solid grey; margin-top:5px;'>posted by user :
              <span class='text-primary'><b><i>$user_post_name</i></b></span>
              on <span class='text-danger'>$date</span>
            </p>
            </div>
            </div>
            <br /><br />
            ";

    }
  }


//GET NEWS POSTS
function getnews(){
  global $con;
  $gettitleid = "select * from topics where topic_title='News'";
  $run_gettitleid= mysqli_query($con, $gettitleid);

  while($row = mysqli_fetch_assoc($run_gettitleid))
    $var = $row['topic_id'];


  $getpost = "select * from posts where topic_id='$var' ORDER BY post_id DESC";
  $run_getpost = mysqli_query($con, $getpost);

  while($roww = mysqli_fetch_assoc($run_getpost)){

    $post_title = $roww['post_title'];
    $post_content = $roww['post_content'];
    $user_post_id = $roww['user_id'];
    $user_post_name = strtoupper($roww['user_name']);
    $date = $roww['post_date'];

    echo "<div style='border:1px solid black;'>
          <div style='padding:5px;'>
          <h2>Post title :</h2> $post_title
          <h3>Post content :</h3> $post_content
          <p style='border:1px solid grey; margin-top:5px;'>posted by user :
            <span class='text-primary'><b><i>$user_post_name</i></b></span>
            on <span class='text-danger'>$date</span>
          </p>
          </div>
          </div>
          <br /><br />
          ";

  }
}



//GET SCIENCE POSTS
function getscience(){
  global $con;
  $gettitleid = "select * from topics where topic_title='Science'";
  $run_gettitleid= mysqli_query($con, $gettitleid);

  while($row = mysqli_fetch_assoc($run_gettitleid))
    $var = $row['topic_id'];


  $getpost = "select * from posts where topic_id='$var' ORDER BY post_id DESC";
  $run_getpost = mysqli_query($con, $getpost);

  while($roww = mysqli_fetch_assoc($run_getpost)){

    $post_title = $roww['post_title'];
    $post_content = $roww['post_content'];
    $user_post_id = $roww['user_id'];
    $user_post_name = strtoupper($roww['user_name']);
    $date = $roww['post_date'];

    echo "<div style='border:1px solid black;'>
          <div style='padding:5px;'>
          <h2>Post title :</h2> $post_title
          <h3>Post content :</h3> $post_content
          <p style='border:1px solid grey; margin-top:5px;'>posted by user :
            <span class='text-primary'><b><i>$user_post_name</i></b></span>
            on <span class='text-danger'>$date</span>
          </p>
          </div>
          </div>
          <br /><br />
          ";

  }
}



//GET POLITICS POSTS
function getpolitics(){
  global $con;
  $gettitleid = "select * from topics where topic_title='Politics'";
  $run_gettitleid= mysqli_query($con, $gettitleid);

  while($row = mysqli_fetch_assoc($run_gettitleid))
    $var = $row['topic_id'];


  $getpost = "select * from posts where topic_id='$var' ORDER BY post_id DESC";
  $run_getpost = mysqli_query($con, $getpost);

  while($roww = mysqli_fetch_assoc($run_getpost)){

    $post_title = $roww['post_title'];
    $post_content = $roww['post_content'];
    $user_post_id = $roww['user_id'];
    $user_post_name = strtoupper($roww['user_name']);
    $date = $roww['post_date'];

    echo "<div style='border:1px solid black;'>
          <div style='padding:5px;'>
          <h2>Post title :</h2> $post_title
          <h3>Post content :</h3> $post_content
          <p style='border:1px solid grey; margin-top:5px;'>posted by user :
            <span class='text-primary'><b><i>$user_post_name</i></b></span>
            on <span class='text-danger'>$date</span>
          </p>
          </div>
          </div>
          <br /><br />
          ";

  }
}



//get my Posts
function getmyposts(){
  global $con;
  $user_email = $_SESSION['user_email'];

  $getuserid = "select * from users where user_email='$user_email'";
  $run_getuserid = mysqli_query($con, $getuserid);

  while($row = mysqli_fetch_assoc($run_getuserid))
    $var = $row['user_id'];


  $getpost = "select * from posts where user_id='$var' ORDER BY post_id DESC";
  $run_getpost = mysqli_query($con, $getpost);

  $countmyposts = mysqli_num_rows($run_getpost);

  if($countmyposts == 0){
      echo "
            <h2 class='text-info font-weight-bolder mt-5' style='text-align:center;'>
              You've NO posts. Post something
            </h2>
           ";
  }
  else{
  while($roww = mysqli_fetch_assoc($run_getpost)){

    $post_id = $roww['post_id'];
    $post_title = $roww['post_title'];
    $post_content = $roww['post_content'];
    $user_post_id = $roww['user_id'];
    $user_post_name = strtoupper($roww['user_name']);
    $date = $roww['post_date'];


    echo "<div style='border:1px solid black;'>
          <div style='padding:5px;'>
          <h2>Post title :</h2> $post_title
          <h3>Post content :</h3> $post_content
          <p style='border:1px solid grey; margin-top:5px;'>posted by user :
            <span class='text-primary'><b><i>$user_post_name</i></b></span>
            on <span class='text-danger'>$date</span>
          </p>
          <a type='button' class='btn btn-primary mb-2 ml-2 text-white font-weight-bold'
              href='functions/deletemyposts.php?id=$post_id'>Delete
          </a>
          </div>
          </div>
          <br /><br />
          ";

        }
      }
}





//get users
function getusers(){
    global $con;
    $var1 = $_SESSION['user_email'];
    $getuser = "select * from users where NOT user_email = '$var1'";
    $run_getuser = mysqli_query($con, $getuser);

    while($row = mysqli_fetch_assoc($run_getuser)){

      $userpic = $row['user_image'];
      $username = strtoupper($row['user_name']);
      $usergender = $row['user_gender'];
      $usercountry = $row['user_country'];


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
      ";


    }
}



//get post Count
function getpostcount(){

  global $con;
  $user_email = $_SESSION['user_email'];

  $getuserid = "select * from users where user_email='$user_email'";
  $run_getuserid = mysqli_query($con, $getuserid);

  while($row = mysqli_fetch_assoc($run_getuserid))
    $var = $row['user_id'];


  $getpost = "select * from posts where user_id='$var'";
  $run_getpost = mysqli_query($con, $getpost);
  $postcount = mysqli_num_rows($run_getpost);
  return $postcount;

}




//get interests list in select form
function getinterests() {

  global $con;

  $get_interests = "select * from interests";
  $run = mysqli_query($con, $get_interests);

  while($row = mysqli_fetch_assoc($run)){

      $int_id = $row['interest_id'];
      $int_name = $row['interest_name'];

      echo "<option value='$int_id'>$int_name</option>";
    }

}




//Getting the user's interest list
function getuserinterests(){
  global $con;

  $user = $_SESSION['user_email'];
  $getuser = "select * from users where user_email='$user'";
  $run_getuser = mysqli_query($con, $getuser);

  while ($row = mysqli_fetch_assoc($run_getuser)){
    $userid = $row['user_id'];
    $username = $row['user_name'];
  }

  $getallinterest = "select * from userinterest where user_id='$userid'";
  $run_getallinterest = mysqli_query($con, $getallinterest);

  $intcount = mysqli_num_rows($run_getallinterest);


  if($intcount == 0){
    echo "<p class='text-center font-weight-bolder text-info'>You have not listed your interests</p>";
  }
  else {
  while($row = mysqli_fetch_assoc($run_getallinterest)){

    $intname = $row['interest_name'];
    $intid = $row['interest_id'];

    echo "
    <div class='row py-3'>
      <div class='col-sm-6 text-center border border-right-0 p-2 text-success font-weight-bold text-uppercase'>
        $intname
      </div>

      <div class='col-sm-6 text-center border p-2'>
        <a class='btn btn-danger text-white font-weight-bolder' href='deleteinterest.php?id=$intid'>Remove</a>
      </div>
    </div>
    ";
  }
}

}




//get MATCHED users
function getmatchedusers(){
      global $con;
      $var1 = $_SESSION['user_email'];
      $getuserid = "select * from users where user_email = '$var1'";
      $run_getuserid = mysqli_query($con, $getuserid);
      while($roww=mysqli_fetch_assoc($run_getuserid))
        $loggeduserId = $roww['user_id'];


      $getloggeduserint = "select * from userinterest where user_id='$loggeduserId'";
      $run_getloggeduserint = mysqli_query($con, $getloggeduserint);

      while($one = mysqli_fetch_assoc($run_getloggeduserint)){
        $getint = $one['interest_name'];

        $getmatch = "select * from userinterest where interest_name = '$getint' AND NOT user_id='$loggeduserId'";
        $run_getmatch = mysqli_query($con, $getmatch);

        while($two = mysqli_fetch_assoc($run_getmatch)){

          $matchuserid = $two['user_id'];

          $getmatchuserinfo = "select * from users where user_id = '$matchuserid'";
          $run_getmatchuserinfo = mysqli_query($con, $getmatchuserinfo);

                while($row = mysqli_fetch_assoc($run_getmatchuserinfo)){

                  $idformsg = $row['user_id'];
                  $userpic = $row['user_image'];
                  $username = strtoupper($row['user_name']);
                  $usergender = $row['user_gender'];
                  $usercountry = $row['user_country'];


                  echo "
                    <p class='text-success text-center'>Matched with you interest <i>$getint</i></p>
                    <div class='row' style='border:1px solid black; padding:10px; margin:10px;'>
                      <div class='col-md-6' style='text-align:center;'>
                        <img src='images/$userpic' width='150px;'>
                      </div>
                      <div class='col-md-6' style='text-align:center;'>
                        <p>Name : <b>$username</b></p>
                        <p>Gender : <b>$usergender</b></p>
                        <p>Country : <b>$usercountry</b></p>
                        <a class='btn btn-info' href='message.php?id=$idformsg'>Send Message</a>
                      </div>
                    </div>
                  ";

      }
    }
    }

}



?>
