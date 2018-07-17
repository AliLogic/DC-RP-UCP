<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
    <div class="panel-body">
        <div class="col-md-12">
            <div class ="news" style="background-color : #E5E6EB;">
                <h2>Password Management</h2>
                <?php
                    if(isset($_GET["error"]))
                    {
                        if($_GET["error"] == 1)
                        {
                            echo '<div class="alert alert-danger">
                                <p><strong>ERROR:</strong> Passwords do not match.</p>
                            </div>';
                        }
                        else if($_GET["error"] == 2)
                        {
                            echo '<div class="alert alert-danger">
                                <p><strong>ERROR:</strong> No such account with that name was found.</p>
                            </div>';
                        }
                        else if($_GET["error"] == 3)
                        {
                            echo '<div class="alert alert-success">
                                <p><strong>Success!</strong> Password has been successfully changed.</p>
                            </div>';
                        }
                    }
                ?>
                <p>Changing a users password should only be done in cases of a lost password.</p>
                <form action="pages/manager/change_pass.php" method="post">
                    <div class="form-group">
                        <label for="username">Username:</label><br>
                        <input name="username" type="text" class="form-control" id="username" required autofocus><br>
                    </div>
                    <div class="form-group">
                        <label for="password">New Password:</label><br>
                        <input name="password" type="password" class="form-control" id="password" required><br>
                    </div>
                    <div class="form-group">
                        <label for="password">Confirm New Password:</label><br>
                        <input name="confirm_password" type="password" class="form-control" id="confirm_password" required><br>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>