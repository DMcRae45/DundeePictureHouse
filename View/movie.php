<?php
/*
    Description: Web page to display each movie as a single record depending on a selection from the users.

    Author: David McRae
*/

// <head>
     Include 'header.php';
     include '../Controller/getMovieByID.php';
// </head>

      echo "<div class='container'>"; // Open container
        echo "<h1>".$movieArray->Title."</h1>"; // Display movie title
        echo "<a class='btn btn-primary' href='booking.php' role='button'>Book now</a>"; // Button link to booking form
        // echo '<div class="embed-responsive embed-responsive-16by9">';
        // echo '<iframe class="embed-responsive-item" src="'.$movieArray->Video_link.'" allowfullscreen></iframe>';
        // echo '</div>'; // trailer to go here
        echo "</br>";
        echo "<h2>More information</h2>";
        echo "</br>";
        echo "<div class='row'>";
        echo "<div class='col-md-5'>";
        echo "<p>Release Date: ".$movieArray->Release_Date."</p>";
        echo "<p>Runtime: ".$movieArray->RunTime."</p>";
        echo "<p>".nl2br($movieArray->Description)."</p>"; // Summary is declared as a substring in the select statement.
        echo "</br>";
        echo "<p>Genre: ".$movieArray->Genre."</p>";
        echo "<hr>";
        echo "<p>Actors: ".$movieArray->Actors."</p>";
        echo "<hr>";
        echo "<p>Director: ".$movieArray->Director."</p>";
        echo "<hr>";
        echo "</div>";
        echo "<div class='col-md-5'>";
        echo "<img src=".$movieArray->Image_Link." class='img-thumbnail'>";
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
