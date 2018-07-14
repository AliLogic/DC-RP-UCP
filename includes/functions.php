<?php

function IsLoggedIn()
{
    if(isset($_SESSION["DCRP_AccountID"]) || !empty($_SESSION["DCRP_AccountID"]))
    {
        return true;
    }
    return false;
}

function GetWeaponName($weaponID)
{
  // Reference: http://wiki.sa-mp.com/wiki/Weapons
  $wepName = '';
  switch($weaponID)
  {
    case 1: 
      $wepName = "Brass Knucles";
      break;
    case 2: 
      $wepName = "Golf Clubs";
      break;
    case 3: 
      $wepName = "Nite Stick";
      break;
    case 4: 
      $wepName = "Knife";
      break;
    case 5: 
      $wepName = "Baseball Bat";
      break;
    case 6: 
      $wepName = "Shovel";
      break;
    case 7: 
      $wepName = "Pool Cue";
      break;
    case 8: 
      $wepName = "Katana";
      break;
    case 9: 
      $wepName = "Chainsaw";
      break;
    case 10: 
      $wepName = "Purple Dildo";
      break;
    case 11: 
      $wepName = "Dildo";
      break;
    case 12: 
      $wepName = "Vibrator";
      break;
    case 13: 
      $wepName = "Siliver Vibrator";
      break;
    case 14: 
      $wepName = "Flowers";
      break;
    case 15: 
      $wepName = "Cane";
      break;
    case 16: 
      $wepName = "Grenade";
      break;
    case 17: 
      $wepName = "Tear Gas";
      break;
    case 18: 
      $wepName = "Molotov Cocktail";
      break;
    case 22: 
      $wepName = "Colt 45";
      break;
    case 23: 
      $wepName = "Silenced Pistol";
      break;
    case 24: 
      $wepName = "Desert Eagle";
      break;
    case 25: 
      $wepName = "Shotgun";
      break;
    case 26: 
      $wepName = "Sawnoff Shotgun";
      break;
    case 27: 
      $wepName = "Combat Shotgun";
      break;
    case 28: 
      $wepName = "Uzi";
      break;
    case 29: 
      $wepName = "MP5";
      break;
    case 30: 
      $wepName = "AK-47";
      break;
    case 31: 
      $wepName = "M4";
      break;
    case 32: 
      $wepName = "Pool Cue";
      break;
    case 33: 
      $wepName = "Country Rifle";
      break;
    case 34: 
      $wepName = "Sniper Rifle";
      break;
    case 35: 
      $wepName = "RPG";
      break;
    case 36: 
      $wepName = "HS Rocket";
      break;
    case 37: 
      $wepName = "Flamethrower";
      break;
    case 38: 
      $wepName = "Minigun";
      break;
    case 39: 
      $wepName = "Satchel";
      break;
    case 40: 
      $wepName = "Detonator";
      break;
    case 41:
      $wepName = "Spraycan";
      break;
    case 42:
      $wepName = "Fire Extinguisher";
      break;
    case 43:
      $wepName = "Camera";
      break;
    case 44: 
      $wepName = "Night-Vis Goggles";
      break;
    case 45: 
      $wepName = "Thermal Goggles";
      break;
    case 46: 
      $wepName = "Parachute";
      break;
    case 47: 
      $wepName = "Fake Pistol";
      break;
    case 49: 
      $wepName = "Vehicle";
      break;
    case 50: 
      $wepName = "Heliblade";
      break;
    case 51: 
      $wepName = "Explosion";
      break;
    case 53: 
      $wepName = "Drown";
      break;
    case 54: 
      $wepName = "Splat";
      break;
    default:
      $wepName = "Fist";
      break;
  }
  return $wepName;
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

function GetCharacterName($id)
{
  // Let's get rid of this mysqli_connect and refer to the global one.
  $connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
  $username = '';
  if(!mysqli_connect_errno() || $connect !== false)
  {
    $query = "SELECT `Name` FROM `characters` WHERE `CharacterID` = ".$id." LIMIT 1";
  
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) >= 1)
    {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
          $username = $row["Name"];
        }
    }
  }
  return $username;
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