<?php
/*
    Description: Action for the button located in the manage customers file.
    Author: Brad Mair
 */
include '../Model/DPH-api.php';

session_start();

$customerid = $_GET['id'];
AttemptDeleteCustomer($customerid);
header('location: ../View/manageCustomers.php');
?>
