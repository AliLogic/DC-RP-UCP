<?php

session_start();

require_once('../../includes/config.php');
require_once('../../includes/init.php');

if(isset($_POST["accept"]))
{
    $query = "UPDATE `players` SET `dcrp_terms` = 1 WHERE `id` = ".$_SESSION["DCRP_AccountID"]." LIMIT 1";
    $result = mysqli_query($connect, $query);
}
header("Location: ../../index.php?page=createchar");