<?php
/*
    Description: ACtion for the demote button located in the manage employees file

    Author: David McRae
 */
include '../Model/DPH-api.php';

session_start();

$employeeid = $_GET['id'];

if(isset($employeeid) && $_SESSION['Admin_Status'] == "manager")
{
  AttemptDemoteEmployeeByID($employeeid);
}
else
{
  header("Location: ../View/index.php");
}
?>
