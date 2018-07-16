<?php

require_once('includes/config.php');
require_once('includes/init.php');

if(isset($_GET["id"]))
{
    $query = "SELECT `activated` FROM `players` WHERE `id` = ".$_GET["id"]." LIMIT 1";
    $result = mysqli_query($connect, $query);
    
    if(mysqli_num_rows($result) >= 1)
    {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            if($row["activated"])
            {
                echo '<META HTTP-EQUIV=REFRESH CONTENT="1; index.php?page=login">';
            }
        }
        
        $query = "UPDATE `players` SET `activated` = 1 WHERE `id` = ".$_GET["id"]." LIMIT 1";
        if(mysqli_query($connect, $query))
        {
            echo "Account Verified, moving you to login page...";
            sleep(1);
            echo '<META HTTP-EQUIV=REFRESH CONTENT="1; index.php?page=login&success=2">';
        }
    }
    else echo '<META HTTP-EQUIV=REFRESH CONTENT="1; index.php?page=home">';
}
else echo '<META HTTP-EQUIV=REFRESH CONTENT="1; index.php?page=home">';