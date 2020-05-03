<?php


/**
*
*/
class member_model extends Model
{

	public $session;
	public $db;
	public function __construct(){
		$this->db = new Database();
		$this->session = new Session();
	}

	public function cekLogin($post){
		$cek = $this->db->jumlah("SELECT * FROM `members` WHERE `memail` = :us AND `mpass` = :pas", array(":us" => $post['user'], ":pas" => md5($post['pass'])));
		if($cek > 0) {
			$get = $this->db->fetch("SELECT * FROM `members` INNER JOIN `prov` on prov.pid = members.mpid WHERE `members`.`memail` = :us AND `members`.`mpass` = :pas", array(":us" => $post['user'], ":pas" => md5($post['pass'])));
			$_SESSION[SESS]['data'] = $get[0];
			$_SESSION[SESS]['data']['type'] = 1;
			return TRUE;
		}
		else return FALSE;
	}
	public function cekregister($post){
		$cek = $this->db->jumlah("SELECT * FROM `members` WHERE `memail` = :us", array(":us" => $post['user']));
		if($cek > 0) {
			return "REGISTERED";
		}
		else {
			$data = array(
					"mname" => $post["name"],
					"memail" => $post["user"],
					"mpass" => md5($post["pass"]),
					"maddr" => $post["addr"],
					"mpid" => $post["p"],
					"mtel" => $post["telp"],
					"mimg" => $post["image"],
					"mtimejoin" => date("Y-m-d H:i:s")
				);
			$act = $this->db->insert("members", $data);
			if($act){
				$get = $this->db->fetch("SELECT * FROM `members` INNER JOIN `prov` on prov.pid = members.mpid WHERE `members`.`memail` = :us", array(":us" => $post['user']));
				$_SESSION[SESS]['data'] = $get[0];
				$_SESSION[SESS]['data']['type'] = 1;
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}
	public function editprofile($post){
		$data = array(
				":mname" => $post["name"],
				":maddr" => $post["addr"],
				":mpid" => $post["p"],
				":mtel" => $post["telp"],
				":mid" => $this->session->get("mid")
			);
		$sql1 = ",";
		if(isset($post["image"])) {
			$sql1 .= "`mimg` = :mimg ,";
			$data[':mimg'] = $post['image'];
		}
		if($post["pass"] != "") {
			$sql1 .= "`mpass` = :mpass ,";
			$data[':mpass'] = md5($post['pass']);
		}
		if($sql1 == ",") $sql1 = "";
		else
			$sql1 = rtrim($sql1, ",");
		// die($sql1);
		$act = $this->db->query("UPDATE `members` SET `mname` = :mname  ,  `maddr` = :maddr ,  `mpid` = :mpid ,  `mtel` = :mtel $sql1 WHERE  `mid` = :mid", $data);
		if($act){
			$email = $this->session->get("memail");
			session_unset($_SESSION);
			$get = $this->db->fetch("SELECT * FROM `members` INNER JOIN `prov` on prov.pid = members.mpid WHERE `members`.`memail` = :us", array(":us" => $email));
			$_SESSION[SESS]['data'] = $get[0];
			$_SESSION[SESS]['data']['type'] = 1;
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function getoneitemInvoice($id){
		return $this->db->fetch("SELECT *, checkout.qty as qtys FROM `checkout` INNER JOIN `items` on items.iid = checkout.iid INNER JOIN `cat` on cat.cid = checkout.cid INNER JOIN `admin` WHERE checkout.invoice = :id", array(":id" => $id));
	}


	public function countOrder(){
		$mid = $this->session->get("mid");
		$data = array(":mid" => $mid);
		return $this->db->jumlah("SELECT * FROM `checkout` INNER JOIN `members` on members.mid = checkout.mid INNER JOIN `items` on items.iid = checkout.iid WHERE members.mid = :mid", array(":mid" => $mid));
	}
	public function getOrder($limit){
		$mid = $this->session->get("mid");
		return $this->db->fetch("SELECT *, checkout.qty as qtys FROM `checkout` INNER JOIN `members` on members.mid = checkout.mid INNER JOIN `items` on items.iid = checkout.iid  WHERE members.mid = :mid LIMIT $limit", array(":mid" => $mid));
	}
	public function getallorder(){
		return $this->db->fetch("SELECT *, checkout.qty as qtys FROM `checkout` INNER JOIN `members` on members.mid = checkout.mid INNER JOIN `items` on items.iid = checkout.iid WHERE checkout.status = 1");
	}

	public function getoneorder($id){
		return $this->db->fetch("SELECT *, checkout.qty as qtys FROM `checkout` INNER JOIN `members` on members.mid = checkout.mid INNER JOIN `items` on items.iid = checkout.iid INNER JOIN `cat` on cat.cid = checkout.cid INNER JOIN `prov` on prov.pid = members.mpid WHERE checkout.invoice = :id", array(":id" => $id));
	}

	public function cancelordersystem($invoice, $iid, $qty){
		$data = array(
				":inv" => $invoice
			);

		$act1 = $this->db->query("UPDATE `checkout` SET `status` = 6  WHERE `invoice` = :inv ", $data);
		$act2 = $this->db->query("UPDATE `items` SET `stock` = stock + $qty , `sold` = sold - $qty  WHERE `iid` = :iid ", array(":iid" => $iid));
		if(!$act1) return FALSE;
		if(!$act2) return FALSE;
		return TRUE;
	}
	public function cancelorder($invoice, $iid, $qty){
		$data = array(
				":inv" => $invoice
			);

		$act1 = $this->db->query("UPDATE `checkout` SET `status` = 4  WHERE `invoice` = :inv ", $data);
		$act2 = $this->db->query("UPDATE `items` SET `stock` = stock + $qty , `sold` = sold - $qty  WHERE `iid` = :iid ", array(":iid" => $iid));
		if(!$act1) return FALSE;
		if(!$act2) return FALSE;
		return TRUE;
	}

	public function confirmorder($post){
		$data = array(
				":scan" => $post['image'],
				":invoice" => $post['invoice']
			);

		$act1 = $this->db->query("UPDATE `checkout` SET `status` = 2 , `scan` = :scan WHERE `invoice` = :invoice ", $data);
		if(!$act1) return FALSE;
		return TRUE;
	}


}



?>
