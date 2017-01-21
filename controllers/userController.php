<?php

include('models/userModel.php');


class userController {

	var $taskModel;

	function __construct(){

		$this->userModel = new userModel();

	}

	public function loginAction(){

		if(count($_POST) > 0){

			if($this->userModel->login($_POST['username'], $_POST['password']) == true){
				$_SESSION["username"] = "admin";
				$_SESSION["admin"] = true;
				header("Location: /?login ok");
				die();	
			}else{
				header("Location: /login?loginError=user not found");
				die();	
			}

		}


		ViewHandler::render('user.login', []);
	}


	public function logoutAction(){


		session_destroy();
		header("Location: /?logout ok");

	}



}

