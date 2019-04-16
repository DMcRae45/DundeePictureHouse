<?php
/*
    Description: User interface used to manage employees jobroles.

    Author: David McRae
*/

include 'session.php';
if(isset($_SESSION['jobrole']) && $_SESSION['jobrole'] == "manager")
{
  include 'header.php';
  include '../Controller/getAllEmployees.php';
echo "
<html>
<head>
<title>DPH - Employee Managment</title>
</head>

<body>
  <div class='container'>
    <div class='page-header'>
        <h1>Manage Users</h1>
    </div>
    ";

    echo "
    <table class='table border border-dark text-center'>
      <thead class='thead-dark'>
          <tr>
            <th scope='col'>ID</th>
            <th scope='col'>Name</th>
            <th scope='col'>Username</th>
            <th scope='col'>Job Role</th>
            <th scope='col'>Promote</th>
            <th scope='col'>Demote</th>
            <th scope='col'>Delete</th>
          </tr>
        </thead>";

        for ($i=0 ; $i < sizeof($employeeArray) ; $i++)
        {
          if($_SESSION['userid'] == $employeeArray[$i]->Employee_ID)
          {
            $disable = "disabled";
          }
          else
          {
            $disable = "";
          }
        //echo "<div class='border border-success'>";
        echo "<tr>";
          echo "<td>".$employeeArray[$i]->Employee_ID."</td>";
          echo "<td>".$employeeArray[$i]->First_Name." ".$employeeArray[$i]->Surname."</td>";
          echo "<td>".$employeeArray[$i]->Username."</td>";
          echo "<td>".ucwords($employeeArray[$i]->Job_Role)."</td>";
          if($employeeArray[$i]->Job_Role == "manager")
          {
            echo "<td> <button class='btn btn-secondary ".$disable."' href=''>PROMOTE</button> </td>";
          }
          else
          {
            echo "<td> <a class='btn btn-success ".$disable."' href='../Controller/attempt_promoteEmployee.php?id=". $employeeArray[$i]->Employee_ID ."'>PROMOTE</a> </td>";
          }


          if($employeeArray[$i]->Job_Role == "employee")
          {
            echo "<td> <button class='btn btn-secondary ".$disable."' href=''>DEMOTE</button> </td>";
          }
          else
          {
            echo "<td> <a class='btn btn-danger ".$disable."' href='../Controller/attempt_demoteEmployee.php?id=". $employeeArray[$i]->Employee_ID ."'>DEMOTE</a> </td>";
          }
          echo "<td> <a class='btn btn-danger text-light ".$disable."' data-toggle='modal' data-target='#delete".$employeeArray[$i]->Employee_ID."Modal'>DELETE</a> </td>";
          echo "<tr>";

          echo "<div class='modal fade' id='delete".$employeeArray[$i]->Employee_ID."Modal' tabindex='-1' role='dialog' aria-labelledby='deleteModalLabel' aria-hidden='true'>
                  <div class='modal-dialog' role='document'>
                    <div class='modal-content bg-dark'>
                      <div class='modal-header'>
                        <h5 class='modal-title' id='deleteModalLabel'>Are You Sure?</h5>
                        <button type='button' class='close btn btn-dark' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                      </div>
                      <div class='modal-body'>
                        <p>Are you sure you want to delete ".$employeeArray[$i]->First_Name." ".$employeeArray[$i]->Surname."?<p>
                      </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-outline-warning' data-dismiss='modal'>No!</button>
                        <a class='btn btn-outline-danger' role='button' href='../Controller/attempt_deleteEmployee.php?id=".$employeeArray[$i]->Employee_ID."'>DELETE</a>
                      </div>
                    </div>
                  </div>
                </div>";
        }
        echo "</table>";
echo "
    </div>
";
// <footer>
  include 'footer.php';
// </footer>
// <Script>
  include '../Controller/bootstrapScript.php';
// </Script>
echo "
</body>
</html>
";
}
else
{
  header("Location: index.php?error=ACCESS DENIED");
}

?>
