<div class="panel panel-default" style="background-color: #E5E6EB; border: black 1px solid;">
    <div class="panel-body">
        <div class="col-md-12">
            <div class ="news" style="background-color: #E5E6EB;">
                <h2>Application Management</h2>
                <p>Here are all the current applications to join the server.<br>Click the character name to review an application.</p>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Date</th>
                        <th>Reference ID</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php 
                $query = "SELECT `id`, `account_id`, `timestamp` FROM `roleplay_test` WHERE `app_status` = 0 ORDER BY `id` ASC";
                $result = mysqli_query($connect, $query);
                $count = 1;

                if(mysqli_num_rows($result) >= 1)
                {
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                    {
                        echo '<tr>
                        <td>&#35;'.$count.'</td>
                        <td><a href="index.php?page=hcp&amp;helper=app&amp;id='.$row["account_id"].'">'.GetUserName($row["account_id"]).'</a></td>
                        <td>'.date("d/m/Y H:i:s",$row["timestamp"]).'</td>
                        <td>&#35;'.$row["id"].'</td>
                        </p>';
                        $count++;
                    }
                }
                ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>