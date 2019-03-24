<?php

// Include and initialize database class
include '../Controller/getCheckoutInfo.php';
include 'header.php';

// Include and initialize paypal class

include '../Model/PaypalExpress.php';
$paypal = new PaypalExpress;
?>

<body>

<?php
  echo "<div class='container'>"; // Open container
    echo "<div class='mt-4'>";
      echo "<h3 class='d-inline'>".$movieArray->Title."</h3>"; // Display movie title
      echo "<img class='ml-3' src=".$movieArray->Age_Rating." class='img-fluid' style='height: 3rem'>";
    echo "</div>";
      echo "<div class='row mt-4 mx-auto'>";
        echo "<div class='col-md-3'>";
          echo "<p>Showing At: <text>Dundee Picture House</text></p>";
          echo "<hr>";
          echo "<p>Starting At: <text>".$showingTime."</text></p>";
          echo "<hr>";
          echo "<p>Showing In: <text>".$showingType."</text></p>";
          echo "<hr>";
        echo "</div>";

        echo "<div class='col-md-3'>";
          echo "<p>Date: <text>".$showingDateString."</text></p>";
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
        if($ticketTypesArray[$i] == "premium")
        {
          $ticketCost[$i] = $quantityArray[$i]*$priceArray[$i]->Premium_Price;
          echo "<tr>
                <td>".$quantityArray[$i]."x ".ucfirst($ticketTypesArray[$i])." ".$priceArray[$i]->Ticket_Type."</td>
                <td></td>
                <td> £".$ticketCost[$i]."</td>
                </tr>";
        }
        else
        {
          $ticketCost[$i] = $quantityArray[$i] * $priceArray[$i]->Standard_Price;
          echo "<tr>
                <td>".$quantityArray[$i]."x ".ucfirst($ticketTypesArray[$i])." ".$priceArray[$i]->Ticket_Type."</td>
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

      echo "<div class='float-right' id='paypal-button'></div>";
    ?>
  </div>
</div>

<?php
include '../Controller/payPalButton.php';
include '../Controller/bootstrapScript.php';
?>
</body>
</html>