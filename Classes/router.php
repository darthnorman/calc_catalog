<?php
function render($controller, $action) {
	require_once('Classes/Controllers/'.$controller.'.controller.php');
		switch($controller) {
		case 'pages':
			$controller = new PagesController();
		break;
		case 'calculation':
			// we need the model to query the database later in the controller
			require_once('Classes/Models/calculation.model.php');
			$controller = new CalculationController();
		break;
		case 'status':
			// we need the model to query the database later in the controller
			require_once('Classes/Models/status.model.php');
			$controller = new StatusController();
		break;
		case 'category':
			// we need the model to query the database later in the controller
			require_once('Classes/Models/category.model.php');
			$controller = new CategoryController();
			break;
		case 'item':
			// we need the model to query the database later in the controller
			require_once('Classes/Models/item.model.php');
			$controller = new ItemController();
		break;
		case 'customer':
			// we need the model to query the database later in the controller
			require_once('Classes/Models/customer.model.php');
			$controller = new CustomerController();
		break;
		case 'company':
			// we need the model to query the database later in the controller
			require_once('Classes/Models/company.model.php');
			$controller = new companyController();
		break;
		case 'status':
			// we need the model to query the database later in the controller
			require_once('Classes/Models/status.model.php');
			$controller = new statusController();
		break;
	}
	$controller->{ $action }();
}

// we're adding an entry for the new controller and its actions
$controllers = array(
	'pages' => ['home', 'error'],
	'calculation' => ['index', 'show'],
	'item' => ['index', 'show'],
	'category' => ['index', 'show', 'datalist'],
	'customer' => ['index', 'show', 'datalist'],
	'company' => ['show'],
	'status' => ['datalist']
);

if (array_key_exists($controller, $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		render($controller, $action);
	} else {
		render('pages', 'error');
	}
} else {
	render('pages', 'error');
}
?>