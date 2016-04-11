<?php

/* MySQL connection using the PDO-class. For Login details see config.php. */

try {
	$db = new PDO(
		"mysql:host=$db_host;dbname=$db_name;charset=UTF8",
		$db_user,
		$db_pass
	);
	
    $db->query("SET NAMES 'utf8'");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	error_log($e->getMessage());
	die("A database error was encountered");
}
