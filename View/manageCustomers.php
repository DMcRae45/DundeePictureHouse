<?php
/*
    Description: User interface used to manage customer accounts.

    Author: Brad Mair, David McRae
*/

include 'session.php';
if(isset($_SESSION['jobrole']) && $_SESSION['jobrole'] == "manager")
{
  include 'header.php';
  include '../Controller/getAllCustomers.php';
echo "
<html>
<head>
<title>DPH - Customer Managment</title>
</head>

<body>
  <div class='container'>
    <div class='page-header'>
        <h1>Manage Users</h1>
    </div>
    ";

    echo "
    <table class='table border border-dark text-center'>
      <thead class='thead-dark'>
          <tr>
            <th scope='col'>ID</th>
            <th scope='col'>Name</th>
            <th scope='col'>Username</th>
            <th scope='col'>Email</th>
            <th scope='col'>Delete</th>
          </tr>
        </thead>";

        for ($i=0 ; $i < sizeof($customerArray) ; $i++)
        {
        echo "<tr>";
          echo "<td>".$customerArray[$i]->Customer_ID."</td>";
          echo "<td>".$customerArray[$i]->First_Name." ".$customerArray[$i]->Surname."</td>";
          echo "<td>".$customerArray[$i]->Username."</td>";
          echo "<td>".$customerArray[$i]->Email."</td>";
          echo "<td> <a class='btn btn-danger text-light' data-toggle='modal' data-target='#delete".$customerArray[$i]->Customer_ID."Modal'>DELETE</a> </td>";
          echo "<tr>";

          echo "<div class='modal fade' id='delete".$customerArray[$i]->Customer_ID."Modal' tabindex='-1' role='dialog' aria-labelledby='deleteModalLabel' aria-hidden='true'>
                  <div class='modal-dialog' role='document'>
                    <div class='modal-content bg-dark'>
                      <div class='modal-header'>
                        <h5 class='modal-title' id='deleteModalLabel'>Are You Sure?</h5>
                        <button type='button' class='close btn btn-dark' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                      </div>
                      <div class='modal-body'>
                        <p>Are you sure you want to delete ".$customerArray[$i]->First_Name." ".$customerArray[$i]->Surname."?<p>
                      </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-outline-warning' data-dismiss='modal'>No!</button>
                        <a class='btn btn-outline-danger' role='button' href='../Controller/attempt_deleteCustomer.php?id=".$customerArray[$i]->Customer_ID."'>DELETE</a>
                      </div>
                    </div>
                  </div>
                </div>";
        }
        echo "</table>";
echo "
    </div>
";
// <footer>
  include 'footer.php';
// </footer>
// <Script>
  include '../Controller/bootstrapScript.php';
// </Script>
echo "
</body>
</html>
";
}
else
{
  header("Location: index.php?error=ACCESS DENIED");
}
?>
