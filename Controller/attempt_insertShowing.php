<?php
/*
    Description: Action to get all movies from the database.

    Author: David McRae
 */
Include '../Model/DPH-api.php';

session_start();

$movies = GetAllMovies();
$movieArray = json_decode($movies);

$screens = GetAllScreens();
$screenArray = json_decode($screens);

AttemptInsertShowing();
?>
