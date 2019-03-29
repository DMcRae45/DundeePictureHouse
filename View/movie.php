<?php
/*
    Description: Web page to display each movie as a single record depending on a selection from the users.

    Author: David McRae, Aaron Hay, Brad Mair
*/

// <head>
     Include 'header.php';
     include '../Controller/getMovieAndTimes.php';
// </head>

      echo "<div class='container'>"; // Open container
        echo "<div class='mt-4'>";
          echo "<h1 class='d-inline'>".$movieArray->Title."</h1>"; // Display movie title
          echo "<img class='d-inline float-right' src=".$movieArray->Age_Rating." class='img-fluid' style='height: 3rem'>";
        echo "</div>";
          echo '<div class="embed-responsive embed-responsive-16by9 mt-4">';
            echo '<iframe class="embed-responsive-item" src="'.$movieArray->Video_Link.'" frameborder="0" allow="autoplay"; encrypted-media; allowfullscreen alt="This video is not supported"></iframe>';
          echo '</div>'; // trailer to go here
          echo "<div class='row mt-4'>";
            echo "<div class='col-md-6'>";
              echo "<p>Release Date: <text>".$movieArray->Release_Date."</text></p>";
              echo "<p>Description: <text>".nl2br($movieArray->Description)."</text></p>"; // Summary is declared as a substring in the select statement.
              echo "</br>";
              echo "<p>Runtime: <text>".$movieArray->RunTime." Mins</text></p>";
              echo "<hr>";
              echo "<p>Genre: <text>".$movieArray->Genre."</text></p>";
              echo "<hr>";
              echo "<p>Actors: <text>".$movieArray->Actors."</text></p>";
              echo "<hr>";
              echo "<p>Director: <text>".$movieArray->Director."</text></p>";
              echo "<hr>";
              echo "<img src=".$movieArray->Star_Rating." class='img-fluid' style='height: 2rem'>";
              echo "<hr>";

              if($_SESSION['LoggedIn'] == true)
              {
              echo '<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="false">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                </ol>
                <div class="carousel-inner">';

                  for ($day=0 ; $day < 7 ; $day++)
                  {
                    $showingDateString = date_format($showingDate,"Y-m-d");
                    $showingTabDate = date_format($showingDate,"l")." the ".date_format($showingDate,"jS");
                    $showingVar = date_format($showingDate,"l");

                    $twoDMovie = GetTwoDShowings($movieid, $showingDateString);
                    $twoDMovieArray = json_decode($twoDMovie);

                    $threeDMovie = GetThreeDShowings($movieid, $showingDateString);
                    $threeDMovieArray = json_decode($threeDMovie);

                    $showingDate = date_modify($showingDate,'+1 day');
                      if ($day == 0)
                      {
                        echo "<div class='carousel-item active'>";
                        echo "<button class='card-header btn btn-outine-info font-weight-bold disabled' id='headingDay".$showingVar."' data-toggle='collapse' data-target='#collapseDay".$showingVar."' aria-expanded='true' aria-controls='collapseDay".$showingVar."'>Today</button>";
                      }
                      else
                      {
                        echo "<div class='carousel-item'>";
                        echo "<button class='card-header btn btn-outine-info font-weight-bold disabled' id='headingDay".$showingVar."' data-toggle='collapse' data-target='#collapseDay".$showingVar."' aria-expanded='true' aria-controls='collapseDay".$showingVar."'>".$showingTabDate."</button>";
                      }
                        echo "<div class='card-body carousel-card'>";
                            echo "<h6>2D</h6>";
                            if (isset($twoDMovieArray) && sizeof($twoDMovieArray) > 0)
                              {
                                for ($i=0 ; $i < sizeof($twoDMovieArray) ; $i++)
                                {
                                  echo "<div class='d-inline mr-2 mb-2'>";
                                    $time = date("H:i", strtotime($twoDMovieArray[$i]->Showing_Start_Time)); // Format the time to Hours and Minutes
                                    echo "<a class='btn btn-outline-info showingTime' href='bookTicket.php?showingid=".$twoDMovieArray[$i]->Showing_ID."'>".$time."</a>";
                                  echo "</div>";
                                }
                              }
                              else
                              {
                                echo"<p class='text-info'>No Showings on this day</p>";
                              }
                              echo "<hr>";
                                echo "<h6>3D</h6>";
                                if (isset($threeDMovieArray) && sizeof($threeDMovieArray) > 0)
                                  {
                                    for ($i=0 ; $i < sizeof($threeDMovieArray) ; $i++)
                                    {
                                      echo "<div class='d-inline mr-2 mb-2'>";
                                        $time = date("H:i", strtotime($threeDMovieArray[$i]->Showing_Start_Time)); // Format the time to Hours and Minutes.
                                        echo "<a class='btn btn-outline-info showingTime' href='bookTicket.php?showingid=".$threeDMovieArray[$i]->Showing_ID."'>".$time."</a>";
                                      echo "</div>";
                                    }
                                  }
                                  else
                                  {
                                    echo"<p class='text-info' style='margin-bottom:19px;'>No Showings on this day</p>";
                                  }
                      echo "</div>";
                    echo "</div>";
                  }
                echo '</div>

                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              </br>';
            }
            else
            {
              echo "<div class= 'pt-3 pb-3 text-center border border-info'>
              You must login to be able to see showing times and book tickets.
              </br>
              </br>
              You can <a href='registerCustomer.php'>Register</a> a new account or <a href='customerLogin.php'>Login</a> here.
              </div>";
            }
            echo "</div>";
            echo "<div class='col-md-6'>";
            echo '<div class="card">'; // Open card div
              echo '<img src="'.$movieArray->Image_Link.'" class="card-img-top moviePage" alt="Movie Poster" onerror=this.src="images/film.placeholder.poster.jpg">'; // card image
              echo '</div>';
              echo "</br>";
              echo "</br>";
            echo "</div>";
          echo "</div>";
    echo "</div>"; // Close container




// Comments Section
//nl2br is used to read "nl" inside php database as a new line or a line break "reference 'mmtuts' Youtube"
//   for($row = 0; $row < sizeof($commentArray); $row++)
//   {
//     echo "<div class='border border-success'>";
//       echo $commentArray[$row]->Username."<br>";
//       echo $commentArray[$row]->Post_Date."<br>";
//       echo "<br>";
//       echo nl2br($commentArray[$row]->Comment_Text);
//     echo "</div>";
//     echo "<br>";
//   }
//
// if(isset($_SESSION['LoggedIn']))
// {
// echo "
//   <form method='POST' action='".setComments()."'>
//     <input type='hidden' name='postdate' value='".date('Y-m-d H:i:s')."'>
//     <input type='hidden' name='articleid' value='".$movieid."'>
//     <input type='hidden' name='userid' value='".$_SESSION['User_ID']."'>
//     <textarea class='form-control z-depth-1' rows='3' placeholder='Write a Comment...' name='comment'></textarea>
//   <button class='btn btn-success' type='submit' name='commentSubmit'>Comment</button>
//   </form>
// ";
// }
// else
// {
//   echo "Login or register an account to Comment on this article.";
// }


// <footer>
      Include 'footer.php';
// </footer>
      Include '../Controller/bootstrapScript.php';
?>
