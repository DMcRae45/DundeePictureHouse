<?php
include '../Model/DPH-api.php';




if(isset($paymentid))
{
    $code = GenerateTicketCode();

    for ($i=0 ; $i < sizeof($quantityArray) ; $i++)
    {
      //if($quantityArray[$i] >= 1)
      for ($j= 0; $j < $quantityArray[$i]; $j++)
      {
        if($ticketTypesArray[$i] == "premium")
        {
          $premiumTicket = 1;
          CreateUserTicket($code, $premiumTicket ,$paymentid, $showingArray->Showing_ID);
        }
        elseif($ticketTypesArray[$i] == "standard")
        {
          $premiumTicket = 0;
          CreateUserTicket($code, $premiumTicket ,$paymentid, $showingArray->Showing_ID);
        }
        else
        {
          echo "NAW, thanks for trying though";
        }
      }
    }
  }
?>
