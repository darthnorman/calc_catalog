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
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/"><img alt="DMK" src="/Resources/Public/Images/dmk_e-business_logo.png" width="20" height="20"/></a>
				<a class="navbar-brand" href="/"><?php echo $GLOBALS['defaultTitle']?></a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li>
						<a href="/?controller=calculation&action=index">Kalkulationen</a>
					</li>
					<li>
						<a href="/?controller=item&action=index">Kalkulations&shy;positionen</a>
					</li>
					<li>
						<a href="/?controller=customer&action=index">Kunden</a>
					</li>
					<li>
						<a href="/?controller=category&action=index">Kategorien</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
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
