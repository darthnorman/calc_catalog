<?php

class Item {
	
	/*
		The find static method selects categories
		from the database and returns them as
		an array of Item objects.
	*/
	
	public static function all() {
		global $db;
		
		$st = $db->prepare("SELECT * FROM item ORDER BY name ASC");
				
		$st->execute();
		
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
	
	public static function edit($id) {
		$name = htmlentities($_POST['name'], ENT_QUOTES);
		$description = htmlentities($_POST['description'], ENT_QUOTES);
		$tmin = tofloat($_POST['tmin']);
		$tmax = tofloat($_POST['tmax']);
		$category = $_POST['category'];

		if ($name == '' || $description == '' || $tmin == '' || $tmax == '' || $category == 0) {
			message('danger','Speichern fehlgeschlagen: Nicht alle Felder waren ausgefüllt.');
			return Item::show();
		} else {
			global $db;
				
			$id = intval($id);
				
			$st = $db->prepare("UPDATE item SET name=:name,description=:description,tmin=:tmin,tmax=:tmax,category=:category WHERE id=:id");
				
			$st->execute(array(
				'id' => $id,
				'name' => $name,
				'description' => $description,
				'tmin' => $tmin,
				'tmax' => $tmax,
				'category' => $category
			));
				
			message('success','Eintrag erfolgreich gespeichert.');
			return Item::show($id);
		}
	}
	
	public static function create() {
		if (isset($_POST['send'])) {
			$name = htmlentities($_POST['name'], ENT_QUOTES);
			$description = htmlentities($_POST['description'], ENT_QUOTES);
			$tmin = tofloat($_POST['tmin']);
			$tmax = tofloat($_POST['tmax']);
			$category = $_POST['category'];

			if ($name == '' || $description == '' || $tmin == '' || $tmax == '' || $category == 0) {
				message('danger','Anlegen fehlgeschlagen: Nicht alle Felder waren ausgefüllt.');
				require_once "Classes/Views/addItem.php";
			} else {
				global $db;
	
				$st = $db->prepare("INSERT INTO item (name, description, tmin, tmax, category) VALUES(:name, :description, :tmin, :tmax, :category)");
	
				$st->execute(array(
					'name' => $name,
					'description' => $description,
					'tmin' => $tmin,
					'tmax' => $tmax,
					'category' => $category
				));
	
				$lastId = $db->lastInsertId();
				header("Location: /?controller=item&action=show&id=".$lastId);
			}
		}
	}
	
	public static function delete($id) {
		$id = intval($id);
	
		global $db;
	
		$stCalcItemMM = $db->prepare("DELETE FROM calculation_item_mm WHERE uid_item=:id");
		$stItem = $db->prepare("DELETE FROM item WHERE id=:id");
	
		$stCalcItemMM->execute(array('id' => $id));
		$stItem->execute(array('id' => $id));
	
		header("Location: /?controller=item&action=index");
		exit;
	}
	
	public static function getCategory($id) {
		global $db;
		//$id = ID of current Item
		$id = intval($id);
	
		$st = $db->prepare("SELECT c.* FROM category c JOIN item  i ON i.category = c.id WHERE i.id=:id");
	
		$st->execute(array('id' => $id));
	
		// Returns category of current item
		$category = $st->fetch(PDO::FETCH_OBJ);
		return $category;
	}
	
	public static function allSortByCategory($id) {
		global $db;
		
		$id = intval($id);
		//$st = $db->prepare("SELECT * FROM item ORDER BY category ASC");
		$st = $db->prepare("SELECT * FROM item WHERE id NOT IN (SELECT uid_item FROM calculation_item_mm WHERE uid_calculation=:id) ORDER BY category ASC");
	
		$st->execute(array('id' => $id));
	
		// Returns an array of Item objects:
		$items = $st->fetchAll(PDO::FETCH_CLASS, "Item");
		return $items;
	}
	
}
?>
