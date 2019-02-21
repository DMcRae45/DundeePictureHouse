<?php
include '../Model/DPH-api.php';
/*

    Description:

    Author: David McRae, Aaron Hay
    Date: 01-Oct-2018

*/
?>
<!DOCTYPE html>
<html>
<!-- <head> -->
<?php
    include 'header.php';
?>
<!-- </head> -->

<body>

<!-- contains the visible web page-->
<div class="container">

  <div class="page-header">
      <h1> Register page </h1>
  </div>

<!-- Container for the Form -->
    <div class="container">

<!-- Form -->
        <form class="form-group" action="../Controller/attempt_registerCustomer.php" method="POST">

          <!-- TOP ROW for the form is firtname and last name -->
            <div class="form-row">
                <div class="col-md-6 form-group">
                    <input class="form-control" type="text" id="firstName" name="firstName" placeholder="Firstname">
                </div>
                <div class="col-md-6 form-group">
                    <input class="form-control" type="text" id="surname" name="surname" placeholder="Lastname">
                </div>
            </div>
            <!-- END TOP ROW -->

            <div class="form-group">
                <input class="form-control" type="text" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" id="username" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" id="password" name="password" placeholder="Password">
            </div>

            <button class="form-control" type="submit" name="registerSubmit">Register</button>
        </form>
<!-- End Form -->

    </div>
<!-- End Form Container -->

<!-- </footer> -->
    <?php include 'footer.php'; ?>
<!-- </footer> -->
</div>

<!-- javascript -->
    <?php require '../Controller/bootstrapScript.php'; ?>
</body>
</html>
