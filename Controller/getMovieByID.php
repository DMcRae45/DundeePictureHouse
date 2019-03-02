<?php
/*
    Description: Action to display a single movie record on its own page locate in the Movie file.

    Author: David McRae
 */
Include '../Model/DPH-api.php';

$movieid = $_GET['id'];
$movie = getMovieByID($movieid);
$movieArray = json_decode($movie);

//$comment = getComments($movieid);
//$commentArray = json_decode($comment);
?>
