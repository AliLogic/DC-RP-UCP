<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
        <div class="panel-body">
            <div class="col-md-12">
                <div class ="news" style="background-color : #E5E6EB;">
                    <h4>Attack Logs</h4>
                    <span class="d-none d-sm-block d-md-none"><p>You may need to scroll left or right to see the content.</p></span>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Hacker</th>
                                <th>Action</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $query = "SELECT * FROM `hacker_log` ORDER BY `ID` DESC LIMIT 100";

                            $result = mysqli_query($connect, $query);
                            $username = '';
                            if(mysqli_num_rows($result) >= 1)
                            {
                                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                                {
                                    echo '<tr>
                                        <td>'.$row["Username"].'</td>
                                        <td>'.$row["Action"].'</td>
                                        <td>'.date("d/m/Y H:i:s", $row["Timestamp"]).'</td>
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