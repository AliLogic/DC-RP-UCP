<?php

// some general information

$websitetitle = "Desert County Roleplay";
$websitename = "Desert County Roleplay";
$websitedescription = "San Andreas Multiplayer roleplaying community, based in Bone County.";
$siteversion = "v1";
$urlsite = "/";
$copydate = "2018";
$logo   = "images/logo.png";
$favicon = "favicon.ico";
$backgroundrgba = "237,237,237";
$samp_ip = "138.68.147.236";
$samp_port = 7777;
  
// database

define('DB_SERVER', 'dc-rp.com');
define('DB_USERNAME', 'samp_server');
define('DB_PASSWORD', 'IJta0WFpQV9TJl55');
define('DB_NAME', 'sa-mp');

define('SAMP_IP', '138.68.147.236');
define('SAMP_PORT', 7777);

$connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($connect === false){
  die("<b>ERROR:</b> Unable to connect to the database." . mysqli_connect_error());
}

// navbar configuration

$forums= "forums";
$controlpanel = "panel";
$donate = "donate";
$servername = "Desert County Roleplay";
$topnavbarcolor = "red";
  
// index configuration
$paragraph1 = "<p>Hello and welcome, players of Desert County Roleplay to our 2nd monthly newsletter!<br><br>

As we are nearing the release of the server, I would like to thank everyone's participation in being a member of this community, we really do appreciate your continued interest in our server.
<br><br>
As the gamemode nears version 1.0, we will be announcing a Public Beta although no date has been confirmed as of yet so keep an eye out for that. We also hope to fully release the server during the summer months, although again no confirmed date there also.
<br><br>
We ask that you post your suggestions either in Discord or at our Suggestions board, we aim to make this server as best as it possibly can be at launch.
<br>
Gamemode Updates
As we mentioned previously, we have done numerous changes to the gamemode to ensure that the quality of roleplay can be high.
<br><br>
Recently we made public our internal change log which can be viewed here, this will give you a general idea of how the server is getting on development-wise. This changelog will be archived once the server is opened and we will be utilising the main change log format from there on wards.
<br><br>
We have also implemented numerous anti-cheat mechanism in order to ensure that hackers are unable to ruin your experience at Desert County RP. We have tested these anti-cheat mechanisms and can safely say that your experience will not be compromised by hackers or people using other 3rd party cheats.</p>";
$paragraph2 = "<p>Nothing helpful, just some text to show up how this does look like.</p>";
$aboutus = "We are just a bunch of people who have decided to create an amazing & professional staff team and revive the roleplay experience in a county.";

  ?>