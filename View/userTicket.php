<html>
<?php
/*
    Description: User interface used to manage old and current movie tickets.

    Author: Brad Mair
*/
include 'header.php';
$sessionid = $_SESSION['userid'];
include '../Controller/getUserTicket.php';
//if (!isset($_SESSION['LoggedIn']) || $_SESSION['Admin_Status'] != 1)
//{
//  header("Location: index.php");
//}
//else

echo "
<title>DPH - My Tickets</title>
<body>
  <div class='container'>
    <div class='page-header'>
        <h1>My Tickets</h1>
    </div>
    ";

//NEXT MOVIE CARD HERE


    echo "
    <table class='table border table-sm border-dark text-center'>
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
        for ($i=0 ; $i < sizeof($ticketArray) ; $i++) // its freaking out here says unexpected for.
        {
          $currentDateTime = strval($ticketArray[$i]->Showing_Date) ." ". strval($ticketArray[$i]->Showing_Time);
          if (new DateTime() > new DateTime(strval($currentDateTime)) && $datePassed == False)
          {
            echo "<thead class='thead-dark'>";
              echo "<tr>";
                echo "<th colspan='2'>Old Tickets</th>";
                echo "<th colspan='5'> </th>";
              echo "</tr>";
            echo "</thead>";
            $datePassed = True;
          }
          if ($datePassed == False)
          {
            $nextTicketID = $ticketArray[$i]->Ticket_ID;
          }
          echo "<tr>";
          echo "<td>".$ticketArray[$i]->Movie_Title."</td>";
          echo "<td>".strtoupper($ticketArray[$i]->Code)."</td>";
          echo "<td>0".$ticketArray[$i]->Screen_ID."</td>";
          echo "<td>".$ticketArray[$i]->PayPal_Email."</td>";
          echo "<td>".$ticketArray[$i]->Showing_Date."</td>";
          echo "<td>".$ticketArray[$i]->Showing_Time."</td>";
          if ($ticketArray[$i]->Premium_Ticket == 0)
          {
            echo "<td>Standard Ticket</td>";
          }
          else{
            echo "<td>Premium Ticket</td>";
          }
        echo "</tr>";
        }
      echo "</table>";
      //NEXT MOVIE FUNCTION HERE
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
