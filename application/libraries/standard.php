<?php

class Standard{

	public function is_img($type){
		$t1 = "image/png";
		$t2 = "image/jpg";
		$t3 = "image/jpeg";
		$t4 = "image/gif";
		if($type == $t1 || $type == $t2 || $type == $t3 || $type == $t4) return TRUE;
		else return FALSE;
	}

	public function limit($perpage){
		$page = 1;
		if(isset($_GET['page'])) $page = $_GET['page'];
		if($page < 1) $page = 1;
		return ($page - 1) * $perpage.", ".$perpage;
	}

	public function page($perpage, $total){
		$page = 1;
		if(isset($_GET['page'])) $page = $_GET['page'];
		if($page < 1) $page = 1;

		$last = ceil($total/$perpage);

		$i = '';

		$i .= '<ul class="page">';

		$k = "?";

		if(isset($_GET["k"])) $k .= "k={$_GET['k']}&c={$_GET['c']}&h={$_GET['h']}&page=";
		else $k .= "page=";


		if($page > 1)
			$i .= "<li><a href='{$k}1'>First</a></li>";
		for ($loop=1; $loop <= $last ; $loop++) {
			$sel = "";
			if($loop == $page) $sel = "active";
			$i .= "<li class='{$sel}'><a href='{$k}{$loop}'>{$loop}</a></li>";
		}

		if($page < $last)
			$i .= "<li><a href='{$k}{$last}'>Last</a></li>";

		$i .= '</ul>';

		return $i;


	}


}


?>
