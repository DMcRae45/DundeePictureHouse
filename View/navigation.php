<?php

/*
    Description: Dundee Picture House Navigation bar at the top of each page.

    Author: David McRae, Brad Mair
    Reference: Bootstrap
*/
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <img src="images/DPH.png">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav mr-auto">

        <li class="nav-item active">
            <a class="nav-link" href="index.php">Movies <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item dropdown">

            <?php
                if(!isset($_SESSION['LoggedIn']))
                {
                    echo '<a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>';
                }
                if(isset($_SESSION['LoggedIn']))
                {
                    echo '<a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$_SESSION['username'].'</a>';
                }
            ?>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <?php
                if(!isset($_SESSION['LoggedIn']))
                {
                        echo '<a class="dropdown-item" href="customerLogin.php">Login</a>';
                        echo '<div class="dropdown-divider"></div>';  // divider between menu items
                        echo '<a class="dropdown-item" href="registerCustomer.php">Register</a>';
                }
                if(isset($_SESSION['LoggedIn']))
                {
                  echo "<a class='dropdown-item' href='RestWebService.php'>Rest Web Service</a>";
                  echo '<div class="dropdown-divider"></div>';

                  if(isset($_SESSION['Admin_Status']) && $_SESSION['Admin_Status'] == 1)
                  {
                    echo "<a class='dropdown-item' href='insertArticle.php'>Insert Article</a>";
                    echo '<div class="dropdown-divider"></div>';
                    echo "<a class='dropdown-item' href='removeArticle.php'>Remove Article</a>";
                    echo '<div class="dropdown-divider"></div>';
                    echo "<a class='dropdown-item' href='updateUsers.php'>Update Users</a>";
                    echo '<div class="dropdown-divider"></div>';
                  }
                  echo '<a class="dropdown-item" href="../Controller/attempt_logout.php">LogOut</a>';
                }
            ?>
            </div>
        </li>
    </ul>

    <form action='searchResults.php' method='post' class="form-inline my-2 my-lg-0">
      <div class='input-group input-group-sm mb-3'>
        <input type='text' class='form-control' placeholder="Search" aria-label='Small' aria-describedby='inputGroup-sizing-sm' id='searchTitle' name='searchTitle'>
        <div class='input-group-append'>
          <button id='search-by-title-button' name='search-by-title-button' type='submit' class='btn btn-outline-info my-2 my-sm-0'>Search</button>
        </div>
      </div>
    </form>
  </div>
</nav>
