<?php

function IsLoggedIn()
{
    if(isset($_SESSION["DCRP_AccountID"]) || !empty($_SESSION["DCRP_AccountID"]))
    {
        return true;
    }
    return false;
}

// https://stackoverflow.com/questions/4356289/php-random-string-generator
function generateRandomString($length = 10) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ~!@#$%^&*(){}[],./?';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) 
  {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
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

function GetCommunityRank($id)
{
  echo "1";
  $rankName = 'Regular Player';
  $helperRank = 0;
  $adminRank = 0;
  $connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
  if(!mysqli_connect_errno() || $connect !== false)
  {
    echo "2";
    $query = "SELECT `AdminLevel`, `HelperLevel` FROM `players` WHERE `id` = ".$_SESSION["DCRP_AccountID"]." LIMIT 1";
  
    echo "3";
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) >= 1)
    {
      echo "4";
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
      {
        echo "5";
        $adminRank = $row["AdminLevel"];
        $helperRank = $row["HelperLevel"];
      }
    }
  }

  echo "6";
  if($helperRank >= 1)
  {
    echo "helper";
    $rankName = GetHelperRankName($adminRank);
  }
  if($adminRank >= 1)
  {
    echo "admin";
    $rankName = GetAdminRankName($adminRank);
  }
  echo "show";
  return $rankName;
}

function GetHelperRankName($adminlevel)
{
  $admRank = '';
  switch($adminlevel)
  {
    case 0: 
      $admRank = "Regular Player";
      break;
    case 1:
      $admRank = "Community Helper";
      break;
  }
  return $admRank;
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

function getOS($user_agent) 
{
  $os_platform    =   "Unknown OS Platform";

  $os_array       =   array(
                          '/windows nt 6.2/i'     =>  'Windows 8',
                          '/windows nt 6.1/i'     =>  'Windows 7',
                          '/windows nt 6.0/i'     =>  'Windows Vista',
                          '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                          '/windows nt 5.1/i'     =>  'Windows XP',
                          '/windows xp/i'         =>  'Windows XP',
                          '/windows nt 5.0/i'     =>  'Windows 2000',
                          '/windows me/i'         =>  'Windows ME',
                          '/win98/i'              =>  'Windows 98',
                          '/win95/i'              =>  'Windows 95',
                          '/win16/i'              =>  'Windows 3.11',
                          '/macintosh|mac os x/i' =>  'Mac OS X',
                          '/mac_powerpc/i'        =>  'Mac OS 9',
                          '/linux/i'              =>  'Linux',
                          '/ubuntu/i'             =>  'Ubuntu',
                          '/iphone/i'             =>  'iPhone',
                          '/ipod/i'               =>  'iPod',
                          '/ipad/i'               =>  'iPad',
                          '/android/i'            =>  'Android',
                          '/blackberry/i'         =>  'BlackBerry',
                          '/webos/i'              =>  'Mobile'
                      );

  foreach ($os_array as $regex => $value) { 

      if (preg_match($regex, $user_agent)) {
          $os_platform    =   $value;
      }

  }   

  return $os_platform;

}

function getBrowser($user_agent) 
{
  $browser        =   "Unknown Browser";

  $browser_array  =   array(
                          '/msie/i'       =>  'Internet Explorer',
                          '/firefox/i'    =>  'Firefox',
                          '/safari/i'     =>  'Safari',
                          '/chrome/i'     =>  'Chrome',
                          '/opera/i'      =>  'Opera',
                          '/netscape/i'   =>  'Netscape',
                          '/maxthon/i'    =>  'Maxthon',
                          '/konqueror/i'  =>  'Konqueror',
                          '/mobile/i'     =>  'Handheld Browser'
                      );

  foreach ($browser_array as $regex => $value) { 

      if (preg_match($regex, $user_agent)) {
          $browser    =   $value;
      }

  }

  return $browser;

}

function GetHelperLevel()
{
  $helperLevel = 0;
  if(IsLoggedIn())
  {
    // Let's get rid of this mysqli_connect and refer to the global one.
    $connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if(!mysqli_connect_errno() || $connect !== false)
    {
      $query = "SELECT `HelperLevel` FROM `players` WHERE `id` = ".$_SESSION["DCRP_AccountID"]." LIMIT 1";
    
      $result = mysqli_query($connect, $query);
      if(mysqli_num_rows($result) >= 1)
      {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
          $helperLevel = $row["HelperLevel"];
        }
      }
    }
  }
  return $helperLevel;
}

