<?php

include '../Model/DPH-api.php';
include '../Model/PaypalExpress.php';

$prices = GetTicketInfo();
$priceArray = json_decode($prices);



$showingID = $_GET['showingid'];
$showingDetails = getShowingByID($showingID);
$showingArray = json_decode($showingDetails);

$movie = getMovieByID($showingArray->Movie_ID);
$movieArray = json_decode($movie);




$quantities = GetTicketQuantities();
$quantityArray = json_decode($quantities);

$ticketTypes = GetTicketTypes();
$ticketTypesArray = json_decode($ticketTypes);
?>
