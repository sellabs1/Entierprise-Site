<!--
	User class. 
-->

<?php

//Includes connection class and password encryption file
include_once('connection.php');
include_once('passCrypt.php'); 

class User{

	private $db;

	//User constructor. Runs as soon as class is instantiated.
	public function __construct(){
		
		//Starts a session if there isn't one currently
		if (session_status() == PHP_SESSION_NONE) {
    		session_start();
		}
		
		//Instantiates the connection class, and calls the dbConnect function
		$this->db = new Connection();
		$this->db = $this->db->dbConnect();
	}

	//Login function. Gets passed username and password from form inputs.
	public function Login($username, $password){

		if(!empty($username) && !empty($password)){

			//Prepared sql statement
			$passQuery = $this->db->prepare("SELECT * FROM users2 WHERE username = ?");
			//Bind the passed in $username parameter to the prepared sql statement
			$passQuery->bindParam(1, $username);
			//Execute the prepared sql query
			$passQuery->execute();
			//Return an associative array from the database and store it in $user variable
			$user = $passQuery->fetch(PDO::FETCH_ASSOC);

			//If an array of data is returned
			if($user){

				//Store the hashed password from the database and concatenate the salt
				//to test against user input
				$setPassword = $user['password'].$user['salt'];
				$inputPassword = crypt($password, $setPassword).$user['salt'];

				//If the passwords match, store the username in session array. Set login status to true
				if($inputPassword == $setPassword){
					$_SESSION['login'] = 'true';
	    			$_SESSION['username'] = $username;
					header('location: userHome.php');
				}
				else{
					echo "Incorrect username or password </br>";
				}
			}
		}

		else{
			echo "Please enter your username and password";
		}
	}

	//Logout function. Destroys session and redirects to login page
	public function Logout(){

		session_destroy();
		header('location: index.php');
		echo "You have been successfully logged out";
	}

	//Register function. Gets passed username, password, and email address from form input.
	public function Register($username, $password, $email){

		if(!empty($username) && !empty($password) && !empty($email)){

			//Calls cryptPass function and passes in the users input password
			$hashedPass = cryptPass($password);

			//Prepared sql statement
			$st = $this->db->prepare("INSERT INTO users2 (username, password, email, salt) VALUES (?, ?, ?, ?)");

			//Binds user inputs into prepared statement
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