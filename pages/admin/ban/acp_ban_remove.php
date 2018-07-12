<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
    <div class="panel-body">
        <div class="col-md-12">
            <div class ="news" style="background-color : #E5E6EB;">
                <h2>Remove Ban:</h2>
                <?php

                if(!empty($_GET["error"]) && $_GET["error"] == 1)
                {
                    if($_GET["num"] == 1)
                    {
                        echo '<div class="alert alert-success">
                            <strong>Success!</strong> '.$_GET["num"].' ban was successfully lifted.
                        </div>';
                    }
                    else
                    {
                        echo '<div class="alert alert-success">
                            <strong>Success!</strong> '.$_GET["num"].' bans were successfully lifted.
                        </div>';
                    }
                }
                else if(!empty($_GET["error"]) && $_GET["error"] == 2)
                {
                    echo '<div class="alert alert-danger">
                        <strong>ERROR:</strong> No such person is banned.
                    </div>';
                }

                ?>
                <form method="POST" action="pages/admin/ban/banremove.php">
                    <h3>Remove Ban:</h3>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input name="username" class="form-control" type="text" id="username" required autofocus>
                        <label for="ipaddr">IP Address (Optional):</label>
                        <input name="ipaddr" class="form-control" type="text" id="ipaddr">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>