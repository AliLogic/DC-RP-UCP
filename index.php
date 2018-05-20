<?php include('includes/header.php'); ?>
  <body style="background: url(<?php echo $background; ?>) repeat center fixed; margin:0; padding:0; -webkit-background-size: cover; background-size: cover;">

    <div class="container">

      <?php include('includes/menu.php'); ?>

	      <div class="panel panel-default" style="background-color : rgba(<?php echo $backgroundrgba; ?>,0.5); border: black 1px solid;">
			  <div class="panel-body">
			  <!-- homepage -->
			  <div class="col-md-12">
                <div class ="news" style="background-color : rgba(237,237,237);">
                    <h1 class="color-black text-left"><i class="fa fa-fw fa-home"></i> Monthly Newsletter #2</h1>
                    <a class="news-link"></a><small class="text-muted">Seanny<br>March 39, 2018, 12:43:02 AM.</small> <br><br>
          
						<?php echo $paragraph1; ?>
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