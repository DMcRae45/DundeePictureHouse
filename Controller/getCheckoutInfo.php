<?php

$showingID = $_GET['showingid'];
if(isset($showingID) && isset($_SESSION['LoggedIn']))
{
include '../Model/DPH-api.php';
include '../Model/PaypalExpress.php';

$prices = GetTicketInfo();
$priceArray = json_decode($prices);

$showingDetails = getShowingByID($showingID);
$showingArray = json_decode($showingDetails);

$movie = getMovieByID($showingArray->Movie_ID);
$movieArray = json_decode($movie);

$quantities = GetTicketQuantities();
$quantityArray = json_decode($quantities);

$ticketTypes = GetSeatingTypes();
$seatingTypesArray = json_decode($ticketTypes);
}
else
{
  header('location: ../View/index.php?error=ACCESS DENIED');
}
?>
