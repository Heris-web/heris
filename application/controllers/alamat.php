<?php


/**
*
*/
class Home extends Controller
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
		$this->view("sections/banner");
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

	public function logout(){
		$s = new Session();
		$s->flush();
		die("<script>alert('Berhasil Logout!');location.href='".SITE."/home';</script>");
	}

}


?>
