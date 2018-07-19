<div class="container-fluid">
    <h1>Active Donator Codes</h1>
    <div class="alert alert-info">
    <p>These are currently active donator codes that you insert in-game using <strong>/activate</strong>.</p>
    </div>
    <?php

    $query = "SELECT * FROM `Donator_Items` WHERE `BuyerID` = ".$_SESSION["DCRP_AccountID"];
    $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result) >= 1)
    {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            echo '<div class="panel panel-default" style="background-color: #E5E6EB; border: black 1px solid;">
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class ="news" style="background-color: #E5E6EB;">
                            <p><strong>Item Name:</strong> '.ReturnDonatorProducts($row["Type"]).'</p>
                            <p><strong>Activation Code:</strong> '.$row["ActivationString"].'</p>
                        </div>
                    </div>
                </div>
            </div>';
        }
    }
    else
    {
        echo '<div class="panel panel-default" style="background-color: #E5E6EB; border: black 1px solid;">
        <div class="panel-body">
            <div class="col-md-12">
                <div class ="news" style="background-color: #E5E6EB;">
                    <p>There are no active donator items linked to your account.</p>
                </div>
            </div>
        </div>
    </div>';
    }
    ?>
</div>