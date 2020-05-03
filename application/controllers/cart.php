<?php


/**
*
*/
class Cart extends Controller
{
	public $sess;

	public function __construct(){
		$this->sess = new Session();
		if(!$this->sess->get("invoice")) die("<script>alert('Keranjang Anda Kosong!');location.href='".SITE."/item';</script>");
	}

	public function index(){
		$gm = $this->model("global_model");

		if(isset($_GET['i'])){
			if($_GET['do'] == "minus"){
				if($gm->domincart($_GET['i'])) die("<script>location.href='".SITE."/cart';</script>");
				else die("<script>alert('Maaf terjadi kesalahan system! silahkan coba lagi!');location.href='".SITE."/cart';</script>");
			}
			elseif($_GET['do'] == "plus"){
				if($gm->dopluscart($_GET['i'])) die("<script>location.href='".SITE."/cart';</script>");
				else die("<script>alert('Maaf terjadi kesalahan system! silahkan coba lagi!');location.href='".SITE."/cart';</script>");
			}
		}

		$get = $gm->getoneitemInvoice($this->sess->get("invoice"));

		$gc = $gm->getC();

		$s = new Session();

		$this->view("sections/head");
		$this->view("pages/cart.detail", array("get" => $get[0], "sess" => $s));
		$this->view("sections/sidebar_member");
		$this->view("sections/sidebar", array("cat" => $gc));
		$this->view("sections/foot");
	}

	public function checkout(){
		$gm = $this->model("global_model");
		// var_dump($_POST);
		if($gm->checkout($_POST["bank"])) die("<script>location.href='".SITE."/member/detail_order';</script>");
		else die("<script>alert('Maaf terjadi kesalahan system! silahkan coba lagi!');location.href='".SITE."/cart/".$this->sess->get("invoice")."';</script>");
	}


}


?>
