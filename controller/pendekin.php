<?php
require_once "config.php";

class pendekin extends db{
	public $link;
	public $id;
	public $now;
	public $expired;
	public $result;

	function __construct(){

		//insert link to database
		if(isset($_POST['pendekin'])){
			$this->link		= addslashes(htmlentities(strip_tags(trim($_POST['link']))));
			$this->id		= addslashes(htmlentities(strip_tags(trim($_POST['id']))));

			$this->now		= date("Y-m-d");
			$this->expired	= date("Y-m-d", time() + (60 * 60 * 24 * 60));
			
			if($this->link == '' || $this->id == ''){
				$this->message("Please, fill the form, my friend!");
				header("Location:../");
				die();
			}

			if($this->valid("/;/", $this->link) || $this->valid("/[^a-zA-Z0-9-_]/", $this->id)){
				$this->message("The link is invalid, my friend! Don't use special chars!");
				header("Location:../");
				die();
			}


			if($this->db("INSERT INTO tk_data (id, link, date, expired) VALUES ('$this->id', '$this->link', '$this->now', '$this->expired')")){
				
				$this->message("Your link was created successfully!");

				$_SESSION['link']		= $this->id;
			}
			
			else 
				$this->message("This link has beed created, my friend! Try another one!");

			header("Location:../");
			die();
		}
		
		
		//fetch the data from database with id
		if(isset($_GET['id'])){
			$this->id		= addslashes(htmlentities(strip_tags(trim($_GET['id']))));
				
			if($this->valid("/[^a-zA-Z0-9-_]/", $this->id)){
				$this->message("The link is invalid, my friend! Don't use special chars!");
			}
			
			else{
				if($this->result	= $this->db("SELECT * FROM tk_data WHERE id='$this->id'")){

					$n 	= mysqli_num_rows($this->result);
					
					if($n > 0){
						while($data = mysqli_fetch_assoc($this->result)){
							$this->link		= $data['link'];
						}

						$this->message("You will be directed to");
					}
				}
			}
			
		}
	
	}
	
	//connecting to database
	public function db($query){
		$db	= new db;
		$this->result	= $db->query($query);
		$db = null;
		return $this->result;
	}


	//create mesaage
	public function message($message){
		session_start();
		$_SESSION['message']	= $message;
	}

	//validation
	public function valid($pattern, $string){
 		if(preg_match($pattern, $string)) {
    		return true;
  		}
  		else {
    		return false;
  		}

	}
	
}

$pendekin = new pendekin;