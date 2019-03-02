<?php
/*
    Description: Action for the delete button located in the remove movies file.

    Author: David McRae
 */
include '../Model/DPH-api.php';

session_start();


//if (!isset($_SESSION['LoggedIn']) || $_SESSION['Admin_Status'] != 1)
//{
//  header("Location: ../View/index.php");
//}
//else
//{
$movieid = $_GET['id'];
RemoveMovieByID($movieid);
header('location: ../View/removeMovie.php');
//}
?>
