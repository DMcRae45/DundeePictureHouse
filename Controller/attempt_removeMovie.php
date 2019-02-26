<?php

include '../Model/bungieNews-api.php';
include '../View/header.php';

if (!isset($_SESSION['LoggedIn']) || $_SESSION['Admin_Status'] != 1)
{
  header("Location: ../View/index.php");
}
else
{
$articleid = $_GET['id'];
RemoveArticleByID($articleid);
header('location: ../View/removeArticle.php');
}
?>
