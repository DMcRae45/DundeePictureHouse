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


              // echo "<select id='showingDate' onchange='fuckYerMa()'>
              //         <option value='0'>Today</option>
              //         <option value='1'>Tomorrow</option>
              //         <option value='2'>...</option>
              //         <option value='3'>...</option>
              //         <option value='4'>...</option>
              //         <option value='5'>...</option>
              //         <option value='6'>...</option>
              //       </select>";


              // TABS TO BE NAMED DEPENDING ON THE CURRENT DAY //  day of the week = date('N');
              // echo '<ul class="nav nav-tabs">
              //   <li class="nav-item">
              //     <button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Today</button>
              //   </li>
              //   <li class="nav-item">
              //     <button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Tomorrow</button>
              //   </li>
              //   <li class="nav-item">
              //     <button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">...</button>
              //   </li>
              //   <li class="nav-item">
              //     <button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">...</button>
              //   </li>
              //   <li class="nav-item">
              //     <button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">...</button>
              //   </li>
              //   <li class="nav-item">
              //     <button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">...</button>
              //   </li>
              //   <li class="nav-item">
              //     <button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">...</button>
              //   </li>
              // </ul>';

              // for ($day=0 ; $day < 7 ; $day++)
              // {
              //   $showingDateString = date_format($showingDate,"Y-m-d");
              //
              //   $twoDMovie = GetTwoDShowings($movieid, $showingDateString);
              //   $twoDMovieArray = json_decode($twoDMovie);
              //
              //   $threeDMovie = GetThreeDShowings($movieid, $showingDateString);
              //   $threeDMovieArray = json_decode($threeDMovie);
              //
              //   $showingDate = date_modify($showingDate,'+1 day');
              //
              //   echo "<div>";
              //   echo "<h6>2D</h6>";
              //   for ($i=0 ; $i < sizeof($twoDMovieArray) ; $i++)
              //   {
              //     echo "<div class='d-inline mr-2 mb-2'>";
              //     $time = date("H:i", strtotime($twoDMovieArray[$i]->Showing_Start_Time)); // Format the time to Hours and Minutes
              //     echo "<a class='btn btn-outline-info' href='bookTicket.php?id=".$movieArray->Movie_ID."&type=2D&time=".$twoDMovieArray[$i]->Showing_Start_Time."'>".$time."</a>";
              //     echo "</div>";
              //   }
              //   echo "</div>";
              //   echo "<hr>";
              //   echo "<div>";
              //   echo "<h6>3D</h6>";
              //   for ($i=0 ; $i < sizeof($threeDMovieArray) ; $i++)
              //   {
              //     echo "<div class='d-inline mr-2 mb-2'>";
              //     $time = date("H:i", strtotime($threeDMovieArray[$i]->Showing_Start_Time)); // Format the time to Hours and Minutes.
              //     echo "<a class='btn btn-outline-info' href='bookTicket.php?id=".$movieArray->Movie_ID."&type=3D&time=".$threeDMovieArray[$i]->Showing_Start_Time."'>".$time."</a>";
              //     echo "</div>";
              //   }
              //   echo "</div>";
              // }


              echo "<div id='accordion'>";
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
                echo "<div class='card bg-info mh-1'>";
                  if ($day == 0)
                  {
                    echo "<button class='card-header btn btn-outine-info font-weight-bold' id='headingDay".$showingVar."' data-toggle='collapse' data-target='#collapseDay".$showingVar."' aria-expanded='true' aria-controls='collapseDay".$showingVar."'>Today</button>";
                    echo "<div id='collapseDay".$showingVar."' class='collapse show' aria-labelledby='headingDay".$showingVar."' data-parent='#accordion'>";
                  }
                  else
                  {
                    echo "<button class='card-header btn btn-outine-info font-weight-bold' id='headingDay".$showingVar."' data-toggle='collapse' data-target='#collapseDay".$showingVar."' aria-expanded='true' aria-controls='collapseDay".$showingVar."'>".$showingTabDate."</button>";
                    echo "<div id='collapseDay".$showingVar."' class='collapse' aria-labelledby='headingDay".$showingVar."' data-parent='#accordion'>";
                  }
                    echo "<div class='card-body'>";
                        echo "<h6>2D</h6>";
                        if (isset($twoDMovieArray) && sizeof($twoDMovieArray) > 0)
                          {
                            for ($i=0 ; $i < sizeof($twoDMovieArray) ; $i++)
                            {
                              echo "<div class='d-inline mr-2 mb-2'>";
                                $time = date("H:i", strtotime($twoDMovieArray[$i]->Showing_Start_Time)); // Format the time to Hours and Minutes
                                echo "<a class='btn btn-outline-info' href='bookTicket.php?id=".$movieArray->Movie_ID."&type=2D&time=".$twoDMovieArray[$i]->Showing_Start_Time."'>".$time."</a>";
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
                                    echo "<a class='btn btn-outline-info' href='bookTicket.php?id=".$movieArray->Movie_ID."&type=3D&time=".$threeDMovieArray[$i]->Showing_Start_Time."'>".$time."</a>";
                                  echo "</div>";
                                }
                              }
                              else
                              {
                                echo"<p class='text-info'>No Showings on this day</p>";
                              }
                    echo "</div>";
                  echo "</div>";
                echo "</div>";
              }
              echo '</div>';



              /*
              echo "<div>";
              echo "<h6>2D</h6>";
              for ($i=0 ; $i < sizeof($twoDMovieArrayday0) ; $i++)
              {
                echo "<div class='d-inline mr-2 mb-2'>";
                $time = date("H:i", strtotime($twoDMovieArray[$i]->Showing_Start_Time)); // Format the time to Hours and Minutes

                echo "<a class='btn btn-outline-info' href='bookTicket.php?id=".$movieArray->Movie_ID."&type=2D&time=".$twoDMovieArrayday0[$i]->Showing_Start_Time."'>".$time."</a>";
                echo "</div>";
              }
              echo "</div>";
              echo "<hr>";
              echo "<div>";
              echo "<h6>3D</h6>";
              for ($i=0 ; $i < sizeof($threeDMovieArrayday0) ; $i++)
              {
                echo "<div class='d-inline mr-2 mb-2'>";
                $time = date("H:i", strtotime($threeDMovieArrayday0[$i]->Showing_Start_Time)); // Format the time to Hours and Minutes.

                echo "<a class='btn btn-outline-info' href='bookTicket.php?id=".$movieArray->Movie_ID."&type=3D&time=".$threeDMovieArrayday0[$i]->Showing_Start_Time."'>".$time."</a>";
                echo "</div>";
              }
              echo "</div>";              */



              //echo "<a class='btn btn-outline-info' href='bookTicket.php' role='button' align='right'>Book now</a>"; // Button link to booking form
              //echo "<a class='btn btn-outline-info' href='bookTicket.php?id=".$movieArray->Movie_ID ."'>Book Now</a>"; // Pass The Movie Id to the ticket page

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
