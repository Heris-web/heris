<?php


class Session{

	public function __construct(){
		@session_start();
	}

	public function cek(){
		if(isset($_SESSION[SESS]["data"])) return true;
		else return false;
	}

	public function get($k){
		if(isset($_SESSION[SESS]["data"]["$k"])) return $_SESSION[SESS]["data"]["$k"];
		else return false;
	}

	public function flush(){
		session_unset($_SESSION);
		session_destroy();
	}

}


?>
