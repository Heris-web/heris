<?php


/**
*
*/
class Admin_login extends Controller
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

		$this->view("sections/head_admin");
		$this->view("pages/login.admin");
		$this->view("sections/sidebar", array("cat" => $gc));
		$this->view("sections/foot");

	}

	public function do_login(){
		// var_dump($_POST);

		$am = $this->model("admin_model");

		if($am->ceklogin($_POST)) die("<script>alert('Login Berhasil! Selamat datang admin!');location.href='".SITE."/admin';</script>");
		else die("<script>alert('Maaf! User atau password anda tidak benar!');location.href='".SITE."/admin_login';</script>");

	}


}

?>
