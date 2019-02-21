<?php
/*
    Description: Dundee Picture House Header to be imported on every page.

    Author: David McRae
*/
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

    <!-- bootstrap Css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <?php
        include 'navigation.php';
    ?>
</head>
