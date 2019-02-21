<?php
/*

    Description:
 *  Database Connection and Log in Credentials.

    Author: David McRae
    Date: 15-Sep-2018

 */
try
{
    $host ='lochnagar.abertay.ac.uk';
    $dbname = 'sqlcmp311gc1805';
    $un = 'sqlcmp311gc1805';
    $pw = 'GXza6ZgiRFBm';

    $pdo = new PDO ("mysql:host=$host;dbname=$dbname;charset=UTF8",$un,$pw);
    //echo "Connection Successful";

}
catch (PDOException $ex)
{
    Die("Connection Failed");
}
?>
