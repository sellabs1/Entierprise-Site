<!--
	User class
-->

<?php

include_once('connection.php'); 

class User{

	private $db;

	public function __construct(){
		$this->db = new connection();
		$this->db = $this->db->dbConnect();
	}

	public function Login($username, $password){

		if(!empty($username) && !empty($password)){

			$st = $this->db->prepare("SELECT * FROM users WHERE username =? AND password=?");
			$st->bindParam(1, $username);
			$st->bindParam(2, $password);

			$st->execute();

			if($st->rowCount() == 1){
				header('location: userHome.php');
			}
			else{
				echo "Incorrect username or password";
			}
		}
		else{
			echo "Please enter your username and password";
		}
	}
}

?>