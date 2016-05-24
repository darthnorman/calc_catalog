<?php

/* This controller renders the calculation pages */

class ItemController {
	public function index() {
		$items = Item::all();
		require_once "Classes/Views/listItem.php";
	}
	public function show() {
		// we expect a url of form ?controller=posts&action=show&id=x
		// without an id we just redirect to the error page as we need the post id to find it in the database
		if (!isset($_GET['id']))
			return render('pages', 'error');
	
		// we use the given id to get the right post
		$item = Item::show($_GET['id']);
		require_once "Classes/Views/showItem.php";
	}
}

?>