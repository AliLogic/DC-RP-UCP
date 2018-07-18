<?php
if(IsLoggedIn())
{
    if(GetAdminLevel() >= 4)
    {        
        require_once("lacp_tabs.php");
        if(isset($_GET["lead"]) || !empty($_GET["lead"]))
        {
            if($_GET["lead"] == "announcement")
            {
                require_once("lacp_announcement.html");
            }
            else require_once("lacp_main.html");
        }
        else require_once("lacp_main.html");
    }
    else echo '<META HTTP-EQUIV=REFRESH CONTENT="1; index.php?page=home">';
}
else echo '<META HTTP-EQUIV=REFRESH CONTENT="1; index.php?page=home">';