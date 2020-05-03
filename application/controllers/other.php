<?php


/**
*
*/
class other extends Controller
{

	public function __construct(){
		if(!defined("URI3"))
			die("<script>location.href='".SITE."';</script>");
	}

	public function page(){

		$gm = $this->model("global_model");

		$gc = $gm->getC();

		$c = $gm->getPage(URI3);

		$this->view("sections/head");
		$this->view("pages/page", array("get" => $c[0]));
		$s = new Session();
		if($s->get("type") == "ADMIN")
			$this->view("sections/sidebar_admin");
		if($s->get("type") == 1)
			$this->view("sections/sidebar_member");


		$this->view("sections/sidebar", array("cat" => $gc));
		$this->view("sections/foot");

	}


}

?>
