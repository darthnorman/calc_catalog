<?php

/* This controller renders the calculation pages */

class ItemController {
	public function index() {
		$items = Item::all();
		require_once "Classes/Views/listItem.php";
	}
	
	public function show() {
	//do we have an ID?
		if (isset($_GET['id']) && $_GET['id'] != null) {
			//was the form submitted?
			if ($_POST['submit']) {
				// if id is valid -> edit()
				if (is_numeric($_POST['id'])) {
					$item = Item::edit($_POST['id']);
					require_once "Classes/Views/showItem.php";
				} else {
					//ID is not valid? -> error
					message('danger','Speichern fehlgeschlagen: ID ungültig.');
				}
			} else {
				if (is_numeric($_GET['id']) && $_GET['id'] > 0) {
					//no submit? -> show()
					$item = Item::show($_GET['id']);
					require_once "Classes/Views/showItem.php";
				}
			}
		} else {
			if ($_POST['submit']) {
				//no id? -> create()
				$item = Item::create();
			} else {
				require_once "Classes/Views/addItem.php";
			}
		}
	}
	
	public function delete() {
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
		} else {
			message('danger','Fehler: Keine ID übergeben.');
			return render('pages', 'error');
		}
		Item::delete($id);
		require_once "Classes/Views/listItem.php";
	}
}

?>