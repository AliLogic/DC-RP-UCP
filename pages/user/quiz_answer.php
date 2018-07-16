<?php

$query = "SELECT * FROM `roleplay_test` WHERE `account_id` = ".$_SESSION["DCRP_AccountID"]." LIMIT 1";
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) >= 1)
{
    $appStatus = 0;
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        $appStatus = $row["app_status"];
        if($row["app_status"] == 1)
        {
            echo '<div class="alert alert-success" role="alert">
            <strong>Success!</strong> Your application was accepted by '.GetUserName($row["denied_id"]).'. Click "Proceed" at the bottom of the page to continue.
            </div>';

        }
        else if($row["app_status"] == 2)
        {
            echo '<div class="alert alert-danger" role="alert">
              <strong>WARNING:</strong> Your application was denied by '.GetUserName($row["denied_id"]).'.<br>
              <strong>Reason:</strong> '.$row["deny_reason"].'
            </div>';
        }
        else
        {
            echo '<div class="alert alert-info" role="alert">
            <strong>INFO:</strong> Your application has not yet been reviewed. Do not pester staff about your application as this will lead to denial.<br>If you need to contact staff about your application, refer to reference ID <strong>&#35;'.$row["id"].'</strong>
            </div>';
        }
    }
    
    
    ShowAnswers($_SESSION["DCRP_AccountID"], "Application Status");
    
    if($appStatus == 1)
    {
        echo '<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
            <div class="panel-body">
                <div class="col-md-12">
                    <div class ="news" style="background-color : #E5E6EB;">
                        <p>Your application was approved, click the button below to proceed.</p>
                        <a href="pages/user/process_app.php" class="btn btn-primary btn-block" role="button">Proceed</a>
                    </div>
                </div>
            </div>
        </div>';
    }
    else if($appStatus == 2)
    {
        echo '<div class="panel panel-default" style="background-color: #E5E6EB; border: black 1px solid;">
            <div class="panel-body">
                <div class="col-md-12">
                    <div class ="news" style="background-color: #E5E6EB;">
                        <p>You may make another attempt with a new application, click below to proceed.</p>
                        <a href="pages/user/new_app.php" class="btn btn-primary btn-block" role="button">Proceed</a>
                    </div>
                </div>
            </div>
        </div>';
    }
}
else echo '<META HTTP-EQUIV=REFRESH CONTENT="1; index.php?page=createchar">';