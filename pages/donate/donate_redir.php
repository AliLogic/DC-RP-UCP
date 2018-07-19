<?php

session_start();

require_once('../../includes/config.php');
require_once('../../includes/init.php');

if(IsLoggedIn())
{
    if(isset($_SESSION["DCRP_Product"]))
    {
        $randString = strtoupper(md5(uniqid($_SESSION["DCRP_AccountID"], true)));
    
        // Check if there is already a row with the same ActivationString as randString.
        $query = "SELECT `ActivationString` FROM `Donator_Items` WHERE `ActivationString` = '".$randString."' LIMIT 1";
        $result = mysqli_query($connect, $query);
    
        if(mysqli_num_rows($result) >= 1)
        {
            // Generate a new random string if we found a row with the same ActivationString
            $randString = strtoupper(md5(uniqid($_SESSION["DCRP_AccountID"], true)));
        }
    
        // Then insert the new row.
        $query = "INSERT INTO `Donator_Items` (`ActivationString`, `BuyerID`, `Type`, `BuyTimestamp`) VALUES ('".$randString."', ".$_SESSION["DCRP_AccountID"].", ".$_SESSION["DCRP_Product"].", ".time().")";
        mysqli_query($connect, $query);
        header("Location: ../../index.php?page=ucp&user=donate");
    }
    else header("Location: ../../index.php?page=donate");
}
else header("Location: ../../index.php?page=login");
