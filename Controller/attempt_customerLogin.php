<?php
/*
    Description: Action for the customer login page.

    Author: David McRae
 */
session_start();

if(!isset($_POST["customerLoginSubmit"]))
{
  header('Location: ../View/index.php?error=ACCESS DENIED');
}
else
{
 include '../Model/DPH-api.php';

 AttemptCustomerLogIn();
}
?>
