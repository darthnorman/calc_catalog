<?php

/**
 * Class Controllerklasse für Kalkulationen
 * @author Norman
 *
 */
class CalculationController {
	
	public function index() {
		$calculations = Calculation::all();
		require_once "Classes/Views/listCalculation.php";
	}
	
	public function show() {
		//do we have an ID?
		if (isset($_GET['id']) && $_GET['id'] != null) {
			//was the form submitted?
			if ($_POST['send']) {
				// if id is valid -> edit()
				if (is_numeric($_POST['id'])) {
					$calculation = Calculation::edit($_POST['id']);
					require_once "Classes/Views/showCalculation.php";
				} else {
					//ID is not valid? -> error
					message('danger','Speichern fehlgeschlagen: ID ungültig.');
				}
			} else {
				if (is_numeric($_GET['id']) && $_GET['id'] > 0) {
					//no submit? -> show()
					$calculation = Calculation::show($_GET['id']);
					require_once "Classes/Views/showCalculation.php";
				}
			}
		} else {
			if ($_POST['send']) {
				//no id? -> create()
				$calculation = Calculation::create();
			} else {
				require_once "Classes/Views/addCalculation.php";
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
		Calculation::delete($id);
	}
	
}
?>
