<?php

/* This controller renders the calculation pages */

class CustomerController {
	public function index() {
		$customers = Customer::all();
		require_once "Classes/Views/listCustomer.php";
	}
	
	public function datalist() {
		$customers = Customer::all();
		if (isset($_GET['id']))
			$currentId = $_GET['id'];
		require_once "Classes/Views/datalistCustomer.php";
	}
	
	public function show() {
		//do we have an ID?
		if (isset($_GET['id']) && $_GET['id'] != null) {
			//was the form submitted?
			if ($_POST['submit']) {
				// if id is valid -> edit()
				if (is_numeric($_POST['id'])) {
					$customer = Customer::edit($_POST['id']);
					require_once "Classes/Views/showCustomer.php";
				} else {
					//ID is not valid? -> error 
					return render('pages', 'error');
					message('danger','Speichern fehlgeschlagen: ID ungültig.');
				}
			} else {
				if (is_numeric($_GET['id']) && $_GET['id'] > 0) {
					//no submit? -> show()
					$customer = Customer::show($_GET['id']);
					require_once "Classes/Views/showCustomer.php";
				}
			}
		} else {
			if ($_POST['submit']) {
				//no id? -> create()
				$customer = Customer::create();
				require_once "Classes/Views/addCustomer.php";
			} else {
				$customer = Customer::show($lastId);
				require_once "Classes/Views/showCustomer.php";
			}
		}
	}
	
	public function delete() {
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
		} else {
			return render('pages', 'error');
			message('danger','Fehler: Keine ID übergeben.');
		}
		Customer::delete($id);
		require_once "Classes/Views/listCustomer.php";
	}
}
?>
