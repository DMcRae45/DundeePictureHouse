<?php
/*
    Description: The action used to display all customers on screen located in the manage customers file.

    Author: Brad Mair
 */
include '../Model/DPH-api.php';

$customers = GetAllCustomers();
$customerArray = json_decode($customers) ;
?>
