<?php
/*
    Description: Action for the Employee login page.

    Author: David McRae
 */
include '../Model/DPH-api.php';

session_start();

$returnURL = (isset($_GET['returnURL'])) ? $_GET['returnURL'] : FALSE;
  if ($returnURL)
  {
    AttemptEmployeeLogIn();
    header('location: '.$returnURL);
  }
  else
  {
    AttemptEmployeeLogIn();
    header('location: ../View/index.php');
  }
?>
