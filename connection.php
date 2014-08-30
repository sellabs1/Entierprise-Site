<!--
	Connection class. Declares database connection strings, and returns
	the data object containing them.
-->

<?php

class Connection{

	//Connection details
	private $db_host = '127.0.0.1',
			$db_name = 'sellabs1_temp',
			$db_username = 'sellabs1',
			$db_pass = '10005834';

	//dbConnect function. Returns the Data Object containing the database connection information
	public function dbConnect(){
		
		try
		{
			return new PDO("mysql:host=".$this->db_host.';dbname='.$this->db_name, 
							$this->db_username, $this->db_pass);
		}
		catch(PDOException $e){

			$e->getMessage();
		}
	}
}

?>