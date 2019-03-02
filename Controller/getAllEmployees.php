<?php
/*
    Description: The action used to display all employees on screen located in the manage employees file.

    Author: David McRae
 */
include '../Model/DPH-api.php';

$employees = GetAllEmployees();
$employeeArray = json_decode($employees) ;
?>
