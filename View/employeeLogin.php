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
      <h1> Employee Login page </h1>
  </div>

    <form class="form-group needs-validation" action="../Controller/attempt_employeeLogin.php" method="POST" novalidate>

      <div class="form-group">
          <input class="form-control" type="text" id="username" name="username" placeholder="Username" required>
      </div>

      <div class="form-group">
          <input class="form-control" type="password" id="password" name="password" autocomplete="off" placeholder="Password" required>
      </div>

        <button class="form-control" type="submit" name="employeeLoginSubmit" value="Login">Login</button>

    </form>

</div>
<!-- <footer> -->
      <?php include 'footer.php'; ?>
<!-- </footer> -->
</div><!-- end of container-->
    <?php require '../Controller/bootstrapScript.php'; ?>
</body>
</html>
