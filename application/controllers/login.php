<?php


/**
*
*/
class login extends Controller
{

	public $session;

	public function __construct(){
		$this->session = new Session();
		if($this->session->get("type") == "ADMIN") die("<script>alert('Anda sudah masuk sebagai admin!');location.href='".SITE."/admin';</script>");
		if($this->session->get("type") == "1") die("<script>alert('Anda sudah masuk sebagai member!');location.href='".SITE."/member';</script>");
	}

	public function index(){

		$gm = $this->model("global_model");

		$gc = $gm->getC();

		$this->view("sections/head");
		$this->view("pages/login.member");
		$this->view("sections/sidebar", array("cat" => $gc));
		$this->view("sections/foot");

	}

	public function do_login(){
		// var_dump($_POST);

		$am = $this->model("member_model");

		if($am->ceklogin($_POST)) die("<script>alert('Login Berhasil! Selamat datang member!');location.href='".SITE."/member';</script>");
		else die("<script>alert('Maaf! User atau password anda tidak benar!');location.href='".SITE."/login';</script>");

	}


}

?>
