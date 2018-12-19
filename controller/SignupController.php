<?php
require_once "../lib/View.php";
require_once "../repository/UserRepository.php";

class SignupController {

	/**
	 * Show the signup window or sign up the user
	 */
	public function index() {
        if(isset($_SESSION["login"])) {
            header('Location: /');
        }
	    if(count($_POST) > 0){
            $userRepo = new UserRepository();
            if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])) {
                try {
                    if($userRepo->create($_POST["username"], $_POST["email"], $_POST["password"])){
                        header('Location: /');
                    }
                } catch (Exception $e){
                    echo $e->getMessage();
                }
            }
        } else {
            $view = new View("signup");
            $view->title = "Sign Up";
            $view->display();
        }
	}
}