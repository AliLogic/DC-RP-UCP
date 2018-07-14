<?php

// database
define('DEBUG', true);

define('DB_SERVER', '138.68.147.236');
define('DB_USERNAME', 'samp_server');
define('DB_PASSWORD', 'IJta0WFpQV9TJl55');
define('DB_NAME', 'sa-mp');

define('SAMP_IP', '138.68.147.236');
define('SAMP_PORT', 7777);

if(DEBUG == true)
{
  error_reporting(E_ALL);  
}
else error_reporting(0);

$connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(mysqli_connect_errno() || $connect === false)
{
  die("<b>ERROR:</b> Unable to connect to the database: " . mysqli_connect_error());
}

// navbar configuration

$forums= "forums";
$controlpanel = "panel";
$donate = "donate";
$servername = "Desert County Roleplay";
$topnavbarcolor = "#8C5E39";
//$AdminLevel = 0;
$HelperLevel = 0;
$Banned = false;

include_once('functions.php');

if(IsLoggedIn())
{
  $query = "SELECT * FROM `players` WHERE id = ".$_SESSION["DCRP_AccountID"]." LIMIT 1";
  $result = mysqli_query($connect, $query);

  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
  {
    $AdminLevel = $row["AdminLevel"];
    $HelperLevel = $row["HelperLevel"];
  }
}