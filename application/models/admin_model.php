<?php


/**
*
*/
class admin_model extends Model
{

	public $session;
	public $db;
	public function __construct(){
		$this->db = new Database();
		$this->session = new Session();
	}

	public function cekLogin($post){
		$cek = $this->db->jumlah("SELECT * FROM `admin` WHERE `user` = :us AND `pass` = :pas", array(":us" => $post['user'], ":pas" => md5($post['pass'])));
		if($cek > 0) {
			$get = $this->db->fetch("SELECT * FROM `admin` WHERE `user` = :us AND `pass` = :pas", array(":us" => $post['user'], ":pas" => md5($post['pass'])));
			$_SESSION[SESS]['data'] = $get[0];
			$_SESSION[SESS]['data']['type'] = "ADMIN";
			return TRUE;
		}
		else return FALSE;
	}

	public function countItem(){
		return $this->db->jumlah("SELECT * FROM `items`");
	}
	public function getitem($limit){
		return $this->db->fetch("SELECT * FROM `items` LIMIT $limit");
	}
	public function getoneitem($id){
		return $this->db->fetch("SELECT * FROM `items` INNER JOIN `cat` on cat.cid = items.cid WHERE `iid` = :id", array(":id" => $id));
	}
	public function additem($post){
		$data = array(
				"name" => $post['name'],
				"cid" => $post['c'],
				"merk" => $post['merk'],
				"color" => $post['color'],
				"detail" => $post['detail'],
				"price" => $post['price'],
				"disc" => $post['disc'],
				"qty" => $post['qty'],
				"sold" => 0,
				"stock" => $post['qty'],
				"image" => $post['image'],
				"timepost" => date("Y-m-d H:i:s")
			);
		return $this->db->insert("items", $data);
	}
	public function edititem($post){
		$data = array(
				":id" => $post['id'],
				":name" => $post['name'],
				":cid" => $post['c'],
				":merk" => $post['merk'],
				":color" => $post['color'],
				":detail" => $post['detail'],
				":price" => $post['price'],
				":disc" => $post['disc'],
				":qty" => $post['qty']
			);

		$sql = "";

		if(isset($post['image'])){
			$sql = ", `image` = :image";
			$data[':image'] = $post['image'];
		}

		$stock = $post['qty'];

		return $this->db->query("UPDATE `items` SET `name` = :name , `cid` = :cid , `merk` = :merk , `color` = :color , `detail` = :detail , `price` = :price , `disc` = :disc , `qty` = :qty , `stock` = $stock - sold $sql WHERE `iid` = :id ", $data);
	}

	public function delitem($data = array()){
		for ($i=0; $i < count($data); $i++) {
			if(!$this->db->query("DELETE FROM `items` WHERE `iid` = :id", array(":id" => $data[$i]))) return false;
		}
		return true;
	}


	public function countOrder(){
		return $this->db->jumlah("SELECT * FROM `checkout` INNER JOIN `members` on members.mid = checkout.mid INNER JOIN `items` on items.iid = checkout.iid ");
	}
	public function getOrder($limit){
		return $this->db->fetch("SELECT *, checkout.qty as qtys FROM `checkout` INNER JOIN `members` on members.mid = checkout.mid INNER JOIN `items` on items.iid = checkout.iid  LIMIT $limit");
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

		$act1 = $this->db->query("UPDATE `checkout` SET `status` = 5  WHERE `invoice` = :inv ", $data);
		$act2 = $this->db->query("UPDATE `items` SET `stock` = stock + $qty , `sold` = sold - $qty  WHERE `iid` = :iid ", array(":iid" => $iid));
		if(!$act1) return FALSE;
		if(!$act2) return FALSE;
		return TRUE;
	}
	public function getallorder(){
		return $this->db->fetch("SELECT *, checkout.qty as qtys FROM `checkout` INNER JOIN `members` on members.mid = checkout.mid INNER JOIN `items` on items.iid = checkout.iid WHERE checkout.status = 1");
	}
	public function getoneitemInvoice($id){
		return $this->db->fetch("SELECT *, checkout.qty as qtys FROM `checkout` INNER JOIN `items` on items.iid = checkout.iid INNER JOIN `cat` on cat.cid = checkout.cid INNER JOIN `admin` WHERE checkout.invoice = :id", array(":id" => $id));
	}

	public function confirmorder($post){
		$data = array(
				":resi" => $post['resi'],
				":invoice" => $post['invoice']
			);

		$act1 = $this->db->query("UPDATE `checkout` SET `status` = 3 , `noresi` = :resi WHERE `invoice` = :invoice ", $data);
		if(!$act1) return FALSE;
		return TRUE;
	}


