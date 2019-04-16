<?php
/*

    Description: form used to register a new employee into the database.

    Author: David McRae, Aaron Hay
    Date: 01-Oct-2018

*/
include 'session.php';

if(!isset($_SESSION['jobrole']))
{
  // Customer has tried to access this page
  header("Location: index.php?error=ACCESS DENIED");
}
elseif($_SESSION['jobrole'] == "manager")
{
?>
<!DOCTYPE html>
<html>
<!-- <head> -->
<?php
    include 'header.php';
?>
<!-- </head> -->
<title>DPH - Registration</title>
<body>

<!-- Container for the Form -->
    <div class="container">

      <div class="page-header">
        <br>
        <img src="images/register.png" class="mx-auto d-block">
          <h1 class="text-center mt-4">Register Employee page</h1>
      </div>

      <?php
      //Error Reporting for the users
      if(isset($_GET['error']))
      {
        $error = $_GET['error'];
        $error = str_replace(":","</br>", $error);
        echo $error;
      }
      ?>
<!-- Form -->
        <form class="form-group needs-validation" action="../Controller/attempt_registerEmployee.php" method="POST" novalidate>

          <!-- TOP ROW for the form is firtname and last name -->
            <div class="form-row">
                <div class="col-md-6 mb-3 form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">Firstname</span>
                  </div>
                    <input class="form-control" type="text" id="validationTooltip" name="firstName" placeholder="Firstname" required>
                    <div class="invalid-feedback">
                      You cannot Leave This field Empty.
                    </div>
                </div>
                <div class="col-md-6 form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">Surname</span>
                  </div>
                    <input class="form-control" type="text" name="surname" placeholder="Lastname" required>
                    <div class="invalid-feedback">
                      You cannot Leave This field Empty.
                    </div>
                  </div>
            </div>
            <!-- END TOP ROW -->

            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">Job Role</span>
              </div>
              <select class="custom-select" name="jobrole" required>
                <option value="">Select the Job Role</option>
                <option value="employee">Employee</option>
                <option value="supervisor">Supervisor</option>
                <option value="manager">Manager</option>
              </select>
              <div class="invalid-feedback">Please Select a Jobe Role</div>
            </div>

            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">Username</span>
              </div>
                <input class="form-control" type="text" name="username" placeholder="Username" required>
                <div class="invalid-feedback">
                  You cannot Leave This field Empty.
                </div>
              </div>
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">Password</span>
              </div>
                <input class="form-control" type="password" name="password" placeholder="Password" required>
                <div class="invalid-feedback">
                  You cannot Leave This field Empty.
                </div>
              </div>

              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend">Password Confirmation</span>
                </div>
                  <input class="form-control" type="password" id="passwordConfirm" name="passwordConfirm" placeholder="Password Confirmation" required>
                    <div class="invalid-feedback">
                      You cannot Leave This field Empty.
                    </div>
                </div>

            <button class="form-control" type="submit" name="registerEmployeeSubmit">Register</button>
        </form>
<!-- End Form -->

    </div>
  </div>
<!-- End Form Container -->

<!-- </footer> -->
    <?php include 'footer.php'; ?>
<!-- </footer> -->

<!-- javascript -->
<?php
require '../Controller/bootstrapScript.php';
require '../Controller/ValidateEmptyFields.js';
echo "
</body>
</html>
";
}
else
{
  // Employee is not manager
  header("Location: index.php?error=ACCESS DENIED");
}
?>
