<?php

if(IsLoggedIn())
{
    if(!HasPassedTest())
    {
        if(HasPostedAnswers())
        {
            include_once("quiz_answer.php");
        }
        else
        {
            $query = "SELECT `dcrp_terms`, `samp_terms` FROM `players` WHERE `id` = ".$_SESSION["DCRP_AccountID"]." LIMIT 1";
        
            $result = mysqli_query($connect, $query);
    
            $accepted_server_tos = 0;
            if(mysqli_num_rows($result) >= 1)
            {
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                {
                    if($row["dcrp_terms"] != 0)
                    {
                        $accepted_server_tos = 1;
                    }
    
                    if($row["samp_terms"] != 0)
                    {
                        $accepted_server_tos = 2;
                    }
                }
            }
    
            if($accepted_server_tos == 0)
            {
                include_once("terms.html");
            }
            else if($accepted_server_tos == 1)
            {
                include_once("samp_terms.html");
            }
            else include_once("quiz.html");
        }
    }
    else echo '<META HTTP-EQUIV=REFRESH CONTENT="1; index.php?page=ucp">';
}
else echo '<META HTTP-EQUIV=REFRESH CONTENT="1; index.php?page=login">';
