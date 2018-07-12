<?php

session_start();

require_once('../includes/config.php');
require_once('../includes/init.php');

if (isset($_POST['username']) && isset($_POST['password']))
{
    $username = mysqli_real_escape_string($connect, $_POST["username"]);
    $password = mysqli_real_escape_string($connect, $_POST["password"]);

    $query = "SELECT `salt`, `password`, `id` FROM `players` WHERE `username` = '".$username."' LIMIT 1";
    $result = mysqli_query($connect, $query);

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        $storedPassword = $row["password"];
        $storedSalt = $row["salt"];
        $storedID = $row["id"];
    } 

    $securePassword = strtoupper(hash("sha256", $password.$storedSalt));

    if($securePassword == $storedPassword)
    {
        $_SESSION["AccountID"] = $storedID;
        Header("Location: ../index.php?page=home");
    }
    else Header("Location: ../index.php?page=login&error=1");
}
else Header("Location: ../index.php?page=login&error=2");
?>