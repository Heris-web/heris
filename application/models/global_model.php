	<?php


/**
*
*/
class Global_model extends Model
{

	public $db;
	public $session;
	public function __construct(){
		$this->db = new Database();
		$this->session = new Session();
	}

	public function getC(){
		return $this->db->fetch("SELECT * FROM `cat`");
	}

	public function countItem(){
		return $this->db->jumlah("SELECT * FROM `items`");
	}
	public function getitem($limit){
		return $this->db->fetch("SELECT * FROM `items` INNER JOIN `cat` on cat.cid = items.cid LIMIT $limit");
	}
	public function getoneitem($id){
		return $this->db->fetch("SELECT * FROM `items` INNER JOIN `cat` on cat.cid = items.cid WHERE `iid` = :id", array(":id" => $id));
	}
	public function getoneitemInvoice($id){
		return $this->db->fetch("SELECT *, checkout.qty as qtys FROM `checkout` INNER JOIN `items` on items.iid = checkout.iid INNER JOIN `cat` on cat.cid = checkout.cid WHERE checkout.invoice = :id", array(":id" => $id));
	}
	public function domincart($id){
		$inv = $this->session->get("invoice");
		if(!$this->db->query("UPDATE `checkout` SET `qty` = qty - 1 WHERE `invoice` = :inv", array(":inv" => $inv))) return false;
		if(!$this->db->query("UPDATE `items` SET `stock` = stock + 1 , `sold` = sold - 1 WHERE `iid` = :id", array(":id" => $id))) return false;
		return TRUE;
	}
	public function dopluscart($id){
		$inv = $this->session->get("invoice");
		if(!$this->db->query("UPDATE `checkout` SET `qty` = qty + 1 WHERE `invoice` = :inv", array(":inv" => $inv))) return false;
		if(!$this->db->query("UPDATE `items` SET `stock` = stock - 1 , `sold` = sold + 1 WHERE `iid` = :id", array(":id" => $id))) return false;
		return TRUE;
	}

	public function addtocart($post){
		$get = $this->db->fetch("SELECT * FROM `items` INNER JOIN `cat` on cat.cid = items.cid WHERE `iid` = :id", array(":id" => $post['iid']));
		$price = $get[0]['price'] - ($get[0]['price'] * $get[0]['disc'] / 100);
		$total = $price * $post['qty'];
		$time = date("Y-m-d H:i:s");
		$invoice = date("ymdhis");
		$iid = $post['iid'];
		$mid = $this->session->get("mid");
		$qty = $post['qty'];

		if($post['qty'] > $get[0]['stock']) return "OUT OF STOCK";

		$data = array(
				"invoice" => $invoice,
				"iid" => $iid,
				"mid" => $mid,
				"cid" => $get[0]['cid'],
				"qty" => $post['qty'],
				"total" => $total,
				"bank" => "",
				"noresi" => "",
				"scan" => "",
				"status" => 0,
				"time" => $time
			);
		$insert = $this->db->insert("checkout", $data);
		if($insert){
			if(!$this->db->query("UPDATE `items` SET `stock` = stock - $qty , `sold` = sold + $qty WHERE `iid` = :id", array(":id" => $iid))) return false;
			$_SESSION[SESS]['data']['invoice'] = $invoice;
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function checkout($bank){
		$inv = $this->session->get("invoice");
		$update = $this->db->query("UPDATE `checkout` SET `status` = 1 , `bank` = :bank WHERE `invoice` = :inv", array(":bank" =>$bank , ":inv" =>$inv));
		if($update) {
			unset($_SESSION[SESS]['data']['invoice']);
			return TRUE;
		}
		else {
			return FALSE;
		}
	}


	public function countItemSearch(){
		$data = array();
		$where = "WHERE";
		if($_GET['k'] != "") {
			$where .= " items.name LIKE :name AND ";
			$data[":name"] = "%".$_GET['k']."%";
		}
		if($_GET['c'] != "all") {
			$where .= " items.cid = :cid AND ";
			$data[":cid"] = $_GET['c'];
		}
		if($_GET['h'] != "all") {
			$h = explode("-", $_GET['h']);
			$where .= " items.cid BETWEEN :hs AND :he AND ";
			$data[":hs"] = $h[0];
			$data[":he"] = $h[1];
		}

		if($where == "WHERE") $where = "";
		else $where = rtrim($where, "AND ");

		return $this->db->jumlah("SELECT * FROM `items` INNER JOIN `cat` on cat.cid = items.cid $where", $data);
	}
	public function getitemSearch($limit = 0){
		$data = array();
		$where = "WHERE";

		if($_GET['k'] != "") {
			$where .= " items.name LIKE :name AND ";
			$data[":name"] = "%".$_GET['k']."%";
		}
		if($_GET['c'] != "all") {
			$where .= " items.cid = :cid AND ";
			$data[":cid"] = $_GET['c'];
		}
		if($_GET['h'] != "all") {
			$h = explode("-", $_GET['h']);
			$where .= " items.price BETWEEN :hs AND :he AND ";
			$data[":hs"] = $h[0];
			$data[":he"] = $h[1];
		}

		if($where == "WHERE") $where = "";
		else $where = rtrim($where, "AND ");

		return $this->db->fetch("SELECT * FROM `items` INNER JOIN `cat` on cat.cid = items.cid $where LIMIT $limit", $data);
	}

	public function getPage($link){
		return $this->db->fetch("SELECT * FROM `page` WHERE `link` = :link", array(":link" => $link));
	}

}


?>
