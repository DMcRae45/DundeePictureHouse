<?php
/*
    Description: Action for the button located in the manage employees file.
    Author: David McRae
 */
include '../Model/DPH-api.php';

session_start();

$employeeid = $_GET['id'];
AttemptDeleteEmployee($employeeid);
header('location: ../View/manageEmployees.php');
?>
