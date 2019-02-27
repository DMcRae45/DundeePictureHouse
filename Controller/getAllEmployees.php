<?php
include '../Model/DPH-api.php';

$employees = GetAllEmployees();
$employeeArray = json_decode($employees) ;
?>
