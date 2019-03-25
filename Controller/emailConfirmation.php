<?php
/*
    Description: Sends a Confirmation Email to the user's registered Email address

    Author: Brad Mair
 */

$body = "Thank you for using Dundee Picture House.\n";
$body .= "Your ticket number is: "./*INSERT TICKET CODE HERE*/."\n";
$body .= "Movie: "./*INSERT MOVIE NAME HERE*/."\n";
$body .= "Showing: "./*INSERT SHOWING DATE AND/OR TIME HERE*/."\n";
$body .= "To view your ticket(s), click on the link below:\n\n";
$body .= BASE_URL . 'userTicket.php';

mail(/*INSERT EMAIL HERE*/, 'Registration Confirmation', $body, 'From: NoReply@dph.ac.uk');
?>
