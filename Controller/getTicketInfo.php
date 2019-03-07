<?php
/*
    Description: Action for the dropdown options in the bookingTicket page.

    Author: David McRae
 */
include '../Model/DPH-api.php';

$prices = GetTicketInfo();
$priceArray = json_decode($prices);
//header('location: ../View/bookingTicket.php');
?>
