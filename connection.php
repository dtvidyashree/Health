<?php

//Connent to perfumes database
		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$dbname = 'Health';

		$conn = mysqli_connect($dbhost, $dbuser,$dbpass, $dbname);


		if (!$conn)
		{

			die("Connection failed: " . mysqli_connect_error());
		}


?>