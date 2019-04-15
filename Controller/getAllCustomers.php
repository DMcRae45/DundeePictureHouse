<?php
/*
    Description: The action used to display all customers on screen located in the manage customers file.

    Author: Brad Mair, David McRae
*/
if($_SESSION['jobrole'] = "Manager")
{
include '../Model/DPH-api.php';

$customers = GetAllCustomers();
$customerArray = json_decode($customers);
}
else
{
  header("Location:../View/index.php?error=ACCESS DENIED");
}
?>
