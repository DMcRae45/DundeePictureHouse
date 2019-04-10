<?php
/*
    Description: User interface used to manage old and current movie tickets.

    Author: Brad Mair, David McRae
*/
include '../Model/DPH-api.php';

$userid = $_SESSION['userid'];
//$currentDayTime = date('Y-m-d H:i:s');
$Tickets = GetUserTickets($userid);
$userTicketArray = json_decode($Tickets);

/*
$datePassed = False;
if (isset($userTicketArray))
{
  for ($i=0 ; $i < sizeof($userTicketArray) ; $i++)
  {
    $moiveIndex = $userTicketArray[$i]->Movie_ID;
    include '../Controller/getMovieDetailsByID.php';

    $currentDateTime = strval($userTicketArray[$i]->Showing_Date) ." ". strval($userTicketArray[$i]->Showing_Start_Time);
    if (new DateTime() > new DateTime(strval($currentDateTime)) && $datePassed == False)
    {
      $datePassed = True;
    }
    if ($datePassed == False)
    {
      $nextTicket = $userTicketArray[$i];
      $ticketMovie = $movieDetails;
    }
  }
}
else
{?>
  <style>
    .ticket
    {
      opacity: 0;
    }
  </style>
  <?php
  $ticketMovie = new stdClass();
  $nextTicket = new stdClass();
  $ticketMovie->Title = "No Upcoming Tickets";
  $nextTicket->Code = NULL;
  $nextTicket->Ticket_Type = NULL;
  $nextTicket->Seating_Type = NULL;
  $nextTicket->Screen_ID = NULL;
  $nextTicket->Showing_Date = NULL;
  $ticketMovie->Image_Link = NULL;
  $ticketMovie->Age_Rating = NULL;
  $ticketMovie->RunTime = NULL;
  $ticketMovie->Director = NULL;
  $ticketMovie->Language = NULL;
  $ticketMovie->Genre = NULL;
  $nextTicket->Showing_Start_Time = NULL;
}*/


?>
