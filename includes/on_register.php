<?php

session_start();

require_once('../includes/config.php');
require_once('../includes/init.php');
require_once('../includes/functions.php');

if (isset($_POST['username']) 
    && isset($_POST['password'])
    && isset($_POST['email'])
    && isset($_POST['confirm_password']))
{
    $username = mysqli_real_escape_string($connect, $_POST["username"]);
    $email = mysqli_real_escape_string($connect, $_POST["email"]);
    $password = mysqli_real_escape_string($connect, $_POST["password"]);
    $confirm_password = mysqli_real_escape_string($connect, $_POST["confirm_password"]);

    if($password != $confirm_password)
    {
        Header("Location: ../index.php?page=register&error=1"); // Passwords do not match
    }

    $genSalt = mysqli_real_escape_string($connect, generateRandomString(16));

    $securePassword = strtoupper(hash("sha256", $password.$genSalt));

    $query = "INSERT INTO `players` (`username`, `password`, `salt`, `email`) VALUES ('".$username."', '".$securePassword."', '".$genSalt."', '".$email."')";
    if(mysqli_query($connect, $query))
    {
        $insert_id = mysqli_insert_id($connect);

        $message = '<html>
        <head>
          <title>DC-RP Account Activation</title>
        </head>
        <body>
        Hello '.$username.'<br><br>
        Click this link to activate your account at DC-RP: <a href="localhost/dcrp_ucp/verify.php?id='.$insert_id.'">Click here</a><br><br>
        Regards<br>
        DC-RP Staff.
        </body>
        </html>';

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: Desert County Roleplay <no-reply@dc-rp.com>' . "\r\n";

        mail($email, "DC-RP Account Activation", $message, $headers);
        Header("Location: ../index.php?page=login&success=1");
    }
    else Header("Location: ../index.php?page=register&error=2"); // Query error.

}
else Header("Location: ../index.php?page=register&error=3"); // Fields empty
?>