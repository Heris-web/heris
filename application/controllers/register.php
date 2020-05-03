<?php


/**
*
*/
class register extends Controller
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
		$this->view("pages/register.member");
		$this->view("sections/sidebar", array("cat" => $gc));
		$this->view("sections/foot");

	}

	public function do_register(){
		// var_dump($_POST);
		// var_dump($_FILES);
		// die();


		$am = $this->model("member_model");

		if($_FILES['image']['name'] != ""){
			@move_uploaded_file($_FILES['image']['tmp_name'], "assets/".$_FILES['image']['name']);
			$_POST['image'] = $_FILES['image']['name'];
		}
		$act = $am->cekregister($_POST);
		if($act == TRUE) die("<script>alert('register Berhasil! Selamat datang member!');location.href='".SITE."/member';</script>");
		elseif($act == "REGISTERED") die("<script>alert('Maaf! Email sudah digunakan, silahkan menggunakan email lain!');location.href='".SITE."/register';</script>");
		else die("<script>alert('Maaf! User atau password anda tidak benar!');location.href='".SITE."/register';</script>");

	}


}

?>
