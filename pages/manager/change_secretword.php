<?php

session_start();

require_once('../../includes/config.php');
require_once('../../includes/init.php');

if(IsLoggedIn() && GetAdminLevel($_SESSION["DCRP_AccountID"]) >= 5)
{
    if(isset($_POST["username"])
        && isset($_POST["secretword"])
        && isset($_POST["confirm_secretword"]))
    {
        $username = mysqli_real_escape_string($connect, $_POST["username"]);
        $password = mysqli_real_escape_string($connect, $_POST["secretword"]);
        $confirm_password = mysqli_real_escape_string($connect, $_POST["confirm_secretword"]);

        if($password != $confirm_password)
        {
            header("Location: ../../index.php?page=smcp&manager=secretword&error=1"); // secretword does not match.
            exit();
        }

        $query = "SELECT `id`, `salt` FROM `players` WHERE `username` = '".$username."' LIMIT 1";
        $result = mysqli_query($connect, $query);

        $accountID = 0;
        $salt = '';
        if(mysqli_num_rows($result) >= 1)
        {
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                $accountID = $row["id"];
                $salt = $row["salt"];
            }
        }
        else
        {
            header("Location: ../../index.php?page=smcp&manager=secretword&error=2"); // No such account found
            exit();
        }
        $securePassword = strtoupper(hash("sha256", $password.$salt));

        $query = "UPDATE `players` SET `SecretWord` = '".$securePassword."' WHERE `id` = '".$accountID."' LIMIT 1";
        if(mysqli_query($connect, $query))
        {
            header("Location: ../../index.php?page=smcp&manager=secretword&error=3"); // secretword sucessfully changed
        }
    }
}
else header("Location: ../../index.php?page=home");