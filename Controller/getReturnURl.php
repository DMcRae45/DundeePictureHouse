<?php

/*
    Description: Controller to get the return URL from the previous page. The user will be sent to this page if/when they login.

    Author: Brad Mair
 */

include '../Model/DPH-api.php';

$returnURL = (isset($_GET['returnURL'])) ? $_GET['returnURL'] : FALSE;

?>
