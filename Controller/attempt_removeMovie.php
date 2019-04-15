<?php
/*
    Description: Action for the delete button located in the remove movies file.

    Author: David McRae
 */
session_start();
$movieid = $_GET['id'];
if(!isset($movieid) && $_SESSION['jobrole'] = "Manager")
{
  header("Location: ../View/index.php");
}
else
{
  include '../Model/DPH-api.php';
  RemoveMovieByID($movieid);
}
?>
