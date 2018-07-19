<?php
if(IsLoggedIn())
{
    if(HasPassedTest())
    {
        if(isset($_GET["user"]) || !empty($_GET["user"]))
        {
            if($_GET["user"] == "donate")
            {
                require_once("ucp_donate.php");
            }
            else require_once("ucp_main.php");
        }
        else require_once("ucp_main.php");
    }
    else 
    {
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; index.php?page=createchar">';
        exit();
    }
}
else 
{
    echo '<META HTTP-EQUIV=REFRESH CONTENT="1; index.php?page=login">';
    exit();
}