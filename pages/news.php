<?php

include_once('includes/functions.php');
$query = "SELECT * FROM `News` WHERE `ID` = ".$_GET["id"]." LIMIT 1";
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
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

echo '<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
        <div class="panel-body">
            <div class="col-md-12">
                <div class ="news" style="background-color : #E5E6EB;">
                <h2>Comments</h2>
                <p><strong>Note:</strong> The comment section and all comments are OOC.</p>';

if(IsLoggedIn())
{
    echo '<form method="POST" action="pages/misc/comment_add.php?id='.$_GET['id'].'">
    <div class="form-group">
        <div class="form-group">
        <label for="username">Comment:</label>
        <input name="message" class="form-control" type="text" id="message" required autofocus>
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </div>
    </form>';
}

$query = "SELECT * FROM `UCP_Comments` WHERE `NewsID` = ".$_GET["id"]." ORDER BY `ID` DESC";
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        echo '<div class ="news" style="background-color : #FFFFFF; padding:1em; margin:1em;">
        <small>Comment by '.GetUserName($row["UserID"]).' on '.date("d/m/Y H:i:s", $row["Timestamp"]).'</small><br>
        <p>'.$row["Message"].'</p></div>';
    }
}

echo '</div>
            </div>
        </div>
    </div>';