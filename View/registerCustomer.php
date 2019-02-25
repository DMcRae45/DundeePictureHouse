<?php
include '../Model/DPH-api.php';
/*

    Description:

    Author: David McRae, Aaron Hay
*/
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

<!-- contains the visible web page-->

  <div class="page-header ">
      <h1>Register Account</h1>
  </div>

<!-- Container for the Form -->
    <div class="container">

<!-- Form -->
        <form class="form-group needs-validation" action="../Controller/attempt_registerCustomer.php" method="POST" novalidate>

          <!-- TOP ROW for the form is firtname and last name -->
            <div class="form-row">
                <div class="col-md-6 form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">First Name</span>
                  </div>

                    <input class="form-control" type="text" id="firstName" name="firstName" placeholder="Firstname" required>
                      <div class="invalid-feedback">
                        You cannot Leave This field Empty.
                      </div>
                  </div>
                <div class="col-md-6 form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">Surname</span>
                  </div>
                    <input class="form-control" type="text" id="surname" name="surname" placeholder="Lastname" required>
                      <div class="invalid-feedback">
                        You cannot Leave This field Empty.
                      </div>
                  </div>
            </div>
            <!-- END TOP ROW -->

            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">Email</span>
              </div>
                <input class="form-control" type="email" id="email" name="email" placeholder="Email" required>
                  <div class="invalid-feedback">
                    You cannot Leave This field Empty.
                  </div>
              </div>
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
                <input class="form-control" type="password" id="password" name="password" placeholder="Password" required>
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

              <div class="form-group form-check input-group">
              <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>

              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend"><a href="TermsAndConditions.php" class="badge badge-secondary">Terms & Conditions</a></span>
              </div>
              <div class="invalid-feedback">
                You Must accept the terms and condition to register for an account.
              </div>
            </div>

            <button class="form-control" type="submit" name="registerCustomerSubmit">Register</button>
        </form>
<!-- End Form -->
    </div>
<!-- End Form Container -->

<!-- <footer> -->
<?php
  include 'footer.php';
?>
<!-- </footer> -->

<!-- javascript -->
<?php
require '../Controller/bootstrapScript.php';
require '../Controller/ValidateEmptyFields.js';
?>
</body>
</html>
