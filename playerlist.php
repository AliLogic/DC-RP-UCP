<?php 
    require("includes/SampQuery.class.php");

    include('includes/header.php'); ?>
    <body style="background: url(<?php echo $background; ?>) repeat center fixed; margin:0; padding:0; -webkit-background-size: cover; background-size: cover;">  

    <div class="container">
        <?php include('includes/menu.php'); 
            $query = new SampQuery(SAMP_IP, SAMP_PORT); ?>

        <div class="panel panel-default" style="background-color : rgba(<?php echo $backgroundrgba; ?>,0.5); border: black 1px solid;">
            <div class="panel-body">
            <!-- homepage -->
            <div class="col-md-12">
            <div class ="news" style="background-color : rgba(237,237,237);">
                <strong>Red</strong> means Lead Administrator / Server Management.<br>
                <strong>Orange</strong> means Administrator.<br>
                <strong>Green</strong> means Helper.<br>
                <strong>Grey</strong> means Normal Player.<br>
                <?php 
                    if ($query->connect())
                    {
                        echo "<p>";
                        print_r($query->getBasicPlayers()); 
                        echo "</p>";
                        $query->close(); 
                    }
                    else echo "<p>Server did not respond.</p>";
                ?>

            </div>
            <div class="panel-body color-black text-left">
                <div class="btn-group text-left">
                </div>
            </div>
            <div class="panel-body color-black text-left">
                <?php // echo $paragraph2; ?>
            </div>
            </div>
            </div>
            </div>
            </div>
            <?php require_once('includes/footer.php'); ?>
            </div>
        </div>
    </div>
	
    <?php require_once('includes/javascript.php'); ?>
  </body>
</html>