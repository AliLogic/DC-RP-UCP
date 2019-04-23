<?php

// database
define('DEBUG', false);

define('DB_SERVER', '138.68.147.236');
define('DB_USERNAME', 'samp_server');
define('DB_PASSWORD', 'IJta0WFpQV9TJl55');
define('DB_NAME', 'sa-mp');

define('PP_CLIENT_ID', 'CHANGE_ME');
define('PP_SECRET', 'CHANGE_ME');
define('PP_LIVE', true);

define('WEB_URL', 'https://dc-rp.com');
//define('WEB_URL', 'http://localhost/dcrp_ucp');

define('SAMP_IP', '138.68.147.236');
define('SAMP_PORT', 7777);

if(DEBUG == true)
{
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
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

require_once(__DIR__.'/../vendor/autoload.php');
$apiContext = new \PayPal\Rest\ApiContext(
  new \PayPal\Auth\OAuthTokenCredential(
      PP_CLIENT_ID,     // ClientID
      PP_SECRET         // ClientSecret
  )
);

if(PP_LIVE == true)
{
  $apiContext->setConfig(
    array(
      'mode' => 'live',
      'log.LogEnabled' => true,
      'log.FileName'   => 'PayPal.log',
      'log.LogLevel'   => 'FINE'
    )
  );
}

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
