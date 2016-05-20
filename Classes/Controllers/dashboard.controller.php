<?php

/* This controller renders the home page */

class DashboardController {
	public function handleRequest(){
		// Fetch all the calculations:
		$calculations = Calculation::listCalculations();

		render('dashboard',array(
			'title' 		=> 'Dashboard',
			'calculations'	=> $calculations
		));
	}
}

?>