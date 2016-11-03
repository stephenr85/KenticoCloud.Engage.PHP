<?php require_once('inc/init.php'); ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Basic Example</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.4/foundation.css" />
    
    <script>!function(){var a='https://engage-ket.kenticocloud.com/js',b=document,c=b.createElement('script'),d=b.getElementsByTagName('script')[0];c.type='text/javascript',c.async=!0,c.defer=!0,c.src=a+'?d='+document.domain,d.parentNode.insertBefore(c,d)}(),window.ket=window.ket||function(){(ket.q=ket.q||[]).push(arguments)};ket('start', '8681759b-3c71-46d9-9995-77b0f09fc530');</script>
  	
  </head>
  <body>
    <div class="row">
    	<div class="columns">

    		<h1>Engage, world!</h1>
    		<?php if(!$kceClient->getUserID()){ ?>
    			
				<p><strong>So, this is your first visit, eh?</strong><br>It's nice to meet you. Refresh the page to engage.</p>

			<?php }else{ ?>
				<p><strong>Hello again! How's the weather in <?php $loc = $kceClient->getCurrentLocation(); echo $loc->city ?>?</strong><br>
					Did you know that this is you've visited <?php echo count($kceClient->getCurrentSession()->getActions()) ?> pages in this session? Here's what else we know...
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.4/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>

  </body>
</html>