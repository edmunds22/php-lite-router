<?php 


class ViewHandler {


	
	function __construct(){

		//some view not found error checking here...

	}


	public function render($view, $vars){

		include(getcwd().DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'layout.php');

	}

}