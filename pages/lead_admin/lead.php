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
            else if($_GET["lead"] == "aooc")
            {
                require_once("lacp_aooc.php");
            }
            else require_once("lacp_main.html");
        }
        else require_once("lacp_main.html");
    }
    else echo '<META HTTP-EQUIV=REFRESH CONTENT="1; index.php?page=home">';
}
else echo '<META HTTP-EQUIV=REFRESH CONTENT="1; index.php?page=home">';