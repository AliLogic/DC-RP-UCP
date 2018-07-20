<?php

// database
define('DEBUG', false);

define('DB_SERVER', '138.68.147.236');
define('DB_USERNAME', 'samp_server');
define('DB_PASSWORD', 'IJta0WFpQV9TJl55');
define('DB_NAME', 'sa-mp');

//define('PP_CLIENT_ID', 'AUtDYCCNipKzglNiRG3lsWApj38WJBqYnIYv1U8ha1j07TvOU_gM24YvDEX5e8h3WCRbGV7JS9Sn_C12');
//define('PP_SECRET', 'EJuSCZu_rKGDDIANknn11-h8XWe8AA8IQOkmUdGCQ9qs_XlhrYPVxxsjcmz3Bd1ZciYcPuprFTJithpJ');
define('PP_CLIENT_ID', 'ASYLqunNSyK4LaqC-5B9SkBrB9Yugnkjo0ZclnD7iVg22QD79UEE04in8wbgN-AEuYA2Uu2d8v1wenOS');
define('PP_SECRET', 'EELyLvWCx2OLsXa-xMfg3DKx79GHrf2-RjpgJ0Eoq99A-iMRSz260nqBDWhFEDi6AAhw-8A1SzOJuUWb');
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