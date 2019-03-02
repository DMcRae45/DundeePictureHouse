<?php
/*
    Description: ACtion for the demote button located in the manage employees file

    Author: David McRae
 */
include '../Model/DPH-api.php';

session_start();


//if (!isset($_SESSION['LoggedIn']) || $_SESSION['Admin_Status'] != 1)
//{
//  header("Location: ../View/index.php");
//}
//else
//{
$employeeid = $_GET['id'];
AttemptDemoteEmployeeByID($employeeid);
header('location: ../View/manageEmployees.php');
//}
?>
