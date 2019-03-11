<?php
/*
    Description: Web page to display each movie as a single record depending on a selection from the users.

    Author: David McRae, Aaron Hay
*/

// <head>
     Include 'header.php';
     include '../Controller/getMovieByID.php';
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

              //echo "<a class='btn btn-outline-info' href='bookTicket.php' role='button' align='right'>Book now</a>"; // Button link to booking form
              echo "<a class='btn btn-outline-info' href='bookTicket.php?id=".$movieArray->Movie_ID ."'>Book Now</a>"; // Pass The Movie Id to the ticket page

            echo "</div>";
            echo "<div class='col-md-6'>";
            echo '<div class="card" style="width: 100%;">'; // Open card div
              echo '<img src="'.$movieArray->Image_Link.'" class="card-img-top" alt="Movie Poster" style="height: 50rem" onerror=this.src="images/film.placeholder.poster.jpg">'; // card image
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
