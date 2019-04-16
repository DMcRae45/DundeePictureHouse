<?php

/*
    Description: User interface used to manage and alter movies listed on the site.

    Author: Brad Mair, David McRae
*/
include 'session.php';

//Error Reporting for the users
if(isset($_GET['error']))
{
  $error = $_GET['error'];
  echo $error;
}

if(!isset($_SESSION['jobrole']))
{
  // Customer has tried to access this page
  header("Location: index.php?error=ACCESS DENIED");
}
elseif($_SESSION['jobrole'] == "supervisor" || $_SESSION['jobrole'] == "manager")
{
  include '../Controller/getAllMovies.php';
  include 'header.php';

echo "
<html>
<head>
<title>DPH - Alter Movies</title>
</head>
<body>
<br>
<div class='container'>
  <div class='page-header'>
    <h3>Alter Movie Records</h3>
  </div>";

if (isset($_GET['movieID']))
{
  $moiveIndex = $_GET['movieID'];
  include '../Controller/getMovieDetailsByID.php';
  echo "<a class='btn btn-outline-info' href='alterMovies.php'>Return</a><br><br>";
  echo "<form class='form-group needs-validation' method='POST' action='../Controller/attempt_updateMovie.php?movieid=".$moiveIndex."' enctype='multipart/form-data' novalidate>
          <div class='row'>
            <div class='col-md-4'>
              <div class='card form-group input-group' form-group-lg>
                <img src='".$movieDetails->Image_Link."' class='card-img-top' alt='Movie Poster' onerror=this.src='images/film.placeholder.poster.jpg'>
                <input class='btn btn-dark inputfile' type='file' name='image_link' required/>
              </div>
            </div>";

            echo "<div class='col-md-8'>
                    <div class='card form-group' form-group-lg>
                      <div class='embed-responsive embed-responsive-16by9'>
                        <iframe class='embed-responsive-item' src='".$movieDetails->Video_Link."' frameborder='0' allow='autoplay'; encrypted-media; allowfullscreen alt='This video is not supported'></iframe>
                      </div>
                      <div class='input-group'>
                        <div class='input-group-prepend'>
                          <span class='input-group-text' id='inputGroupPrepend'>Video</span>
                        </div>";
                        $YoutubeURL = "watch?v=";
                        $embededURL = "embed/";
                        $video = str_replace($embededURL, $YoutubeURL, $movieDetails->Video_Link);
                  echo "<input class='form-control' type='text' name='video' placeholder='Please paste the Youtube URL into this field' value='".$video."' required>
                      </div>
                    </div>";
          echo "<div class='form-group input-group' form-group-lg>
                  <div class='input-group-prepend'>
                    <span class='input-group-text' id='inputGroupPrepend'>Movie ID</span>
                  </div>
                  <input class='form-control' type='text' name='index' value='".$movieDetails->Movie_ID."' readonly>
                </div>";


          echo "<div class='form-group input-group' form-group-lg>
                  <div class='input-group-prepend'>
                    <span class='input-group-text' id='inputGroupPrepend'>Title</span>
                  </div>
                  <input class='form-control' type='text' name='title' placeholder='Title' value='".$movieDetails->Title."' required>
                </div>
              </div>
            </div>";

          echo "<div class='form-group input-group'>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='inputGroupPrepend'>Decription</span>
            </div>
              </br>
              <textarea class='form-control' type='text' name='description' placeholder='Description' rows='5' required>".$movieDetails->Description."</textarea>
          </div>";

          echo "<div class='form-group input-group' form-group-lg>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='inputGroupPrepend'>Release Date</span>
            </div>
              <input class='form-control' type='date' name='releaseDate' placeholder='Release Date' value='".$movieDetails->Release_Ordering."' required>
          </div>";

          echo "<div class='form-group input-group'>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='inputGroupPrepend'>Age Rating</span>
            </div>
            <select class='custom-select' name='ageRating' value='".$movieDetails->Age_Rating."' required>";
              if ($movieDetails->Age_Ordering == "0")
              {
                echo "<option value='U' selected>U</option>";
              }
              else
              {
                echo "<option value='U'>U</option>";
              }

              if ($movieDetails->Age_Ordering == "1")
              {
                echo "<option value='PG' selected>PG</option>";
              }
              else
              {
                echo "<option value='PG'>PG</option>";
              }

              if ($movieDetails->Age_Ordering == "2")
              {
                echo "<option value='12A' selected>12A</option>";
              }
              else
              {
                echo "<option value='12A'>12A</option>";
              }

              if ($movieDetails->Age_Ordering == "3")
              {
                echo "<option value='15' selected>15</option>";
              }
              else
              {
                echo "<option value='15'>15</option>";
              }

              if ($movieDetails->Age_Ordering == "4")
              {
                echo "<option value='18' selected>18</option>";
              }
              else
              {
                echo "<option value='18'>18</option>";
              }

            echo "</select>
            <div class='invalid-feedback'>Please Select an Age rating</div>
          </div>";

          echo "<div class='form-group input-group' form-group-lg>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='inputGroupPrepend'>RunTime</span>
            </div>
              <input class='form-control' type='text' name='runTime' placeholder='RunTime' value='".$movieDetails->RunTime."' required>
          </div>";

          echo "<div class='form-group input-group' form-group-lg>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='inputGroupPrepend'>Genre</span>
            </div>
              <input class='form-control' type='text' name='genre' placeholder='Genre' value='".$movieDetails->Genre."' required>
          </div>";

          echo "<div class='form-group input-group' form-group-lg>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='inputGroupPrepend'>Director</span>
            </div>
              <input class='form-control' type='text' name='director' placeholder='Director' value='".$movieDetails->Director."' required>
          </div>";

          echo "<div class='form-group input-group' form-group-lg>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='inputGroupPrepend'>Actors</span>
            </div>
              <input class='form-control' type='text' name='actors' placeholder='Actors' value='".$movieDetails->Actors."' required>
          </div>";

          echo "<div class='form-group input-group' form-group-lg>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='inputGroupPrepend'>Language</span>
            </div>
              <input class='form-control' type='text' name='language' placeholder='Language' value='".$movieDetails->Language."' required>
          </div>";

          echo "<div class='form-group form-check input-group'>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='inputGroupPrepend'>3D</span>
            </div>";
            if (($movieDetails->DDD) == 1)
            {
              echo "<input class='form-check-input' type='checkbox' name='threeD' id='invalidCheck' checked>";
            }
            else
            {
              echo "<input class='form-check-input' type='checkbox' name='threeD' id='invalidCheck'>";
            }
        echo "</div>

        <div class='form-group form-check input-group'>
          <div class='input-group-prepend'>
            <span class='input-group-text' id='inputGroupPrepend'>Audio Described</span>
          </div>";
          if (($movieDetails->Audio_Described) == 1)
          {
            echo "<input class='form-check-input' type='checkbox' name='audioDescribed' id='invalidCheck' checked>";
          }
          else
          {
            echo "<input class='form-check-input' type='checkbox' name='audioDescribed' id='invalidCheck'>";
          }
      echo "</div>";

      echo "<div class='form-group input-group' form-group-lg>
        <div class='input-group-prepend'>
          <span class='input-group-text' id='inputGroupPrepend'>Star Rating</span>
        </div>
        <select class='custom-select' name='starRating' value='".$movieDetails->Star_Rating."' required>";
        for ($i=0 ; $i <= 5 ; $i++)
        {
          $movieStarRating = "../View/images/".$i."_star.png";
          if (($movieDetails->Star_Rating) == $movieStarRating)
          {
            echo "<option value='".$i."' selected>".$i."</option>";
          }
          else
          {
            echo "<option value='".$i."'>".$i."</option>";
          }
        }
        echo "</select>
        <div class='invalid-feedback'>Please Select a star rating</div>
      </div>";

    echo "<button class='form-control' type='submit' name='updateMovieSubmit'>Update Movie</button>
      </div>
      </form>";
}
else
{
  echo "
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
        echo "<td><a class='btn btn-warning' href='?movieID=".$movieArray[$i]->Movie_ID."'>Alter</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
echo "</div></div>";
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
  // Employee is not super isor or manager
  header("Location: index.php?error=ACCESS DENIED");
}
?>
