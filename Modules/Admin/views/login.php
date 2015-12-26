<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8" />
	<title>Login</title>
	<meta name="description" content="Admin login page" />
	<meta name="author" content="Ferdhika" />
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link href="<?php echo $asset;?>css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo $asset;?>css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="<?php echo $asset;?>css/style.min.css" rel="stylesheet" />
	<link href="<?php echo $asset;?>css/style-responsive.min.css" rel="stylesheet" />
	<link href="<?php echo $asset;?>css/retina.css" rel="stylesheet" />
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="<?php echo $asset;?>css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="<?php echo $asset;?>css/ie9.css" rel="stylesheet">
	<![endif]-->
	
	<!-- start: Favicon and Touch Icons -->
	<link rel="shortcut icon" href="<?php echo $asset;?>img/fav.png" />
	<!-- end: Favicon and Touch Icons -->	
		
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>
	<div class="container-fluid-full">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
					<h2>Masuk ke akun anda.</h2>
					<form class="form-horizontal" action="" method="post" />
						<fieldset>
							
							<input class="input-large span12" name="A_username" id="username" type="text" placeholder="username" />

							<input class="input-large span12" name="A_password" id="password" type="password" placeholder="password" />

							<div class="clearfix"></div>
							<?php echo $notif;?>
							<input type="submit" class="btn btn-primary span12" name="masuk" value="Masuk">
						</fieldset>	
					</form>	
				</div>
			</div><!--/row-->
			
		</div><!--/fluid-row-->		
	</div><!--/.fluid-container-->
	
	<script src="<?php echo $asset;?>js/jquery-1.10.2.min.js"></script>
	<script src="<?php echo $asset;?>js/bootstrap.min.js"></script>	
		
</body>
</html>