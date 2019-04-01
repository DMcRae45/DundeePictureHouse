<?php
/*
    Description: User interface used to manage old and current movie tickets.

    Author: Brad Mair
*/
if (isset($_SESSION['LoggedIn']))
{
  header("Location: index.php");
}
else{
include 'header.php';
include '../Controller/getUserTicket.php';?>

<html>
<?php
echo "
<title>DPH - My Tickets</title>
<body>
<br>
  <div class='container'>
    ";
    //NEXT MOVIE CARD HERE
    echo "<div class='container'>";

            echo "<div class='row mt-4'>
              <div class='col-md-3'>
                <img src='".$ticketMovie->Image_Link."' class='card-img-top' alt='Movie Poster' onerror=this.src='images/film.placeholder.poster.jpg'>
              </div>
              <div class='col-md-9'>
                <div class='row mt-4'>
                  <div class='col-md-5'>
                    <p>".$ticketMovie->Title."<text></text></p>
                    <hr>
                    <p class='ticket'>Ticket: <text>".$nextTicket->Code."</text></p>
                    <hr>
                    <p class='ticket'>Ticket Type: <text>".$nextTicket->Ticket_Type."</text></p>
                    <hr>
                    <p class='ticket'>Seating Type: <text>".$nextTicket->Seating_Type."</text></p>
                    <hr>
                    <p class='ticket'>Screen: <text>0".$nextTicket->Screen_ID."</text></p>
                    <hr>
                    <p class='ticket'>Date: <text>".$nextTicket->Showing_Date."</text></p>
                  </div>
                  <div class='col-md-4'>
                    <img src='".$ticketMovie->Age_Rating."' class='img-fluid' style='height: 1.5rem' onerror=this.style.opacity=0>
                    <hr>
                    <p class='ticket'>RunTime: <text>".$ticketMovie->RunTime."</text></p>
                    <hr>
                    <p class='ticket'>Director: <text>".$ticketMovie->Director."</text></p>
                    <hr>
                    <p class='ticket'>Language: <text>".$ticketMovie->Language."</text></p>
                    <hr>
                    <p class='ticket'>Genre: <text>".$ticketMovie->Genre."</text></p>
                    <hr>
                    <p class='ticket'>Time: <text>".$nextTicket->Showing_Start_Time."</text></p>
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
            <th scope='col'>Ticket Code</th>
            <th scope='col'>Screen</th>
            <th scope='col'>Movie</th>
            <th scope='col'>Ticket Type</th>
            <th scope='col'>Seating Type</th>
            <th scope='col'>Date</th>
            <th scope='col'>Time</th>
          </tr>
        </thead>";
        if (isset($userTicketArray))
        {
          for ($i=0 ; $i < sizeof($userTicketArray) ; $i++)
          {
            $moiveIndex = $userTicketArray[$i]->Movie_ID;
            include '../Controller/getMovieDetailsByID.php';

            if ($i > 0 && $nextTicket->Ticket_ID == $userTicketArray[$i-1]->Ticket_ID)
            {
              echo "<thead class='thead-dark'>";
                echo "<tr>";
                  echo "<th colspan='1'>Old Tickets</th>";
                  echo "<th colspan='6'> </th>";
                echo "</tr>";
              echo "</thead>";
            }
            echo "<tr>";
            echo "<td>".strtoupper($userTicketArray[$i]->Code)."</td>";
            echo "<td><text>0".$userTicketArray[$i]->Screen_ID."</text></td>";
            echo "<td><text>".$movieDetails->Title."</text></td>";
            echo "<td><text>".$userTicketArray[$i]->Ticket_Type."</text></td>";
            echo "<td><text>".$userTicketArray[$i]->Seating_Type."</text></td>";
            echo "<td><text>".$userTicketArray[$i]->Showing_Date."</text></td>";
            echo "<td><text>".$userTicketArray[$i]->Showing_Start_Time."</text></td>";
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
      echo "</table>
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
</html>";
}

?>
