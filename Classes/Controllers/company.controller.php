<?php

/* This controller renders the calculation pages */

class CompanyController {
	public function show() {
		// there is just one company, so we don't need an ID
		$company = Company::show();
		require_once "Classes/Views/showCompany.php";
	}
}

?>