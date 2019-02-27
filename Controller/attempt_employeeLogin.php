<?php
/*

    Description:

    Author: David McRae
    Date: 11-Oct-2018

 */
include '../Model/DPH-api.php';

session_start();

AttemptEmployeeLogIn();
header('location: ../View/indexEmployee.php');
?>
