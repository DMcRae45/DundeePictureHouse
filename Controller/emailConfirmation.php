<?php
/*
    Description: Sends a Confirmation Email to the user's registered Email address

    Author: Brad Mair
 */

$showingDetails = getShowingByID($showingID);
$showingArray = json_decode($showingDetails);
$showtime = date("H:i", strtotime($showingArray->Showing_Start_Time));
$showingDateTime = $showingArray->Showing_Date." at ".$showtime;

$movie = getMovieByID($showingArray->Movie_ID);
$movieArray = json_decode($movie);
$movieTitle = "'".$movieArray->Title."'";

$body = "
<html>
  <head>
  <title>Booking Confirmation</title>
  </head>
  <body>
  <p>Thank you for using Dundee Picture House.</p>
  <hr>
  <p>Your ticket number is: ".$code."</p>
  <p>Movie: ".$movieTitle."</p>
  <p>Showing: ".$showingDateTime."\n</p>
  <hr>";

for ($i=0 ; $i < sizeof($quantityArray) ; $i++)
{
  if($quantityArray[$i] >= 1)
  {
    $quantity = $quantityArray[$i];
    $ticketType = ucfirst($ticketTypesArray[$i]);
    $ticket = $priceArray[$i];

    if ($quantityArray[$i] > 1)
    {
      $body .= "<p>".$quantity."x ".$ticketType." ".$ticket." Tickets</p>";
    }
    else
    {
      $body .= "<p>".$quantity."x ".$ticketType." ".$ticket." Ticket</p>";
    }
  }
}

$body .= "
<hr>
<p>To view your ticket(s), click on the link below:</p>
<a href='https://mayar.abertay.ac.uk/~cmp311gc1805/DPH/View/userTicket.php'>Click Here</a>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <noreply@dph.ac.uk>' . "\r\n";

echo $body;

mail($buyerEmail, 'Booking Confirmation', $body, $headers);
?>
