<!DOCTYPE html>
<html lang="en">
<head>
  <title>ChitChat | The Best Social Network</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="styles/style.css">
  <link rel="manifest" href='manifest.webmanifest'>




  <!--SHOW LOGIN ERROR FUNCTION-->
  <script type='text/javascript'>
      function showerror(){
        $(document).ready(function(){
            $("#showerror").html("Incorrect Username or Password");
          });
      }

      window.addEventListener('load', () => {

          registerSW();
        });


        async function registerSW() {
            if ('serviceWorker' in navigator) {
              try {
                await navigator.serviceWorker.register('./sw.js');
              } catch (e) {
                console.log(`SW registration failed`);
              }
            }
          }  
  </script>



</head>
<body>

<!--NAVBAR STARTS HERE-->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <a class="navbar-brand" href="index.php">
          <img src="images/logo.png" width="200px">
        </a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link p-5 text-white" href="#gotologin">LOGIN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-5 text-white" href="#gotosignup">SIGNUP</a>
            </li>
          </ul>
      </div>
    </nav><br /><br />
<!--NAVBAR ENDS HERE-->
