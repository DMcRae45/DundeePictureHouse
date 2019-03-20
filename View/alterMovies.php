<?php

/*
    Description: User interface used to manage and alter movies listed on the site.

    Author: Brad Mair
*/

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

<body>";


if (!isset($moiveID))
{
  echo "
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
                        <option value='2'>Age_Rating (Lowest to Highest)</option>
                        <option value='3'>Age_Rating (Lowest to Highest)</option>
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
    echo "</table>
        </div>
    </div>
  ";
}
else
{
  echo "<div class='container'>
      <form class='form-group needs-validation' method='POST' action='../Controller/attempt_insertMovie.php' enctype='multipart/form-data' novalidate>

          <div class='form-group input-group' form-group-lg>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='inputGroupPrepend'>Title</span>
            </div>
              <input class='form-control' type='text' name='title' placeholder='Title' required>
          </div>

          <div class='form-group input-group' form-group-lg>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='inputGroupPrepend'>Video</span>
            </div>
              <input class='form-control' type='text' name='video' placeholder='Please Past the Youtube URL into this field' required>
          </div>

          <div class='form-group input-group' form-group-lg>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='inputGroupPrepend'>Poster Image</span>
            </div>
              <input class='btn btn-outline-light' type='file' name='image_link' placeholder='Image_link' required>
          </div>

          <div class='form-group input-group'>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='inputGroupPrepend'>Decription</span>
            </div>
              </br>
              <textarea class='form-control' type='text' name='description' placeholder='Description' rows='5' required></textarea>
          </div>

          <div class='form-group input-group' form-group-lg>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='inputGroupPrepend'>Release Date</span>
            </div>
              <input class='form-control' type='date' name='releaseDate' placeholder='Release Date' required>
          </div>

          <div class='form-group input-group'>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='inputGroupPrepend'>Age Rating</span>
            </div>
            <select class='custom-select' name='ageRating' required>
              <option value=''>Please Select a Star Rating</option>
              <option value='U'>U</option>
              <option value='PG'>PG</option>
              <option value='12A'>12A</option>
              <option value='15'>15</option>
              <option value='18'>18</option>
            </select>
            <div class='invalid-feedback'>Please Select an Age rating</div>
          </div>

          <div class='form-group input-group' form-group-lg>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='inputGroupPrepend'>RunTime</span>
            </div>
              <input class='form-control' type='text' name='runTime' placeholder='RunTime' required>
          </div>

          <div class='form-group input-group' form-group-lg>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='inputGroupPrepend'>Genre</span>
            </div>
              <input class='form-control' type='text' name='genre' placeholder='Genre' required>
          </div>

          <div class='form-group input-group' form-group-lg>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='inputGroupPrepend'>Director</span>
            </div>
              <input class='form-control' type='text' name='director' placeholder='Director' required>
          </div>

          <div class='form-group input-group' form-group-lg>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='inputGroupPrepend'>Actors</span>
            </div>
              <input class='form-control' type='text' name='actors' placeholder='Actors' required>
          </div>

          <div class='form-group input-group' form-group-lg>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='inputGroupPrepend'>Language</span>
            </div>
              <input class='form-control' type='text' name='language' placeholder='Language' required>
          </div>

          <div class='form-group form-check input-group'>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='inputGroupPrepend'>3D</span>
            </div>
          <input class='form-check-input' type='checkbox' name='threeD' value='' id='invalidCheck'>
        </div>

        <div class='form-group form-check input-group'>
          <div class='input-group-prepend'>
            <span class='input-group-text' id='inputGroupPrepend'>Audio Described</span>
          </div>
        <input class='form-check-input' type='checkbox' name='audioDescribed' value='' id='invalidCheck'>
      </div>

      <div class='form-group input-group'>
        <div class='input-group-prepend'>
          <span class='input-group-text' id='inputGroupPrepend'>Star Rating</span>
        </div>
        <select class='custom-select' name='starRating' required>
          <option value=''>Please Select a Star Rating</option>
          <option value='0'>0</option>
          <option value='1'>1</option>
          <option value='2'>2</option>
          <option value='3'>3</option>
          <option value='4'>4</option>
          <option value='5'>5</option>
        </select>
        <div class='invalid-feedback'>Please Select a star rating</div>
      </div>

          <button class='form-control' type='submit' name='insertMovieSubmit'>Insert Movie</button>
      </form>
  </div>";
}
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
