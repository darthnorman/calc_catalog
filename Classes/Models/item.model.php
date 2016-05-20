<?php

class Item {
	
	/*
		The find static method selects categories
		from the database and returns them as
		an array of Item objects.
	*/
	
	public static function all() {
		global $db;
		
		$st = $db->prepare("SELECT * FROM item ORDER BY 'category' DESC");
				
		$st->execute($arr);
		
		// Returns an array of Item objects:
		$items = $st->fetchAll(PDO::FETCH_CLASS, "Item"); 
		return $items;
	}
	
	public static function show($id) {
		global $db;
		
		$id = intval($id);
		
		$st = $db->prepare("SELECT * FROM item WHERE id=:id");
		
		$st->execute(array('id' => $id));
		$st->setFetchMode(PDO::FETCH_CLASS, "Item");
		
		// Returns a single Item object:
		$item = $st->fetch();
		return $item;
	}
	
	public static function getCategory($id) {
		global $db;
	
		$id = intval($id);
	
		$st = $db->prepare("SELECT * FROM category WHERE id=:id");
	
		$st->execute(array('id' => $id));
	
		// Returns Customer of a single Calculation object:
		$customer = $st->fetch(PDO::FETCH_OBJ);
		return $customer;
	}
}

?>