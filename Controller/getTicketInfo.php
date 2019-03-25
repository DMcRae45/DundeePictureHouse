<?php
/*
    Description: Action for the dropdown options in the bookingTicket page.

    Author: David McRae
 */
include '../Model/DPH-api.php';

// $movieid = $_GET['id'];
// $showingType = $_GET['type'];
// $showingTime = $_GET['time'];
// $showingDateString = $_GET['date'];

$showingID = $_GET['showingid'];

$showingDetails = getShowingByID($showingID);
$showingArray = json_decode($showingDetails);

$movie = getMovieByID($showingArray->Movie_ID);
$movieArray = json_decode($movie);

// $showing = getShowingInfo($movieid, $showingType, $showingTime, $showingDateString);
// $showingArray = json_decode($showing);

$prices = GetTicketInfo();
$priceArray = json_decode($prices);

//header('location: ../View/bookingTicket.php');
?>
