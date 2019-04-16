<?php
/*
    Description: Customer login form

    Author: David McRae, Aaron Hay
 */
?>
<html>
<head>
    <?php
      include 'session.php';
        include 'header.php';
    ?>
<title>DPH - Login</title>
</head>
<body>

<div class="container">
  <div class="page-header">
    <br>
    <img src="images/login.png" class="mx-auto d-block">
      <h1 class="text-center mt-4">Login to your account</h1>
  </div>

  <?php
  //Error Reporting for the users
  if(isset($_GET['error']))
  {
    $error = $_GET['error'];
    echo $error;
  }
  ?>

    <form class="form-group needs-validation" action="../Controller/attempt_customerLogin.php" method="POST" novalidate>
      <div class="form-group input-group">
        <div class="input-group-prepend">
          <span class="input-group-text mt-4" id="inputGroupPrepend">Username</span>
        </div>
          <input class="form-control mt-4" type="text" id="username" name="username" placeholder="Username" required>

          <div class="invalid-feedback">
            You cannot Leave This field Empty.
          </div>
        </div>

      <div class="form-group input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">Password</span>
        </div>
          <input class="form-control" type="password" id="password" name="password" autocomplete="off" placeholder="Password" required>
          <div class="invalid-feedback">
            You cannot Leave This field Empty.
          </div>
      </div>

      <button class="form-control" type="submit" name="customerLoginSubmit" value="Login">Login</button>

    </form>

    <p>Don't have an account? Sign up <a href="registerCustomer.php">here!</a></p>

</div>
<!-- <footer> -->
      <?php include 'footer.php'; ?>
<!-- </footer> -->
</div><!-- end of container-->
<?php
require '../Controller/bootstrapScript.php';
require '../Controller/ValidateEmptyFields.js';
include '../Controller/cookieConsent.php';
?>
</body>
</html>
