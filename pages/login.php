<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
    <div class="panel-body">
        <div class="col-md-12">
            <?php
            if(isset($_GET["success"]))
            {
                if($_GET["success"] == 1)
                {
                    echo '<div class="alert alert-info">
                    <strong>INFO:</strong> Your account was created but you need to confirm your email to proceed. Check your email and then click the provided link from no-reply@dc-rp.com.<br>You may need to check your spam folder.
                    </div>';
                }
                else if($_GET["success"] == 2)
                {
                    echo '<div class="alert alert-success">
                    <strong>Success!</strong> Your account was has been activated, you should now login using the details you provided when you registered.
                    </div>';
                }
            }
            ?>
            <form action="pages/OnUserLogin.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label><br>
                <input name="username" type="text" class="form-control" id="username" required autofocus><br>
            </div>
            <div class="form-group">
            <label for="password">Password:</label><br>
            <input name="password" type="password" class="form-control" id="password" required><br>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>