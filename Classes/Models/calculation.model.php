<?php

class Calculation {
	
	/*
		The find static method selects categories
		from the database and returns them as
		an array of Calculation objects.
	*/
	
	public static function all() {
		global $db;
		
		$st = $db->prepare("SELECT * FROM calculation ORDER BY status ASC");
		
		$st->execute();
		
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
		//$id = ID of current Calculation
		$id = intval($id);
		
		$st = $db->prepare("SELECT s.* FROM status s JOIN calculation c ON c.status = s.id WHERE c.id=:id");
		
		$st->execute(array('id' => $id));
		
		// Returns Status of a single Calculation object:
		$status = $st->fetch(PDO::FETCH_OBJ);
		return $status;
	}
	
	public static function getCustomer($id) {
		global $db;
		//$id = ID of current Calculation
		$id = intval($id);
	
		$st = $db->prepare("SELECT cu.id,cu.name FROM customer cu JOIN calculation ca ON ca.customer = cu.id WHERE ca.id=:id");
	
		$st->execute(array('id' => $id));
		
		// Returns Customer of a single Calculation object:
		$customer = $st->fetch(PDO::FETCH_OBJ);
		return $customer;
	}
	
	public function listItems($id) {
		$items = self::getItems($id);
		require_once "Classes/Views/calcItem.php";
	}
	
	public static function getItems($id) {
		global $db;
		
		$id = intval($id);
	
		$st = $db->prepare("SELECT i.* FROM item i INNER JOIN calculation_item_mm mm on i.id = mm.uid_item INNER JOIN calculation c on c.id = mm.uid_calculation WHERE c.id=:id ORDER BY i.category");
	
		$st->execute(array('id' => $id));
	
		// Returns Customer of a single Calculation object:
		$items = $st->fetchAll(PDO::FETCH_CLASS, "Item"); 
		return $items;
	}
	
	public static function getCompletePriceMin($id) {
		//get all items of this calculation and the current one
		$items = self::getItems($id);
		$currentCalculation = self::show($id);
		// $pt = person days
		$pt = 0;
		for ($i = 0; $i < count($items); $i++) {
			//$task = min person days of current task
			$task = $items[$i]->tmin;
			$pt = $pt + $task;
		};
		//$tean = team price of current calculation
		$team = floatval($currentCalculation->price_team);
		//$pm = pm price of current calculation
		$pm = floatval($currentCalculation->price_pm);
		$pm = $pt * 0.1 * $pm;
		
		$pt = $pt * $team; // => hours * team price
		$pt = $pt + $pm; // => + 10% of $sum as pm price
		
		return $pt;
	}
	
	public static function getCompletePriceMax($id) {
		//get all items of this calculation and the current one
		$items = self::getItems($id);
		$currentCalculation = self::show($id);
		// $pt = person days
		$pt = 0;
		for ($i = 0; $i < count($items); $i++) {
			//$task = min person days of current task
			$task = $items[$i]->tmax;
			$pt = $pt + $task;
		};
		//$tean = team price of current calculation
		$team = floatval($currentCalculation->price_team);
		//$pm = pm price of current calculation
		$pm = floatval($currentCalculation->price_pm);
		$pm = $pt * 0.1 * $pm;
		
		$pt = $pt * $team; // => hours * team price
		$pt = $pt + $pm; // => + 10% of $sum as pm price
		
		return $pt;
	}
}

?>