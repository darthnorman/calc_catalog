<?php

/* This controller renders the calculation pages */

class CompanyController {
	public function show() {
		//was the form submitted?
		if ($_POST['submit']) {
			// if id is valid -> edit()
			if ($_POST['id'] == 1) {
				$company = Company::edit();
				require_once "Classes/Views/showCompany.php";
			} else {
				//ID is not valid? -> error
				message('danger','Speichern fehlgeschlagen: ID ungültig.');
			}
		} else {
			//no submit? -> show()
			$company = Company::show();
			require_once "Classes/Views/showCompany.php";
		}
	}
}
?>