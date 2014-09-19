<!--
	Connection class. Declares database connection strings, and returns
	the data object containing them.
-->

<?php

class Connection
{
	//Connection details
	private $db_host = 'crucial.ict.op.ac.nz',
			$db_name = 'CardDatabase',
			$db_username = 'crucialadmin',
			$db_pass = 'XDsYG2pjvSUtBLfh';

	//dbConnect function. Returns the Data Object containing the database connection information
	public function dbConnect(){
		
		try
		{
			return new PDO("mysql:host=".$this->db_host.';dbname='.$this->db_name, 
							$this->db_username, $this->db_pass);
		}
		catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
}

?>