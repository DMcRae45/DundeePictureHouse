<?php
/*
    Description: Action for the insert movie form located on the insert movie page.

    Author: David McRae
 */
session_start();
if(!isset($_POST['insertMovieSubmit']))
{
 header('Location: ../View/index.php?error=ACCESS DENIED');
}
else
{
 include '../Model/DPH-api.php';

 AttemptInsertMovie();
}
?>
