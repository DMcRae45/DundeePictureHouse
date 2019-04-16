<?php
/*
    Description: User interface used to manage old and current movie tickets.

    Author: Brad Mair, David McRae
*/
if(isset($_SESSION['jobrole']))
{
include '../Model/DPH-api.php';

$Tickets = GetCustomerTicket();
$userTicketArray = json_decode($Tickets);
}
else
{
  header('Location: ../View/index.php?error=ACCESS DENIED');
}
?>
