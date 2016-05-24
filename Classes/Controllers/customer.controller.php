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
		// we expect a url of form ?controller=posts&action=show&id=x
		// without an id we just redirect to the error page as we need the post id to find it in the database
		if (!isset($_GET['id']))
			return render('pages', 'error');
	
		// we use the given id to get the right post
		$customer = Customer::show($_GET['id']);
		require_once "Classes/Views/showCustomer.php";
	}
}
?>
