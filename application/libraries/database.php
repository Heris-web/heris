<?php


class Database{

	public $pdo;

	public function __construct(){
		$this->konek();
	}

	private function konek(){
		try{
			$this->pdo = new PDO("mysql:host=".HOST.";dbname=".DBNAME, USER, PASS, array(PDO::ATTR_PERSISTENT => TRUE));
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		}catch(PDOException $es){
			die("Oops! " . $e->getMessage());
		}
	}

	public function query($sql, $data = array()){
		$q = $this->pdo->prepare($sql);
		return $q->execute($data);
	}

	public function fetch($sql, $data = array()){
		$q = $this->pdo->prepare($sql);
		$q->execute($data);
		return $q->fetchAll(PDO::FETCH_ASSOC);
	}

	public function jumlah($sql, $data = array()){
		$q = $this->pdo->prepare($sql);
		$q->execute($data);
		return $q->rowCount();
	}

	public function insert($table, $data = array()){

		$f = array_keys($data);
		$q = "(`".implode('`, `', $f)."`)";
		$v = "(:".implode(', :', $f).")";

		$sql = "INSERT INTO `$table` $q VALUES $v";
		$q = $this->pdo->prepare($sql);
		return $q->execute($data);
	}


}



?>
