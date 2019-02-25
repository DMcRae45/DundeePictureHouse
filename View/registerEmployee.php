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
      <h1> Register Employee page </h1>
  </div>

<!-- Container for the Form -->
    <div class="container">

<!-- Form -->
        <form class="form-group needs-validation" action="../Controller/attempt_registerEmployee.php" method="POST" novalidate>

          <!-- TOP ROW for the form is firtname and last name -->
            <div class="form-row">
                <div class="col-md-6 mb-3 form-group">
                    <input class="form-control" type="text" id="validationTooltip" name="firstName" placeholder="Firstname" required>
                    <div class="invalid-feedback">
                      You cannot Leave This field Empty.
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <input class="form-control" type="text" name="surname" placeholder="Lastname" required>
                    <div class="invalid-feedback">
                      You cannot Leave This field Empty.
                    </div>
                  </div>
            </div>
            <!-- END TOP ROW -->

            <div class="form-group">
              <select class="custom-select" name="jobrole" required>
                <option value="">Select the Job Role</option>
                <option value="employee">Employee</option>
                <option value="supervisor">Supervisor</option>
                <option value="manager">Manager</option>
              </select>
              <div class="invalid-feedback">Please Select a Jobe Role</div>
            </div>

            <div class="form-group">
                <input class="form-control" type="text" name="username" placeholder="Username" required>
                <div class="invalid-feedback">
                  You cannot Leave This field Empty.
                </div>
              </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password" required>
                <div class="invalid-feedback">
                  You cannot Leave This field Empty.
                </div>
              </div>

            <button class="form-control" type="submit" name="registerEmployeeSubmit">Register</button>
        </form>
<!-- End Form -->

    </div>
<!-- End Form Container -->

<!-- </footer> -->
    <?php include 'footer.php'; ?>
<!-- </footer> -->
</div>

<!-- javascript -->
<?php
require '../Controller/bootstrapScript.php';
require '../Controller/ValidateEmptyFields.js';
?>
</body>
</html>
