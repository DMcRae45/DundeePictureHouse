<?php
/*
    Description: Action for the Employee login page.

    Author: David McRae
 */
session_start();

if(!isset($_POST["employeeLoginSubmit"]))
{
  header('Location: ../View/index.php?error=ACCESS DENIED');
}
else
{
include '../Model/DPH-api.php';

AttemptEmployeeLogIn();
}
?>
