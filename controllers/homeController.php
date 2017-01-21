<?php

include('models/homeModel.php');


class homeController {

	var $taskModel;

	function __construct(){

		$this->homeModel = new homeModel();

	}

	public function indexAction(){
 
		ViewHandler::render('home', [
			'viewVar' => 'variable1'
		]);
	}




}

