<?php
if(IsLoggedIn())
{
    if(GetAdminLevel() >= 5)
    {        
        require_once("smcp_tabs.php");
        if(isset($_GET["manager"]) || !empty($_GET["manager"]))
        {
            if($_GET["manager"] == "password")
            {
                require_once("smcp_password.php");
            }
            else if($_GET["manager"] == "secretword")
            {
                require_once("smcp_secretword.php");
            }
            else require_once("smcp_main.html");
        }
        else
        {
            require_once("smcp_main.html");
        }
    }
    else echo '<META HTTP-EQUIV=REFRESH CONTENT="1; index.php?page=home">';
}
else echo '<META HTTP-EQUIV=REFRESH CONTENT="1; index.php?page=home">';