<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
    <div class="panel-body">
        <div class="col-md-12">
            <div class ="news" style="background-color : #E5E6EB;">
                <h2>Ban Information:</h2>
                <p><strong>Username:</strong> <?php echo $_SESSION["Lookup_Username"]; ?></p>
                <p><strong>Banned By:</strong> <?php echo $_SESSION["Lookup_Admin"]; ?></p>
                <p><strong>Unban Date:</strong> <?php if($_SESSION["Lookup_UnbanTimestamp"]) { echo date("d/m/Y H:i:s" ,$_SESSION["Lookup_UnbanTimestamp"]); } else echo "Never"; ?></p>
                <p><strong>Ban Reason:</strong> <?php echo $_SESSION["Lookup_Reason"]; ?></p>
                <p><strong>IP Address:</strong> <?php echo $_SESSION["Lookup_IPAddress"]; ?></p>
                <p><strong>Date Banned:</strong> <?php echo date("d/m/Y H:i:s" ,$_SESSION["Lookup_UnbanTimestamp"]); ?></p>
                <p><strong>Serial / GPCI:</strong> <?php echo $_SESSION["Lookup_Serial"]; ?></p>
                <ul class="nav nav-pills nav-justified">
                    <li class="active"><a href="index.php?page=acp&amp;admin=ban&amp;sect=check">Return to Ban Check</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>