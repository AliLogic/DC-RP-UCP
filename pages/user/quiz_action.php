<?php

session_start();

require_once('../../includes/config.php');
require_once('../../includes/init.php');

if(isset($_POST["question_one"])
    && isset($_POST["question_two"])
    && isset($_POST["question_three"])
    && isset($_POST["question_four"]))
{
    $answerOne = mysqli_real_escape_string($connect, $_POST["question_one"]);
    $answerTwo = mysqli_real_escape_string($connect, $_POST["question_two"]);
    $answerThree = mysqli_real_escape_string($connect, $_POST["question_three"]);
    $answerFour = mysqli_real_escape_string($connect, $_POST["question_four"]);

    $host = '';
    if(!empty($_SERVER["REMOTE_HOST"]))
    {
        $host = $_SERVER["REMOTE_HOST"];
    }
    else $host = "Unknown";

    $query = "INSERT INTO `roleplay_test` (`question_1`, `question_2`, `question_3`, `question_4`, `account_id`, `timestamp`, `ip_addr`, `host_name`, `user_agent`) VALUES ('".$answerOne."', '".$answerTwo."', '".$answerThree."', '".$answerFour."', ".$_SESSION["DCRP_AccountID"].", ".time().", '".$_SERVER["REMOTE_ADDR"]."', '".$host."', '".$_SERVER["HTTP_USER_AGENT"]."')";
    mysqli_query($connect, $query);
}
header("Location: ../../index.php?page=createchar");