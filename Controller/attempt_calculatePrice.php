<?php
/*
    Description: Action for the dropdown options in the bookingTicket page.

    Author: David McRae
 */
include '../Model/DPH-api.php';

$priceArray = AttemptCalculatePrice();
//header('location: ../View/bookingTicket.php');
?>
