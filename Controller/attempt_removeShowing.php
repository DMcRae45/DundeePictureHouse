<?php
/*
    Description: Action for the delete button located in the remove showings file.

    Author: Brad Mair
 */
include '../Model/DPH-api.php';

session_start();

//if (!isset($_SESSION['LoggedIn']) || $_SESSION['Admin_Status'] != 1)
//{
//  header("Location: ../View/index.php");
//}
//else
//{
$showID = $_GET['showingid'];
$movieID = $_GET['movieid'];
AttemptDeleteShowing($showID, $movieID);
//}
?>
