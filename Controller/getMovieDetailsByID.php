<?php
/*
    Description: Action to get movie deatails for by be maniputated on the desired page page

    Author: Brad Mair
 */

$movie = getMovieByID($moiveIndex);
$movieDetails = json_decode($movie);

?>