	public function countmember(){
		return $this->db->jumlah("SELECT * FROM `members` INNER JOIN `prov` on prov.pid = members.mpid");
	}
	public function getmember($limit){
		return $this->db->fetch("SELECT * FROM `members` INNER JOIN `prov` on prov.pid = members.mpid LIMIT $limit");
	}
	public function addmember($post){
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
				// $get = $this->db->fetch("SELECT * FROM `members` INNER JOIN `prov` on prov.pid = members.mpid WHERE `members`.`memail` = :us", array(":us" => $post['user']));
				// $_SESSION[SESS]['data'] = $get[0];
				// $_SESSION[SESS]['data']['type'] = 1;
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}
	public function getonemember($id){
		return $this->db->fetch("SELECT * FROM `members` INNER JOIN `prov` on prov.pid = members.mpid WHERE `mid` = :id", array(":id" => $id));
	}

	public function editmember($post){
		$data = array(
				":mname" => $post["name"],
				":maddr" => $post["addr"],
				":mpid" => $post["p"],
				":mtel" => $post["telp"],
				":mid" => $post['mid']
			);
		$sql1 = "";
		if(isset($post["image"])) {
			$sql1 = ", `mimg` = :mimg";
			$data[':mimg'] = $post['image'];
		}
		$act = $this->db->query("UPDATE `members` SET `mname` = :mname  ,  `maddr` = :maddr ,  `mpid` = :mpid ,  `mtel` = :mtel $sql1 WHERE  `mid` = :mid", $data);
		if($act){
			// $email = $this->session->get("memail");
			// session_unset($_SESSION);
			// $get = $this->db->fetch("SELECT * FROM `members` INNER JOIN `prov` on prov.pid = members.mpid WHERE `members`.`memail` = :us", array(":us" => $email));
			// $_SESSION[SESS]['data'] = $get[0];
			// $_SESSION[SESS]['data']['type'] = 1;
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function delmember($data = array()){
		for ($i=0; $i < count($data); $i++) {
			if(!$this->db->query("DELETE FROM `members` WHERE `mid` = :id", array(":id" => $data[$i]))) return false;
		}
		return true;
	}


	// START KATEGORI
	public function countcat(){
		return $this->db->jumlah("SELECT * FROM `cat`");
	}
	public function getcat($limit){
		return $this->db->fetch("SELECT * FROM `cat` LIMIT $limit");
	}
	public function addcat($post){
		$data = array(
				"cname" => $post['name']
			);
		return $this->db->insert("cat", $data);
	}
	public function getonecat($id){
		return $this->db->fetch("SELECT * FROM `cat` WHERE `cid` = :id", array(":id" => $id));
	}

	public function editcat($post){
		$data = array(
				":cid" => $post['id'],
				":cname" => $post['name']
			);

		return $this->db->query("UPDATE `cat` SET `cname` = :cname WHERE `cid` = :cid ", $data);
	}

	public function delcat($data = array()){
		for ($i=0; $i < count($data); $i++) {
			if(!$this->db->query("DELETE FROM `cat` WHERE `cid` = :id", array(":id" => $data[$i]))) return false;
		}
		return true;
	}

	// START HALAMAN
	public function countpage(){
		return $this->db->jumlah("SELECT * FROM `page`");
	}
	public function getpage($limit){
		return $this->db->fetch("SELECT * FROM `page` LIMIT $limit");
	}
	public function addpage($post){
		$data = array(
				"title" => $post['name'],
				"link" => $post['link'],
				"content" => $post['content']
			);
		return $this->db->insert("page", $data);
	}
	public function getonepage($id){
		return $this->db->fetch("SELECT * FROM `page` WHERE `id` = :id", array(":id" => $id));
	}

	public function editpage($post){
		$data = array(
				":id" => $post['id'],
				":title" => $post['name'],
				":link" => $post['link'],
				":content" => $post['content']
			);

		return $this->db->query("UPDATE `page` SET `title` = :title , `link` = :link , `content` = :content  WHERE `id` = :id ", $data);
	}

	public function delpage($data = array()){
		for ($i=0; $i < count($data); $i++) {
			if(!$this->db->query("DELETE FROM `page` WHERE `id` = :id", array(":id" => $data[$i]))) return false;
		}
		return true;
	}


	// START PROVINSI
	public function countprov(){
		return $this->db->jumlah("SELECT * FROM `prov`");
	}
	public function getprov($limit){
		return $this->db->fetch("SELECT * FROM `prov` LIMIT $limit");
	}
	public function addprov($post){
		$data = array(
				"pname" => $post['name']
			);
		return $this->db->insert("prov", $data);
	}
	public function getoneprov($id){
		return $this->db->fetch("SELECT * FROM `prov` WHERE `pid` = :id", array(":id" => $id));
	}

	public function editprov($post){
		$data = array(
				":pid" => $post['id'],
				":pname" => $post['name']
			);

		return $this->db->query("UPDATE `prov` SET `pname` = :pname WHERE `pid` = :pid ", $data);
	}

	public function delprov($data = array()){
		for ($i=0; $i < count($data); $i++) {
			if(!$this->db->query("DELETE FROM `prov` WHERE `pid` = :id", array(":id" => $data[$i]))) return false;
		}
		return true;
	}





}



?>
