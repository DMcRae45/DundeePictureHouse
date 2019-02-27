<?php
/*
    Description:

    Author: David McRae
 */
Include '../Model/DPH-api.php';

$movies = GetAllMovies();
$movieArray = json_decode($movies) ;
?>
