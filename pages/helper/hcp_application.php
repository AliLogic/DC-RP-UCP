<?php

if(isset($_GET["id"]))
{
    $id = 0;
    $ip_addr = '';
    $host_name = '';
    $user_agent = '';

    $query = "SELECT `id`, `ip_addr`, `host_name`, `user_agent` FROM `roleplay_test` WHERE `account_id` = ".$_GET["id"]." LIMIT 1";
    $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result) >= 1)
    {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $id = $row["id"];
            $ip_addr = $row["ip_addr"];
            $host_name = $row["host_name"];
            $user_agent = $row["user_agent"];
        }
        echo '<div class="panel panel-default" style="background-color: #E5E6EB; border: black 1px solid;">
            <div class="panel-body">
                <div class="col-md-12">
                    <div class ="news" style="background-color: #E5E6EB;">
                        <h1 class="color-black text-left">'.GetUserName($_GET["id"]).'\'s information.</h1>
                        <p>
                        <strong>Application ID:</strong> &#35;'.$id.'<br>
                        <strong>IP Address:</strong> '.$ip_addr.'<br>
                        <strong>Hostname:</strong> '.$host_name.'<br>
                        <strong>Operating System:</strong> '.getOS($user_agent).'<br>
                        <strong>User Agent:</strong> '.$user_agent.'<br>';
                        if(IsUsingProxy($_SERVER['REMOTE_ADDR']))
                        {
                            echo "<strong>WARNING:</strong> This person may be possibly using a proxy!<br>";
                        }
                        echo '</p>
                    </div>
                </div>
            </div>
        </div>';
        ShowAnswers($_GET["id"], "Registration Application by ".GetUserName($_GET["id"]));
        echo '<div class="panel panel-default" style="background-color: #E5E6EB; border: black 1px solid;">
            <div class="panel-body">
                <div class="col-md-12">
                    <div class ="news" style="background-color: #E5E6EB;">
                        <h1 class="color-black text-left">Respond to Application.</h1>
                        <form action="pages/helper/apps/deny_app.php?id='.$_GET["id"].'" method="POST">
                            <div class="form-group">
                                <label for="denyApp">Denial Reason (Required if you are denying)</label>
                                <input type="text" name="denyApp" class="form-control" id="denyApp" required>
                            </div>
                            <div class="form-group">
                            <input type="checkbox" name="issue_ban" value="issue_ban">
                            <label for="issue_ban">Issue a ban on this user using the denial reason also as a ban reason. (Only use this on Ban Evaders)</label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Deny Application</button>
                            </div>
                        </form>
                        <form action="pages/helper/apps/accept_app.php?id='.$_GET["id"].'" method="POST">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Approve Application</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>';
    }
    else
    {
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; index.php?page=hcp&helper=apps">';
        exit();
    }
}
else
{
    echo '<META HTTP-EQUIV=REFRESH CONTENT="1; index.php?page=hcp&helper=apps">';
    exit();
}