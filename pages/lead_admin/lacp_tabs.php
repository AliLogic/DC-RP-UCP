<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
    <div class="panel-body">
        <div class="col-md-12">
            <div class ="news" style="background-color : #E5E6EB;">

                <h1 class="color-black text-left"><i class="fa fa-fw fa-cogs"></i> Lead Administrator</h1>
                <ul class="nav nav-pills nav-justified">
                    <li <?php if($_GET["lead"] == "main") { echo 'class="active"'; } ?>><a href="index.php?page=smcp&amp;manager=main">Home</a></li>
                    <li <?php if($_GET["lead"] == "password") { echo 'class="active"'; } ?>><a href="index.php?page=smcp&amp;manager=password">News</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>