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

	<!-- JS -->
	<script src="/Resources/Public/Scripts/list.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="/"><?php echo $GLOBALS['defaultTitle']?> <small>v<?php echo $GLOBALS['version']?></small></a>
			</div>
		</div>
	</nav>
	<main class="container-fluid">
		<div class="row">
			<div class="col-sm-12 main">

			<?php require_once "Classes/router.php" ?>

			</div>
		</div>
	</main>
	<footer>
	
	</footer>
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
