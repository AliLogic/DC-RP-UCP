<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
        <div class="panel-body">
            <div class="col-md-12">
                <div class ="news" style="background-color : #E5E6EB;">
                    <h4>OOC Chat Logs</h4>
                    <span class="hidden-md-up"><p>You may need to scroll left or right to see the content.</p></span>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Master Name</th>
                                <th>Character</th>
                                <th>Message</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $query = "SELECT * FROM `ooc_log` ORDER BY `ID` DESC LIMIT 100";

                            $result = mysqli_query($connect, $query);
                            $username = '';
                            if(mysqli_num_rows($result) >= 1)
                            {
                                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                                {
                                    echo '<tr>
                                        <td>'.GetUserName($row["AccountID"]).'</td>
                                        <td>'.$row["UserName"].'</td>
                                        <td>'.$row["Message"].'</td>
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