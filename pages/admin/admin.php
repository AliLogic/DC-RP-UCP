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
                if(isset($_GET["sect"]) || !empty($_GET["sect"]))
                {
                    if($_GET["sect"] == "check")
                    {
                        require_once("ban/acp_ban_check.php");  
                    }
                    else if($_GET["sect"] == "checkinfo")
                    {
                        require_once("ban/acp_ban_checkinfo.php");  
                    }
                    else if($_GET["sect"] == "remove")
                    {
                        require_once("ban/acp_ban_remove.php");  
                    }
                    else if($_GET["sect"] == "issue")
                    {
                        require_once("ban/acp_ban_issue.php");  
                    }
                    else require_once("ban/acp_ban.html");
                }
                else require_once("ban/acp_ban.html");
            }
            else if($_GET["admin"] == "records")
            {
                if(isset($_GET["sect"]) || !empty($_GET["sect"]))
                {
                    if($_GET["sect"] == "check")
                    {
                        require_once("records/acp_viewrecords.php");
                    }
                    else require_once("records/acp_records.php");  
                }
                else require_once("records/acp_records.php");  
            }
            else if($_GET["admin"] == "notes")
            {
                if(isset($_GET["sect"]) || !empty($_GET["sect"]))
                {
                    if($_GET["sect"] == "check")
                    {
                        require_once("notes/acp_viewnotes.php");
                    }
                    else require_once("notes/acp_notes.html");
                }
                else require_once("notes/acp_notes.html");
            }
            else if($_GET["admin"] == "logs")
            {
                if(isset($_GET["sect"]) || !empty($_GET["sect"]))
                {
                    if($_GET["sect"] == "attack")
                    {
                        require_once("logs/acp_attacklogs.php");
                    }
                    else if($_GET["sect"] == "hacker")
                    {
                        require_once("logs/acp_hackerlogs.php");
                    }
                    else if($_GET["sect"] == "ic")
                    {
                        require_once("logs/acp_iclogs.php");
                    }
                    else if($_GET["sect"] == "ooc")
                    {
                        require_once("logs/acp_ooclogs.php");
                    }
                    else if($_GET["sect"] == "pm")
                    {
                        require_once("logs/acp_pmlogs.php");
                    }
                    else require_once("logs/acp_logs.html");
                }
                else require_once("logs/acp_logs.html");
            }
            else require_once("acp_main.html");  
        }
        else
        {
            require_once("acp_main.html");
        }
    }
}