<?php


class Controller{
	public $session;
	public $s;

	public function __construct(){
		$this->session = new Session();
		$this->s = new Standard();
	}

	public function model($target){
		require_once "../application/models/".$target.".php";
		return new $target();
	}
	public function view($target, $data = array()){
		extract($data);
		require_once "../application/views/".$target.".php";
	}

}


?>
