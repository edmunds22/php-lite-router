<?php
//include('models/model.php');
include('db.php');

class userModel {

	var $db; 

	function __construct(){

		//$this->db = new db(); UNCOMMENT TO LAUNCH DB OBJECT


	}

	public function login($username='', $password=''){

		//admin
		//123

		if($username =='admin' && $password == '123'){

			return true;

		}

		return false;

	}

}