<?php

session_start();

require_once('../../includes/config.php');
require_once('../../includes/init.php');

if(IsLoggedIn && GetAdminLevel() >= 4)
{
    if(isset($_POST["news_text"])
        && isset($_POST["news_title"]))
    {
        $title = mysqli_real_escape_string($connect, $_POST["news_title"]);
        $text = mysqli_real_escape_string($connect, $_POST["news_text"]);
    
        $query = "INSERT INTO `News` (`Timestamp`, `Poster`, `Message`, `Title`, `Draft`) VALUES (".time().", '".GetUserName($_SESSION["DCRP_AccountID"])."', '".$text."', '".$title."', 0)";
        mysqli_query($connect, $query);
        header("Location: ../../index.php?page=news&id=".mysqli_insert_id());
    }
    else header("Location: ../../index.php?page=lacp&lead=announcement"); // Title or Text empty.
}
else header("Location: ../../index.php?page=home");
