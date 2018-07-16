<?php
if(IsLoggedIn())
{
    if(HasPassedTest())
    {
        require_once("ucp_main.php");
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