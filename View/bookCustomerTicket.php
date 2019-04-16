<?php

/*
    Description: Table to allow staff to book tickets on behalf of a customer.

    Author: David McRae
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
  //Customer has tried to access this page
  header("Location: index.php");
}
elseif(isset($_SESSION['jobrole']))
{
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

if (isset($_GET['id']))
{
  include '../Controller/getMovieAndTimes.php';
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
        $showingDayString = date_format($showingDay,"Y-m-d");
        $showingTabDay = date_format($showingDay,"l")." the ".date_format($showingDay,"jS");
        $showingVar = date_format($showingDay,"l");

        $twoDMovie = GetTwoDShowings($movieid, $showingDayString);
        $twoDMovieArray = json_decode($twoDMovie);

        $threeDMovie = GetThreeDShowings($movieid, $showingDayString);
        $threeDMovieArray = json_decode($threeDMovie);

        $showingDay = date_modify($showingDay,'+1 day');
          if ($day == 0)
          {
            echo "<div class='carousel-item active'>";
            echo "<button class='card-header btn btn-outine-info font-weight-bold disabled' id='headingDay".$showingVar."' data-toggle='collapse' data-target='#collapseDay".$showingVar."' aria-expanded='true' aria-controls='collapseDay".$showingVar."'>Today</button>";
          }
          else
          {
            echo "<div class='carousel-item'>";
            echo "<button class='card-header btn btn-outine-info font-weight-bold disabled' id='headingDay".$showingVar."' data-toggle='collapse' data-target='#collapseDay".$showingVar."' aria-expanded='true' aria-controls='collapseDay".$showingVar."'>".$showingTabDay."</button>";
          }
            echo "<div class='card-body carousel-card-employee'>";
                echo "<h6>2D</h6>";
                if (isset($twoDMovieArray) && sizeof($twoDMovieArray) > 0)
                  {
                    for ($i=0 ; $i < sizeof($twoDMovieArray) ; $i++)
                    {
                      echo "<div class='d-inline mr-2 mb-2'>";
                        $showingDate = date('Y-m-d', strtotime($twoDMovieArray[$i]->Showing_Date));
                        $showingTime = date('H:i', strtotime($twoDMovieArray[$i]->Showing_Start_Time)); // Format the time to Hours and Minutes
                        $showingIndex = $twoDMovieArray[$i]->Showing_ID;
                        include '../Controller/getTicketCount.php';

                        // if($date > date('Y-m-d') && $ticketCount < $ticketsAvailable)
                        // {
                        //   echo "<a class='btn btn-outline-warning showingTime' href='bookTicket.php?showingid=".$twoDMovieArray[$i]->Showing_ID."'>".$time."</a>";
                        // }
                        if (date('Y-m-d') == $showingDate && date('H:i') > $showingTime)
                        {
                          echo "<a class='btn btn-outline-primary showingTime disabled mb-1' href='bookTicket.php?showingid=".$twoDMovieArray[$i]->Showing_ID."'>".$showingTime."</a>";
                        }
                        elseif($ticketCount >= $ticketsAvailable)
                        {
                          echo "<a class='btn btn-outline-warning showingTime disabled mb-1' href='bookTicket.php?showingid=".$twoDMovieArray[$i]->Showing_ID."'>".$showingTime."</a>";
                        }
                        else
                        {
                          echo "<a class='btn btn-outline-info showingTime mb-1' href='bookTicket.php?showingid=".$twoDMovieArray[$i]->Showing_ID."'>".$showingTime."</a>";
                        }
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
                            $showingDate = date('Y-m-d', strtotime($threeDMovieArray[$i]->Showing_Date));
                            $showingTime = date('H:i', strtotime($threeDMovieArray[$i]->Showing_Start_Time)); // Format the time to Hours and Minutes.
                            $showingIndex = $threeDMovieArray[$i]->Showing_ID;
                            include '../Controller/getTicketCount.php';

                            if(date('Y-m-d') == $showingDate && date('H:i') > $showingTime)
                            {
                              echo "<a class='btn btn-outline-primary showingTime disabled mb-1' href='bookTicket.php?showingid=".$threeDMovieArray[$i]->Showing_ID."'>".$showingTime."</a>";
                            }
                            elseif($ticketCount >= $ticketsAvailable)
                            {
                              echo "<a class='btn btn-outline-warning showingTime disabled mb-1' href='bookTicket.php?showingid=".$threeDMovieArray[$i]->Showing_ID."'>".$showingTime."</a>";
                            }
                            else
                            {
                              echo "<a class='btn btn-outline-info showingTime mb-1' href='bookTicket.php?showingid=".$threeDMovieArray[$i]->Showing_ID."'>".$showingTime."</a>";
                            }
                          echo "</div>";
                        }
                      }
                      else
                      {
                        echo"<p class='text-info'>No Showings on this day</p>";
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
  include '../Controller/getAllMovies.php';
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
        echo "<td> <a class='btn btn-outline-info' href='?id=".$movieArray[$i]->Movie_ID."'>Book</a> </td>";
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
?>
