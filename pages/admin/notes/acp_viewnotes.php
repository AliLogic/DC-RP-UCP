<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
    <div class="panel-body">
        <div class="col-md-12">
            <div class ="news" style="background-color : #E5E6EB;">
                <?php 
                $query = "SELECT `username` FROM `players` WHERE `id` = ".$_GET['id']." LIMIT 1";

                $result = mysqli_query($connect, $query);
                $username = '';
                if(mysqli_num_rows($result) >= 1)
                {
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                    {
                        $username = $row["username"];
                    }
                }
                ?>
                <h3>Admin Notes for <?php echo $username; ?></h3>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Admin</th>
                        <th>Date</th>
                        <th>Message</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $query = "SELECT * FROM `admin_notes` WHERE `AccountID` = ".$_GET['id']."";

                    $result = mysqli_query($connect, $query);
                    $username = '';
                    if(mysqli_num_rows($result) >= 1)
                    {
                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                        {
                            echo '<tr>
                                <td>'.$row["Admin"].'</td>
                                <td>'.date("d/m/Y H:i:s", $row["Timestamp"]).'</td>
                                <td>'.$row["Message"].'</td>
                                <td><a href="pages/admin/notes/del_note.php?id='.$row["ID"].'&view_id='.$_GET["id"].'">Delete</a></td>
                            </tr>';
                        }
                    }
                    ?>
                    
                    </tbody>
                </table>

                <?php
                if(!empty($_GET["error"]) && $_GET["error"] == 1)
                {
                    echo '<div class="alert alert-success">
                        <strong>Success!</strong> You have successfully removed the note.
                    </div>';
                }

                echo '<form method="POST" action="pages/admin/notes/add_note.php?id='.$_GET["id"].'">
                    <div class="form-group">
                        <label for="username">Add Note:</label>
                        <input name="message" class="form-control" type="text" id="message" required autofocus>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Add Note</button>
                    </div>
                </form>';
                ?>
            </div>
        </div>
    </div>
</div>