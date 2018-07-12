<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
    <div class="panel-body">
        <div class="col-md-12">
            <div class ="news" style="background-color : #E5E6EB;">
                <h2>Issue Ban:</h2>
                <form method="POST" action="pages/admin/banissue.php">
                    <div class="form-group">
                        <?php
                        if(!empty($_GET["error"]))
                        {
                            if($_GET["error"] == 1)
                            {
                                echo '<div class="alert alert-success">
                                    <strong>Success!</strong> The ban has been sucessfully issued!
                                </div>';
                            }
                            else if($_GET["error"] == 2)
                            {
                                echo '<div class="alert alert-danger">
                                    <strong>ERROR:</strong> You did not enter a valid reason.
                                </div>';
                            }
                            else if($_GET["error"] == 3)
                            {
                                echo '<div class="alert alert-danger">
                                    <strong>ERROR:</strong> No such account exists.
                                </div>';
                            }
                        }
                        ?>
                        <label for="username">Username:</label>
                        <input name="username" class="form-control" type="text" id="username" required autofocus>
                        <label for="ipaddr">Reason:</label>
                        <input name="reason" class="form-control" type="text" id="reason" required>
                        <label for="ipaddr">IP Address (Optional):</label>
                        <input name="ipaddr" class="form-control" type="text" id="ipaddr">
                        <label for="ipaddr">Expiry Date [MM/DD/YYYY] (Optional):</label>
                        <input name="expire" class="form-control" type="date" id="expire">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>