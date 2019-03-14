
<?php
/*
    Description: User interface used to manage old and current movie tickets.

    Author: Brad Mair
*/

// if (!isset($_SESSION['LoggedIn']))
// {
//  header("Location: customerLogin.php");
// }
include 'header.php';
$sessionid = $_SESSION['userid'];
include '../Controller/getUserTicket.php';?>
<html>
<script src='../Controller/displayNextTicket.js'></script>
<?php
echo "
<title>DPH - My Tickets</title>
<body>
<br>
  <div class='container'>
    ";
    //NEXT MOVIE CARD HERE
    echo "<div class='container-fluid'>
            <div class='page-header'>
                <h3>Up Next</h3>
            </div>
            <div class='row mt-4'>
              <div class='col-md-3'>
                <img id='ticketCardIMG' src='images/film.placeholder.poster.jpg' class='card-img-top' alt='Movie Poster' onerror=this.src='images/film.placeholder.poster.jpg'>
              </div>
              <div class='col-md-9'>
                <div class='row mt-4'>
                  <div class='col-md-5'>
                    <p id='ticketCardTITLE'><text>No Upcoming Ticket(s)</text></p>
                    <hr>
                    <p id='ticketCardCODE' style='opacity:0;'>Ticket: <text></text></p>
                    <hr>
                    <p id='ticketCardTYPE' style='opacity:0;'>Ticket Type: <text></text></p>
                    <hr>
                    <p id='ticketCardSCREEN' style='opacity:0;'>Screen: <text></text></p>
                    <hr>
                    <p id='ticketCardPAYPAL' style='opacity:0;'>PayPal E-Mail: <text></text></p>
                    <hr>
                    <p id='ticketCardDATE' style='opacity:0;'>Date: <text></text></p>
                  </div>
                  <div class='col-md-4'>
                    <img  id='ticketCardAGE' src='' class='img-fluid' style='height: 1.5rem' onerror=this.style.opacity=0>
                    <hr>
                    <p id='ticketCardRUNTIME' style='opacity:0;'>RunTime: <text></text></p>
                    <hr>
                    <p id='ticketCardDIRECTOR' style='opacity:0;'>Director: <text></text></p>
                    <hr>
                    <p id='ticketCardLANGUAGE' style='opacity:0;'>Language: <text></text></p>
                    <hr>
                    <p id='ticketCardGENRE' style='opacity:0;'>Genre: <text></text></p>
                    <hr>
                    <p id='ticketCardTIME' style='opacity:0;'>Time: <text></text></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>";

    echo "
    <div class='page-header'>
        <h3>My Tickets</h3>
    </div>
    <table class='table border table border-dark text-center'>
      <thead class='thead-dark'>
          <tr>
            <th scope='col'>Movie</th>
            <th scope='col'>Ticket Code</th>
            <th scope='col'>Screen</th>
            <th scope='col'>PayPal E-Mail</th>
            <th scope='col'>Showing Date</th>
            <th scope='col'>Showing Time</th>
            <th scope='col'>Ticket Type</th>
          </tr>
        </thead>";

        $nextTicketID = NULL;
        $datePassed = False;
        if (isset($ticketArray))
        {
          for ($i=0 ; $i < sizeof($ticketArray) ; $i++)
          {
            $movie = getMovieByID($ticketArray[$i]->Movie_ID);
            $movieDetails = json_decode($movie);

            $currentDateTime = strval($ticketArray[$i]->Showing_Date) ." ". strval($ticketArray[$i]->Showing_Start_Time);
            if (new DateTime() > new DateTime(strval($currentDateTime)) && $datePassed == False)
            {
              echo "<thead class='thead-dark'>";
                echo "<tr>";
                  echo "<th colspan='1'>Old Tickets</th>";
                  echo "<th colspan='6'> </th>";
                echo "</tr>";
              echo "</thead>";
              $datePassed = True;
            }

            if ($datePassed == False)
            {
              $nextTicket = $ticketArray[$i];
              $ticketMovie = $movieDetails;
            }

            echo "<tr>";
            echo "<td>".$movieDetails->Title."</td>";
            echo "<td>".strtoupper($ticketArray[$i]->Code)."</td>";
            echo "<td>0".$ticketArray[$i]->Screen_ID."</td>";
            echo "<td>".$ticketArray[$i]->PayPal_Email."</td>";
            echo "<td>".$ticketArray[$i]->Showing_Date."</td>";
            echo "<td>".$ticketArray[$i]->Showing_Start_Time."</td>";
            if ($ticketArray[$i]->Premium_Ticket == 0)
            {
              echo "<td>Standard Ticket</td>";
            }
            else{
              echo "<td>Premium Ticket</td>";
            }
          echo "</tr>";
          }
        }
        else{
          echo "<thead class='thead-dark'>";
            echo "<tr>";
              echo "<th colspan='2'>No Tickets to show</th>";
              echo "<th colspan='5'> </th>";
            echo "</tr>";
          echo "</thead>";
        }
      echo "</table>";
      if ($nextTicket != NULL){
        $ticketInfoArray = '"'.$ticketMovie->Title.'","'.$nextTicket->Code.'","'.$nextTicket->Premium_Ticket.'","'.$nextTicket->Screen_ID.'","'.$nextTicket->PayPal_Email.'","'.$nextTicket->Showing_Date.'",';
        $ticketInfoArray = $ticketInfoArray.'"'.$ticketMovie->Image_Link.'","'.$ticketMovie->Age_Rating.'","'.$ticketMovie->RunTime.'","'.$ticketMovie->Director.'","'.$ticketMovie->Language.'","'.$ticketMovie->Genre.'","'.$nextTicket->Showing_Start_Time.'"';
        echo "<script>DisplayTicket(".$ticketInfoArray.")</script>";
      }
echo "
    </div>
";
// <footer>
  include 'footer.php';
// </footer>
// <Script>
  include '../Controller/bootstrapScript.php';
// </Script>
echo "
</body>
</html>
";

?>
