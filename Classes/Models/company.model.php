<?php

class Company {
	
	/*
		The find static method selects categories
		from the database and returns them as
		an array of Item objects.
	*/
	
	public static function show() {
		global $db;
		
		$id = 1;
		
		$st = $db->prepare("SELECT * FROM company WHERE id=:id");
		
		$st->execute(array('id' => $id));
		
		$st->setFetchMode(PDO::FETCH_CLASS, "Company");
		
		// Returns a single Item object:
		$company = $st->fetch();
		return $company;
	}
	
	public static function edit() {
		$id= 1;
		$name = htmlentities($_POST['name'], ENT_QUOTES);
		$taxrate = htmlentities($_POST['taxrate'], ENT_QUOTES);
		
		if ($name == '' || $taxrate == '') {
			message('danger','Speichern fehlgeschlagen: Nicht alle Felder waren ausgefüllt.');
			return Company::show();
		} else {
			global $db;
				
			$id = intval($id);
				
			$st = $db->prepare("UPDATE company SET name=:name, taxrate=:taxrate WHERE id=:id");
				
			$st->execute(array(
				'id' => $id,
				'name' => $name,
				'taxrate' => $taxrate
			));
				
			message('success','Einstellungen erfolgreich gespeichert.');
			return Company::show();
		}
	}
	
	public static function getTaxrate() {
		global $db;
	
		$id = 1;
	
		$st = $db->prepare("SELECT taxrate FROM company WHERE id=:id");
	
		$st->execute(array('id' => $id));
	
		// Returns taxrate of current company
		$taxrate = $st->fetchColumn();
		return $taxrate;
	}
	
}
?>
