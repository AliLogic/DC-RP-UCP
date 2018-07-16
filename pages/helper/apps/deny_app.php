<?php

session_start();

require_once('../../../includes/config.php');
require_once('../../../includes/init.php');
require_once('../../../includes/functions.php');

if(GetHelperLevel() >= 1 || GetAdminLevel() >= 4)
{
    if(isset($_GET["id"]))
    {
        $reason = '';
        if(isset($_POST["denyApp"]))
        {
            $reason = mysqli_real_escape_string($connect, $_POST["denyApp"]);
        }

        
        $query = "SELECT `email` FROM `players` WHERE `id` = ".$_GET["id"]." LIMIT 1";
        $result = mysqli_query($connect, $query);
        $email = '';
        
        if(mysqli_num_rows($result) >= 1)
        {
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                $email = $row["email"];
                
            }
        }
        
        $message = '<html>
        <head>
        <title>DC-RP Registration Response</title>
        </head>
        <body>
        Hello '.GetUserName($_GET["id"]).'<br><br>
        You have recieved a response on your registration application.<br><br>
        Regards<br>
        DC-RP Staff.
        </body>
        </html>';
        
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: Desert County Roleplay <no-reply@dc-rp.com>' . "\r\n";
        
        mail($email, "DC-RP Registration Response", $message, $headers);
        
        $query = "UPDATE `roleplay_test` SET `app_status` = 2 WHERE `account_id` = ".$_GET["id"]." LIMIT 1";
        if(mysqli_query($connect, $query))
        {    
            if(isset($_POST["issue_ban"]))
            {
                $query = "SELECT * FROM `roleplay_test` WHERE `account_id` = ".$_GET["id"]." LIMIT 1";
                $result = mysqli_query($connect, $query);

                if(mysqli_num_rows($result) >= 1)
                {
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                    {
                        $query = "INSERT INTO `bans` (`AccountID`, `Admin`, `UnbanTimestamp`, `Reason`, `IPAddress`, `BanDate`, `Serial`) VALUES (".$_GET["id"].", '".GetUserName($_SESSION["DCRP_AccountID"])."', 0, '".$reason."', '".$row["ip_addr"]."', ".time().", '0')";
                        if(mysqli_query($connect, $query))
                        {
                            $query = "INSERT INTO `ban_logs` (`BannedDBID`, `BannedName`, `Reason`, `BannedBy`, `Date`) VALUES (".$_GET["id"].", '".GetUserName($_GET["id"])."', '".$reason."', '".GetUserName($_SESSION["DCRP_AccountID"])."', '".date('d/m/Y H:i:s', time())."')";
                            mysqli_query($connect, $query);
                        }
                    }
                }

            }
        }
    }
}
echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ../../../index.php?page=hcp&helper=apps">';
