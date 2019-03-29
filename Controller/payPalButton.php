<script src="https://www.paypalobjects.com/api/checkout.js"></script>
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
    style:
    {
        size: 'large',
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

    <?php
    $_SESSION['seatingTypeBasket'] = $seatingTypesArray;
    $_SESSION['quantityBasket'] = $quantityArray;
    $_SESSION['priceArray'] = $priceArray;
    ?>

    // Execute the payment
    onAuthorize: function (data, actions) {
        return actions.payment.execute()
        .then(function () {
            // Show a confirmation message to the buyer
            window.alert('Thank you for your purchase!');
            // Redirect to the payment process page
            window.location = "../Controller/process.php?paymentID="+data.paymentID+"&token="+data.paymentToken+"&payerID="+data.payerID+"&showingid="+<?php echo $showingID ?>;
        });
    }
}, '#paypal-button');
</script>
