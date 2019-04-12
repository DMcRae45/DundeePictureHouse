<?php
/*
    Description: Action to get all showings for a movie index from the database.

    Author: Brad Mair
 */

$shows = GetShowingsByMovieID($_GET['movieID']);
$showsArray = json_decode($shows);
?>
