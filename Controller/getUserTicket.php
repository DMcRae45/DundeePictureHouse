<?php
/*
    Description: User interface used to manage old and current movie tickets.

    Author: Brad Mair
*/
include '../Model/DPH-api.php';

$Tickets = GetUserTickets($sessionid);
$ticketArray = json_decode($Tickets);
?>
