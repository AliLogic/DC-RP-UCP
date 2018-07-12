<?php session_start();

require_once('../../../includes/config.php');
require_once('../../../includes/init.php');

$unsafeString = $_POST["gpci"];
if(isset($unsafeString))
{
    $serial = mysqli_real_escape_string($connect, $unsafeString);

    $query = "SELECT * FROM `bans` WHERE `Serial` = '".$serial."' LIMIT 1";
    $ban_result = mysqli_query($connect, $query);
    
    if(mysqli_num_rows($ban_result) >= 1)
    {
        $accountID = 0;
        while($row = mysqli_fetch_array($ban_result, MYSQLI_ASSOC))
        {
            $_SESSION["Lookup_Admin"] = $row["Admin"];
            $_SESSION["Lookup_UnbanTimestamp"] = $row["UnbanTimestamp"];
            $_SESSION["Lookup_Reason"] = $row["Reason"];
            $_SESSION["Lookup_IPAddress"] = $row["IPAddress"];
            $_SESSION["Lookup_BanDate"] = $row["BanDate"];
            $_SESSION["Lookup_Serial"] = $row["Serial"];
            $accountID = $row["AccountID"];
        }
        
        $query = "SELECT `username` FROM `players` WHERE `id` = '".$accountID."' LIMIT 1";
        $player_result = mysqli_query($connect, $query);
        
        while($row = mysqli_fetch_array($player_result, MYSQLI_ASSOC))
        {
            $_SESSION["Lookup_Username"] = $row["username"];
            header("Location: ../../../index.php?page=acp&admin=ban&sect=checkinfo");
            exit();
        }
    }
    else header("Location: ../../../index.php?page=acp&admin=ban&sect=check&error=3");
}
else header("Location: ../../../index.php?page=acp&admin=ban&sect=check");
