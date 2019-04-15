<?php
/*
    Description: Action for the customer login page.

    Author: David McRae
 */

if(!isset($_POST["customerLoginSubmit"]))
{
  header('Location: ../View/index.php?error=ACCESS DENIED');
}
else
{
 include '../Model/DPH-api.php';

 session_start();

 AttemptCustomerLogIn();
}
?>
