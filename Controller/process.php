<?php
session_start();
if(!empty($_GET['paymentID']) && !empty($_GET['token']) && !empty($_GET['payerID']) ){
    // Include database and API
    //include '../Model/DPH-api.php';
    include '../Controller/getCheckoutInfo.php';
// Include and initialize paypal class
    //include '../Model/PaypalExpress.php';
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

        echo "payment id: ".$paymentid;
        echo "code: ".$code;

        for ($i=0 ; $i < sizeof($quantityArray) ; $i++)
        {
        echo "Quantity array:".$quantityArray[$i];
        }
        for ($i=0 ; $i < sizeof($ticketTypesArray) ; $i++)
        {
        echo "ticketTypes array:".$ticketTypesArray[$i];
        }



        for ($i=0 ; $i < sizeof($quantityArray) ; $i++)
        {
          //for ($j= 0; $j < $quantityArray[$i]; $j++)
          if($quantityArray[$i] >= 1)
          {
            if($ticketTypesArray[$i] == "premium")
            {
              $premiumTicket = 1;
              CreateUserTicket($code, $premiumTicket ,$paymentid, $showingID);
            }
            elseif($ticketTypesArray[$i] == "standard")
            {
              $premiumTicket = 0;
              CreateUserTicket($code, $premiumTicket ,$paymentid, $showingID);
            }
            else
            {
              echo "tickets were not as expected.";
            }
          }
        }

      }
    // Redirect to payment status page
    //header("Location:../View/paymentSuccess.php");
}
else
{
    // Redirect to the home page
    header("Location:../View/index.php");
}

?>
