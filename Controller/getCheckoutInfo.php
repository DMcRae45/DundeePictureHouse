<?php

include '../Model/DPH-api.php';

$prices = GetTicketInfo();
$priceArray = json_decode($prices);

$movieid = $_GET['id'];
$showingType = $_GET['type'];
$showingTime = $_GET['time'];
$showingDateString = $_GET['date'];

$movie = getMovieByID($movieid);
$movieArray = json_decode($movie);

$showing = getShowingInfo($movieid, $showingType, $showingTime, $showingDateString);
$showingArray = json_decode($showing);

$quantityArray = GetTicketQuantities();
$ticketTypesArray = GetTicketTypes();

?>
