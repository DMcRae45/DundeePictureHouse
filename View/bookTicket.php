<?php
/*
    Description: Dundee Picture House Booking page for users to purchase tickets.
    Author: David McRae, Brad Mair
*/
?>
<html>
<!--<head>-->
<?php
include 'header.php';
include '../Controller/getTicketInfo.php';
// TRYING TO PASS THIS INTO THE .JS FILE BUT FAILING
$ticketTypeArray = "";
$comma = ",";
$quote = '"';
for ($i=0 ; $i < sizeof($priceArray) ; $i++)
{
  if($i < sizeof($priceArray) -1)
  {
    $ticketTypeArray = $ticketTypeArray.$quote.strtolower($priceArray[$i]->Ticket_Type).$quote.$comma;
  }
  else
  {
    $ticketTypeArray = $ticketTypeArray.$quote.strtolower($priceArray[$i]->Ticket_Type).$quote;
  }
}
?>

<body>
<div class="container table-responsive">
  <table class='table border border-dark text-center mt-4'>
    <form method="POST" action="">
      <thead class='thead-dark'>
        <tr>
          <th scope='col'>Ticket Type</th>
          <th scope='col'>Showing Type</th>
          <th scope='col'>Quantity</th>
        </tr>
      </thead>
      <?php
      for ($i=0 ; $i < sizeof($priceArray) ; $i++)
      {
        echo "
        <tr>
          <td class='col-md-6'>
            <h5>".$priceArray[$i]->Ticket_Type.": </h5>
            <h6 id='".strtolower($priceArray[$i]->Ticket_Type)."ticketPrice'>£".$priceArray[$i]->Standard_Price."</h6>
          </td>
          <td>
            <div class='form-group input-group'>
              <div class='input-group-prepend'>
                <span class='input-group-text' id='inputGroupPrepend'>Showing Type: </span>
              </div>
              <select class='custom-select text' standardPrice='".$priceArray[$i]->Standard_Price."' premiumPrice='".$priceArray[$i]->Premium_Price."' id='".strtolower($priceArray[$i]->Ticket_Type)."MovieType' onchange='CalculateTotalCost(".$ticketTypeArray.")'>
                <option value='standard'>Standard</option>
                <option value='premium'>Premium</option>
              </select>
            </div>
          </td>
          <td>
            <div class='form-group input-group'>
              <div class='input-group-prepend'>
                <span class='input-group-text' id='inputGroupPrepend'>Quantity: </span>
              </div>
              <select class='custom-select text' id='".strtolower($priceArray[$i]->Ticket_Type)."Quantity' onchange='CalculateTotalCost(".$ticketTypeArray.")'>
                <option value='0'>0</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
                <option value='6'>6</option>
                <option value='7'>7</option>
                <option value='8'>8</option>
                <option value='9'>9</option>
                <option value='10'>10</option>
              </select>
            </div>
          </td>
        </tr>
        ";
      }
      ?>
      <tr>
        <td><?php echo "<h6>Total Cost: </h6>"; ?></td>
        <td></td>
        <td><?php echo "<h6 id='totalCost'>£0</h6>"; ?></td>
      </tr>
      <tr>
        <td colspan="3"><button class='btn btn-info btn-block' href='../Controller/attempt_checkout.php'>Checkout</button></td>
      </tr>
    </form>
  </table>
</div>
<script src='../Controller/calculatePrice.js'></script>
<!-- <footer> -->
        <?php include 'footer.php'; ?>
<!-- </footer> -->
    <?php include '../Controller/bootstrapScript.php'; ?>
</body>
</html>
