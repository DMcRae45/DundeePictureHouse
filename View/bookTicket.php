<?php
/*
    Description: Dundee Picture House Home Page used to display movies and navigation.
    Author: David McRae
*/
?>
<html>
<!--<head>-->
    <?php
        include '../Controller/attempt_calculatePrice.php';
        include 'header.php';

        // arrow symbols &#9660; &#9650;

$zeroToTen = '<option selected>0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>';

$showingChoice = '<option value="standard">Standard</option>
                  <option value="premium">Premium</option>';

$adultPrice = $priceArray[0];
$childPrice = $priceArray[1];
$studentPrice = $priceArray[2];
$seniorPrice = $priceArray[3];
$familyPrice = $priceArray[4];
$totalCost = $priceArray[5];
?>
<body>

<div class="container table-responsive">
  <table class='table border border-dark text-center mt-4'>
    <form method="POST">
      <thead class='thead-dark'>
        <tr>
          <th scope='col'>Ticket Type</th>
          <th scope='col'>Showing Type</th>
          <th scope='col'>Quantity</th>
        </tr>
      </thead>
      <tr>

        <td class="col-md-6">
            <h5>Adult: </h5>
            <?php echo "<h6>£".$adultPrice."</h6>"; ?>
        </td>

          <td>
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">Showing Type: </span>
              </div>
              <select class="custom-select text" name="adultMovieType" onchange="attempt_calculatePrice.php">
                <?php echo $showingChoice; ?>
              </select>
            </div>
          </td>

          <td>
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">Quantity: </span>
              </div>
              <select class="custom-select text" name="adultQuantity" onchange="attempt_calculatePrice.php">
                <?php echo $zeroToTen; ?>
              </select>
            </div>
          </td>

          <tr>

              <td class="col-md-6">
                <h5>Child: </h5>
                <?php echo "<h6>£".$childPrice."</h6>"; ?>
              </td>

              <td>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">Showing Type: </span>
                  </div>
                  <select class="custom-select text" name="childMovieType" onchange="attempt_calculatePrice.php">
                    <?php echo $showingChoice; ?>
                  </select>
                </div>
              </td>

              <td>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">Quantity: </span>
                  </div>
                  <select class="custom-select text" name="childQuantity" onchange="attempt_calculatePrice.php">
                    <?php echo $zeroToTen; ?>
                  </select>
                </div>
              </td>

          </tr>

              <td class="col-md-6">
                <h5>Student: </h5>
                <?php echo "<h6>£".$studentPrice."</h6>"; ?>
              </td>

              <td>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">Showing Type: </span>
                  </div>
                  <select class="custom-select text" name="studentMovieType" onchange="attempt_calculatePrice.php">
                    <?php echo $showingChoice; ?>
                  </select>
                </div>
              </td>

              <td>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">Quantity: </span>
                  </div>
                  <select class="custom-select text" name="studentQuantity" onchange="attempt_calculatePrice.php">
                    <?php echo $zeroToTen; ?>
                  </select>
                </div>
              </td>

          </tr>
          <tr>

              <td class="col-md-6">
                <h5>Senior: </h5>
                <?php echo "<h6>£".$seniorPrice."</h6>"; ?>
              </td>

              <td>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">Showing Type: </span>
                  </div>
                  <select class="custom-select text" name="seniorMovieType" onchange="attempt_calculatePrice.php">
                    <?php echo $showingChoice; ?>
                  </select>
                </div>
              </td>

              <td>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">Quantity: </span>
                  </div>
                  <select class="custom-select text" name="seniorQuantity" onchange="attempt_calculatePrice.php">
                    <?php echo $zeroToTen; ?>
                  </select>
                </div>
              </td>

          </tr>
          <tr>

              <td class="col-md-6">
                <h5>Family: </h5>
                <?php echo "<h6>£".$familyPrice."</h6>"; ?>
              </td>

              <td>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">Showing Type: </span>
                  </div>
                  <select class="custom-select text" name="familyMovieType" onchange="attempt_calculatePrice.php">
                    <?php echo $showingChoice; ?>
                  </select>
                </div>
              </td>

              <td>
                <div class="form-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">Quantity: </span>
                  </div>
                  <select class="custom-select text" name="familyQuantity" onchange="attempt_calculatePrice.php">
                    <?php echo $zeroToTen; ?>
                  </select>
                </div>
              </td>

          </tr>
          <tr>
            <td><?php echo "<h6>Total Cost: </h6>"; ?></td>
            <td></td>
            <td><?php echo "<h6>£".$totalCost."</h6>"; ?></td>
          </tr>


          <tr><td colspan="3"><button class='btn btn-info btn-block' href='../Controller/attempt_checkout.php'>Checkout</button></td></tr>
    </form>
  </table>
</div>
<!-- <footer> -->
        <?php include 'footer.php'; ?>
<!-- </footer> -->

    <?php include '../Controller/bootstrapScript.php'; ?>
</body>
</html>
