<?php require_once('inc/init.php'); ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Example - KenticoCloud.Engage.PHP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.4/foundation.css" />
    
    <script><?php echo $kceScript ?></script>

  </head>
  <body>
  	<?php require('inc/topbar.php'); ?>

    <div class="row">
    	<div class="columns">

            <?php
                $sid = $kceClient->getSessionID();
                $hasSubmitted = false;
                if($sid){
                    $session = $kceClient->getCurrentSession();
                    //echo $session;
                    
                    $hasSubmitted = $kceClient->getActivityConfirmation('FormSubmit', 365, '/examples/form.php')->activity;
                }
            ?>
            <?php if(!$hasSubmitted){ ?>
                <h1>Please, may I have your soul?</h1>
                <p>...Or at least your name and e-mail. It's for the example, promise.</p>
            <?php }else{ ?>
                <div class="callout success">
                    <h1>We have your information</h1>
                    <p>All of the junk mail should arrive shortly. You can enter it again, if you'd like...</p>
                </div>
            <?php } ?>
            <form method="post" class="row">
                <div class="columns small-6">
                    <div class="input-group">
                        <label class="input-group-label" for="first_name_input">First name</label>
                        <input class="input-group-field" type="text" name="first_name" id="first_name_input" />
                    </div>
                    <div class="input-group">
                        <label class="input-group-label" for="last_name_input">Last name</label>
                        <input class="input-group-field" type="text" name="last_name" id="last_name_input" />
                    </div>
                    <div class="input-group">
                        <label class="input-group-label" for="last_name_input">E-mail</label>
                        <input class="input-group-field" type="email" name="email" id="last_name_input" />
                    </div>
                    <button type="submit" class="button">Do it</button>
                </div>
            </form>
            <style type="text/css">
            .input-group-label {width: 30%;}
            </style>


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