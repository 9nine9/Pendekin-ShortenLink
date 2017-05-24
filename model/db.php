<?php
class db{
	private $dbhost;
	private $dbuser;
	private $dbpass;
	private $dbname;
	private $conn;
	
	protected $link;
	protected $id;

	function __construct(){
		$this->dbhost	= "localhost";
		$this->dbuser	= "root";
		$this->dbpass	= "";
		$this->dbname 	= "tk_link;
		$this->conn		= mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
		
		if(!$this->conn){
			die("Koneksi dengan database gagal");
		}
		return true;
	}
	
	function __destruct(){
		//mysqli_close($this->conn) or die("gagal close");
	}
	
	protected function query($query){
		$result	= mysqli_query($this->conn, $query);
		return $result;
	}
}
