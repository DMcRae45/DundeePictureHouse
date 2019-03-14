<?php
include '../Controller/getAllMovies.php';
include 'header.php';

//if (!isset($_SESSION['LoggedIn']) || $_SESSION['Admin_Status'] != 1)
//{
//  header("Location: index.php");
//}
//else
//{
echo "
<html>
<head>

</head>

<body>
  <div class='container'>
    <div class='container'>
    <div class='page-header'>
        <h3>Alter Movie Records</h3>
    </div>
    <div class='row'>
          <div class='col-md-4'>
              <form method='POST' action='alterMovies.php'>
                  <select class='form-control' name='ordering' onchange='this.form.submit()'>
                      <option value='placeholder'>Sort By ...</option>
                      <option value='8'>ID(First to Last)</option>
                      <option value='9'>ID(Last to First)</option>
                      <option value='0'>Release Date (Newest to Oldest)</option>
                      <option value='1'>Release Date (Oldest to Newest)</option>
                      <option value='4'>Title (A-Z)</option>
                      <option value='5'>Title (Z-A)</option>
                  </select>
                  <noscript><input type='submit' value ='Sort By'></noscript>
              </form>
          </div>
      </div>
  ";

    echo "
    <table class='table border border-dark text-center mt-4'>
      <thead class='thead-dark'>
          <tr>
            <th scope='col'>Movie ID</th>
            <th scope='col' class='text-left'>Title</th>
            <th scope='col'>Age Rating</th>
            <th scope='col'>Release Date</th>
            <th scope='col'>Star Rating</th>
            <th scope='col'>Alter Movie</th>
          </tr>
        </thead>";

        for ($i=0 ; $i < sizeof($movieArray) ; $i++)
        {
        //echo "<div class='border border-success'>";
        echo "<tr>";
          echo "<td>".$movieArray[$i]->Movie_ID."</td>";
          echo "<td class='text-left'>".$movieArray[$i]->Title."</td>";
          echo '<td><img src='.$movieArray[$i]->Age_Rating.' class="img-fluid" style="height: 2rem"></td>';
          echo "<td>".$movieArray[$i]->Release_Date."</td>";
          echo '<td><img src='.$movieArray[$i]->Star_Rating.' class="img-fluid" style="height: 2rem"></td>';
          echo "<td> <a class='btn btn-warning' href=''>Alter</a> </td>";
          echo "</tr>";
      }
      echo "</table>";
echo "
    </div>
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
//}
?>
