<?php
/*
    Description:
    Author: Brad Mair
*/

// <head>
     Include 'header.php';
// </head>
echo "<div class='container'>";
  echo "Day: " . date('d') . "<br>"; //Day of the month
  echo "Month: " . date('m') . "<br>"; //Month of the year
  echo "Year: " . date('y') . "<br>"; //The year
  echo "Hour: " . date('H') . "<br>"; //Hour of the day
  echo "User ID: " . $_SESSION['userid'] . "<br><br>"; //User ID

  $unencryptedCode = date('d').date('m').date('y').date('H').$_SESSION['userid'];
  echo "Code: " . $unencryptedCode . "<br><br>";

  $hexCode = dechex($unencryptedCode);
  echo "Hexed Code: " . $hexCode . "<br>";
echo "</div>";
// <footer>
      Include 'footer.php';
// </footer>
      Include '../Controller/bootstrapScript.php';
?>
