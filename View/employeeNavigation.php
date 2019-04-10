<?php
/*
    Description: form used to insert a showing into the database.

    Author: David McRae
*/
include '../Controller/getShowingFormData.php';
include 'header.php';

//if (!isset($_SESSION['LoggedIn']) || $_SESSION['Admin_Status'] != 1)
//{
//  header("Location: index.php");
//}
//else
//{
//echo "
?>
<html>
<head>
<title>DPH - Employee Naviagtion</title>
</head>

<body>

  <div class='page-header text-center mt-4'>
      <h1>Navigation</h1>
  </div>

<div class='container mt-5 mb-5'>
  <!-- Top Row for Movies -->
  <div class='row mt-5'>
    <div class='col-md-6'>
      <a class='btn btn-outline-info btn-block' href='insertMovie.php'>Add Movie</a>
    </div>

    <div class='col-md-6'>
      <a class='btn btn-outline-info btn-block' href='alterMovies.php'>Alter Movie</a>
    </div>
  </div>

  <div class='row mt-5'>
    <div class='col-md-6'>
      <a class='btn btn-outline-info btn-block'href='insertShowing.php'>Add Showing</a>
    </div>

    <div class='col-md-6'>
      <a class='btn btn-outline-info btn-block' href=''>Remove Showings</a>
    </div>
  </div>

  <div class='row mt-5'>
    <div class='col-md-6'>
      <a class='btn btn-outline-info btn-block' href='registerEmployee.php'>Register Employee</a>
    </div>

    <div class='col-md-6'>
      <a class='btn btn-outline-info btn-block' href='manageEmployees.php'>Manage Employees</a>
    </div>
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
