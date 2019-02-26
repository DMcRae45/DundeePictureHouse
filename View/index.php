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
<title>DPH - Home</title>
<body>

<div class="container">
    <div class="page-header">
        <h1>Dundee Picture House</h1>
    </div>
<?php

// sort by month
/*
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
";*/

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

        echo '<div class="card" style="width: 20rem;">'; // Open card div
          echo '<img src="'.$movieArray[$i]->Image_Link.'" class="card-img-top" alt="...">'; // card image
          echo '<div class="card-body">';// open card body
            echo '<h5 class="card-title">'.$movieArray[$i]->Title.'</h5>'; // card title
            echo '<p class="card-text">'.$movieArray[$i]->Description.'</p>'; // card description
          echo '</div>';// close card body
          echo '<ul class="list-group list-group-flush">'; // start list inside the card
            echo '<li class="list-group-item">'.$movieArray[$i]->Release_Date.'</li>';
            echo '<li class="list-group-item">'.$movieArray[$i]->Age_Rating.'</li>';
            echo '<li class="list-group-item">'.$movieArray[$i]->RunTime.'</li>';
            echo '<li class="list-group-item">'.$movieArray[$i]->Genre.'</li>';
           echo '<li class="list-group-item">'.$movieArray[$i]->Star_Rating.'</li>';
          echo ' </ul>'; // end list in the card
            echo ' <a href="#" class="btn btn-info">More Info</a>'; // more info button
          echo ' </div>';// close card body
        echo ' </div>';// close card

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
