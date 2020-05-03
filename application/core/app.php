<?php


class App{

	protected $controller = "home";
	protected $method = "index";
	protected $params = array();

	public function __construct(){
		$url = $this->parseUrl();

		for ($iu=1; $iu <= count($url) ; $iu++) {
			define("URI$iu", $url[$iu - 1]);
		}

		if(isset($url[0])){
			if(file_exists("../application/controllers/".$url[0].".php")){
				$this->controller = $url[0];
				unset($url[0]);
			}else die("Controller not found!");
		}

		require_once "../application/controllers/".$this->controller.".php";
		$this->controller = new $this->controller;

		if(isset($url[1])){
			if(method_exists($this->controller, $url[1])){
				$this->method = $url[1];
				unset($url[1]);
			}else die("404 Not Found!");
		}


		$this->params = $url ? array_values($url) : array();

		call_user_func_array(array($this->controller, $this->method), $this->params);



	}

	private function parseUrl(){
		if(isset($_GET['url'])) return $url = explode("/",filter_var( rtrim($_GET['url'], "/"), FILTER_SANITIZE_URL));
	}

}


?>
