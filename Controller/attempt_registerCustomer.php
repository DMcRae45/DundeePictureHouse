<?php
/*
    Description: Action for the register customer page.

    Author: David McRae
*/
if(!isset($_POST["registerCustomerSubmit"]))
{
  header('Location: ../View/index.php?error=ACCESS DENIED');
}
else
{
  include '../Model/DPH-api.php';

  session_start();

  CreateNewCustomer();
}
?>
