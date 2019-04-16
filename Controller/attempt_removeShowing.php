<?php
/*
    Description: Action for the delete button located in the remove showings file.

    Author: Brad Mair
 */
include '../Model/DPH-api.php';

session_start();
$showID = $_GET['showingid'];
$movieID = $_GET['movieid'];
if (isset($showID) && isset($movieID) && $_SESSION['jobrole'] == "manager")
{
  AttemptDeleteShowing($showID, $movieID);
}
else
{
  header("Location: ../View/index.php");
}
?>
