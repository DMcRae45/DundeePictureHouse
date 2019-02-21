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

    <form class="form-group" action="../Controller/attempt_customerLogin.php" method="POST">

      <div class="form-group">
          <input class="form-control" type="text" id="username" name="username" placeholder="Username">
      </div>

      <div class="form-group">
          <input class="form-control" type="password" id="password" name="password" autocomplete="off" placeholder="Password">
      </div>

        <button class="form-control" type="submit" name="customerLoginSubmit" value="Login">Login</button>

    </form>

</div>
<!-- <footer> -->
      <?php include 'footer.php'; ?>
<!-- </footer> -->
</div><!-- end of container-->
    <?php require '../Controller/bootstrapScript.php'; ?>
</body>
</html>
