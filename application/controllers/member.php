<?php


/**
*
*/
class Member extends Controller
{

	public $session;
	public $s;

	public function __construct(){
		$this->session = new Session();
		$this->s = new Standard();
		if($this->session->get("type") != 1) die("<script>alert('Silahkan Login Terlabih Dahulu!');location.href='".SITE."/login';</script>");
	}

	public function index(){
		$gm = $this->model("global_model");

		$gc = $gm->getC();

		$this->view("sections/head");
		$this->view("pages/member.dashboard", array("sess" => $this->session));
		$this->view("sections/sidebar_member");
		$this->view("sections/foot");

	}
	public function edit(){
		$gm = $this->model("global_model");

		$gc = $gm->getC();

		$s = $this->session;

		$this->view("sections/head");
		$this->view("pages/member.edit", array("sess" => $this->session));
		$this->view("sections/sidebar_member");
		$this->view("sections/foot");

	}


	public function detail_order(){
		$gm = $this->model("member_model");

		if(!defined("URI3"))
			die("<script>location.href='".SITE."/member/order';</script>");


		$get = $gm->getoneitemInvoice(URI3);

		$s = new Session();

		$this->view("sections/head");
		$this->view("pages/member.detail_order", array("get" => $get[0], "sess" => $s));
		$this->view("sections/sidebar_member");
		$this->view("sections/foot");
	}

	public function confirm_order(){
		$gm = $this->model("member_model");

		if(!defined("URI3"))
			die("<script>location.href='".SITE."/member/order';</script>");


		$get = $gm->getoneitemInvoice(URI3);

		$s = new Session();

		$this->view("sections/head");
		$this->view("pages/member.confirm", array("get" => $get[0], "sess" => $s));
		$this->view("sections/sidebar_member");
		$this->view("sections/foot");
	}

	public function do_confirm(){
		// var_dump($_POST);
		// var_dump($_FILES);
		// die();


		$am = $this->model("member_model");

		if($_FILES['image']['name'] != ""){
			@move_uploaded_file($_FILES['image']['tmp_name'], "assets/".$_FILES['image']['name']);
			$_POST['image'] = $_FILES['image']['name'];
			$act = $am->confirmorder($_POST);
			if($act == TRUE) die("<script>alert('Konfirmasi Berhasil!');location.href='".SITE."/member/order';</script>");
			else die("<script>alert('Maaf! Gagal Konfirmasi!');location.href='".SITE."/member/confirm_order/".$_POST['invoice']."';</script>");
		}


	}

	public function do_edit(){
		// var_dump($_POST);
		// var_dump($_FILES);
		// die();


		$am = $this->model("member_model");

		if($_FILES['image']['name'] != ""){
			@move_uploaded_file($_FILES['image']['tmp_name'], "assets/".$_FILES['image']['name']);
			$_POST['image'] = $_FILES['image']['name'];
		}

		$act = $am->editprofile($_POST);
		if($act == TRUE) die("<script>alert('edit Berhasil!');location.href='".SITE."/member';</script>");
		else die("<script>alert('Maaf! Gagal Edit Profile!');location.href='".SITE."/member/edit';</script>");

	}

	public function order(){
		$gm = $this->model("member_model");

		if(isset($_GET['i'])){
			if($_GET['do'] == "cancel"){
				if($gm->cancelorder($_GET['in'], $_GET['i'], $_GET['q'])) die("<script>alert('Berhasil Membatalkan Pesanan!');location.href='".SITE."/member/order';</script>");
				else die("<script>alert('Gagal Membatalkan pesanan!');location.href='".SITE."/member/order';</script>");
			}
		}

		$jumlah = $gm->countOrder();
		$perpage = 5;
		$limit = $this->s->limit($perpage);
		$page = $this->s->page($perpage, $jumlah);
		$get = $gm->getOrder($limit);
		// echo time();
		foreach ($gm->getAllOrder() as $g) {
			// var_dump($g);
			$time = strtotime($g['time']);
			$timepl = $time + 300;
			// echo $timepl;
			// echo time();
			if($timepl < time()){
				$gm->cancelordersystem($g['invoice'], $g['iid'], $g['qtys']);
			}
		}

		$this->view("sections/head");
		$this->view("pages/member.order", array("jumlah" => $jumlah, "get" => $get, "page" => $page));
		$this->view("sections/sidebar_member");
		$this->view("sections/foot");
	}






}


?>
