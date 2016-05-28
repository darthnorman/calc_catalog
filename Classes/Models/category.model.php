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
	
	public static function edit($id) {
		$name = htmlentities($_POST['name'], ENT_QUOTES);

		if ($name == '') {
			message('danger','Speichern fehlgeschlagen: Nicht alle Felder waren ausgefüllt.');
			return Category::show($id);
		} else {
			global $db;
			
			$id = intval($id);
			
			$st = $db->prepare("UPDATE category SET name=:name WHERE id=:id");
			
			$st->execute(array('id' => $id, 'name' => $name));
			
			message('success','Eintrag erfolgreich gespeichert.');
			return Category::show($id);
		}
	}
	
	public static function create() {
		if (isset($_POST['submit'])) {
			$name = htmlentities($_POST['name'], ENT_QUOTES);
				
			if ($name == '') {
				message('danger','Anlegen fehlgeschlagen: Nicht alle Felder waren ausgefüllt.');
				require_once "Classes/Views/addCategory.php";
			} else {
				global $db;
	
				$st = $db->prepare("INSERT INTO category (name) VALUES(:name)");
	
				$st->execute(array('name' => $name));
	
				$lastId = $db->lastInsertId();
				header("Location: /?controller=category&action=show&id=".$lastId);
			}
		}
	}
	
	public static function delete($id) {
		$id = intval($id);
	
		global $db;
		
		$stCalcItemMM = $db->prepare("DELETE mm.* FROM calculation_item_mm mm JOIN item i ON i.id=mm.uid_item WHERE i.category=:id");
		$stItem = $db->prepare("DELETE FROM item WHERE category=:id");
		$stCategory = $db->prepare("DELETE FROM category WHERE id=:id");
		
		$stCalcItemMM->execute(array('id' => $id));
		$stItem->execute(array('id' => $id));
		$stCategory->execute(array('id' => $id));
	
		header("Location: /?controller=category&action=index");
		exit;
	}
	
	public static function getItemCount($id) {
		global $db;
	
		$id = intval($id);
	
		$st = $db->prepare("SELECT id FROM item WHERE category=:id");
	
		$st->execute(array('id' => $id));
	
		// Returns customer of a single calculation object
		$count = $st->rowCount();
		return $count;
	}
	
	public static function getItems($id) {
		global $db;
	
		$id = intval($id);
	
		$st = $db->prepare("SELECT id,name FROM item WHERE category=:id");
	
		$st->execute(array('id' => $id));
	
		// Returns Customer of a single Calculation object:
		$items = $st->fetchAll(PDO::FETCH_CLASS, "Item");
		return $items;
	}
}

?>