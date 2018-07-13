<?php
session_start();

require_once('../../../includes/config.php');
require_once('../../../includes/init.php');

if(isset($_POST["username"]))
{
    $username = mysqli_real_escape_string($connect, $_POST["username"]);
    if(!isset($username))
    {
        header("Location: ../../../index.php?page=acp&admin=notes&error=1"); // User does not exist
        exit();
    }

    $query = "SELECT `id` FROM `players` WHERE `username` = '".$username."' LIMIT 1";

    $result = mysqli_query($connect, $query);
    $accountID = 0;
    if(mysqli_num_rows($result) >= 1)
    {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $accountID = $row["id"];
        }
    }
    else header("Location: ../../../index.php?page=acp&admin=notes&error=1"); // User does not exist

    header("Location: ../../../index.php?page=acp&admin=notes&sect=check&id=".$accountID);
}
else header("Location: ../../../index.php?page=acp&admin=notes");