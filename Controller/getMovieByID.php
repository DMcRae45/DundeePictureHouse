<?php
/*
    Description: Action to display a single movie record on its own page locate in the Movie file.

    Author: David McRae
 */
session_start();
$movieid = $_GET['id'];
if(!isset($movieid))
{
  header('location: ../View/index.php?error=ACCESS DENIED');
}
else
{
  Include '../Model/DPH-api.php';

  $movie = getMovieByID($movieid);
  $movieArray = json_decode($movie);
}
?>
