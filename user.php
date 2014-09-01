<!--
	User class. Contains Login, Logout, and register functions.
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
		if (session_id() == '') {
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
			$passQuery = $this->db->prepare("SELECT * FROM User WHERE Username = ?");
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
				$setPassword = $user['Password'].$user['Salt'];
				$inputPassword = crypt($password, $setPassword).$user['Salt'];

				//If the passwords match, store the username in session array. Set login status to true
				if($inputPassword == $setPassword){
					$_SESSION['login'] = 'true';
	    			$_SESSION['username'] = $username;
	    			
	    			//Checks to see if the user has admin access
	    			if($user['AdminAccess'] < 1){
	    				header('location: userHome.php');
	    			}
	    			else{
	    				header('location: adminHome.php');
	    			}
				}
				else{
					echo "Incorrect username or password </br>";
				}
			}
			else{
				echo "Incorrect username or password";
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

			//Sets admin flag to false
			$adminAccess = 0;

			//Prepared sql statement
			$st = $this->db->prepare("INSERT INTO User (Username, Password, Email, Salt, AdminAccess) VALUES (?, ?, ?, ?, ?)");

			//Binds user inputs into prepared statement
			$st->bindParam(1, $username);
			$st->bindParam(2, $hashedPass[0]);
			$st->bindParam(3, $email);
			$st->bindParam(4, $hashedPass[1]);
			$st->bindParam(5, $adminAccess);

			$result = $st->execute();
			var_dump($result);

			if($result){
				echo("<script>alert('Success. You have been registered');</script>");
				echo("<script>setTimeout(\"location.href = 'index.php';\",500);</script>");
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