<?php
/*
    Description: Action for the dropdown options in the bookingTicket page.

    Author: David McRae
 */
include '../Model/DPH-api.php';

$prices = GetTicketInfo();
$priceArray = json_decode($prices);

$movieid = $_GET['id'];
$movie = getMovieByID($movieid);
$movieArray = json_decode($movie);
//header('location: ../View/bookingTicket.php');
?>
