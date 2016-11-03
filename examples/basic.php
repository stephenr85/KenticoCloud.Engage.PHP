<?php require_once('inc/init.php'); ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Basic Example - KenticoCloud.Engage.PHP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.4/foundation.css" />
    
    <script><?php echo $kceScript ?></script>

  </head>
  <body>
  	<?php require('inc/topbar.php'); ?>

    <div class="row">
    	<div class="columns">

    		<h1>Engage, world!</h1>
    		<?php if(!$kceClient->getUserID()){ ?>
    			
				<p><strong>So, this is your first visit, eh?</strong><br>It's nice to meet you. Refresh the page to engage.</p>

			<?php }else if(!property_exists($loc = $kceClient->getCurrentLocation(), 'city')){ ?>
				
				<p>So...I'm only a day old. Try refreshing again.</p>
				<p>FYI, this was the last response from the API:</p>
				<pre><?php echo '(HTTP code '.$kceClient->lastResponse->code.') '. ($kceClient->lastResponse->raw_body) ?></pre>

			<?php }else{ ?>
				<p><strong>Hello again! How's the weather in <?php $loc = $kceClient->getCurrentLocation(); echo $loc->city ?>?</strong><br>
					Did you know that this is 	you've visited <?php echo count($kceClient->getCurrentSession()->getActions()) ?> pages in this session? Here's what else we know...
				</p>
				<p>					
				User ID: <?php echo $kceClient->getUserID() ?><br>
    			Session ID: <?php echo $kceClient->getSessionID() ?><br>
    			
    			Usual Location: <?php $loc = $kceClient->getUsualLocation(); echo $loc->city . ', ' . $loc->state . ', ' . $loc->country; ?><br>
    			First Visit: <?php echo date('F j, Y, g:i a', $kceClient->getFirstVisit()->visitDateTime) ?><br>
    			Last Visit: <?php echo date('F j, Y, g:i a', $kceClient->getLastVisit()->visitDateTime) ?><br>
    			Activity Summary: <?php echo $kceClient->getActivitySummary() ?><br>
    			Current Session: <?php echo $kceClient->getCurrentSession() ?><br>
    			</p>
			<?php } ?>
    		
    		<script>
    		ket('getUid', function(uid){ console.log('UID: ' + uid); });
    		ket('getSid', function(sid){ console.log('SID: ' + sid); });
    		</script>
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