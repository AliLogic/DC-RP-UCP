<?php session_start();

include('includes/header.php'); 
include_once('includes/functions.php');

?>
  <body style="background: url(<?php echo $background; ?>) repeat center fixed; margin:0; padding:0; -webkit-background-size: cover; background-size: cover;">

    <div class="container">

    <?php 
    require_once('includes/menu.php'); 

    $query = '';
    if(isset($_SESSION["DCRP_AccountID"]))
    {
        $query = "SELECT * FROM `bans` WHERE AccountID = ".$_SESSION["DCRP_AccountID"]." OR IPAddress = '".$_SERVER["REMOTE_ADDR"]."' LIMIT 1";
    }
    else
    {
        $query = "SELECT * FROM `bans` WHERE IPAddress = '".$_SERVER["REMOTE_ADDR"]."' LIMIT 1";
    }
    $result = mysqli_query($connect, $query);

    $banReason = '';
    $bannedBy = '';
    $bannedDate = 0;
    $unbanDate = 0;
    $unbanString = '';
    if(mysqli_num_rows($result) >= 1)
    {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $bannedDate = date("d/m/Y H:i:s", $row["BanDate"]);
            $bannedBy = $row["Admin"];
            $banReason = $row["Reason"];
            if($row["BanDate"] >= 1)
            {
                $ubanString = date("d/m/Y H:i:s", $row["BanDate"]);
                $$unbanDate = $row["BanDate"];
            }
            
            require_once("pages/banned.php");
        }
    }
    else
    {
        require_once('includes/bbcode.php');
    
        if(!empty($_GET["page"]))
        {
            if($_GET["page"] == "staff")
            {
                require_once("pages/staff.php");
            }
            else if($_GET["page"] == "donate")
            {
                require_once("pages/donate.php");
            }
            else if($_GET["page"] == "news")
            {
                require_once("pages/news.php");
            }
            else if($_GET["page"] == "login")
            {
                if(!IsLoggedIn())
                {
                    require_once("pages/login.php");
                }
                else 
                {
                    echo '<META HTTP-EQUIV=REFRESH CONTENT="1; index.php?page=home">';
                    exit();
                }
            }
            else if($_GET["page"] == "register")
            {
                if(!IsLoggedIn())
                {
                    require_once("pages/register.html");
                }
                else
                {
                    echo '<META HTTP-EQUIV=REFRESH CONTENT="1; index.php?page=home">';
                    exit();
                }
            }
            else if($_GET["page"] == "logout")
            {
                session_destroy();
                session_unset();
                echo '<META HTTP-EQUIV=REFRESH CONTENT="1; index.php?page=login">';
                exit();
            }
            else if($_GET["page"] == "server")
            {
                require_once("pages/server.php");
            }
            else if($_GET["page"] == "acp")
            {
                require_once("pages/admin/admin.php");
            }
            else if($_GET["page"] == "hcp")
            {
                require_once("pages/helper/helper.php");
            }
            else if($_GET["page"] == "ucp")
            {
                require_once("pages/user/user.php");
            }
            else if($_GET["page"] == "createchar")
            {
                require_once("pages/user/createchar.php");
            }
            else
            {
                require_once("pages/main.php");
            }
        }
        else require_once("pages/main.php");
    }

    require_once('includes/footer.php');
    require_once('includes/javascript.php'); 
    ?>
  </body>
</html>