<?php

// Include and initialize database class
include '../Controller/getCheckoutInfo.php';
include 'header.php';

// Include and initialize paypal class

include '../Model/PaypalExpress.php';
$paypal = new PaypalExpress;
?>

<html lang="en-US">
<head>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
</head>
<body>

<?php
  echo "<div class='container'>"; // Open container
    echo "<div class='mt-4'>";
      echo "<h3 class='d-inline'>".$movieArray->Title."</h3>"; // Display movie title
      echo "<img class='d-inline float-right' src=".$movieArray->Age_Rating." class='img-fluid' style='height: 3rem'>";
    echo "</div>";
      echo "<div class='row mt-4'>";
        echo "<div class='col-md-6'>";
          echo "<p>Showing At: <text>Dundee Picture House</text></p>";
          echo "<hr>";
          echo "<p>Date: <text>".$showingDateString."</text></p>";
          echo "<hr>";
          echo "<p>Starting At: <text>".$showingTime."</text></p>";
          echo "<hr>";
          echo "<p>Showing In: <text>".$showingType."</text></p>";
          echo "<hr>";
          echo "<p>Screen: <text>".$showingArray->Screen_ID."</text></p>";
          echo "<hr>";

        echo "</div>";
      echo "</div>";

  echo "</div>"; // Close container

echo "<div class= 'container'>";
    echo "
      <table class='table table-dark'>
        <thead>
          <tr>
          <th scope='col'>Ticket</th>
          <th scope='col'></th>
          <th scope='col'>Sub-Total</th>
          </tr>
        </thead>
        <body>";

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
      echo "<div class= 'float-right' id='paypal-button'></div>";
    ?>
</div>

<!--
JavaScript code to render PayPal checkout button
and execute payment
-->

<script>
paypal.Button.render({
    // Configure environment
    env: '<?php echo $paypal->paypalEnv; ?>',
    client: {
        sandbox: '<?php echo $paypal->paypalClientID; ?>',
        production: '<?php echo $paypal->paypalClientID; ?>'
    },
    // Customize button (optional)
    locale: 'en_GB',
    style: {
        size: 'medium',
        color: 'gold',
        textarea: 'white',
        shape: 'pill'
    },
    // Set up a payment
    payment: function (actions) {
        return actions.payment.create({
            transactions: [{
                amount: {
                    total: '<?php echo $totalCost?>',
                    currency: 'GBP'
                }
            }]
      });
    },

    // Execute the payment
    onAuthorize: function (data, actions) {
        return actions.payment.execute()
        .then(function () {
            // Show a confirmation message to the buyer
            window.alert('Thank you for your purchase!');
            // Redirect to the payment process page
            window.location = "../Controller/process.php?paymentID="+data.paymentID+"&token="+data.paymentToken+"&payerID="+data.payerID;
        });
    }
}, '#paypal-button');
</script>
</body>
</html>
