<?php
/*
    Description:

    Author: David McRae
*/
include '../Model/DPH-api.php' ;

//if (!isset($_SESSION['LoggedIn']) || $_SESSION['Admin_Status'] != 1)
//{
//  header("Location: index.php");
//}
//else
//{
//echo"
?>
<html>
<?php
include 'header.php';
?>

<body>
  <div class='container'>
    <div class='page-header'>
        <h1>Booking</h1>
    </div>

<div class='container'>
  <form class='form-group needs-validation' method='POST' action='../Controller/attempt_insertBooking.php' enctype='multipart/form-data' novalidate>

    <div class='form-group input-group' form-group-lg>

      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroupPrepend">Adult</span>
      </div>
      <input class='form-control' type='text' name='adult' id='ticketType_1' value ='0' onchange='CalculateItemsValue()' onkeyup='CalculateAdult()' data-price ='7'>
      <div class='input-group-append'>
        <span class='input-group-text' id='inputGroupAppend1'>£7</span>
      </div>
    </div>

    <div class='form-group input-group' form-group-lg>
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroupPrepend">Adult Premium</span>
      </div>
      <input class='form-control' type='text' name='AdPremium' id='ticketType_2' value ='0' onchange='CalculateItemsValue()' onkeyup='CalculateAdultPremium()'  data-price ='8'>
      <div class='input-group-append'>
        <span class='input-group-text' id='inputGroupAppend2' name='AdultPrem'>£8</span>
      </div>

      <div class="form-group input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">Ticket Type</span>
        </div>
        <select class="custom-select" name="ticketType" required>
          <option value="">Please Select what type of ticket you would like.</option>
          <option value="Adult">Adult</option>
          <option value="Adult Premium">Adult Premium</option>
          <option value="Child">Child</option>
          <option value="Child Premium">Child Premium</option>
          <option value="Student">Student</option>
          <option value="Student Premium">Student Premium</option>
        </select>
        <div class="invalid-feedback"></div>
      </div>

      <div class="form-group input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">Adult Ticket</span>
        </div>
        <select class="custom-select" id='ticketType_1' name="adult" onchange="CalculateItemsValue()" onkeyup="CalculateAdultPremium()" data-price ="7">
          <option value="">Please Select how many Adults are attending</option>
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
        <div class='input-group-append'>
          <span class='input-group-text' id='inputGroupAppend1'>£7</span>
        </div>
      </div>

    </div>


<!--            <div class='form-group input-group' form-group-lg>
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">U16</span>
              </div>
                <input class='form-control' type='text' name='title' id='ticketType_3' value ='0' onchange='CalculateItemsValue()' onkeyup='CalculateU16()' data-price ='5' required>
            <div class='input-group-append'>
                <span class='input-group-text' id='inputGroupAppend3'>£5</span>
            </div>

            </div>


             <div class='form-group input-group' form-group-lg>
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">U16 Premium</span>
              </div>
                <input class='form-control' type='text' name='title' id='ticketType_4' value ='0' onchange='CalculateItemsValue()' onkeyup='CalculateU16Premium()' data-price ='6' required>
            <div class='input-group-append'>
                <span class='input-group-text' id='inputGroupAppend4'>£6</span>
            </div>

            </div>


            <div class='form-group input-group' form-group-lg>
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend">Concession</span>
                </div>

                <input class='form-control' type='text' name='' id='ticketType_5' value ='0' onchange='CalculateItemsValue()' onkeyup='CalculateConcession()' data-price ='4' required>

                <div class='input-group-append'>
                    <span class='input-group-text' id='inputGroupAppend5'>£4</span>
                </div>

            </div>

            <div class='form-group input-group' form-group-lg>
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend">Student</span>
                </div>

                <input class='form-control' type='text' name='' id='ticketType_6' value ='0' onchange='CalculateItemsValue()' onkeyup='CalculateStudent()' data-price ='5' required>

                <div class='input-group-append'>
                    <span class='input-group-text' id='inputGroupAppend6'>£5</span>
                </div>

            </div>
Add after Inital 2 work
-->
            <div id="TicketTotal" value='0'>£0</div>
            <div>
            <button class='form-control' type='submit' name='insertBooking'>Place Booking</button>
            </div>
        </form>
    </div>
</div>

<!-- <footer> -->
<?php include 'footer.php'; ?>
<!-- </footer> -->
<!-- <Script> -->
<?php
include '../Controller/bootstrapScript.php';
echo "<script>";
require '../Controller/calculatePrice.js';
echo "</script>";
require '../Controller/ValidateEmptyFields.js';
?>
<!-- </Script> -->

</body>
</html>
