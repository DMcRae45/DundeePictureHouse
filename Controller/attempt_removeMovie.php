<?php

include '../Model/DPH-api.php';
include '../View/header.php';

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
