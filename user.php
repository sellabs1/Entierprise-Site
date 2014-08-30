<!--
	User class
-->

<?php

include_once('connection.php');
include_once('passCrypt.php'); 

class User{

	private $db;

	public function __construct(){
		
		session_start();
		$this->db = new connection();
		$this->db = $this->db->dbConnect();
	}

	public function Login($username, $password){

		if(!empty($username) && !empty($password)){

			$passQuery = $this->db->prepare("SELECT * FROM users2 WHERE username = ?");
			$passQuery->bindParam(1, $username);

			$passQuery->execute();
			$user = $passQuery->fetch(PDO::FETCH_ASSOC);

			if($user){

				$setPassword = $user['password'].$user['salt'];
				$inputPassword = crypt($password, $setPassword).$user['salt'];

				if($inputPassword == $setPassword){
					$_SESSION['login'] = 'true';
	    			$_SESSION['username'] = $username;
					header('location: userHome.php');
				}
				else{
					echo "Incorrect username or password </br>";
					echo $setPassword."</br>";
					echo $inputPassword."</br>";
					echo $password."</br>";
				}
			}
		}

		else{
			echo "Please enter your username and password";
		}
	}
			// $st = $this->db->prepare("SELECT * FROM users WHERE username =? AND password=?");
			// $st->bindParam(1, $username);
			// $st->bindParam(2, $password);

			// $st->execute();

			// if($st->rowCount() == 1){

			// 	$_SESSION['login'] = 'true';
   //  			$_SESSION['username'] = $username;
			// 	header('location: userHome.php');
			// }
		

	public function Logout(){

		session_destroy();
		header('location: index.php');
		echo "You have been successfully logged out";
	}

	public function Register($username, $password, $email){

		if(!empty($username) && !empty($password) && !empty($email)){

			$hashedPass = cryptPass($password);

			$st = $this->db->prepare("INSERT INTO users2 (username, password, email, salt) VALUES (?, ?, ?, ?)");

			$st->bindParam(1, $username);
			$st->bindParam(2, $hashedPass[0]);
			$st->bindParam(3, $email);
			$st->bindParam(4, $hashedPass[1]);

			$result = $st->execute();

			if($result){
				echo("Success. You have been registered");
			}
			else{
				echo("There has been a problem. Please try again");
			}
		}
		else{
			echo "Please fill in all of the fields";
		}
	}
}

?>