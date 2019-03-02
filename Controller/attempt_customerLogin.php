<?php
/*
    Description: Action for the customer login page.

    Author: David McRae
 */
include '../Model/DPH-api.php';

session_start();

AttemptCustomerLogIn();
header('location: ../View/index.php');
?>
