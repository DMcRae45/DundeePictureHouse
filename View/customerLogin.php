<?php
/*
    Description: Customer login form

    Author: David McRae, Aaron Hay
 */
?>
<html>
<head>
    <?php
        include 'header.php';
        include '../Controller/getReturnURL.php';
    ?>
</head>
<body>

<div class="container">
  <div class="page-header">
      <h1 class="text-center mt-4">Login to your account</h1>
  </div>

    <?php echo '<form class="form-group needs-validation" action="../Controller/attempt_customerLogin.php?returnURL='.$returnURL.'" method="POST" novalidate>' ?>

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
