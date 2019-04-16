<?php
/*
    Description: Information page on idependent movies, and how to contact cinema.
    Author: Aaron Hay
*/
?>
<html>
<!--<head>-->
    <?php
    include 'session.php';
        include 'header.php';
    ?>
<!-- </head> -->
<title>DPH - Independent Movies Information</title>
  <body>

  <div class="container mt-4">
    <h1>#MakingMovies</h1>
    <img src="images/film-making.jpg" class="img-fluid rounded" alt="Directors chair">
    <h6 class="mt-4" style="color:white;">As a recently established cinema, we realise it is not easy for a project to get off the ground. Knowing this, we are reaching out to budding film-makers and local talent to showcase their movies at our cinema.</h6>
    <h6 style="color:white;">We are looking for imaginative and creative works that exhibit the meaning of independent cinema.</h6>
    <hr>
    <h2>Step 1.</h2>
    <p style="color:white;">Contact us at: <a href="mailto:independentmovies@dphenquiries.com">independentmovies@dphenquiries.com</a> for an application form.</p>
    <hr>
    <h2>Step 2.</h2>
    <p style="color:white;">Send your application and movie to the address provided.</p>
    <hr>
    <h2>Step 3.</h2>
    <p style="color:white;">Profit?</p>
    <hr>
    <p style="color:white;">All enquiries can be made at: <a href="mailto:independentmovies@dphenquiries.com">independentmovies@dphenquiries.com</a>.</p>
    <p style="color:white;">Terms and conditions apply.</p>
  </div>

  <?php
    include 'footer.php';
    include '../Controller/bootstrapScript.php';
   ?>
 </body>
</html>
