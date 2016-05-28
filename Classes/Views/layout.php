<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sun, 20 Dec 1987 20:00:00 GMT");
?>
<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Kalkulationskatalog">

	<title><?php echo formatTitle($title)?></title>
	
	<!-- CSS -->
	<link href="/Resources/Public/Stylesheets/bootstrap.min.css" rel="stylesheet">
	<link href="/Resources/Public/Stylesheets/bootstrap-theme.min.css" rel="stylesheet">
	<link href="/Resources/Public/Stylesheets/style.css" rel="stylesheet">
    
    <link rel="icon" href="/Resources/Public/Images/dmk_e-business_logo.png">
	<!-- JS -->
	<script src="/Resources/Public/Scripts/list.min.js"></script>
</head>
<body>
	<?php 
		//render Page Content
		require_once "Classes/Views/navigation.php"; 
	?>
	<main class="container-fluid">
		<div class="row">
			<div class="col-sm-12 main">
			
				<?php 
					//render Page Content
					require_once "Classes/router.php"; 
				?>
				<hr>
				<p class="text-right copy">
					<a href="http://creativecommons.org/publicdomain/zero/1.0/deed.de" target="_blank"><small>CC0</a> <a href="mailto:norman.paschke@dmk-ebusiness.de">Norman Paschke</a> &ndash; Version <?php echo $GLOBALS['version']?></small>
				</p>
			</div>
		</div>
	</main>
	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="/Resources/Public/Scripts/jquery.min.js"><\/script>')</script>
	<script src="/Resources/Public/Scripts/bootstrap.min.js"></script>
	<script src="/Resources/Public/Scripts/tablesort.min.js"></script>
	<script src="/Resources/Public/Scripts/custom.js"></script>
</body>
</html>
