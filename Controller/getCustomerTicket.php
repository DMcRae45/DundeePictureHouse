<?php
/*
    Description: User interface used to manage old and current movie tickets.

    Author: Brad Mair, David McRae
*/
include '../Model/DPH-api.php';

$Tickets = GetCustomerTicket();
$userTicketArray = json_decode($Tickets);

?>
