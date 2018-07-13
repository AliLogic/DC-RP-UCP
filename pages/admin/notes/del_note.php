<?php session_start();

require_once('../../../includes/config.php');
require_once('../../../includes/init.php');

if(isset($_GET["id"]) && isset($_GET["view_id"]))
{

    $query = "DELETE FROM `admin_notes` WHERE `ID` = ".$_GET['id']." LIMIT 1";
    $result = mysqli_query($connect, $query);
    
    if(mysqli_affected_rows($connect) >= 1)
    {
        //index.php?page=acp&admin=notes&sect=check&error=1&num
        header("Location: ../../../index.php?page=acp&admin=notes&sect=check&id=".$_GET['view_id']."&error=1");
        exit();
    }
    else header("Location: ../../../index.php?page=acp&admin=notes&sect=check&id=".$_GET['view_id']); // No rows affected.
}
else header("Location: ../../../index.php?page=acp&admin=notes&sect=check"); // id not set
