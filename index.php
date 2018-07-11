<?php 
session_start();

function GetAdminLevel()
{
    if(isset($_SESSION["AccountID"]))
    {
        $query = "SELECT Adminlevel FROM `players` WHERE id = ".$_SESSION["AccountID"]." LIMIT 1";
        $result = mysqli_query($connect, $query);

        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo "AdminLevel = " + $row["Adminlevel"];
                return $row["Adminlevel"];
            }
        }
    }
    echo "AdminLevel = no session";
    return 0;
}

include('includes/header.php'); 
?>
  <body style="background: url(<?php echo $background; ?>) repeat center fixed; margin:0; padding:0; -webkit-background-size: cover; background-size: cover;">

    <div class="container">

    <?php 
    require_once('includes/menu.php'); 
    require_once('includes/bbcode.php');

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
    else if($_GET["page"] == "about")
    {
        require_once("pages/about.php");
    }
    else if($_GET["page"] == "login")
    {
        require_once("pages/login.php");
    }
    else
    {
        require_once("pages/main.php");
    }

    require_once('includes/footer.php');
    require_once('includes/javascript.php'); 
    ?>
  </body>
</html>