<?php session_start();

require_once('../../../includes/config.php');
require_once('../../../includes/init.php');

if(isset($_POST["message"]))
{
    $message = mysqli_real_escape_string($connect, $_POST["message"]);

    $query = "SELECT `username` FROM `players` WHERE `id` = ".$_SESSION['DCRP_AccountID']." LIMIT 1";

    $result = mysqli_query($connect, $query);
    $username = '';
    if(mysqli_num_rows($result) >= 1)
    {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $username = $row["username"];
        }
    }

    // INSERT INTO `admin_notes` (`AccountID`, `Timestamp`, `Admin`, `Message`) VALUES (NULL, '2', '99999', 'Seanny', 'Test Admin Note')
    $query = "INSERT INTO `admin_notes` (`AccountID`, `Timestamp`, `Admin`, `Message`) VALUES (".$_GET['id'].", ".time().", '".$username."', '".$message."')";

    $result = mysqli_query($connect, $query);
    
    header("Location: ../../../index.php?page=acp&admin=notes&sect=check&id=".$_GET['id']);// Ban issued
    exit();
}
else header("Location: ../../../index.php?page=acp&admin=ban&sect=remove");
