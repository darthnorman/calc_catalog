<?php

class Calculation {
	
	/*
		The find static method selects categories
		from the database and returns them as
		an array of Calculation objects.
	*/
	
	public static function all() {
		global $db;
		
		$st = $db->prepare("SELECT * FROM calculation");
				
		$st->execute($arr);
		
		// Returns an array of Calculation objects:
		$calculations = $st->fetchAll(PDO::FETCH_CLASS, "Calculation"); 
		return $calculations;
	}
	
	public static function show($id) {
		global $db;
		
		$id = intval($id);
		
		$st = $db->prepare("SELECT * FROM calculation WHERE id=:id");
		
		$st->execute(array('id' => $id));
		$st->setFetchMode(PDO::FETCH_CLASS, "Calculation");
		
		// Returns a single Calculation object:
		$calculation = $st->fetch();
		return $calculation;
	}
	
	public static function getStatus($id) {
		global $db;
		
		$id = intval($id);
		
		$st = $db->prepare("SELECT * FROM status WHERE id=:id");
		
		$st->execute(array('id' => $id));
		
		// Returns Status of a single Calculation object:
		$status = $st->fetch(PDO::FETCH_OBJ);
		return $status;
	}
	
	public static function getCustomer($id) {
		global $db;
	
		$id = intval($id);
	
		$st = $db->prepare("SELECT * FROM customer WHERE id=:id");
	
		$st->execute(array('id' => $id));
		
		// Returns Customer of a single Calculation object:
		$customer = $st->fetch(PDO::FETCH_OBJ);
		return $customer;
	}
}

?>