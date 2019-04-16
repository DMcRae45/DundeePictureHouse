<?php

// Include and initialize database class


include 'session.php';

$paypal = new PaypalExpress;
if(!isset($_SESSION['LoggedIn']))
{
  header("Location: index.php");
}
else
{
  include '../Controller/getCheckoutInfo.php';
  include 'header.php';

  if(isset($_SESSION['jobrole']))
  {
    $_SESSION['seatingTypeBasket'] = $seatingTypesArray;
    $_SESSION['quantityBasket'] = $quantityArray;
    $_SESSION['priceArray'] = $priceArray;
  }

  echo "<title>DPH - Checkout</title>";
  echo "<body>";
  echo "<div class='container'>"; // Open container
    echo "<div class='mt-4'>";
      echo "<h3 class='d-inline'>".$movieArray->Title."</h3>"; // Display movie title
      echo "<img class='ml-3' src=".$movieArray->Age_Rating." class='img-fluid' style='height: 3rem'>";
    echo "</div>";
      echo "<div class='row mt-4 mx-auto'>";
        echo "<div class='col-md-3'>";
          echo "<p>Showing At: <text>Dundee Picture House</text></p>";
          echo "<hr>";
          echo "<p>Starting At: <text>".$showingArray->Showing_Start_Time."</text></p>";
          echo "<hr>";
          echo "<p>Showing In: <text>".$showingArray->Showing_Type."</text></p>";
          echo "<hr>";
        echo "</div>";

        echo "<div class='col-md-3'>";
          echo "<p>Date: <text>".$showingArray->Showing_Date."</text></p>";
          echo "<hr>";
          echo "<p>RunTime: <text>".$movieArray->RunTime."</text></p>";
          echo "<hr>";
          echo "<p>Screen: <text>".$showingArray->Screen_ID."</text></p>";
          echo "<hr>";
        echo "</div>";

        echo "<div class='col-md-6'>";
        echo "<img src=".$movieArray->Image_Link." class='mx-auto d-block' style='height: 20rem;' onerror=this.src='images/film.placeholder.poster.jpg'>";
        echo "</div>";
      echo "</div>";

  echo "</div>"; // Close container

  echo "<div class= 'container'>";
    echo "
      <table class='table table-dark mt-3'>
        <thead>
          <tr>
          <th scope='col'>Ticket</th>
          <th scope='col'></th>
          <th scope='col'>Sub-Total</th>
          </tr>
        </thead>
        <tbody>";

    for ($i=0 ; $i < sizeof($quantityArray) ; $i++)
     {
        if($quantityArray[$i] >= 1)
        {
          if($seatingTypesArray[$i] == "Premium")
          {
            $ticketCost[$i] = $quantityArray[$i]*$priceArray[$i]->Premium_Price;
            echo "<tr>
                  <td>".$quantityArray[$i]."x ".$seatingTypesArray[$i]." ".$priceArray[$i]->Ticket_Type."</td>
                  <td></td>
                  <td> £".$ticketCost[$i]."</td>
                  </tr>";
          }
          else
          {
            $ticketCost[$i] = $quantityArray[$i] * $priceArray[$i]->Standard_Price;
            echo "<tr>
                  <td>".$quantityArray[$i]."x ".$seatingTypesArray[$i]." ".$priceArray[$i]->Ticket_Type."</td>
                  <td></td>
                  <td> £".$ticketCost[$i]."</td>
                  </tr>";
         }
      }
     }
      $totalCost = array_sum($ticketCost);
      echo "<tr>
              <td></td>
              <td>Total: </td>
              <td>£".$totalCost."</td>
            <tr>
        </tbody>
      </table>";

      if(isset($_SESSION['firstname']))
      {
        echo "<div class='float-right' id='paypal-button'></div>";
      }
      elseif(isset($_SESSION['jobrole']))
      {
        echo "<a class='btn btn-outline-info btn-block' href='../Controller/createCustomerTicket.php' >CUSTOMER HAS NOW PAID</a>";
      }
    echo "
  </div>
</div>
";

include '../Controller/payPalButton.php';
include '../Controller/bootstrapScript.php';

echo "
</body>
</html>
";
}
