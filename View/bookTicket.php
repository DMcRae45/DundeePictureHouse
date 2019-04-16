<?php
/*
    Description: Dundee Picture House Booking page for users to purchase tickets.
    Author: David McRae, Brad Mair
*/
include 'session.php';
if (!isset($_SESSION['LoggedIn']))
{
  header("Location: index.php");
}
else
{
  include 'header.php';
  include '../Controller/getTicketInfo.php';
echo "<title>DPH - Book Tickets</title>";

  $ticketTypeString = "";
  $comma = ",";
  $quote = '"';
  for ($i=0 ; $i < sizeof($priceArray) ; $i++)
  {
    if($i < sizeof($priceArray) -1)
    {
      $ticketTypeString = $ticketTypeString.$quote.strtolower($priceArray[$i]->Ticket_Type).$quote.$comma;
    }
    else
    {
      $ticketTypeString = $ticketTypeString.$quote.strtolower($priceArray[$i]->Ticket_Type).$quote;
    }
  }


  echo "<div class='container'>"; // Open container
    echo "<div class='mt-4'>";
      echo "<h1 class='d-inline'>".$movieArray->Title."</h1>"; // Display movie title
      echo "<img class='d-inline float-right' src=".$movieArray->Age_Rating." class='img-fluid' style='height: 3rem'>";
    echo "</div>";
      echo "<div class='row mt-4'>";
        echo "<div class='col-md-6'>";
          echo "<p>Release Date: <text>".$movieArray->Release_Date."</text></p>";
          echo "<p>Runtime: <text>".$movieArray->RunTime." Mins</text></p>";
          echo "<hr>";
          echo "<img src=".$movieArray->Star_Rating." class='img-fluid' style='height: 2rem'>";
          echo "<hr>";
          echo "<p>Showing Time: <text>".$showingArray->Showing_Start_Time."</text></p>";
          echo "<hr>";
          echo "<p>Screen: <text>".$showingArray->Screen_ID."</text></p>";
          echo "<hr>";
        echo "</div>";
      echo "</div>";
  echo "</div>"; // Close container

echo "
  <body>
  <div class='container table-responsive'>
    <table class='table border border-dark text-center mt-4'>
      <form method='POST' action='checkout.php?showingid=".$showingID."'>

        <thead class='thead-dark'>
          <tr>
            <th scope='col'>Ticket Type</th>
            <th scope='col'>Showing Type</th>
            <th scope='col'>Quantity</th>
          </tr>
        </thead>
";
      for ($i=0 ; $i < sizeof($priceArray) ; $i++)
      {
        echo "
        <tr>
          <td class='col-md-6'>
            <h5>".$priceArray[$i]->Ticket_Type.": </h5>
            <h6 id='".strtolower($priceArray[$i]->Ticket_Type)."ticketPrice'>£".$priceArray[$i]->Standard_Price."</h6>
          </td>
          <td>
            <div class='form-group input-group'>
              <div class='input-group-prepend'>
                <span class='input-group-text' id='inputGroupPrepend'>Showing Type: </span>
              </div>
              <select class='custom-select text' name='seatingType".$priceArray[$i]->Ticket_Type."' standardPrice='".$priceArray[$i]->Standard_Price."' premiumPrice='".$priceArray[$i]->Premium_Price."' id='".strtolower($priceArray[$i]->Ticket_Type)."MovieType' onchange='CalculateTotalCost(".$ticketTypeString.")'>
                <option value='Standard'>Standard</option>
                <option value='Premium'>Premium</option>
              </select>
            </div>
          </td>
          <td>
            <div class='form-group input-group'>
              <div class='input-group-prepend'>
                <span class='input-group-text' id='inputGroupPrepend'>Quantity: </span>
              </div>
              <select class='custom-select text' name= 'ticketQuantity".$priceArray[$i]->Ticket_Type."' id='".strtolower($priceArray[$i]->Ticket_Type)."Quantity' onchange='CalculateTotalCost(".$ticketTypeString.")'>
                <option value='0'>0</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
                <option value='6'>6</option>
                <option value='7'>7</option>
                <option value='8'>8</option>
                <option value='9'>9</option>
                <option value='10'>10</option>
              </select>
            </div>
          </td>
        </tr>
        ";
      }
      echo "
          <tr>
            <td><h3><text>Total Cost: </text></h3></td>
            <td></td>
            <td><text><h2 id='totalCost'>£0</h2></text></td>
          </tr>
          <tr>
            <td colspan='3'><button class='btn btn-info btn-block'>Checkout</button></td>
          </tr>
        </form>
      </table>
    </div>
    <script src='../Controller/calculatePrice.js'></script>
    ";

include 'footer.php';
include '../Controller/bootstrapScript.php';
echo "
</body>
</html>
";
}
?>
