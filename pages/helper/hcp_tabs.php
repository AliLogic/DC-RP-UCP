<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
    <div class="panel-body">
        <div class="col-md-12">
            <div class ="news" style="background-color : #E5E6EB;">

                <h1 class="color-black text-left"><i class="fa fa-fw fa-cogs"></i> Community Helper</h1>
                <ul class="nav nav-pills nav-justified">
                    <li <?php if($_GET["helper"] == "main") { echo 'class="active"'; } ?>><a href="index.php?page=hcp&helper=main">Home</a></li>
                    <li <?php if($_GET["helper"] == "apps" || $_GET["helper"] == "app") { echo 'class="active"'; } ?>><a href="index.php?page=hcp&helper=apps">Application Management</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>