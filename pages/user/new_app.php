<?php

session_start();

require_once('../../includes/config.php');
require_once('../../includes/init.php');

$query = "DELETE FROM `roleplay_test` WHERE `account_id` = ".$_SESSION["DCRP_AccountID"]." LIMIT 1";
mysqli_query($connect, $query);

header("Location: ../../index.php?page=createchar");