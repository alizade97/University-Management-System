<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ums";
	
	
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	mysqli_set_charset($conn, "utf8");
	

?>