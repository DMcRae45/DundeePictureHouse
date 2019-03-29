<?php
/*
    Description: Allows users to see most recent ticket an up comming tickets for future showings.

    Author: David McRae
*/
include 'header.php';
include '../Controller/getUserTicket.php';

 if(!$_SESSION['LoggedIn'] == true)
 {
  header("Location:../View/index.php");
 }
 else
 {
   // code...


echo "<body>";
echo "<div class='container'>"; // Open container
  echo "<div class='mt-4'>";
    echo "<h3 class='d-inline'>".$userTicketArray->Title."</h3>"; // Display movie title
  echo "</div>";
    echo "<div class='row mt-4 mx-auto'>";
      echo "<div class='col-md-3'>";
        echo "<p>Showing At: <text>Dundee Picture House</text></p>";
        echo "<hr>";
        echo "<p>Starting At: <text>".$userTicketArray->Showing_Start_Time."</text></p>";
        echo "<hr>";
        echo "<p>Showing In: <text>".$userTicketArray->Showing_Type."</text></p>";
        echo "<hr>";
      echo "</div>";

      echo "<div class='col-md-3'>";
        echo "<p>Date: <text>".$userTicketArray->Showing_Date."</text></p>";
        echo "<hr>";
        echo "<p>Screen: <text>".$userTicketArray->Screen_ID."</text></p>";
        echo "<hr>";
      echo "</div>";
    echo "</div>";

echo "</div>"; // Close container



echo "
  <body>
  <div>
  <text>Ticket For Your Next Showing</text>
  </div>
  <div class='container table-responsive'>
    <table class='table border border-dark text-center mt-4'>
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
        </thead>
        ";
        $latestCode = $userTicketArray[0]->Code;
        $index = 0;
        while($latestCode == $userTicketArray[0]->Code)
        {
          echo "
            <tr>

              <td>
                <h6>".$userTicketArray[$index]->Code."</h6>
              </td>

              <td>
                <text>".$userTicketArray[$index]->Screen_ID."</text>
              </td>

              <td>
                <text>".$userTicketArray[$index]->Title."</text>
              </td>

              <td>
                <text>".$userTicketArray[$index]->Ticket_Type."</text>
              </td>

              <td>
                <text>".$userTicketArray[$index]->Seating_Type."</text>
              </td>

              <td>
                <text>".$userTicketArray[$index]->Showing_Date."</text>
              </td>

              <td>
                <text>".$userTicketArray[$index]->Showing_Start_Time."</text>
              </td>

            </tr>
          ";
          $index++;
          $latestCode = $userTicketArray[$index]->Code;
        }

echo "
<div>
<text>UpComing Showings</text>
</div>
        <div class='container table-responsive'>
          <table class='table border border-dark text-center mt-4'>

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
              </thead>
      ";
              for($index = $index; $index < sizeof($userTicketArray) ; $index++)
              {
                echo "
                  <tr>

                    <td>
                      <h6>".$userTicketArray[$index]->Code."</h6>
                    </td>

                    <td>
                      <text>".$userTicketArray[$index]->Screen_ID."</text>
                    </td>

                    <td>
                      <text>".$userTicketArray[$index]->Title."</text>
                    </td>

                    <td>
                      <text>".$userTicketArray[$index]->Ticket_Type."</text>
                    </td>

                    <td>
                      <text>".$userTicketArray[$index]->Seating_Type."</text>
                    </td>

                    <td>
                      <text>".$userTicketArray[$index]->Showing_Date."</text>
                    </td>

                    <td>
                      <text>".$userTicketArray[$index]->Showing_Start_Time."</text>
                    </td>

                  </tr>
                ";
              }


include 'footer.php';
include '../Controller/bootstrapScript.php';

echo "
</body>
</html>
";
}
?>
