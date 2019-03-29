<?php
/*
    Description: User interface used to manage old and current movie tickets.

    Author: Brad Mair
*/
include '../Model/DPH-api.php';

$userid = $_SESSION['userid'];

$Tickets = GetUserTickets($userid);
$userTicketArray = json_decode($Tickets);
?>
