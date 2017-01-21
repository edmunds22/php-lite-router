<?php 


class Router {

	var $route;
	var $routeBook = [ //always add trailing slash
			'/' => [
				'controller' => 'HOME',
				'action' => 'index'
			],
			//'example/' => [
			//	'controller' => 'task',
			//	'action' => 'index'
			//],
			'login/' => [
				'controller' => 'user',
				'action' => 'login'
			],
			'logout/' => [
				'controller' => 'user',
				'action' => 'logout'
			]
	];

	var $activeRoute;
	
	function __construct(){

		$this->route = $this->trimRoute($_SERVER['REQUEST_URI']);

		if(
			!isset($this->routeBook[$this->route])
		){ 

			throw new Exception('404 Not found page here...');
		}else{

			$this->activeRoute = $this->routeBook[$this->route];
			$this->processRoute();

		}


	}


	private static function trimRoute($route){

		//get just the route (no params)

		$route=explode('?', $route, 2);

		return str_replace('//', '/', ltrim($route[0], '/').'/');

	}

	private function processRoute(){

		//print_r($this->activeRoute);

		require_once(getcwd().DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.$this->activeRoute['controller'].'Controller.php');

		$controllerName=$this->activeRoute['controller'].'Controller';

		$controller = new $controllerName();

		$controller->{$this->activeRoute['action'].'Action'}();

	}



}