<?php
/*
    Description: Display the customers ticket(s)

    Author: David McRae
*/
include 'session.php';

include 'header.php';
include '../Controller/getCustomerTicket.php';

if(isset($_SESSION['LoggedIn']))
{
  $latestCode = $userTicketArray[0]->Code;
  $index = 0;
  if($latestCode != NULL)
  {

    echo "<body>";
    echo "<div class='container'>"; // Open container
      echo "<div class='mt-4'>";
        echo "<h3>Showing At: <text>Dundee Picture House</text></h3>";
      echo "</div>";

    echo "<div class='row mt-4 mx-auto'>";
      echo "<h3>Title: <text>".$userTicketArray[0]->Title."</text></h3>"; // Display movie title
      echo "<hr>";
    echo "</div>";

        echo "<div class='row mt-4 mx-auto'>";
          echo "<div class='col-md-3'>";

            echo "<p>Starting At: <text>".$userTicketArray[0]->Showing_Start_Time."</text></p>";
            echo "<hr>";

            echo "<p>Showing In: <text>".$userTicketArray[0]->Showing_Type."</text></p>";
            echo "<hr>";

          echo "</div>";
          echo "<div class='col-md-3'>";

            echo "<p>Date: <text>".$userTicketArray[0]->Showing_Date."</text></p>";
            echo "<hr>";

            echo "<p>Screen: <text>".$userTicketArray[0]->Screen_ID."</text></p>";
            echo "<hr>";

          echo "</div>";
        echo "</div>";

    echo "</div>"; // Close container

    echo "
      <div class='container table-responsive'>
        <table class='table border border-dark text-center mt-4'>
          <div class='container'>
            <text>Ticket For Your Next Showing</text>
          </div>
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
            <text>".date("d-m-Y", strtotime($userTicketArray[$index]->Showing_Date))."</text>
          </td>

          <td>
            <text>".$userTicketArray[$index]->Showing_Start_Time."</text>
          </td>

        </tr>
      ";
      $index++;
      $latestCode = $userTicketArray[$index]->Code;
    }
    echo "</table></div>";
  }
  else
  {
    echo "No Tickets With this code";
  }
?>
<div class='container mt-5'>
  <h4> Next Customers Ticket </h4>
  <form class='form-group needs-validation' method='POST' action='../View/customerTicket.php' novalidate>

      <div class='form-group input-group' form-group-lg>
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">Ticket Code</span>
        </div>
          <input class='form-control' type='text' name='code' placeholder='Ticket Code' required>
      </div>
      <button class='form-control btn btn-outline-info' type='submit' name='findTicketSubmit'>Find Ticket</button>
  </form>
</div>

<?php
include '../View/footer.php';
include '../Controller/bootstrapScript.php';
require '../Controller/ValidateEmptyFields.js';

echo "
</body>
</html>";
}
else
{
  header('Location: ../View/index.php');
}
?>
