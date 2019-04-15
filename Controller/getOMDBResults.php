<?php
/*
    Description: Action to get movie deatails from a REST API (OMDB)

    Author: Brad Mair, David McRae
 */
if(!isset($_POST['search-by-title-button']))
{
  header('location: ../View/index.php?error=MustSearchForAMovie');
}
else
{
 $searchResults = OMDBSearch();
 $resultsArray = json_decode($searchResults);
}
?>
