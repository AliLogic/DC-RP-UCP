<?php

session_start();

require_once('../../includes/config.php');
require_once('../../includes/init.php');

if(IsLoggedIn() && GetAdminLevel() >= 4)
{
    if(isset($_POST["ig_ann"]))
    {
        $type = $_POST["type"];
        $announcement = mysqli_real_escape_string($connect, $_POST["ig_ann"]);
    
        $query = "INSERT INTO `ig_announcement` (`UserID`, `Message`, `Type`) VALUES (".$_SESSION['DCRP_AccountID'].", '".$announcement."', ".$type.")";
        mysqli_query($connect, $query);
        header("Location: ../../index.php?page=lacp&lead=aooc&error=1"); // Announcement was sent.
    }
    else header("Location: ../../index.php?page=lacp&lead=aooc&error=2"); // Announcement could not be sent.
}
else header("Location: ../../index.php?page=home");
