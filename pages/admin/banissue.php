<?php session_start();

require_once('../../includes/config.php');
require_once('../../includes/init.php');

if(isset($_POST["username"]))
{
    $username = mysqli_real_escape_string($connect, $_POST["username"]);
    $reason = mysqli_real_escape_string($connect, $_POST["reason"]);

    if(!isset($reason))
    {
        header("Location: ../../index.php?page=acp&admin=ban&sect=issue&error=2"); // Reason is empty.
        exit();
    }

    $ipAddr = '';
    if(isset($_POST["ipaddr"]) && !empty($_POST["ipaddr"]))
    {
        $ipAddr = mysqli_real_escape_string($connect, $_POST["ipaddr"]);
    }

    $unbanDate = 0;
    if(isset($_POST["expire"]) && !empty($_POST["expire"]))
    {
        $unbanDate = strtotime(mysqli_real_escape_string($connect, $_POST["expire"]));
    }

    $query = "SELECT `username` FROM `players` WHERE `id` = ".$_SESSION['DCRP_AccountID']." LIMIT 1";
    $player_result = mysqli_query($connect, $query);
    
    while($row = mysqli_fetch_array($player_result, MYSQLI_ASSOC))
    {
        $adminName = $row["username"];
    }
    
    $query = "SELECT `id`, `StoredIP`, `StoredGPCI` FROM `players` WHERE `username` = '".$username."' LIMIT 1";
    $player_result = mysqli_query($connect, $query);
    
    $accID = 0;
    if(mysqli_num_rows($player_result) < 1)
    {
        header("Location: ../../index.php?page=acp&admin=ban&sect=issue&error=3"); // No such player exists
        exit();
    }
    while($row = mysqli_fetch_array($player_result, MYSQLI_ASSOC))
    {
        $accID = $row["id"];
        if(strlen($ipAddr) < 2)
        {
            $ipAddr = $row["StoredIP"];
        }
        $gpci = $row["StoredGPCI"];
    }

    // INSERT INTO `bans` (`AccountID`, `Admin`, `UnbanTimestamp`, `Reason`, `IPAddress`, `BanDate`, `Serial`) VALUES (2, 'ADMIN_NAME', 0, 'BAN_REASON', 'IP_ADDR', 99999, 'SERIAL');
    if(!empty($ipAddr))
    {
        $query = "INSERT INTO `bans` (`AccountID`, `Admin`, `UnbanTimestamp`, `Reason`, `IPAddress`, `BanDate`, `Serial`) VALUES ($accID, '".$adminName."', ".$unbanDate.", '".$reason."', '".$ipAddr."', ".time().", '".$gpci."')";
    }
    else $query = "INSERT INTO `bans` (`AccountID`, `Admin`, `UnbanTimestamp`, `Reason`, `IPAddress`, `BanDate`, `Serial`) VALUES ($accID, '".$adminName."', ".$unbanDate.", '".$reason."', '".$ipAddr."', ".time().", '".$gpci."')";

    $ban_result = mysqli_query($connect, $query);

    $query = "INSERT INTO `ban_logs` (`BannedDBID`, `BannedName`, `Reason`, `BannedBy`, `Date`) VALUES ($accID, '".$username."', '".$reason."', '".$adminName."', '".date('d/m/Y H:i:s', time())."')";
    $log_result = mysqli_query($connect, $query);
    
    header("Location: ../../index.php?page=acp&admin=ban&sect=issue&error=1");// Ban issued
    exit();
}
else header("Location: ../../index.php?page=acp&admin=ban&sect=remove");
