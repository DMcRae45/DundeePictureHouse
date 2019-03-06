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

    echo "
    <table class='table border border-dark text-center'>
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

        for ($i=0 ; $i < sizeof($ticketArray) ; $i++)
        {
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
        echo "<tr>";
        }
      echo "</table>";
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
