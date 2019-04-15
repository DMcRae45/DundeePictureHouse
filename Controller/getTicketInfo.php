<?php
/*
    Description: Action for the dropdown options in the bookingTicket page.

    Author: David McRae
*/
$showingID = $_GET['showingid'];
if(isset($showingID) && isset($_SESSION['LoggedIn']))
{
include '../Model/DPH-api.php';

$showingDetails = getShowingByID($showingID);
$showingArray = json_decode($showingDetails);

$movie = getMovieByID($showingArray->Movie_ID);
$movieArray = json_decode($movie);

$prices = GetTicketInfo();
$priceArray = json_decode($prices);
}
else
{
  header('location: ../View/index.php?error=ACCESS DENIED');
}
?>
