<?php session_start();

include('includes/header.php'); 

?>
  <body style="background: url(<?php echo $background; ?>) repeat center fixed; margin:0; padding:0; -webkit-background-size: cover; background-size: cover;">

    <div class="container">

    <?php 
    require_once('includes/menu.php'); 
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
        else if($_GET["page"] == "about")
        {
            require_once("pages/about.php");
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
        else
        {
            require_once("pages/main.php");
        }
    }
    else require_once("pages/main.php");

    require_once('includes/footer.php');
    require_once('includes/javascript.php'); 
    ?>
  </body>
</html>