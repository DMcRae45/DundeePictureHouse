<?php
/*
    Description: form used to find the customers ticket(s)

    Author: David McRae
*/

include 'session.php';
if(isset($_SESSION['jobrole']))
{
  include 'header.php';
  ?>
  <body>

  <div class='container mt-5'>
    <form class='form-group needs-validation' method='POST' action='../View/customerTicket.php' novalidate>

        <div class='form-group input-group' form-group-lg>
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend">Ticket Code</span>
          </div>
            <input class='form-control' type='text' name='code' placeholder='Ticket Code' required>
        </div>
        <button class='form-control btn btn-outline-info' type='submit' name='findTicketSubmit'>Find Ticket</button>
    </form>
  </div>

  <?php
  include 'footer.php';
  include '../Controller/bootstrapScript.php';
  require '../Controller/ValidateEmptyFields.js';
  echo "</body>";
}
else
{
  header('Location: ../View/index.php?error=ACCESS DENIED');
}
