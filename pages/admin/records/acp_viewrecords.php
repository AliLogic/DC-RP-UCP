<?php

if(isset($_POST["username"]))
{
    $username = mysqli_real_escape_string($connect, $_POST["username"]);

    $query = "SELECT `id` FROM `players` WHERE `username` = '".$username."' LIMIT 1";
    $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result) < 1)
    {
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; index.php?page=acp&admin=records&error=1">';
        exit();
    }

    echo '<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
    <div class="panel-body">
    <div class="col-md-12">
        <div class ="news" style="background-color : #E5E6EB;">
        <h2>Bans</h2>
        <table class="table">
    <thead>
        <tr>
        <th>Banned By</th>
        <th>Date</th>
        <th>Reason</th>
        </tr>
    </thead>
    <tbody>';

    $accountID = 0;
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        $accountID = $row["id"];
    }

    $query = "SELECT * FROM `ban_logs` WHERE `BannedDBID` = ".$accountID."";
    $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result) >= 1)
    {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            echo '<tr>
            <td>'.$row["BannedBy"].'</td>
            <td>'.$row["Date"].'</td>
            <td>'.$row["Reason"].'</td>
            </tr>';
        }
    }

    echo '</tbody>
    </table></div>
    </div>
    </div>
    </div>';

    echo '<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
    <div class="panel-body">
        <div class="col-md-12">
            <div class ="news" style="background-color : #E5E6EB;">
            <h2>Admin Jail</h2>
            <table class="table">
        <thead>
            <tr>
            <th>Jailed By</th>
            <th>Date</th>
            <th>Reason</th>
            </tr>
        </thead>
        <tbody>';

    $username = mysqli_real_escape_string($connect, $_POST["username"]);

    $query = "SELECT `id` FROM `players` WHERE `username` = '".$username."' LIMIT 1";
    $result = mysqli_query($connect, $query);
    
    $accountID = 0;
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        $accountID = $row["id"];
    }

    $query = "SELECT * FROM `ajail_logs` WHERE `JailedDBID` = ".$accountID."";
    $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result) >= 1)
    {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            echo '<tr>
            <td>'.$row["JailedBy"].'</td>
            <td>'.$row["Date"].'</td>
            <td>'.$row["Reason"].'</td>
            </tr>';
        }
    }

    echo '</tbody>
    </table></div>
    </div>
    </div>
    </div>';

    echo '<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
    <div class="panel-body">
        <div class="col-md-12">
            <div class ="news" style="background-color : #E5E6EB;">
            <h2>Kicks</h2>
            <table class="table">
        <thead>
            <tr>
            <th>Kicked By</th>
            <th>Date</th>
            <th>Reason</th>
            </tr>
        </thead>
        <tbody>';

    $username = mysqli_real_escape_string($connect, $_POST["username"]);

    $query = "SELECT `id` FROM `players` WHERE `username` = '".$username."' LIMIT 1";
    $result = mysqli_query($connect, $query);
    
    $accountID = 0;
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        $accountID = $row["id"];
    }

    $query = "SELECT * FROM `kick_logs` WHERE `KickedDBID` = ".$accountID."";
    $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result) >= 1)
    {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            echo '<tr>
            <td>'.$row["KickedBy"].'</td>
            <td>'.$row["Date"].'</td>
            <td>'.$row["Reason"].'</td>
            </tr>';
        }
    }

    echo '</tbody>
    </table></div>
    </div>
    </div>
    </div>';
}