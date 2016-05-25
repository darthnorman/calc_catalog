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
	
	public static function edit($id) {
		$name = htmlentities($_POST['name'], ENT_QUOTES);
		$address = htmlentities($_POST['address'], ENT_QUOTES);

		if ($name == '' || $address == '') {
			return render('pages', 'error');
			message('danger','Speichern fehlgeschlagen: Nicht alle Felder waren ausgefüllt.');
		} else {
			global $db;
			
			$id = intval($id);
			
			$st = $db->prepare("UPDATE customer SET name=:name, address=:address WHERE id=:id");
			
			$st->execute(array('id' => $id, 'name' => $name, 'address' => $address));
			
			message('success','Eintrag erfolgreich gespeichert.');
			return Customer::show($id);
		}
	}
	
	public static function create() {
		if (isset($_POST['submit'])) {
			$name = htmlentities($_POST['name'], ENT_QUOTES);
			$address = htmlentities($_POST['address'], ENT_QUOTES);
			
			if ($name == '' || $address == '') {
				return render('pages', 'error');
				message('danger','Anlegen fehlgeschlagen: Nicht alle Felder waren ausgefüllt.');
			} else {
				global $db;
				
				$st = $db->prepare("INSERT INTO customer (name, address) VALUES(:name, :address)");
				
				$st->execute(array('name' => $name, 'address' => $address));
				
				message('success','Eintrag erfolgreich angelegt.');
				
				$lastId = $db->lastInsertId();
				return Customer::show($lastId);
			}
		}
	}
}

?>