<?php

session_start();

require_once('../../includes/config.php');
require_once('../../includes/init.php');

if(IsLoggedIn() && GetAdminLevel($_SESSION["DCRP_AccountID"]) >= 5)
{
    if(isset($_POST["username"])
        && isset($_POST["password"])
        && isset($_POST["confirm_password"]))
    {
        $username = mysqli_real_escape_string($connect, $_POST["username"]);
        $password = mysqli_real_escape_string($connect, $_POST["password"]);
        $confirm_password = mysqli_real_escape_string($connect, $_POST["confirm_password"]);

        if($password != $confirm_password)
        {
            header("Location: ../../index.php?page=smcp&manager=password&error=1"); // Password does not match.
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
        else
        {
            header("Location: ../../index.php?page=smcp&manager=password&error=2"); // No such account found
            exit();
        }

        $genSalt = mysqli_real_escape_string($connect, generateRandomString(16));

        $securePassword = strtoupper(hash("sha256", $password.$genSalt));

        $query = "UPDATE `players` SET `password` = '".$securePassword."', `salt` = '".$genSalt."' WHERE `id` = '".$accountID."' LIMIT 1";
        if(mysqli_query($connect, $query))
        {
            header("Location: ../../index.php?page=smcp&manager=password&error=3"); // Password sucessfully changed
        }
    }
}
else header("Location: ../../index.php?page=home");