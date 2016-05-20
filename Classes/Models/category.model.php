<?php

class Category {
	
	/*
		The find static method selects categories
		from the database and returns them as
		an array of Item objects.
	*/
	
	public static function all() {
		global $db;
		
		$st = $db->prepare("SELECT * FROM category");
				
		$st->execute($arr);
		
		// Returns an array of Item objects:
		$categories = $st->fetchAll(PDO::FETCH_CLASS, "Category");
		return $categories;
	}
	
	public static function show($id) {
		global $db;
		
		$id = intval($id);
		
		$st = $db->prepare("SELECT * FROM category WHERE id=:id");
		
		$st->execute(array('id' => $id));
		$st->setFetchMode(PDO::FETCH_CLASS, "Category");
		
		// Returns a single Item object:
		$category = $st->fetch();
		return $category;
	}
	
	public static function getElementCount($id) {
		global $db;
	
		$id = intval($id);
	
		$st = $db->prepare("SELECT id FROM item WHERE category=:id");
	
		$st->execute(array('id' => $id));
	
		// Returns Customer of a single Calculation object:
		$count = $st->rowCount();
		return $count;
	}
}

?>