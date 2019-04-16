<?php
/*
    Description: Dundee Picture House Home Page used to display movies and navigation.
    Author: David McRae, Aaron Hay
*/
?>
<html>
<!--<head>-->
    <?php
    include 'session.php';
        include '../Controller/getAllMovies.php';
        //include '../Model/DPH-api.php';
        include 'header.php';
    ?>
<!-- </head> -->
<title>DPH - Home</title>
</body>
<?php
  //Error Reporting for the users
  if(isset($_GET['error']))
  {
    $error = $_GET['error'];
    echo $error;
  }
?>

  <div class="page-header" data-pause="hover">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators" style="bottom:-20;">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/dph-header.png" class="img-fluid" alt="dundee picture house home banner" onerror=this.src="images/ad.placeholder.banner.png">
        </div>
        <div class="carousel-item">
          <img src="..." class="img-fluid" alt="dundee picture house ad banner" onerror=this.src="images/ad_placeholder_banner.png">
        </div>
        <div class="carousel-item">
          <img src="..." class="img-fluid" alt="dundee picture house ad banner" onerror=this.src="images/ad_placeholder_banner2.png">
        </div>
        <div class="carousel-item">
          <img src="..." class="img-fluid" alt="dundee picture house ad banner" onerror=this.src="images/ad_placeholder_banner.png">
        </div>
        <div class="carousel-item">
          <img src="..." class="img-fluid" alt="dundee picture house ad banner" onerror=this.src="images/ad_placeholder_banner2.png">
        </div>
      </div>
    </div>
  </div>

<div class="container">
<?php
echo "
<br>
  <div class='row'>
        <div class='col-md-4'>
            <form method='POST' action='index.php'>
                <select class='form-control' name='ordering' onchange='this.form.submit()'>
                    <option value='placeholder'>Sort By ...</option>
                    <option value='0'>Release Date (Newest to Oldest)</option>
                    <option value='1'>Release Date (Oldest to Newest)</option>
                    <option value='2'>Age Rating (Lowest to Highest)</option>
                    <option value='3'>Age Rating (Highest to Lowest)</option>
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

echo "<div class='col-md-4 mt-4'>"; // open col
  echo '<div class="card">'; // Open card div
    echo '<a href="movie.php?id='.$movieArray[$i]->Movie_ID.'"> <img src="'.$movieArray[$i]->Image_Link.'" class="card-img-top homePage" alt="Movie Poster" style="height: 30rem" onerror=this.src="images/film.placeholder.poster.jpg"></a>'; // card image
      echo '<div class="card-body">';// open card body
        echo '<h5 class="card-title">'.$movieArray[$i]->Title.'</h5>'; // card title
      echo '</div>';// close card body
    echo '<ul class="list-group list-group-flush">'; // start list inside the card
      echo '<li class="list-group-item">Release Date: <text>'.$movieArray[$i]->Release_Date.'</text></li>';
      echo '<li class="list-group-item">Genre: <text>'.$movieArray[$i]->Genre.'</text></li>';
      echo '<li class="list-group-item"><img src='.$movieArray[$i]->Age_Rating.' class="img-fluid" style="height: 3rem"></li>';
      echo '<li class="list-group-item"><img src='.$movieArray[$i]->Star_Rating.' class="img-fluid" style="height: 2rem"></li>';
    echo ' </ul>'; // end list in the card
echo "<a class='btn btn-info' href='movie.php?id=".$movieArray[$i]->Movie_ID ."'>More</a>"; // more info button
  echo ' </div>';// close card
  echo ' </div>';// close col


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

    echo '</div></div><br>';
?>

<!-- <footer> -->
        <?php include 'footer.php'; ?>
<!-- </footer> -->

    <?php include '../Controller/bootstrapScript.php'; ?>
    <?php include '../Controller/cookieConsent.php'; ?>
</body>
</html>
