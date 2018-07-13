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

function IsLoggedIn()
{
    if(isset($_SESSION["DCRP_AccountID"]) || !empty($_SESSION["DCRP_AccountID"]))
    {
        return true;
    }
    return false;
}

function GetAdminRankName($adminlevel)
{
  $admRank = '';
  switch($adminlevel)
  {
    case 0: 
      $admRank = "Regular Player";
      break;
    case 1:
      $admRank = "Trial Administrator";
      break;
    case 2:
      $admRank = "General Administrator";
      break;
    case 3: 
      $admRank = "Senior Administrator";
      break;
    case 4: 
      $admRank = "Lead Administrator";
      break;
    case 5: 
      $admRank = "Server Management";
      break;
  }
  return $admRank;
}

function GetUserName($id)
{
  // Let's get rid of this mysqli_connect and refer to the global one.
  $connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
  $username = '';
  if(!mysqli_connect_errno() || $connect !== false)
  {
    $query = "SELECT `username` FROM `players` WHERE `id` = ".$id." LIMIT 1";
  
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) >= 1)
    {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
          $username = $row["username"];
        }
    }
  }
  return $username;
}

function GetMasterID($id)
{
  // Let's get rid of this mysqli_connect and refer to the global one.
  $connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
  $ownerID = 0;
  if(!mysqli_connect_errno() || $connect !== false)
  {
    $query = "SELECT `OwnerID` FROM `characters` WHERE `CharacterID` = ".$id." LIMIT 1";
  
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) >= 1)
    {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
          $ownerID = $row["OwnerID"];
        }
    }
  }
  return $ownerID;
}

function GetAdminLevel()
{
  $admLevel = 0;
  if(IsLoggedIn())
  {
    // Let's get rid of this mysqli_connect and refer to the global one.
    $connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if(!mysqli_connect_errno() || $connect !== false)
    {
      $query = "SELECT `AdminLevel` FROM `players` WHERE `id` = ".$_SESSION["DCRP_AccountID"]." LIMIT 1";
    
      $result = mysqli_query($connect, $query);
      if(mysqli_num_rows($result) >= 1)
      {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
          $admLevel = $row["AdminLevel"];
        }
      }
    }
  }
  return $admLevel;
}

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