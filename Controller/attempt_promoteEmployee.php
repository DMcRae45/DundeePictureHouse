<?php
/*
    Description: Action for the promote user button located on the manage employees screen

    Author: David McRae
 */
include '../Model/DPH-api.php';

session_start();

$employeeid = $_GET['id'];

if (isset($employeeid) && $_SESSION['jobrole'] == "manager")
{
  AttemptPromoteEmployeeByID($employeeid);
}
else
{
  header("Location: ../View/index.php");
}
?>
