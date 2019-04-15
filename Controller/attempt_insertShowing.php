<?php
/*
    Description: Action to get all movies from the database.

    Author: David McRae
*/
if(!isset($_POST['insertShowingSubmit']))
{
 header('Location: ../View/index.php?error=ACCESS DENIED');
}
else
{
  Include '../Model/DPH-api.php';

  AttemptInsertShowing();
}
?>
