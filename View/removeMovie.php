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
    <div class='page-header'>
        <h1>Remove a Movie</h1>
    </div>
    <div class='container'>
    <div class='row'>
          <div class='col-md-4'>
              <form method='POST' action='removeMovie.php'>
                  <select class='form-control' name='ordering' onchange='this.form.submit()'>
                      <option value='placeholder'>Sort By ...</option>
                      <option value='0'>Release Date (Newest to Oldest)</option>
                      <option value='1'>Release Date (Oldest to Newest)</option>
                      <option value='2'>Age Rating (Highest to Lowest)</option>
                      <option value='3'>Age Rating (Lowest to Highest)</option>
                      <option value='4'>Title (A-Z)</option>
                      <option value='5'>Title (Z-A)</option>
                      <option value='6'>RunTime (Longest to Shortest)</option>
                      <option value='7'>RunTime (Shortest to Longest)</option>
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
            <th scope='col'>Title</th>
            <th scope='col'>Star_Rating</th>
            <th scope='col'>Delete Movie</th>
          </tr>
        </thead>";

        for ($i=0 ; $i < sizeof($movieArray) ; $i++)
        {
        //echo "<div class='border border-success'>";
        echo "<tr>";
          echo "<td>".$movieArray[$i]->Movie_ID."</td>";
          echo "<td>".$movieArray[$i]->Title."</td>";
          echo '<td><img src='.$movieArray[$i]->Star_Rating.' class="img-fluid" style="height: 2rem"></td>';
          echo "<td> <a class='btn btn-danger' href='../Controller/attempt_removeMovie.php?id=". $movieArray[$i]->Movie_ID ."'>DELETE</a> </td>";
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
