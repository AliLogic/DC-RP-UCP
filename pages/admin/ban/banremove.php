<?php session_start();

require_once('../../includes/config.php');
require_once('../../includes/init.php');

if(isset($_POST["username"]))
{
    $username = mysqli_real_escape_string($connect, $_POST["username"]);
    if(!empty($_POST["ipaddr"]))
    {
        $ipAddr = mysqli_real_escape_string($connect, $_POST["ipaddr"]);
    }
    
    $query = "SELECT `id` FROM `players` WHERE `username` = '".$username."' LIMIT 1";
    $player_result = mysqli_query($connect, $query);
    
    $accID = 0;
    while($row = mysqli_fetch_array($player_result, MYSQLI_ASSOC))
    {
        $accID = $row["id"];
    }

    if(!empty($ipAddr))
    {
        $query = "DELETE FROM `bans` WHERE `AccountID` = ".$accID." AND `IPAddress` = '".$ipAddr."'";
    }
    else $query = "DELETE FROM `bans` WHERE `AccountID` = ".$accID."";

    $ban_result = mysqli_query($connect, $query);
    
    $numRemoved = mysqli_affected_rows($connect);
    if($numRemoved >= 1)
    {
        header("Location: ../../index.php?page=acp&admin=ban&sect=remove&error=1&num=".$numRemoved);
        exit();
    }
    else header("Location: ../../index.php?page=acp&admin=ban&sect=remove&error=2");
}
else header("Location: ../../index.php?page=acp&admin=ban&sect=remove");
