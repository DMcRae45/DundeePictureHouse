<?php
// FORCE ERRORS TO SHOW
// ini_set ('display errors',1);
// ini_set('display_startup_errors',1);
// error_reporting(E_ALL);
// error_reporting(E_ALL); ini_set('display_errors','on');

date_default_timezone_set("Europe/London");
if(session_status() == PHP_SESSION_NONE)
{
session_start();

$Month = 2592000 + time(); //this adds 30 days to the current time

setcookie('UserVisit',$Month);
}
else
{
  session_start();
}
?>
