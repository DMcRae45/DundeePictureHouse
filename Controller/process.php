<?php
session_start();
$redirectStr = '';
if(!empty($_GET['paymentID']) && !empty($_GET['token']) && !empty($_GET['payerID']) ){
    // Include database and API
    include '../Model/DPH-api.php';

// Include and initialize paypal class
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

        $insert = insertPayments($customerid, $transactionid, $paymentStatus, $buyerName, $buyerEmail, $buyerID, $grossAmount, $currencyCode);
      }
    // Redirect to payment status page
    header("Location:payment-status.php".$redirectStr);
}
else
{
    // Redirect to the home page
    header("Location:index.php");
}

?>
