<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
    <div class="panel-body">
        <div class="col-md-12">
            <div class ="news" style="background-color : #E5E6EB;">
                <h1 class="color-black text-left"><i class="fa fa-fw fa-newspaper"></i> Announcement</h1>
                <form method="POST" action="pages/lead_admin/lacp_aooc_write.php">
                    <p><strong>Note:</strong> This sends an in-game anouncement in the form of the in-game command <strong>/aooc</strong>.</p>
                    <?php
                    if(isset($_GET["error"]))
                    {
                        if($_GET["error"] == 1)
                        {
                            echo '<div class="alert alert-info">
                            <p>Announcement was sent.</p>
                            </div>';
                        }
                        else if($_GET["error"] == 1)
                        {
                            echo '<div class="alert alert-info">
                            <p>Announcement could not be sent.</p>
                            </div>';
                        }
                    }
                    ?>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="news_text">In-Game Announcement:</label>
                            <input name="ig_ann" class="form-control" type="text" id="ig_ann" required>
                            <label class="radio-inline"><input type="radio" name="type" value="0" checked>Admin OOC (/aooc)</label>
                            <label class="radio-inline"><input type="radio" name="type" value="1">Admin Say (/asay)</label>
                            <label class="radio-inline"><input type="radio" name="type" value="2">Regular OOC (/ooc)</label>
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