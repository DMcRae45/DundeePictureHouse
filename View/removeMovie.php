<?php
include '../Model/bungieNews-api.php' ;
include 'header.php';

if (!isset($_SESSION['LoggedIn']) || $_SESSION['Admin_Status'] != 1)
{
  header("Location: index.php");
}
else
{
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
    $articles = GetAllArticles();
    // echo $articles ;
    $articleArray = json_decode($articles) ;

    echo "
    <table class='table border border-dark text-center'>
      <thead class='thead-dark'>
          <tr>
            <th scope='col'>Article ID</th>
            <th scope='col'>Headline</th>
            <th scope='col'>Summary</th>
            <th scope='col'>Delete Article</th>
          </tr>
        </thead>";

        for ($i=0 ; $i < sizeof($articleArray) ; $i++)
        {
        //echo "<div class='border border-success'>";
        echo "<tr>";
          echo "<td>".$articleArray[$i]->Article_ID."</td>";
          echo "<td>".$articleArray[$i]->Headline."</td>";
          echo "<td>".nl2br($articleArray[$i]->Summary)."</td>";
          echo "<td> <a class='btn btn-danger' href='../Controller/attempt_removeArticle.php?id=". $articleArray[$i]->Article_ID ."'>DELETE</a> </td>";
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
}

?>
