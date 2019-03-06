<?php
/*
    Description: Action for the insert movie form located on the insert movie page.

    Author: David McRae
 */
include '../Model/DPH-api.php';

session_start();

AttemptInsertMovie();
header('location: ../View/insertMovie.php');
?>
