<?php

class Customer {
	
	/*
		The find static method selects categories
		from the database and returns them as
		an array of Item objects.
	*/
	
	public static function all() {
		global $db;
		
		$st = $db->prepare("SELECT * FROM customer ORDER BY name ASC");
				
		$st->execute();
		
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
	
	public static function edit($id) {
		$name = htmlentities($_POST['name'], ENT_QUOTES);
		$address = htmlentities($_POST['address'], ENT_QUOTES);

		if ($name == '' || $address == '') {
			message('danger','Speichern fehlgeschlagen: Nicht alle Felder waren ausgefüllt.');
			return Customer::show($id);
		} else {
			global $db;
			
			$id = intval($id);
			
			$st = $db->prepare("UPDATE customer SET name=:name, address=:address WHERE id=:id");
			
			$st->execute(array(
				'id' => $id,
				'name' => $name,
				'address' => $address
			));
			
			message('success','Eintrag erfolgreich gespeichert.');
			return Customer::show($id);
		}
	}
	
	public static function create() {
		if (isset($_POST['send'])) {
			$name = htmlentities($_POST['name'], ENT_QUOTES);
			$address = htmlentities($_POST['address'], ENT_QUOTES);
			
			if ($name == '' || $address == '') {
				message('danger','Anlegen fehlgeschlagen: Nicht alle Felder waren ausgefüllt.');
				require_once "Classes/Views/addCustomer.php";
			} else {
				global $db;
				
				$st = $db->prepare("INSERT INTO customer (name, address) VALUES(:name, :address)");
								
				$st->execute(array(
					'name' => $name,
					'address' => $address
				));

				$lastId = $db->lastInsertId();
				header("Location: /?controller=customer&action=show&id=".$lastId);
			}
		}
	}
	
	public static function delete($id) {
		$id = intval($id);
		
		global $db;
			
		$stCalcItemMM = $db->prepare("DELETE mm.* FROM calculation_item_mm mm JOIN calculation c ON c.id=mm.uid_calculation WHERE c.customer=:id");
		$stCalculation = $db->prepare("DELETE FROM calculation WHERE customer=:id");
		$stCustomer = $db->prepare("DELETE FROM customer WHERE id=:id");
			
		$stCalcItemMM->execute(array('id' => $id));
		$stCalculation->execute(array('id' => $id));
		$stCustomer->execute(array('id' => $id));
		
		header("Location: /?controller=customer&action=index");
		exit;
	}
	
	public static function getCalculationCount($id) {
		global $db;
	
		$id = intval($id);
	
		$st = $db->prepare("SELECT id FROM calculation WHERE customer=:id");
	
		$st->execute(array('id' => $id));
	
		// Returns the customer's amount of calculations
		$count = $st->rowCount();
		return $count;
	}
	
	public static function getCalculation($id) {
		global $db;
	
		$id = intval($id);
	
		$st = $db->prepare("SELECT id,name FROM calculation WHERE customer=:id");
	
		$st->execute(array('id' => $id));
	
		// Returns all items with the current Category
		$calculations = $st->fetchAll(PDO::FETCH_CLASS, "Calculation");
		return $calculations;
	}
	
}
?>
