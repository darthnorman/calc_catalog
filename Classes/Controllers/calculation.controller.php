<?php

/* This controller renders the calculation pages */

class CalculationController {
	public function index() {
		$calculations = Calculation::all();
		require_once "Classes/Views/listCalculation.php";
	}
	public function show() {
		// we expect a url of form ?controller=posts&action=show&id=x
		// without an id we just redirect to the error page as we need the post id to find it in the database
		if (!isset($_GET['id']))
			return render('pages', 'error');
	
		// we use the given id to get the right post
		$calculation = Calculation::show($_GET['id']);
		require_once "Classes/Views/showCalculation.php";
	}
}

?>