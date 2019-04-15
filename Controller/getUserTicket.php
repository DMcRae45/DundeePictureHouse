<?php
/*
    Description: User interface used to manage old and current movie tickets.

    Author: Brad Mair, David McRae
*/
if(isset($_SESSION['LoggedIn']))
{
  include '../Model/DPH-api.php';
  $userid = $_SESSION['userid'];

  $Tickets = GetUserTickets($userid);
  $userTicketArray = json_decode($Tickets);
}
else
{
  header('Location: ../View/index.php?error=ACCESS DENIED');
}
?>
