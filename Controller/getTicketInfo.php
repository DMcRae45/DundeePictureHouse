<?php
/*
    Description: Action for the dropdown options in the bookingTicket page.

    Author: David McRae
 */
include '../Model/DPH-api.php';

$movieid = $_GET['id'];
$showingType = $_GET['type'];
$showingTime = $_GET['time'];

$movie = getMovieByID($movieid);
$movieArray = json_decode($movie);

$showing = getShowingInfo($movieid, $showingType, $showingTime);
$showingArray = json_decode($showing);

$prices = GetTicketInfo();
$priceArray = json_decode($prices);




//header('location: ../View/bookingTicket.php');
?>
