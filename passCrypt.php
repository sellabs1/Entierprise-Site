<!--
	Password encryption function. Encrypts the passed in input, and adds a randomized salt string.
	Returns an array with the encrypted password, and the unique salt string.
-->

<?php

	function cryptPass($input, $rounds = 9){

		$salt = "";
		//Merges all integers, uppercase, and lowercase characters into an array.
		$saltChars = array_merge(range('A', 'Z'), range('a', 'z'), range(0,9));
		
		//Generates the random 22 character salt string 
		for($i = 0; $i < 22; $i++){
			$salt .= $saltChars[array_rand($saltChars)];
		}

		//Returns an array with the encrypted password, and the unique salt
		return array(crypt($input, sprintf('$2y$%02d$', $rounds).$salt), $salt);
	}

?>