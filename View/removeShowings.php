<?php
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
<title>DPH - Remove Showings</title>
</head>

<body>
  <div class='container'>
    <div class='page-header'>
        <h1>Remove a Showing</h1>
    </div>
    <div class='container'>
    </div>
  </div>
";
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
