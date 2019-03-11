<?php
//api file
function insertPayments($id, $state, $payerName, $payerEmail, $payerID, $paidAmount, $currency){

global $pdo;

$query =
("

INSERT INTO DPH_Payment (txn_id, payment_gross, currency_code, payer_id, payer_name, payer_email, payment_status)
    VALUES(:txn_id, :payment_gross, :currency_code, :payer_id, :payer_name, :payer_email, :payment_status)

");

$stmt = $pdo->prepare($query);

// Runs and executes the query
$success = $stmt->execute
([
'txn_id' => $id,
'payment_gross' => $paidAmount,
'currency_code' => $currency,
'payer_id' => $payerID,
'payer_name' => $payerName,
'payer_email' => $payerEmail,
'payment_status' => $state
]);

$count = $stmt->rowCount();
if($success)
{
  echo "Insert Successful";
}
else
{
  echo "Insert Failed";
  echo $query -> errorInfo()[2];
}
}
