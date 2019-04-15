<?php
/*
    Description: Action for the insert movie form located on the insert movie page.

    Author: David McRae
 */
if(!isset($_POST['insertMovieSubmit']))
{
 header('Location: ../View/index.php?error=ACCESS DENIED');
}
else
{
 include '../Model/DPH-api.php';

 session_start();

 AttemptInsertMovie();
}
?>
