<?php

session_start();

require_once('../../includes/config.php');
require_once('../../includes/init.php');

$query = "SELECT `app_status` FROM `roleplay_test` WHERE `account_id` = ".$_SESSION["DCRP_AccountID"]." LIMIT 1";
$result = mysqli_query($connect, $query);
$appStatus = 0;
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $appStatus = $row["app_status"];
}

if($appStatus == 1)
{
    $query = "DELETE FROM `roleplay_test` WHERE `account_id` = ".$_SESSION["DCRP_AccountID"]." LIMIT 1";
    mysqli_query($connect, $query);
    
    $query = "UPDATE `players` SET `PassedTest` = 1 WHERE `id` = ".$_SESSION["DCRP_AccountID"]." LIMIT 1";
    mysqli_query($connect, $query);
    
    header("Location: ../../index.php?page=ucp&user=main");
}
else
{
    $query = "INSERT INTO `hacker_log` (`AccountID`, `Username`, `Action`, `Timestamp`) VALUES (".$_SESSION["DCRP_AccountID"].", '".GetUserName($_SESSION["DCRP_AccountID"])."', 'Attempted to self-accept application.', ".time().")";
    mysqli_query($connect, $query);
    header("Location: ../../index.php?page=createchar");
}