<?php
/*
    Description: action to logout the user.
    used to destroy all sessions.

    Author: David McRae
 */
include '../Model/DPH-api.php';

session_start();
$returnURL = (isset($_GET['returnURL'])) ? $_GET['returnURL'] : FALSE;
  if ($returnURL)
  {
    AttemptLogOut();
    header('location: '.$returnURL);
  }
?>
