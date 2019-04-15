<?php
/*
    Description: The action used to display all employees on screen located in the manage employees file.

    Author: David McRae
 */
if(isset($_SESSION['jobrole']))
{
 include '../Model/DPH-api.php';

 $employees = GetAllEmployees();
 $employeeArray = json_decode($employees) ;
}
else
{
  header('location: ../View/index.php?error=ACCESS DENIED');
}

?>
