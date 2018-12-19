<?php
require_once "../lib/View.php";

class DefaultController {

	/**
	 * Show the home
	 */
	public function index() {
		$view = new View("default_index");
		$view->title = "Home";
		$view->display();
	}

	public function logout(){
        session_destroy();
        header('Location: /');
    }

}