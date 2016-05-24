<?php

class Company {
	
	/*
		The find static method selects categories
		from the database and returns them as
		an array of Item objects.
	*/
	
	public static function show() {
		global $db;
		
		$id = 1;
		
		$st = $db->prepare("SELECT * FROM company WHERE id=:id");
		
		$st->execute(array('id' => $id));
		$st->setFetchMode(PDO::FETCH_CLASS, "Company");
		
		// Returns a single Item object:
		$company = $st->fetch();
		return $company;
	}
	public static function getTaxrate() {
		global $db;
	
		$id = 1;
	
		$st = $db->prepare("SELECT taxrate FROM company WHERE id=:id");
	
		$st->execute(array('id' => $id));
	
		// Returns Customer of a single Calculation object:
		$taxrate = $st->fetchColumn();
		return $taxrate;
	}
}

?>