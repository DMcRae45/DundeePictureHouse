<?php
/*
    Description: Action to edit movie details on the database via a form on the site.

    Author: Brad Mair
 */
include '../Model/DPH-api.php';

session_start();

AttemptUpdateMovie();

header('location: ../View/alterMovies.php');
?>
