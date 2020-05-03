<?php


/**
*
*/
class sitemap extends Controller
{

	public function index(){

		$gm = $this->model("global_model");

		$gc = $gm->getC();


		$this->view("sections/head");
		$this->view("pages/sitemap",array("cat" => $gc));
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
