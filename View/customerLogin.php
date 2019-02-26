<?php
/*

    Description: Customer login form

    Author: David McRae, Aaron Hay
 */
?>
<html>
<head>
    <?php
        include '../Model/DPH-api.php';
        include 'header.php';
    ?>
</head>
<body>

<div class="container">
  <div class="page-header">
      <h1> Customer Login page </h1>
  </div>

    <form class="form-group needs-validation" action="../Controller/attempt_customerLogin.php" method="POST" novalidate>

      <div class="form-group input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">Username</span>
        </div>
          <input class="form-control" type="text" id="username" name="username" placeholder="Username" required>

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
?>
</body>
</html>
