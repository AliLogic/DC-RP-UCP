<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
    <div class="panel-body">
        <div class="col-md-12">
            <div class ="news" style="background-color : #E5E6EB;">
                <h3>Admin Record</h3>
                <form method="POST" action="index.php?page=acp&amp;admin=records&amp;sect=check">
                    <div class="form-group">
                        <?php
                        if(!empty($_GET["error"]))
                        {
                            if($_GET["error"] == 1)
                            {
                                echo '<div class="alert alert-danger">
                                    <strong>ERROR:</strong> The specified user does not exist.
                                </div>';
                            }
                        }
                        ?>
                        <div class="form-group">
                        <label for="username">Username:</label>
                        <input name="username" class="form-control" type="text" id="username" required autofocus>
                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>