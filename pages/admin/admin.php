<?php
if(IsLoggedIn())
{
    if($AdminLevel >= 1)
    {
        require_once("acp_tabs.php");
        if(isset($_GET["admin"]) || !empty($_GET["admin"]))
        {
            if($_GET["admin"] == "ban")
            {
                if($_GET["sect"] == "check")
                {
                    require_once("acp_ban_check.html");  
                }
                else require_once("acp_ban.html");  
            }
            else if($_GET["admin"] == "records")
            {
                require_once("acp_ban.html");  
            }
            else if($_GET["admin"] == "notes")
            {
                require_once("acp_ban.html");  
            }
            else if($_GET["admin"] == "logs")
            {
                require_once("acp_ban.html");  
            }
            else require_once("acp_main.html");  
        }
        else
        {
            require_once("acp_main.html");
        }
    }
}