<?php 

$query = "SELECT `PlayerMOTD`, `HelperMOTD`, `ServerRevision` FROM `settings` LIMIT 1";

$result = mysqli_query($connect, $query);
$playerMOTD = '';
$helperMOTD = '';
$serverVersion = '';
if(mysqli_num_rows($result) >= 1)
{
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        $playerMOTD = $row["PlayerMOTD"];
        $helperMOTD = $row["HelperMOTD"];
        $serverVersion = $row["ServerRevision"];
    }
}
?>

<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
    <div class="panel-body">
        <div class="col-md-6">
            <div class ="news" style="background-color : #E5E6EB;">
                <h2>Quick Links</h2>
                <p>To check all current applications, please select <a href="index.php?page=hcp&amp;helper=apps">Application Management</a></p>
            </div>
        </div>
        <div class="col-md-6">
                <div class ="news" style="background-color : #E5E6EB;">
                    <h2>System Information</h2>
                    <p><strong>Player MOTD:</strong> <?php echo $playerMOTD; ?><br>
                    <strong>Helper MOTD:</strong> <?php echo $helperMOTD; ?><br>
                    <strong>Gamemode Version:</strong> <?php echo "Version ".$serverVersion; ?><br>
                    <strong>SA-MP Version:</strong> <?php echo "SA-MP ".$sampVersion; ?></p>
                </div>
            </div>
    </div>
</div>