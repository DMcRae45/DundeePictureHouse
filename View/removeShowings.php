<?php
include 'session.php';


if(isset($_SESSION['jobrole']) && $_SESSION['jobrole'] == "manager")
{
  include '../Controller/getAllMovies.php';
  include 'header.php';
echo "
<html>
<head>
<title>DPH - Remove Showings</title>
</head>

<body>
  <div class='container'>
    <div class='page-header'>
        <h1>Remove a Showing</h1>
    </div>
    <div class='container'>";

if (!isset($_GET['movieID']))
  {
    echo"<div class='row'>
          <div class='col-md-4'>
              <form method='POST' action='removeShowings.php'>
                  <select class='form-control' name='ordering' onchange='this.form.submit()'>
                      <option value='placeholder'>Sort By ...</option>
                      <option value='8'>ID(First to Last)</option>
                      <option value='9'>ID(Last to First)</option>
                      <option value='0'>Release Date (Newest to Oldest)</option>
                      <option value='1'>Release Date (Oldest to Newest)</option>
                      <option value='4'>Title (A-Z)</option>
                      <option value='5'>Title (Z-A)</option>
                      <option value='2'>Age Rating (Lowest to Highest)</option>
                      <option value='3'>Age Rating (Lowest to Highest)</option>
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
        <th scope='col'>Age Rating</th>
        <th scope='col'>Release Date</th>
        <th scope='col'>Star Rating</th>
        <th scope='col'>Display Showings</th>
      </tr>
    </thead>";

    for ($i=0 ; $i < sizeof($movieArray) ; $i++)
    {
      echo "<tr>";
      echo "<td>".$movieArray[$i]->Movie_ID."</td>";
      echo "<td>".$movieArray[$i]->Title."</td>";
      echo '<td><img src='.$movieArray[$i]->Age_Rating.' class="img-fluid" style="height: 2rem"></td>';
      echo "<td>".$movieArray[$i]->Release_Date."</td>";
      echo '<td><img src='.$movieArray[$i]->Star_Rating.' class="img-fluid" style="height: 2rem"></td>';
      echo "<td><a class='btn btn-warning' href='?movieID=".$movieArray[$i]->Movie_ID."'>Showings</a></td>";
      echo "</tr>";

    }
  }
    else
    {

      echo "<a class='btn btn-outline-info' href='removeShowings.php'>Return</a>";

      include '../Controller/getShowingsByMovieID.php';
      if (sizeof($showsArray) > 0)
      {
        echo'
        <table class="table border border-dark text-center mt-4">
          <thead class="thead-dark">
            <tr class="p-10">
              <th scope="col">Showing ID</th>
              <th scope="col">Screen</th>
              <th scope="col">Showing Type</th>
              <th scope="col">Date</th>
              <th scope="col">Time</th>
              <th scope="col">DELETE</th>
            </tr>
          </thead>';
        for ($i=0 ; $i < sizeof($showsArray) ; $i++)
        {
          echo "<tr>";
          echo "<td>".$showsArray[$i]->Showing_ID."</td>";
          echo "<td>".$showsArray[$i]->Screen_ID."</td>";
          echo "<td>".$showsArray[$i]->Showing_Type."</td>";
          echo "<td>".$showsArray[$i]->Showing_Date."</td>";
          echo "<td>".$showsArray[$i]->Showing_Start_Time."</td>";
          echo "<td><a class='btn btn-danger text-light' data-toggle='modal' data-target='#delete".$showsArray[$i]->Showing_ID."Modal'>DELETE</a></td>";
          echo "</tr>";

          echo "<div class='modal fade' id='delete".$showsArray[$i]->Showing_ID."Modal' tabindex='-1' role='dialog' aria-labelledby='deleteModalLabel' aria-hidden='true'>
                  <div class='modal-dialog' role='document'>
                    <div class='modal-content bg-dark'>
                      <div class='modal-header'>
                        <h5 class='modal-title' id='deleteModalLabel'>Are You Sure?</h5>
                        <button type='button' class='close btn btn-dark' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                      </div>
                      <div class='modal-body'>
                        <p>Are you sure you want to delete showing ".$showsArray[$i]->Showing_ID." for ".$movieArray[$i]->Title."?<p>
                      </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-outline-warning' data-dismiss='modal'>No!</button>
                        <a class='btn btn-outline-danger' role='button' href='../Controller/attempt_removeShowing.php?showingid=".$showsArray[$i]->Showing_ID."&movieid=".$_GET['movieID']."'>DELETE</a>
                      </div>
                    </div>
                  </div>
                </div>";
        }
      }
      else
      {
        echo"<div class='page-header'>
              <h5>This Movie Has No Showings</h5>
            </div>";
      }
      echo"</div>";

  }
  echo "</table>
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
}
elseif(isset($_SESSION['jobrole']))
{
  header("Location: index.php?error=ACCESS DENIED MANAGER REQUIRED");
}
else
{
  header("Location: index.php?error=ACCESS DENIED");
}
?>
