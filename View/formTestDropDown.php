<?php
/*
    Description: Dundee Picture House Home Page used to display movies and navigation.
    Author: David McRae
*/
?>
<html>
<!--<head>-->
    <?php
        //include '../Controller/getAllMovies.php';
        //include '../Model/DPH-api.php';
        include 'header.php';
    ?>
<body>

<div class="container">
<div class="table-responsive">
  <table class='table border border-dark text-center mt-4'>
      <thead class='thead-dark'>
        <tr>
          <th scope='col'>Ticket</th>
          <th scope='col'>Showing</th>
          <th scope='col'>Viewers</th>
          <th scope='col'>Confirm</th>
        </tr>
      </thead>
      <tr>

          <td>
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">Standard Tickets</span>
              </div>
              <select class="custom-select text" name="standardTicketType" required>
                <option value="">Please Select what type of ticket you would like.</option>
                <option value="standardAdult">Standard Adult</option>
                <option value="standardChild">Standard Child</option>
                <option value="standardStudent">Standard Student</option>
                <option value="standardSenior">Standard Senior</option>
                <option value="standardFamily">Standard Family</option>
              </select>
            </div>
          </td>

          <td>
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">Showing</span>
              </div>
              <select class="custom-select text" name="movieType" required>
                <option value="2D">2D</option>
                <option value="3D">3D</option>
              </select>
            </div>
          </td>

          <td>
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">X</span>
              </div>
              <select class="custom-select text" name="amount" <?php if(ticketType == ""){echo 'required';}?>>
                <option value="">Attendees</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select>
            </div>
          </td>

          <!-- DO AN ARRAY FOR THIS PAGE AND ACCES IT WHITH THIS BUTTON <td> <a class='btn btn-success' href='../Controller/attempt_addToBasket.php?id=". $baskeetArray[$i]->Employee_ID ."'>PROMOTE</a> </td>"; -->
          <td> <button class='btn btn-success' href=''>ADD</button> </td>

      </tr>
      <tr>
      <td>
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend">Premium Tickets</span>
          </div>
          <select class="custom-select text" name="premiumTicketType" required>
            <option value="">Please Select what type of ticket you would like.</option>
            <option value="premiumAdult">Premuim Adult</option>
            <option value="premiumChild">Premuim Child</option>
            <option value="premiumStudent">Premuim Student</option>
            <option value="premiumSenior">Premuim Senior</option>
            <option value="premiumFamily">Premuim Family</option>
          </select>
        </div>
      </td>
      <td>
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend">Showing</span>
          </div>
          <select class="custom-select text" name="movieType" required>
            <option value="2D">2D</option>
            <option value="3D">3D</option>
          </select>
        </div>
      </td>

      <td>
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend">X</span>
          </div>
          <select class="custom-select text" name="amount" <?php if(ticketType != ""){echo 'required';}?>>
            <option value="">Attendees</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
        </div>
      </td>

<td> <button class='btn btn-success' href=''>ADD</button> </td>

    </tr>
  </table>
</div>
</div>
<!-- <footer> -->
        <?php include 'footer.php'; ?>
<!-- </footer> -->

    <?php include '../Controller/bootstrapScript.php'; ?>
</body>
</html>
