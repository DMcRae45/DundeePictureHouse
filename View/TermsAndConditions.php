<?php
/*
    Description: Dundee Picture House Home Page used to display movies and navigation.
    Author: David McRae, Aaron Hay
*/
include 'session.php';
?>
<html>
<!--<head>-->
    <?php
        include '../Controller/getAllMovies.php';
        //include '../Model/DPH-api.php';
        include 'header.php';
    ?>
<!-- </head> -->
<title>DPH - Home</title>
<body>
  <div class="container text-center">
<h1>Cookie usage</h1>
<p>Cookies are used in this system to keep track of who you are.</br>
  this allows us to keep you logged in and display you the correct information related to you such as purchased tickets.</br>
  Any Cookies from us will automatically be removed after a set amount of time.</p>

<h1>Your Details</h1>
<p>The details your provide us on the website are strictly for the cinema's use.</br>
  Your details will simply be used to allow you to log in purchase tickets.</p>
<p><text>If you have any questions including recovering a password or you wish to remove any details stored on our sytem. please contact us via email at </text>CustomerServices@DPHEnquireies.com<p>

<h1>Email usage</h1>
<p>Your email will be used exclusively to send you a information regarding any purchsaed tickets.</p>

<h1>AGREEMENT</h1>
<p>By registering an account with us you are agreeing to the above stated terms.</p>
</div>


<!-- <footer> -->
        <?php include 'footer.php'; ?>
<!-- </footer> -->

    <?php include '../Controller/bootstrapScript.php'; ?>
    <?php include '../Controller/cookieConsent.php'; ?>
</body>
</html>
