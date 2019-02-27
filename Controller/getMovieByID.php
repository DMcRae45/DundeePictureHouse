<?php
/*
    Description:

    Author: David McRae
 */
Include '../Model/DPH-api.php';

$movieid = $_GET['id'];
$movie = getMovieByID($movieid);
$movieArray = json_decode($movie);

//$comment = getComments($movieid);
//$commentArray = json_decode($comment);
?>
