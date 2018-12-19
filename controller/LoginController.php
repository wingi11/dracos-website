<?php
require_once "../lib/View.php";
require_once "../repository/UserRepository.php";

class LoginController {

	/**
	 * Show the login window or login the user
	 */
    public function index() {
        if(isset($_SESSION["login"])) {
            header('Location: /');
        };
        if(count($_POST) > 0){
            $userRepo = new UserRepository();
            if(isset($_POST["username"]) && isset($_POST["password"])) {
                try {
                    if($userRepo->login($_POST["username"], $_POST["password"])){
                        $_SESSION["login"] = true;
                        header('Location: /');
                    }
                } catch (Exception $e){
                    echo $e->getMessage();
                }
            }
        } else {
            $view = new View("login");
            $view->title = "Login";
            $view->display();
        }
    }

}