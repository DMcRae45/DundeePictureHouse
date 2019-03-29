<?php
/*
    Description: form used to register a new customer to the website.

    Author: David McRae
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

<!-- Container for the Form -->
    <div class="container">

      <div class="page-header">
          <h1 class="text-center mt-4">Register for an account</h1>
      </div>

<!-- Form -->
        <form class="form-group needs-validation" action="../Controller/attempt_registerCustomer.php" method="POST" novalidate>

          <!-- TOP ROW for the form is firtname and last name -->
            <div class="form-row">
                <div class="col-md-6 form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text mt-4" id="inputGroupPrepend">First Name</span>
                  </div>
                    <input class="form-control mt-4" type="text" id="firstName" name="firstName" placeholder="Firstname" required>
                      <div class="invalid-feedback">
                        You cannot Leave This field Empty.
                      </div>
                  <div class="input-group-append">
                      <span class="input-group-text mt-4" id="inputGroupAppend" name="appendFirstName"></span>
                  </div>
                </div>

                <div class="col-md-6 form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text mt-4" id="inputGroupPrepend">Surname</span>
                  </div>
                    <input class="form-control mt-4" type="text" id="surname" name="surname" placeholder="Lastname" required>
                      <div class="invalid-feedback">
                        You cannot Leave This field Empty.
                      </div>
                  <div class="input-group-append">
                      <span class="input-group-text mt-4" id="inputGroupAppend" name="appendSurname"></span>
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
              <div class="input-group-append">
                  <span class="input-group-text" id="inputGroupAppend" name="appendEmail"></span>
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
              <div class="input-group-append">
                  <span class="input-group-text" id="inputGroupAppend" name="appendUsername"></span>
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
              <div class="input-group-append">
                  <span class="input-group-text" id="inputGroupAppend" name="appendPassword"></span>
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
              <div class="input-group-append">
                  <span class="input-group-text" id="inputGroupAppend" name="appendPasswordConfirm"></span>
              </div>
              </div>

              <div class="form-group form-check input-group">
              <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>

              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend"><a href="TermsAndConditions.php" class="badge badge-info">Terms & Conditions</a></span>
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
