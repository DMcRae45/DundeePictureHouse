<?php
/*
    Description: Action for the register customer page.

    Author: David McRae
 */

include '../Model/DPH-api.php';

session_start();

CreateNewCustomer();
header('location: ../View/index.php');
?>
