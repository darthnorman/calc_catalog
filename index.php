<?php

require_once "Classes/main.php";

if (isset($_GET['controller']) && isset($_GET['action'])) {
	$controller = $_GET['controller'];
	$action     = $_GET['action'];
} else {
	$controller = 'pages';
	$action     = 'home';
}

require_once "Classes/Views/layout.php";
