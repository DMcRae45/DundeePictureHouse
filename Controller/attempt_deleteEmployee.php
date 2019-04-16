<?php
/*
    Description: Action for the button located in the manage employees file.
    Author: David McRae
 */
session_start();
$employeeid = $_GET['id'];
if(isset($employeeid) && $_SESSION['jobrole'] == "manager")
{
  include '../Model/DPH-api.php';

  AttemptDeleteEmployee($employeeid);
}
else
{
  header('location: ../View/index.php?error=ACCESS DENIED');
}
?>
