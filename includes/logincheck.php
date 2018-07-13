<?php

if(GetAdminLevel() >= 1)
{
    echo '<li><a href="index.php?page=acp&admin=main">Server Administrator</a></li>';    
}
if(!IsLoggedIn())
{
    echo '<li><a href="index.php?page=login"><img src="images/social/social_samp.jpg"/> Login</a></li>';
}
else
{
    echo '<li><a href="index.php?page=logout"><img src="images/social/social_samp.jpg"/> Logout</a></li>';
}
