<?php
/*
    Description: Controller to get the number of tickets that already exsist per showing.

    Author: Brad Mair, David McRae
*/
if(isset($_SESSION['LoggedIn']))
{
$countNumb = getTicketCount($showingIndex);
$countObject = json_decode($countNumb);

$ticketCount = (int)$countObject->Numb_Of_Tickets;
$ticketsAvailable = (int)$countObject->Available_Tickets+(int)$countObject->Available_Premium_Tickets;
}
else
{
  header('Location: ../View/index.php?error=ACCESS DENIED');
}
?>
