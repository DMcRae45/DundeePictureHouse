<?php
/*
    Description: Action for the Employee login page.

    Author: David McRae
 */
include '../Model/DPH-api.php';

session_start();

AttemptEmployeeLogIn();
header('location: ../View/index.php');
?>
