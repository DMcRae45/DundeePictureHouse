<?php
/*
    Description: Dundee Picture House Home Page
    Author: David McRae
*/
?>
<html>
<!--<head>-->
    <?php
        include '../Model/DPH-api.php' ;
        include 'header.php';
    ?>
<!-- </head> -->
<body>

<div class="container">
    <div class="page-header">
        <h1>Dundee Picture House</h1>
    </div>

<?php

// sort by month
echo "
    <div class='row'>
        <div class='col-md-4'>
            <form method='POST' action='index.php'>
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

$rows = 0;
$cols = 3;
$counter = 1;
$nbsp = $cols - ($rows % $cols);

        if(($counter % $cols) == 1)
        {
            echo '<div class="row">';
        }

    // echo $movies ;
    $movieArray = json_decode($movies) ;
    // var_dump($movieArray) ;
    for ($i=0 ; $i < sizeof($movieArray) ; $i++)
    {
        if(($counter % $cols) == 1)
        {
            echo '<div class="row">';
        }
            echo "<div class='col-md-4'>";

            echo '<div class="card" style="width: 18rem;">';
              echo '<img src="'.$movieArray[$i]->Image_Link.'" class="card-img-top" alt="...">';
              echo '<div class="card-body">';
                echo '<h5 class="card-title">'.$movieArray[$i]->Title.'</h5>';
                echo '<p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>';
              echo '</div>';
              echo '<ul class="list-group list-group-flush">';
                echo '<li class="list-group-item">'.$movieArray[$i]->Release_Date.'</li>';
                echo '<li class="list-group-item">'.$movieArray[$i]->Age_Rating.'</li>';
                echo '<li class="list-group-item">'.$movieArray[$i]->RunTime.'</li>';
                echo '<li class="list-group-item">'.$movieArray[$i]->Genre.'</li>';
               echo '<li class="list-group-item">'.$movieArray[$i]->Star_Rating.'</li>';
              echo ' </ul>';
                echo ' <a href="#" class="btn btn-primary">More Info</a>';
              echo ' </div>';
            echo ' </div>';

              // echo "<h2>".$articleArray[$i]->Headline."</h2>";
              // echo "<img src='".$articleArray[$i]->Image_Link."' class='img-thumbnail'>";
              //echo "<p>".nl2br($articleArray[$i]->Summary)."</p>"; // Summary is declared as a substring in the select statement.

              echo "<a class='btn btn-success' href='Article.php?id=". $articleArray[$i]->Article_ID ."'>More</a>";

            echo "</div>";

            if(($counter % $cols) == 0)
            {
                echo '</div>';
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
?>

<div class="container">
<!-- <footer> -->
        <?php include 'footer.php'; ?>
<!-- </footer> -->
</div>

</div><!-- end of container-->
    <?php include '../Controller/bootstrapScript.php'; ?>
</body>
</html>
