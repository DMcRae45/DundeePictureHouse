<?php
/*
    Description: Dundee Picture House Header to be imported on every page.

    Author: David McRae, Aaron Hay
*/

// FORCE ERRORS TO SHOW
// ini_set ('display errors',1);
// ini_set('display_startup_errors',1);
// error_reporting(E_ALL);

date_default_timezone_set("Europe/London");
if(session_status() == PHP_SESSION_NONE)
{
session_start();

$Month = 2592000 + time(); //this adds 30 days to the current time

setcookie('UserVisit',$Month);
}
else
{
  session_start();
}
?>
<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/DPH.png">

    <!-- bootstrap Css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Custom Css -->
    <style>
    <?php include '../Model/Theme.css'; ?>
    </style>
    <?php
        include 'navigation.php';
    ?>
</head>
