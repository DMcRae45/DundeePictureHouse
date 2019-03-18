<?php
/*
    Description:
    Author: David McRae
 */
Include '../Model/DPH-api.php';

$movieid = $_GET['id'];

$movie = getMovieByID($movieid);
$movieArray = json_decode($movie);

$twoDMovie = GetTwoDShowings($movieid);
$twoDMovieArray = json_decode($twoDMovie);

$threeDMovie = GetThreeDShowings($movieid);
$threeDMovieArray = json_decode($threeDMovie);
?>
