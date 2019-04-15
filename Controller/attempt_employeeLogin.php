<?php
/*
    Description: Action for the Employee login page.

    Author: David McRae
 */
if(!isset($_POST["employeeLoginSubmit"]))
{
  header('Location: ../View/index.php?error=ACCESS DENIED');
}
else
{
include '../Model/DPH-api.php';

session_start();

AttemptEmployeeLogIn();
}
?>
