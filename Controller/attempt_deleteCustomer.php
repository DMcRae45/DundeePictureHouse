<?php
/*
    Description: Action for the button located in the manage customers file.
    Author: Brad Mair, Daid McRae
 */
session_start();

$customerid = $_GET['id'];
if(isset($customerid) && $_SESSION['jobrole'] == "manager")
{
  include '../Model/DPH-api.php';

  AttemptDeleteCustomer($customerid);
}
else
{
  header('location: ../View/index.php?error=ACCESS DENIED');
}
?>
