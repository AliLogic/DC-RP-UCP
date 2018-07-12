<div class="panel panel-default" style="background-color : #E5E6EB; border: black 1px solid;">
    <div class="panel-body">
        <div class="col-md-12">
            <div class ="news" style="background-color : #E5E6EB;">
                <h1 class="color-black text-left">Ban Notice</h1>
                <?php
                echo "<strong>Ban Date:</strong> " . $bannedDate . "<br>";
                echo "<strong>Banned By:</strong> " . $bannedBy . "<br>";
                echo "<strong>Reason:</strong> " . $banReason . "<br>";
                if($unbanDate >= 1)
                {
                    $unbanDate = date("d/m/Y H:i:s", $row["BanDate"]);
                    echo "<strong>an Expiry:</strong> " . $unbanString . "<br>";
                }
                else echo "<strong>Ban Expiry:</strong> Never<br><br>";
                echo "<p>Any attempt to evade or get around this ban without appealing it will result in your chances of getting unbanned significantly lower.</p>";
                ?>
            </div>
        </div>
    </div>
</div>