<?php 

$query = "SELECT `PlayerMOTD`, `AdminMOTD`, `ServerRevision` FROM `settings` LIMIT 1";

$result = mysqli_query($connect, $query);
$playerMOTD = '';
$adminMOTD = '';
$serverVersion = '';
if(mysqli_num_rows($result) >= 1)
{
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        $playerMOTD = $row["PlayerMOTD"];
        $adminMOTD = $row["AdminMOTD"];
        $serverVersion = $row["ServerRevision"];
    }
}

?>

<div class="panel panel-default" style="background-color: #E5E6EB; border: black 1px solid;">
    <div class="panel-body">
        <div class="col-md-6">
            <div class ="news" style="background-color: #E5E6EB;">
                <h2>Quick Links</h2>
                <p>To issue or remove bans, please select <a href="index.php?page=acp&amp;admin=ban">Ban Management</a></p>
                <p>To check an accounts admin records, please select <a href="index.php?page=acp&amp;admin=records">Admin Records</a></p>
                <p>To check an accounts admin notes, please select <a href="index.php?page=acp&amp;admin=notes">Admin Notes</a></p>
                <p>To check server logs, please select <a href="index.php?page=acp&amp;admin=notes">Server Logs</a></p>
            </div>
        </div>
        <div class="col-md-6">
                <div class ="news" style="background-color: #E5E6EB;">
                    <h2>Information</h2>
                    <p><strong>Player MOTD:</strong> <?php echo $playerMOTD; ?></p>
                    <p><strong>Admin MOTD:</strong> <?php echo $adminMOTD; ?></p>
                    <p><strong>Gamemode Version:</strong> <?php echo "Version ".$serverVersion; ?></p>
                </div>
            </div>
    </div>
</div>