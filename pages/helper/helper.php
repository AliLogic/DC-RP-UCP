<?php
if(IsLoggedIn())
{
    if(GetHelperLevel() >= 1 || GetAdminLevel() >= 4)
    {        
        require_once("hcp_tabs.php");
        if(isset($_GET["helper"]) || !empty($_GET["helper"]))
        {
            if($_GET["helper"] == "apps")
            {
                require_once("hcp_applications.php");  
            }
            else if($_GET["helper"] == "app")
            {
                require_once("hcp_application.php");  
            }
            else require_once("hcp_main.php");  
        }
        else
        {
            require_once("hcp_main.php");
        }
    }
    else echo '<META HTTP-EQUIV=REFRESH CONTENT="1; index.php?page=home">';
}