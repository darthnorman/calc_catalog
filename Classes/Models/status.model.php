<?php

class Status {
	
	/*
		The find static method selects stati
		from the database and returns them as
		an array of Item objects.
	*/
	
	public static function all() {
		global $db;
		
		$st = $db->prepare("SELECT * FROM status");
		
		$st->execute();
		
		// Returns an array of Item objects:
		$stati = $st->fetchAll(PDO::FETCH_CLASS, "Status");
		return $stati;
	}
}

?>