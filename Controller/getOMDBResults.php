<?php
/*
    Description: Action to get movie deatails from a REST API (OMDB)

    Author: Brad Mair
 */

 $searchResults = OMDBSearch();
 $resultsArray = json_decode($searchResults);

?>
