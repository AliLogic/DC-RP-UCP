<div class="container-fluid">
    <h1>Account Stats</h1>
    <h2>Master Information</h2>
    <div class="panel panel-default" style="background-color: #E5E6EB; border: black 1px solid;">
        <div class="panel-body">
            <div class="col-md-12">
                <div class ="news" style="background-color: #E5E6EB;">
                    <p><strong>Account Name:</strong> <?php echo GetUserName($_SESSION["DCRP_AccountID"]); ?></p>
                    <p><strong>Account ID:</strong> #<?php echo $_SESSION["DCRP_AccountID"]; ?></p>
                    <p><strong>Account Rank:</strong> <?php echo GetAdminRankName(GetAdminLevel()); ?></p>
                </div>
            </div>
        </div>
    </div>
    <h2>Active Characters</h2>
    <div class="panel panel-default" style="background-color: #E5E6EB; border: black 1px solid;">
        <div class="panel-body">
            <div class="col-md-12">
                <div class ="news" style="background-color: #E5E6EB;">
                    <ul>
                    <?php 
                    $query = "SELECT * FROM `characters` WHERE `OwnerID` = '".$_SESSION["DCRP_AccountID"]."' LIMIT 5";
                    $result = mysqli_query($connect, $query);
                    if(mysqli_num_rows($result) >= 1)
                    {
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                        {
                            echo '<li><strong>Name:</strong> '.$row["Name"].' - <strong>Level:</strong> '.$row["Level"].' - <strong>Expierience:</strong> '.$row["Expierience"].'</li>';
                        }
                    }
                    else echo '<li>No Characters on account.</li>';
                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <h2>Admin Record</h2>
    <div class="panel panel-default" style="background-color: #E5E6EB; border: black 1px solid;">
        <div class="panel-body">
            <div class="col-md-12">
                <div class ="news" style="background-color: #E5E6EB;">
                    <h3>Bans</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Admin</th>
                                <th>Reason</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $query = "SELECT * FROM `ban_logs` WHERE `BannedDBID` = '".$_SESSION["DCRP_AccountID"]."' LIMIT 5";
                            $result = mysqli_query($connect, $query);
                            if(mysqli_num_rows($result) >= 1)
                            {
                                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                                {
                                    echo '<tr>
                                    <td>'.$row["BannedBy"].'</td>
                                    <td>'.$row["Reason"].'</td>
                                    <td>'.$row["Date"].'</td>
                                    </tr>';
                                }
                            }
                            else echo '<li>No Characters on account.</li>';
                            ?>
                        </tbody>
                        </table>
                    </div>
                    <h3>Admin Jails</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Admin</th>
                                <th>Reason</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $query = "SELECT * FROM `ajail_logs` WHERE `JailedDBID` = '".$_SESSION["DCRP_AccountID"]."' LIMIT 5";
                            $result = mysqli_query($connect, $query);
                            if(mysqli_num_rows($result) >= 1)
                            {
                                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                                {
                                    echo '<tr>
                                    <td>'.$row["JailedBy"].'</td>
                                    <td>'.$row["Reason"].'</td>
                                    <td>'.$row["Date"].'</td>
                                    </tr>';
                                }
                            }
                            ?>
                        </tbody>
                        </table>
                    </div>
                    <h3>Kicks</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Admin</th>
                                <th>Reason</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $query = "SELECT * FROM `kick_logs` WHERE `KickedDBID` = '".$_SESSION["DCRP_AccountID"]."' LIMIT 5";
                            $result = mysqli_query($connect, $query);
                            if(mysqli_num_rows($result) >= 1)
                            {
                                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                                {
                                    echo '<tr>
                                    <td>'.$row["KickedBy"].'</td>
                                    <td>'.$row["Reason"].'</td>
                                    <td>'.$row["Date"].'</td>
                                    </tr>';
                                }
                            }
                            ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>