<?php
/*
    Description: Action for the register employee page

    Author: David McRae
 */
include '../Model/DPH-api.php';

session_start();

CreateNewEmployee();
header('location: ../View/index.php');
?>
