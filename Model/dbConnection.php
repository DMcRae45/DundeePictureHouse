<?php
/*
    Description: Database Connection and Log in Credentials to the sites database.

    Author: David McRae
 */
try
{
    // $host ='lochnagar.abertay.ac.uk';
    // $dbname = 'sqlcmp311gc1805';
    // $un = 'sqlcmp311gc1805';
    // $pw = 'GXza6ZgiRFBm';

    // RPi Credentials
    // $host ='localhost';
    // $dbname = 'DPH';
    // $un = 'Pi';
    // $pw = '#R_pi';

    $host ='localhost';
    $dbname = 'DPH';
    $un = 'root';
    $pw = '';

    $pdo = new PDO ("mysql:host=$host;dbname=$dbname;charset=UTF8",$un,$pw);
    //echo "Connection Successful";

}
catch (PDOException $ex)
{
    Die("Connection Failed");
}
?>
