<?php
/*
    Description: Action to get all showings for a movie index from the database.

    Author: Brad Mair, David McRae
 */
if(isset($_SESSION['LoggedIn']))
{
$shows = GetShowingsByMovieID($_GET['movieID']);
$showsArray = json_decode($shows);
}
else
{
  header('location: ../View/index.php?error=ACCESS DENIED');
}
?>
