<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
    <div class="panel-body">
        <div class="col-md-12">
            <div class ="news" style="background-color : #E5E6EB;">

                <h1 class="color-black text-left"><i class="fa fa-fw fa-cogs"></i> Server Manager</h1>
                <ul class="nav nav-pills nav-justified">
                    <li <?php if($_GET["manager"] == "main") { echo 'class="active"'; } ?>><a href="index.php?page=smcp&amp;manager=main">Home</a></li>
                    <li <?php if($_GET["manager"] == "password") { echo 'class="active"'; } ?>><a href="index.php?page=smcp&amp;manager=password">Password Management</a></li>
                    <li <?php if($_GET["manager"] == "secretword") { echo 'class="active"'; } ?>><a href="index.php?page=smcp&amp;manager=secretword">Secret Word Management</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>