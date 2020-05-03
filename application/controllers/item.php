<?php


/**
*
*/
class Item extends Controller
{

	public function index(){

		$gm = $this->model("global_model");

		$gc = $gm->getC();

		$jumlah = $gm->countItem();
		$perpage = 6;
		$limit = $this->s->limit($perpage);
		$page = $this->s->page($perpage, $jumlah);
		$get = $gm->getitem($limit);

		$this->view("sections/head");
		// $this->view("sections/banner");
		$this->view("pages/home", array("get" => $get, "jumlah" => $jumlah, "page" => $page));
		$this->view("sections/iklan");
		$s = new Session();
		if($s->get("type") == "ADMIN")
			$this->view("sections/sidebar_admin");
		if($s->get("type") == 1)
			$this->view("sections/sidebar_member");

		$this->view("sections/sidebar", array("cat" => $gc));
		$this->view("sections/foot");

	}

	public function search(){

		$gm = $this->model("global_model");

		$gc = $gm->getC();

		$jumlah = $gm->countItemSearch();
		$perpage = 6;
		$limit = $this->s->limit($perpage);
		$page = $this->s->page($perpage, $jumlah);
		$get = $gm->getitemSearch($limit);

		$this->view("sections/head");

		$this->view("pages/home", array("get" => $get, "jumlah" => $jumlah, "page" => $page));
		$this->view("sections/iklan");
		$s = new Session();
		if($s->get("type") == "ADMIN")
			$this->view("sections/sidebar_admin");
		if($s->get("type") == 1)
			$this->view("sections/sidebar_member");

		$this->view("sections/sidebar", array("cat" => $gc));
		$this->view("sections/foot");

	}

	public function detail(){
		$gm = $this->model("global_model");

		if(!defined("URI3"))
			die("<script>location.href='".SITE."/admin/item';</script>");

		$gc = $gm->getC();

		$get = $gm->getoneitem(URI3);

		$s = new Session();

		$this->view("sections/head");
		$this->view("pages/item.detail", array("get" => $get[0], "sess" => $s));
		$s = new Session();
		if($s->get("type") == "ADMIN")
			$this->view("sections/sidebar_admin");
		if($s->get("type") == 1)
			$this->view("sections/sidebar_member");

		$this->view("sections/sidebar", array("cat" => $gc));
		$this->view("sections/foot");
	}

	public function add_to_cart(){
		$gm = $this->model("global_model");
		$add = $gm->addtocart($_POST);
		if($add == TRUE) die("<script>alert('Berhasil Menambahkan Barang Ke Keranjang!');location.href='".SITE."/cart';</script>");
		elseif($add == "OUT OF STOCK") die("<script>alert('Sisa Barang Tidak Mencukupi!');location.href='".SITE."/item/detail/".$_POST['iid']."';</script>");
		else die("<script>alert('Gagal Menambahkan Barang Ke Keranjang!');location.href='".SITE."/item';</script>");
	}




}


?>
