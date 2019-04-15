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

        $seatingTypesArray = $_SESSION['seatingTypeBasket'];
        $quantityArray = $_SESSION['quantityBasket'];
        $priceArray = $_SESSION['priceArray'];

        $showingID = $_GET['showingid'];

        for ($i=0 ; $i < sizeof($quantityArray) ; $i++)
        {
          echo "<br>";
          for ($j=0 ; $j < $quantityArray[$i] ; $j++)
          {
            if($seatingTypesArray[$i] == "Premium")
            {
              CreateUserTicket($code, $priceArray[$i]->Ticket_Type, $seatingTypesArray[$i], $paymentid[0], $showingID);
            }
            elseif($seatingTypesArray[$i] == "Standard")
            {
              //$premiumTicket = 0;
              CreateUserTicket($code, $priceArray[$i]->Ticket_Type, $seatingTypesArray[$i], $paymentid[0], $showingID);
            }
            else
            {
              echo "tickets were not as expected.";
            }
          }
        }
        //Destroy session variable no longer needed to create a ticket.
        //Destroy($_SESSION['seatingTypeBasket']);
        include 'emailConfirmation.php';
      }
    // Redirect to payment status page
    header("Location:../View/userTicket.php");
}
else
{
    // Redirect to the home page
    header("Location:../View/index.php?error=ACCESS DENIED");
}

?>
