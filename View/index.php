<?php
/*
    Description: Dundee Picture House Home Page
    Author: David McRae
*/
?>
<html>
<!--<head>-->
    <?php
        include '../Controller/getAllMovies.php';
        //include '../Model/DPH-api.php';
        include 'header.php';
    ?>
<!-- </head> -->
<title>DPH - Home</title>
<body>

<div class="container">
    <div class="page-header">
        <h2>Dundee Picture House</h2>
    </div>
<?php

// sort by month
/*
  <div class='row'>
    <div class='col-md-4'>
        <form method='POST' action='index.php'>
            <select class='form-control' name='month' onchange='this.form.submit()'>
                <option value='placeholder'>Filter By Month...</option>
                <option value='0'>All</option>
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
            <noscript><input type='submit' value ='Filter By Post Date'></noscript>
        </form>
    </div>
*/
echo "
  <div class='row'>
        <div class='col-md-4'>
            <form method='POST' action='index.php'>
                <select class='form-control' name='ordering' onchange='this.form.submit()'>
                    <option value='placeholder'>Sort By ...</option>
                    <option value='0'>Release Date (Newest to Oldest)</option>
                    <option value='1'>Release Date (Oldest to Newest)</option>
                    <option value='2'>Rating (Highest to Lowest)</option>
                    <option value='3'>Rating (Lowest to Highest)</option>
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

$rows = 0;
$cols = 3;
$counter = 1;
$nbsp = $cols - ($rows % $cols);

    for ($i=0 ; $i < sizeof($movieArray) ; $i++)
    {
      if (strlen($movieArray[$i]->Description) > "75")
      {
        $summary = substr($movieArray[$i]->Description, 0, 75);
        $summary .= "...";
      }
    else
    {
      $summary = $movieArray[$i]->Description;
    }

      if(($counter % $cols) == 1)
      {
        echo '<div class="row">';
        //echo '<div class="card-deck">';
      }


        echo "<div class='col-md-4'>";
        echo '<div class="card" style="width: 20rem;">'; // Open card div
        echo '<img src="'.$movieArray[$i]->Image_Link.'" class="card-img-top" alt="..." style="height: 30rem">'; // card image
        echo '<div class="card-body">';// open card body
        echo '<h5 class="card-title">'.$movieArray[$i]->Title.'</h5>'; // card title
        //echo '<p class="card-text">'.$summary.'</p>'; // card description
        echo '</div>';// close card body
        echo '<ul class="list-group list-group-flush">'; // start list inside the card
        echo '<li class="list-group-item">Release Date: <text>'.$movieArray[$i]->Release_Date.'</text></li>';
        echo '<li class="list-group-item">Genre: <text>'.$movieArray[$i]->Genre.'</text></li>';
        echo '<li class="list-group-item">Age Rating: <text>'.$movieArray[$i]->Age_Rating.'</text></li>';
        echo '<li class="list-group-item">Star Rating: <text>'.$movieArray[$i]->Star_Rating.'</text></li>';
        echo ' </ul>'; // end list in the card
        echo "<a class='btn btn-info' href='movie.php?id=".$movieArray[$i]->Movie_ID ."'>More</a>";
// more info button
        echo ' </div>';// close card body
        echo ' </div>';// close card

      if(($counter % $cols) == 0)
      {
          echo '</div></br>';
      }
    $counter++;
    }

    if($nbsp > 0)
    {
        for ($i = 0; $i < $nbsp; $i++)
        {
           echo'<div class="col-md-4">&nbsp;</div>';
        }
    }

    echo '</div><br>';
?>

<!-- <footer> -->
        <?php include 'footer.php'; ?>
<!-- </footer> -->

</div><!-- end of container-->
    <?php include '../Controller/bootstrapScript.php'; ?>
</body>
</html>
