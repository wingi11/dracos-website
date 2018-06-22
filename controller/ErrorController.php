<?php
require_once "../lib/View.php";

class ErrorController {

	/**
	 * Das Home anzeigen
	 */
	public function index() {
		$view = new View("error");
		$view->title = "Error 404";
		$view->display();
	}

}