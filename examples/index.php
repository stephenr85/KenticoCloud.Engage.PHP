<?php require_once('inc/init.php'); ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KenticoCloud.Engage.PHP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.4/foundation.css" />
    
    <script><?php echo $kceScript ?></script>

  </head>
  <body>
  	<?php require('inc/topbar.php'); ?>

    <div class="row">
    	<div class="columns">

    		<h1>Get ready to engage...in PHP</h1>

            <p>This is a PHP implementation for the <a href="https://kenticocloud.com/engage" target="_blank">KenticoCloud Engage</a> REST API.</p>

            <p>View this project on <a href="https://github.com/stephenr85/KenticoCloud.Engage.PHP" target="_blank">GitHub</a>.</p>

		</div>
	</div>

    <?php require('inc/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.4/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>

  </body>
</html>