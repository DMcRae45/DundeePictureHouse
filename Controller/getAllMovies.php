<?php
/*
    Description: Action to get all movies from the database.

    Author: David McRae
 */


Include '../Model/DPH-api.php';

$movies = GetAllMovies();
$movieArray = json_decode($movies);
?>
