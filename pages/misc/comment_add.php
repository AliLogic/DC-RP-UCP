<?php session_start();

require_once('../../includes/config.php');
require_once('../../includes/init.php');

if(isset($_GET["id"]))
{
    if(!isset($_POST["message"]))
    {
        die("Message is empty");
    }

    $message = mysqli_real_escape_string($connect, $_POST["message"]);

    $query = "INSERT INTO `UCP_Comments` (`NewsID`, `Message`, `UserID`, `Timestamp`, `Hidden`) VALUES (".$_GET["id"].", '".$message."', ".$_SESSION['DCRP_AccountID'].", '".time()."', 0)";
    $result = mysqli_query($connect, $query);
    Header("Location: ../../index.php?page=news&id=".$_GET["id"]);
}
else Header("Location: ../../index.php?page=home");