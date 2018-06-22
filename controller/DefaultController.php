<?php
require_once "../lib/View.php";

class DefaultController {

	/**
	 * Das Home anzeigen
	 */
	public function index() {
		$view = new View("default_index");
		$view->title = "Home";
		$view->display();
	}

}