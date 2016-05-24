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
		if (isset($_GET['id'])) {
			//was the form submitted?
			if ($_POST['submit']) {
				// if id is valid -> edit()
				if (is_numeric($_POST['id'])) {
					$customer = Customer::edit($_GET['id']);
					require_once "Classes/Views/showCustomer.php";
				} else {
					//ID is not valid? -> error 
					return render('pages', 'error');
					$message = 'ID ist nicht valide.';
				}
			} else {
				if (is_numeric($_GET['id']) && $_GET['id'] > 0) {
					//no submit? -> show()
					$customer = Customer::show($_GET['id']);
					require_once "Classes/Views/showCustomer.php";
				}
			}
		} else {
			//no id? -> create()
			Customer::create();
			require_once "Classes/Views/addCustomer.php";
		}
	}
}
?>
