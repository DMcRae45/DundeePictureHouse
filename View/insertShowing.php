<?php
/*
    Description: form used to insert a showing into the database.

    Author: David McRae
*/

include 'session.php';
if (isset($_SESSION['jobrole']) && $_SESSION['jobrole'] == "manager")
{
  include '../Controller/getShowingFormData.php';
  include 'header.php';
?>
<html>
<head>
<title>DPH - Insert Showing</title>
</head>

<body>
  <div class='container'>
    <div class='page-header'>
        <h1>Insert Page</h1>
    </div>

    <div class='container'>

        <form class='form-group needs-validation' method='POST' action='../Controller/attempt_insertShowing.php' enctype='multipart/form-data' novalidate>


          <div class='form-group input-group' form-group-lg>
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupPrepend">Showing Time</span>
            </div>
              <input class='form-control' type='time' name='showingTime' placeholder='Showing Date' required>
          </div>

            <div class='form-group input-group' form-group-lg>
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">Showing Date</span>
              </div>
                <input class='form-control' type='date' name='showingDate' placeholder='Showing Date' required>
            </div>

            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">Movie Showing</span>
              </div>
              <select class="custom-select" name="movieid" required>
                <option value="">Please select a Movie to show</option>
                <?php
                for ($i=0 ; $i < sizeof($movieArray) ; $i++)
                {
                  echo '<option value="'.$movieArray[$i]->Movie_ID.'">'.$movieArray[$i]->Title.'</option>';
                }
                ?>
              </select>
              <div class="invalid-feedback">Please Select a Movie to show</div>
            </div>

            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">Screen</span>
              </div>
              <select class="custom-select" name="screenid" required>
                <option value="">Please select a screen to show the movie</option>
                <?php
                for ($i=0 ; $i < sizeof($screenArray) ; $i++)
                {
                  echo '<option value="'.$screenArray[$i]->Screen_ID.'">Screen: '.$screenArray[$i]->Screen_ID.'</option>';
                }
                ?>
              </select>
              <div class="invalid-feedback">Please Select a Screen to show the ovie</div>
            </div>

            <div class="form-group form-check input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">3D</span>
              </div>
            <input class="form-check-input" type="checkbox" name="threeD" value="" id="invalidCheck">
          </div>

            <button class='form-control' type='submit' name='insertShowingSubmit'>Insert Movie</button>
        </form>
    </div>
</div>


<!-- <footer> -->
<?php include 'footer.php'; ?>
<!-- </footer> -->
<!-- <Script> -->
<?php
include '../Controller/bootstrapScript.php';
require '../Controller/ValidateEmptyFields.js';
?>
<!-- </Script> -->

</body>
</html>
<?php
}
else
{
  header("Location: index.php?error=ACCESS DENIED");
}
?>
