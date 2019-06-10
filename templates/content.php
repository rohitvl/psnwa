<!--CONTENT STARTS HERE-->
    <div class="container">

      <p class="font-weight-bold text-success">
        <?php
            if(isset($_GET['sessionEnd'])){
              echo $_GET['sessionEnd'];
            }
        ?>
      </p>


      <div class="row bg-light">

        <!--LOGIN STARTS-->
        <div class="col-lg-4 p-5" id="gotologin">

          <h2>LOGIN</h2>

          <form action="index.php" method="post">
            <div class="form-group">
              <label for="emaill">Email:</label>
              <input type="email" class="form-control" id="emaill" placeholder="Enter email" name="email" required="required">
            </div>
            <div class="form-group">
              <label for="pawd">Password:</label>
              <input type="password" class="form-control" id="pawd" placeholder="Enter password" name="pass" required="required">
            </div>
            <button name="login" class="btn btn-primary">Login</button>

            <p id="showerror" class="text-danger mt-2"></p>
          </form>



        </div><br />
        <!--LOGIN ENDS-->




        <!--SIGNUP STARTS-->

        <div class="col-lg-8 p-5" id="gotosignup">
          <h2>SIGNUP</h2>
          <form action="index.php" method="post">

            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name" placeholder="Enter name" name="u_name" required="required">
            </div>

            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="u_pass" required="required">
            </div>

            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="u_email" required="required">
            </div>

            <div class="form-group">
              <label for="country">Select Country:</label>
              <select class="form-control" id="country" name="u_country" required="required">
                <option>Select your Country</option>
                <option>India</option>
                <option>USA</option>
                <option>UAE</option>
                <option>Pakistan</option>
              </select>
            </div>


            <div class="form-group">
              <label for="gender">Select Gender:</label>
              <select class="form-control" id="gender"  name="u_gender" required="required">
                <option>Select your Gender</option>
                <option>Male</option>
                <option>Female</option>
              </select>
            </div>




            <div class="form-group">
              <label for="bday">Birthday:</label>
              <input type="date" class="form-control" id="bday" name="u_birthday">
            </div>


            <button type="submit" name="sign_up" class="btn btn-primary"> Sign up </button>
          </form>



        </div><br />
        <!--SIGNUP ENDS-->

      </div>
    </div>
<!--CONTENT ENDS HERE-->
