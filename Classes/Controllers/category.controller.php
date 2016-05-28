<?php

/* This controller renders the calculation pages */

class CategoryController {
	
	public function index() {
		$categories = Category::all();
		require_once "Classes/Views/listCategory.php";
	}
	
	public function show() {
		//do we have an ID?
		if (isset($_GET['id']) && $_GET['id'] != null) {
			//was the form submitted?
			if ($_POST['send']) {
				// if id is valid -> edit()
				if (is_numeric($_POST['id'])) {
					$category = Category::edit($_POST['id']);
					require_once "Classes/Views/showCategory.php";
				} else {
					//ID is not valid? -> error
					message('danger','Speichern fehlgeschlagen: ID ungültig.');
				}
			} else {
				if (is_numeric($_GET['id']) && $_GET['id'] > 0) {
					//no submit? -> show()
					$category = Category::show($_GET['id']);
					require_once "Classes/Views/showCategory.php";
				}
			}
		} else {
			if ($_POST['send']) {
				//no id? -> create()
				$category = Category::create();
			} else {
				require_once "Classes/Views/addCategory.php";
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
		Category::delete($id);
	}
	
	public function datalist() {
		$categories = Category::all();
		if (isset($_GET['id']))
			$currentId = Item::getCategory($_GET['id'])->id;
			require_once "Classes/Views/datalistCategory.php";
	}
	
}

?>