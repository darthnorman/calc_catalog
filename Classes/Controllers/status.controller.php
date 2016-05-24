<?php

/* This controller renders the calculation pages */

class StatusController {
	
	public function datalist() {
		$stati = Status::all();
		if (isset($_GET['id']))
			$currentId = $_GET['id'];
		require_once "Classes/Views/datalistStatus.php";
	}
}

?>