<div class="panel panel-default" style="background-color: #E5E6EB; border: black 1px solid;">
    <div class="panel-body">
        <div class="col-md-12">
            <div class ="news" style="background-color: #E5E6EB;">

                <h1 class="color-black text-left"><i class="fa fa-fw fa-cogs"></i> Server Administrator</h1>
                <ul class="nav nav-pills nav-justified">
                    <li <?php if($_GET["admin"] == "main") { echo 'class="active"'; } ?>><a href="index.php?page=acp&admin=main">Home</a></li>
                    <li <?php if($_GET["admin"] == "ban") { echo 'class="active"'; } ?>><a href="index.php?page=acp&admin=ban">Ban Management</a></li>
                    <li <?php if($_GET["admin"] == "records") { echo 'class="active"'; } ?>><a href="index.php?page=acp&admin=records">Admin Records</a></li>
                    <li <?php if($_GET["admin"] == "notes") { echo 'class="active"'; } ?>><a href="index.php?page=acp&admin=notes">Admin Notes</a></li>
                    <li <?php if($_GET["admin"] == "logs") { echo 'class="active"'; } ?>><a href="index.php?page=acp&admin=logs">Server Logs</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>