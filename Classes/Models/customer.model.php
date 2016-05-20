<?php

class Customer {
	
	/*
		The find static method selects categories
		from the database and returns them as
		an array of Item objects.
	*/
	
	public static function all() {
		global $db;
		
		$st = $db->prepare("SELECT * FROM customer");
				
		$st->execute($arr);
		
		// Returns an array of Item objects:
		$customers = $st->fetchAll(PDO::FETCH_CLASS, "Customer"); 
		return $customers;
	}
	
	public static function show($id) {
		global $db;
		
		$id = intval($id);
		
		$st = $db->prepare("SELECT * FROM customer WHERE id=:id");
		
		$st->execute(array('id' => $id));
		$st->setFetchMode(PDO::FETCH_CLASS, "Customer");
		
		// Returns a single Item object:
		$customer = $st->fetch();
		return $customer;
	}
}

?>