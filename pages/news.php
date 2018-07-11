<?php

$query = "SELECT * FROM `News` WHERE `ID` = ".$_GET["id"]." LIMIT 1";
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        //echo "DEBUG: id: " .$row["ID"]. " - Name: " .$row["Poster"]. " " .$row["Title"]. "<br>";
        echo '<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
            <div class="panel-body">
                <div class="col-md-12">
                    <div class ="news" style="background-color : #E5E6EB;">

                        <h1 class="color-black text-left"><i class="fa fa-fw fa-home"></i> '.$row["Title"].'</h1>
                        <a class="news-link"></a><small class="text-muted">'.$row["Poster"].'<br>'.date("F d, Y, H:i:s",$row["Timestamp"]).'</small> <br><br>
                        '.BBCodeToHTML(strip_tags($row["Message"])).'

                    </div>
                </div>
            </div>
        </div>';
    }
}