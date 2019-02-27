<?php
include '../Model/DPH-api.php' ;
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
        <h1>Remove an Article</h1>
    </div>
    <div class='container'>
        <div class='row'>
            <div class='col-md-4'>
                <form method='POST' action='removeArticle.php'>
                    <select class='form-control' name='month' onchange='this.form.submit()'>
                        <option value='placeholder'>Sort By...</option>
                        <option value='0'>Most Recent</option>
                        <option value='1'>January</option>
                        <option value='2'>February</option>
                        <option value='3'>March</option>
                        <option value='4'>April</option>
                        <option value='5'>May</option>
                        <option value='6'>June</option>
                        <option value='7'>July</option>
                        <option value='8'>August</option>
                        <option value='9'>September</option>
                        <option value='10'>October</option>
                        <option value='11'>November</option>
                        <option value='12'>December</option>
                    </select>
                    <noscript><input type='submit' value ='Sort By Post Date'></noscript>
                </form>
            </div>
        </div>
    ";
    $movies = GetAllMovies();
    // echo $articles ;
    $movieArray = json_decode($movies);

    echo "
    <table class='table border border-dark text-center'>
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
          echo "<td>".nl2br($movieArray[$i]->Star_Rating)."</td>";
          echo "<td> <a class='btn btn-danger' href='../Controller/attempt_removeMovie.php?id=". $movieArray[$i]->Movie_ID ."'>DELETE</a> </td>";
          echo "<tr>";
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
