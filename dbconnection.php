<?php
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'veripay';
	
	$conn = mysqli_connect($servername,$username,$password) or die("Connect failed: %s\n". $conn -> error);
	$connection = $conn->query("use ".$database);
	
	if(!$connection)
	{
		echo "Failed to use database";
	}
?>