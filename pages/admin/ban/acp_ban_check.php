<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
    <div class="panel-body">
        <div class="col-md-12">
            <div class ="news" style="background-color : #E5E6EB;">
                <h2>Ban Check:</h2>
                <p>Please only fill out one of the forms</p>
                <form method="POST" action="pages/admin/ban/username_bancheck.php">
                    <h3>Check by Username:</h3>
                    <?php
                    if(!empty($_GET["error"]) && $_GET["error"] == 1)
                    {
                        echo '<div class="alert alert-danger">
                            <strong>ERROR:</strong> You did not enter a valid username or username is not banned.
                        </div>';
                    }
                    ?>
                    <div class="form-group">
                        <input name="username" class="form-control" type="text" id="username" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </form>
                <form method="POST" action="pages/admin/ban/ip_bancheck.php">
                    <h3>Check by IP:</h3>
                    <?php
                    if(!empty($_GET["error"]) && $_GET["error"] == 2)
                    {
                        echo '<div class="alert alert-danger">
                            <strong>ERROR:</strong> You did not enter a valid IP Address or IP Address is not banned.
                        </div>';
                    }
                    ?>
                    <div class="form-group">
                        <input name="ipaddr"class="form-control" type="text" id="ipaddr" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </form>
                <form method="POST" action="pages/admin/ban/gpci_bancheck.php">
                    <h3>Check by GPCI/Serial:</h3>
                    <?php
                    if(!empty($_GET["error"]) && $_GET["error"] == 3)
                    {
                        echo '<div class="alert alert-danger">
                            <strong>ERROR:</strong> You did not enter a valid Serial or Serial is not banned.
                        </div>';
                    }
                    ?>
                    <div class="form-group">
                        <input name="gpci"class="form-control" type="text" id="gpci" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>