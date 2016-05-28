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
	
	public static function edit($id) {
		$name = htmlentities($_POST['name'], ENT_QUOTES);
		$tstamp = $_POST['tstamp'];
		$customer = $_POST['customer'];
		$status = $_POST['status'];
		$price_team = tofloat($_POST['price_team']);
		$price_pm = tofloat($_POST['price_pm']);
	
		if ($name == '' || $tstamp == '' || $customer == 0 || $status == 0 || $price_team == '' || $price_pm == '') {
			message('danger','Speichern fehlgeschlagen: Nicht alle Felder waren ausgefüllt.');
			return Calculation::show();
		} else {
			global $db;
	
			$id = intval($id);
			
			$stCalculation = $db->prepare("UPDATE calculation SET name=:name,tstamp=:tstamp,customer=:customer,status=:status,price_team=:price_team,price_pm=:price_pm WHERE id=:id");
			
			$stCalculation->execute(array(
				'id' => $id,
				'name' => $name,
				'tstamp' => $tstamp,
				'customer' => $customer,
				'status' => $status,
				'price_team' => $price_team,
				'price_pm' => $price_pm
			));
			
			//delete all items of the current calculation then add the ones submitted
			$stCalcItemMM = $db->prepare("DELETE FROM calculation_item_mm WHERE uid_calculation=:id");
			$stCalcItemMM->execute(array('id' => $id));
			
			if(is_array($_POST['item'])) {
				$items = $_POST['item'];
				foreach ($items as $key => $value) {
					$stCalcItemMMInsert = $db->prepare("INSERT INTO calculation_item_mm ( uid_calculation, uid_item) VALUES(:uid_calculation, :uid_item)");
					$stCalcItemMMInsert->execute(array(
						'uid_calculation' => $id,
						'uid_item' => $value
					));
				}
			}
	
			message('success','Eintrag erfolgreich gespeichert.');
			return Calculation::show($id);
		}
	}
	
	public static function create() {
		if (isset($_POST['send'])) {
			$name = htmlentities($_POST['name'], ENT_QUOTES);
			$tstamp = $_POST['tstamp'];
			$customer = $_POST['customer'];
			$status = $_POST['status'];
			$price_team = tofloat($_POST['price_team']);
			$price_pm = tofloat($_POST['price_pm']);
				
			if ($name == '' || $customer == 0 || $status == 0 || $price_team == '' || $price_pm == '' || $tstamp == '') {
				message('danger','Anlegen fehlgeschlagen: Nicht alle Felder waren ausgefüllt.');
				require_once "Classes/Views/addCalculation.php";
			} else {
				global $db;
	
				$st = $db->prepare("INSERT INTO calculation (name, tstamp, customer, status, price_team, price_pm) VALUES(:name, :tstamp, :customer, :status, :price_team, :price_pm)");
	
				$st->execute(array(
						'name' => $name,
						'tstamp' => $tstamp,
						'customer' => $customer,
						'status' => $status,
						'price_team' => $price_team,
						'price_pm' => $price_pm
				));
	
				$lastId = $db->lastInsertId();
				header("Location: /?controller=calculation&action=show&id=".$lastId);
			}
		}
	}
	
	public static function delete($id) {
		$id = intval($id);
	
		global $db;
	
		$stCalcItemMM = $db->prepare("DELETE mm.* FROM calculation_item_mm mm WHERE mm.uid_calculation=:id");
		$stCalculation = $db->prepare("DELETE FROM calculation WHERE id=:id");
	
		$stCalcItemMM->execute(array('id' => $id));
		$stCalculation->execute(array('id' => $id));
	
		header("Location: /");
		exit;
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