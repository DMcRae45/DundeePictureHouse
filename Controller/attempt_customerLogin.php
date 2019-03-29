<?php
/*
    Description: Action for the customer login page.

    Author: David McRae
 */
include '../Model/DPH-api.php';

session_start();

$returnURL = (isset($_GET['returnURL'])) ? $_GET['returnURL'] : FALSE;
  if ($returnURL)
  {
    AttemptCustomerLogIn();
    header('location: '.$returnURL);
  }
  else
  {
    AttemptCustomerLogIn();
    header('location: ../View/index.php');
  }
?>
