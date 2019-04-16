<?php
/*
    Description: Employee navigation to maintain the Cinema booking system

    Author: David McRae
*/
include 'session.php';
include 'header.php';

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
  <div class='row'>
    <div class='col-md-6 mt-5'>
      <a class='btn btn-outline-info btn-block' href='insertMovie.php'>Add Movie</a>
    </div>

    <!-- Supervisor Access Required -->
    <div class='col-md-6 mt-5'>
      <a class='btn btn-outline-info btn-block' href='alterMovies.php'>Alter Movie</a>
    </div>
  </div>

  <div class='row'>
    <!-- Manager Access Required -->
    <div class='col-md-6 mt-5'>
      <a class='btn btn-outline-info btn-block'href='insertShowing.php'>Add Showing</a>
    </div>

    <!-- Manager Access Required -->
    <div class='col-md-6 mt-5'>
      <a class='btn btn-outline-info btn-block' href='removeShowings.php'>Remove Showings</a>
    </div>
  </div>

  <div class='row'>
    <!-- Manager Access Required -->
    <div class='col-md-6 mt-5'>
      <a class='btn btn-outline-info btn-block' href='registerEmployee.php'>Register Employee</a>
    </div>

    <!-- Manager Access Required -->
    <div class='col-md-6 mt-5'>
      <a class='btn btn-outline-info btn-block' href='manageEmployees.php'>Manage Employees</a>
    </div>
  </div>

  <div class='row'>
    <!-- Employee Access Required -->
    <div class='col-md-6 mt-5'>
      <a class='btn btn-outline-info btn-block' href='registerCustomer.php'>Register Customers</a>
    </div>

    <!-- Employee Access Required -->
    <div class='col-md-6 mt-5'>
      <a class='btn btn-outline-info btn-block' href='manageCustomers.php'>Manage Customers</a>
    </div>
  </div>

  <div class='row'>
    <!-- Employee Access Required -->
    <div class='col-md-6 mt-5'>
      <a class='btn btn-outline-info btn-block' href='findCustomerTicket.php'>Find Customer Tickets</a>
    </div>

    <!-- Employee Access Required -->
    <div class='col-md-6 mt-5'>
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
