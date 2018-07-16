<?php

session_start();

require_once('../../../includes/config.php');
require_once('../../../includes/init.php');
require_once('../../../includes/functions.php');

if(GetHelperLevel() >= 1 || GetAdminLevel() >= 4)
{
    if(isset($_GET["id"]))
    {   
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
        
        $query = "UPDATE `roleplay_test` SET `app_status` = 1, `denied_id` = ".$_SESSION["DCRP_AccountID"]." WHERE `account_id` = ".$_GET["id"]." LIMIT 1";
        mysqli_query($connect, $query);
    }
}
echo '<META HTTP-EQUIV=REFRESH CONTENT="1; ../../../index.php?page=hcp&helper=apps">';
