<?php
session_start();
if(!empty($_GET['paymentID']) && !empty($_GET['token']) && !empty($_GET['payerID']) ){
    // Include database and API
    include '../Model/DPH-api.php';
    include '../Model/PaypalExpress.php';

    $paypal = new PaypalExpress;

    // Get payment info from URL
    $paymentID = $_GET['paymentID'];
    $token = $_GET['token'];
    $buyerID = $_GET['payerID'];

    // Validate transaction via PayPal API
    $paymentCheck = $paypal->validate($paymentID, $token, $buyerID);

    // If the payment is valid and approved
    if($paymentCheck && $paymentCheck->state == 'approved')
    {
        // Get the transaction data
        $customerid = $_SESSION['userid'];
        $transactionid = $paymentCheck->id;
        $grossAmount = $paymentCheck->transactions[0]->amount->details->subtotal;
        $currencyCode = $paymentCheck->transactions[0]->amount->currency;
        $buyerID = $paymentCheck->payer->payer_info->payer_id;
        $buyerName = $paymentCheck->payer->payer_info->first_name.' '.$paymentCheck->payer->payer_info->last_name;
        $buyerEmail = $paymentCheck->payer->payer_info->email;
        $paymentStatus = $paymentCheck->state;

        insertPayments($customerid, $transactionid, $paymentStatus, $buyerName, $buyerEmail, $buyerID, $grossAmount, $currencyCode);

        $paymentid = GetPaymentID($customerid);
        $code = GenerateTicketCode();

        $ticketTypesArray = $_SESSION['ticketTypeBasket'];
        $quantityArray = $_SESSION['quantityBasket'];
        $showingID = $_GET['showingid'];

        for ($i=0 ; $i < sizeof($quantityArray) ; $i++)
        {
          echo "<br>";
          for ($j=0 ; $j < $quantityArray[$i] ; $j++)
          {
            if($ticketTypesArray[$i] == "premium")
            {
              $premiumTicket = 1;
<<<<<<< HEAD
              CreateUserTicket($code, $ticketTypesArray[$j],$premiumTicket, $paymentid[0], $showingID);
=======
              CreateUserTicket($code, $premiumTicket, $paymentid[0], $showingID);
>>>>>>> ef595200052f8444987d6fb850bb667d1dfe736f
            }
            elseif($ticketTypesArray[$i] == "standard")
            {
              $premiumTicket = 0;
<<<<<<< HEAD
              CreateUserTicket($code, $ticketTypesArray[$j], $premiumTicket, $paymentid[0], $showingID);
=======
              CreateUserTicket($code, $premiumTicket, $paymentid[0], $showingID);
>>>>>>> ef595200052f8444987d6fb850bb667d1dfe736f
            }
            else
            {
              echo "tickets were not as expected.";
            }
          }
        }
        include 'emailConfirmation.php';
      }
    // Redirect to payment status page
    header("Location:../View/userTicket.php");
}
else
{
    // Redirect to the home page
    header("Location:../View/index.php");
}

?>
