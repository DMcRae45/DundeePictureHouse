<?php
/*
    Description:
    Author: David McRae
 */
Include '../Model/DPH-api.php';

$movieid = $_GET['id'];
$showingDay = date_create(date('y')."-".date('m')."-".date('d'));
//$showingDate = date_format($showingDate,"Y-m-d");

$movie = getMovieByID($movieid);
$movieArray = json_decode($movie);


?>
