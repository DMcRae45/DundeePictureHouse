<?php
/*
    Description: Action to edit movie details on the database via a form on the site.

    Author: Brad Mair
 */

if(!isset($_POST['updateMovieSubmit']))
{
  header('Location: ../View/index.php?error=ACCESS DENIED');
}
else
{
  include '../Model/DPH-api.php';

  session_start();

  AttemptUpdateMovie();
}
?>
