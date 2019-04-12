<?php
/*
    Description: Action to get movie deatails to be maniputated on the desired page

    Author: Brad Mair
 */

$movie = getMovieByID($moiveIndex);
$movieDetails = json_decode($movie);

?>
