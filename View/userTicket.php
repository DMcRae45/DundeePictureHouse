<?php
/*
    Description: User interface used to manage old and current movie tickets.

    Author: Brad Mair, David McRae
*/
include 'session.php';
if (!isset($_SESSION['LoggedIn']))
{
  header("Location: index.php?error=ACCESS DENIED LOGIN REQUIRED");
}
else
{
  include 'header.php';
  include '../Controller/getUserTicket.php';
  // gets current date and time.
  $dateNow = date('Y-m-d');
  $timeNow = date('H:i:s');
  $dateTimeNow = date('Y-m-d H:i:s');

  // index to keep track of which entry in th json string is closest to current time.
  $index = 0;
  $seperatedTime = $userTicketArray[$index]->Showing_Start_Time;
  $seperatedDate = $userTicketArray[$index]->Showing_Date;
  $combinedDateTime = date('Y-m-d H:i:s', strtotime("$seperatedDate $seperatedTime"));


  // for($i = 0; $i < sizeof($userTicketArray) ; $i++)
  // {
if($combinedDateTime < $dateTimeNow)
{
  while($combinedDateTime < $dateTimeNow)
  {
    if($seperatedDate == $dateNow && $seperatedTime < $timeNow)
    {
      $index++;
      $seperatedTime = $userTicketArray[$index]->Showing_Start_Time;
      $seperatedDate = $userTicketArray[$index]->Showing_Date;
      $combinedDateTime = date('Y-m-d H:i:s', strtotime("$seperatedDate $seperatedTime"));
    }
    elseif($seperatedDate == $dateNow && $seperatedTime > $timeNow)
    {
      break;
    }
    elseif($combinedDateTime > $dateTimeNow)
    {
      break;
    }
  }
}


  $latestCode = $userTicketArray[$index]->Code;
  $firstCode = $latestCode;
  if($latestCode != NULL)
  {

    echo "<body>";
    echo "<div class='container'>"; // Open container
      echo "<div class='mt-4'>";
        echo "<h3>Showing At: <text>Dundee Picture House</text></h3>";
      echo "</div>";

    echo "<div class='row mt-4 mx-auto'>";
      echo "<h3>Title: <text>".$userTicketArray[$index]->Title."</text></h3>"; // Display movie title
      echo "<hr>";
    echo "</div>";

        echo "<div class='row mt-4 mx-auto'>";
          echo "<div class='col-md-3'>";

            echo "<p>Starting At: <text>".$userTicketArray[$index]->Showing_Start_Time."</text></p>";
            echo "<hr>";

            echo "<p>Showing In: <text>".$userTicketArray[$index]->Showing_Type."</text></p>";
            echo "<hr>";

          echo "</div>";
          echo "<div class='col-md-3'>";

            echo "<p>Date: <text>".$userTicketArray[$index]->Showing_Date."</text></p>";
            echo "<hr>";

            echo "<p>Screen: <text>".$userTicketArray[$index]->Screen_ID."</text></p>";
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

    while($latestCode == $firstCode)
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

if($index > 0)
{
    echo "
    <div class='container table-responsive'>
      <div class='container'>
        <text>UpComing Showings</text>
      </div>
    <table class='table border border-dark text-center mt-4'>
        <thead class='thead-dark'>
          <tr>
            <th scope='col'>Ticket Code</th>
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
    }
    echo "</table></div>";
  }
  }
  else
  {
    echo"
    <div class='container'>
      <text>No Tickets To Show</text>
    </div>
    ";
  }

include '../View/footer.php';
include '../Controller/bootstrapScript.php';

echo "
</body>
</html>";
}

?>
