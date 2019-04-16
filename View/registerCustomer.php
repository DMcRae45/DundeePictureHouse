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
include 'session.php';
    include 'header.php';
?>
<!-- </head> -->
<title>DPH - Registration</title>
<body>

<!-- contains the visible web page-->

<!-- Container for the Form -->
    <div class="container">

      <div class="page-header">
        <br>
        <img src="images/register.png" class="mx-auto d-block">
          <h1 class="text-center mt-4">Register for an account</h1>
      </div>


<?php
if(isset($_GET['error']))
{
  $error = $_GET['error'];
  $error = str_replace(":","</br>", $error);
  echo $error;
}
?>
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
                </div>

                <div class="col-md-6 form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text mt-4" id="inputGroupPrepend">Surname</span>
                  </div>
                    <input class="form-control mt-4" type="text" id="surname" name="surname" placeholder="Lastname" required>
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
                    You cannot Leave This field Empty and it must be a valid Email.
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

            <div class="form-group input-group">
              <div class="input-group-prepend">
              <a href="TermsAndConditions.php" class="btn input-group-text btn-outline-info">Terms & Conditions</a>
              </div>
              <div class="input-group-text">
                <input type="checkbox" value="" id="invalidCheck" required>
              </div>
              <div class="invalid-feedback">
                You Must accept the terms and condition to register for an account.
              </div>
            </div>
            <button class="form-control" type="submit" name="registerCustomerSubmit">Register</button>
        </form>
<!-- End Form -->
      <p>Already have an account? Sign in <a href="customerLogin.php">here!</a></p>
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
