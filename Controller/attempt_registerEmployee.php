<?php
/*
    Description: Action for the register employee page

    Author: David McRae
*/
if(!isset($_POST["registerEmployeeSubmit"]))
{
  header('Location: ../View/index.php?error=ACCESS DENIED');
}
else
{
  include '../Model/DPH-api.php';

  session_start();

  CreateNewEmployee();
}
?>
