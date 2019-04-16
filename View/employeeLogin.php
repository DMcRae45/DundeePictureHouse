<?php
/*
    Description: Customer login form

    Author: David McRae, Aaron Hay
 */
 include 'session.php';
?>
<html>
    <?php
        include 'header.php';
    ?>
<title>DPH - Login</title>

<body>

<div class="container">

  <div class="container">
    <div class="page-header">
      <br>
      <img src="images/login.png" class="mx-auto d-block">
        <h1 class="text-center mt-4">Employee Login</h1>
    </div>

    <?php
    //Error Reporting for the users
    if(isset($_GET['error']))
    {
      $error = $_GET['error'];
      echo $error;
    }
    ?>
    <?php echo '<form class="form-group needs-validation" action="../Controller/attempt_employeeLogin.php" method="POST" novalidate>'?>

      <div class="form-group">
          <input class="form-control" type="text" id="username" name="username" placeholder="Username" required>
          <div class="invalid-feedback">
            You cannot Leave This field Empty.
          </div>
      </div>

      <div class="form-group">
          <input class="form-control" type="password" id="password" name="password" autocomplete="off" placeholder="Password" required>
          <div class="invalid-feedback">
            You cannot Leave This field Empty.
          </div>
      </div>

        <button class="form-control" type="submit" name="employeeLoginSubmit" value="Login">Login</button>

    </form>

</div>
</div><!-- end of container-->
<!-- <footer> -->
      <?php include 'footer.php'; ?>
<!-- </footer> -->

<?php
require '../Controller/bootstrapScript.php';
require '../Controller/ValidateEmptyFields.js';
?>
</body>
</html>
