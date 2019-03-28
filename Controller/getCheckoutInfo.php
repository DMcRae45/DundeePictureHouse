<?php

include '../Model/DPH-api.php';
include '../Model/PaypalExpress.php';

$prices = GetTicketInfo();
$priceArray = json_decode($prices);

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

$quantities = GetTicketQuantities();
$quantityArray = json_decode($quantities);
<<<<<<< HEAD

$ticketTypes = GetTicketTypes();
$ticketTypesArray = json_decode($ticketTypes);
=======
>>>>>>> eaec130b46ee53d2f84d25c120626f9716762028

$ticketTypes = GetTicketTypes();
$ticketTypesArray = json_decode($ticketTypes);
?>
