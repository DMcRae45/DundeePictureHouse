<?php
/*
    Description: Employee navigation to maintain the Cinema booking system

    Author: David McRae
*/

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
  <!-- Manager Access Required -->
  <div class='row mt-5'>
    <div class='col-md-6'>
      <a class='btn btn-outline-info btn-block' href='insertMovie.php'>Add Movie</a>
    </div>

    <!-- Supervisor Access Required -->
    <div class='col-md-6'>
      <a class='btn btn-outline-info btn-block' href='alterMovies.php'>Alter Movie</a>
    </div>
  </div>

  <div class='row mt-5'>
    <!-- Manager Access Required -->
    <div class='col-md-6'>
      <a class='btn btn-outline-info btn-block'href='insertShowing.php'>Add Showing</a>
    </div>

    <!-- Supervisor Access Required -->
    <div class='col-md-6'>
      <a class='btn btn-outline-info btn-block' href=''>Remove Showings</a>
    </div>
  </div>

  <div class='row mt-5'>
    <!-- Manager Access Required -->
    <div class='col-md-6'>
      <a class='btn btn-outline-info btn-block' href='registerEmployee.php'>Register Employee</a>
    </div>

    <!-- Manager Access Required -->
    <div class='col-md-6'>
      <a class='btn btn-outline-info btn-block' href='manageEmployees.php'>Manage Employees</a>
    </div>
  </div>

  <div class='row mt-5'>
    <!-- Employee Access Required -->
    <div class='col-md-6'>
      <a class='btn btn-outline-info btn-block' href='findCustomerTicket.php'>Find Customer Tickets</a>
    </div>

    <!-- Employee Access Required -->
    <div class='col-md-6'>
      <a class='btn btn-outline-info btn-block' href='bookCustomerTicket.php'>Book Customer Tickets</a>
    </div>
  </div>

</div>


<!-- <footer> -->
<?php include 'footer.php'; ?>
<!-- </footer> -->
<!-- <Script> -->
<?php
include '../Controller/bootstrapScript.php';
?>
<!-- </Script> -->

</body>
</html>
