<?php
/*
    Description: User interface used to manage employees jobroles.

    Author: David McRae
*/
include 'header.php';
include '../Controller/getAllEmployees.php';

//if (!isset($_SESSION['LoggedIn']) || $_SESSION['Admin_Status'] != 1)
//{
//  header("Location: index.php");
//}
//else
//{
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
            <th scope='col'>User ID</th>
            <th scope='col'>First_Name</th>
            <th scope='col'>Last_Name</th>
            <th scope='col'>Username</th>
            <th scope='col'>Job_Role</th>
            <th scope='col'>Promote</th>
            <th scope='col'>Demote Admin</th>
            <th scope='col'>Delete Employee</th>
          </tr>
        </thead>";

        for ($i=0 ; $i < sizeof($employeeArray) ; $i++)
        {
          if($_SESSION['userid'] == $employeeArray[$i]->Employee_ID){
            $disable = "disabled";
          } else{
            $disable = "";
          }
        //echo "<div class='border border-success'>";
        echo "<tr>";
          echo "<td>".$employeeArray[$i]->Employee_ID."</td>";
          echo "<td>".$employeeArray[$i]->First_Name."</td>";
          echo "<td>".$employeeArray[$i]->Surname."</td>";
          echo "<td>".$employeeArray[$i]->Username."</td>";
          echo "<td>".$employeeArray[$i]->Job_Role."</td>";
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
          echo "<td> <a class='btn btn-danger ".$disable."' href='../Controller/attempt_deleteEmployee.php?id=". $employeeArray[$i]->Employee_ID ."'>DELETE</a> </td>";

          echo "<tr>";
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
//}

?>