function ReturnDonatorProducts($product)
{
  $prodName = '';
  switch($product)
  {
    case 1:
      $prodName = 'Single Namechange';
      break;
    case 2:
      $prodName = 'Single Phone Number Change';
      break;
    case 3:
      $prodName = 'Bronze Donator';
      break;
    case 4:
      $prodName = 'Silver Donator';
      break;
    case 5:
      $prodName = 'Gold Donator';
      break;
    default:
      $prodName = 'Unknown Item (Inform Staff!)';
      break;
  }
  return $prodName;
}

function HasPassedTest()
{
  if(IsLoggedIn())
  {
    // Let's get rid of this mysqli_connect and refer to the global one.
    $connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if(!mysqli_connect_errno() || $connect !== false)
    {
      $query = "SELECT `PassedTest` FROM `players` WHERE `id` = ".$_SESSION["DCRP_AccountID"]." LIMIT 1";
    
      $result = mysqli_query($connect, $query);
      if(mysqli_num_rows($result) >= 1)
      {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
          if($row["PassedTest"])
          {
            return true;
          }
          else
          {
            return false;
          }
        }
      }
    }
  }
  return false;
}

function HasPostedAnswers()
{
  if(IsLoggedIn())
  {
    // Let's get rid of this mysqli_connect and refer to the global one.
    $connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if(!mysqli_connect_errno() || $connect !== false)
    {
      $query = "SELECT * FROM `roleplay_test` WHERE `account_id` = ".$_SESSION["DCRP_AccountID"]." LIMIT 1";
    
      $result = mysqli_query($connect, $query);
      if(mysqli_num_rows($result) >= 1)
      {
        return true;
      }
    }
  }
  return false;
}

function IsUsingProxy($ip_addr)
{
  $url = 'http://proxy.mind-media.com/block/proxycheck.php?ip={ip_addres}';
  $url_done = str_replace("{ip_addres}",$ip_addr,$url);
  $blacklist = file_get_contents($url_done);

  if($blacklist == "Y")
  {
		return true;
	}
  return false;
}

function ShowAnswers($accountID, $header)
{
  if(IsLoggedIn())
  {
    $connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if(!mysqli_connect_errno() || $connect !== false)
    {
        $query = "SELECT * FROM `roleplay_test` WHERE `account_id` = '".$accountID."' LIMIT 1";
        $result = mysqli_query($connect, $query);
        
        $answer1 = '';
        $answer2 = '';
        $answer3 = '';
        $answer4 = '';
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
          $answer1 = $row["question_1"];
          $answer2 = $row["question_2"];
          $answer3 = $row["question_3"];
          $answer4 = $row["question_4"];
        }
        
        echo '<div class="panel panel-default" style="background-color: #E5E6EB; border: black 1px solid;">
            <div class="panel-body">
                <div class="col-md-12">
                    <div class ="news" style="background-color: #E5E6EB;">
                        <h1 class="color-black text-left">'.$header.'</h1>
                        <p><strong>1. You are walking down the street and someone decides to rob you, how would you react?</strong></p>
                        <p>'.nl2br($answer1).'</p>
                        <p><strong>2. You are involved in a car collision (car crash), what do you do next?</strong></p>
                        <p>'.nl2br($answer2).'</p>
                        <p><strong>3. You see someone who spawned an RPG, what do you do next?</strong></p>
                        <p>'.nl2br($answer3).'</p>
                        <p><strong>4. You find a bug in-game, what do you do?</strong></p>
                        <p>'.nl2br($answer4).'</p>
                    </div>
                </div>
            </div>
        </div>';
    }
  }
}