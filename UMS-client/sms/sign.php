<?php
	session_start();
	include "connection.php";
	
	
	
	if(isset($_POST["username"]) && isset($_POST["password"])){
		
		$sql="SELECT * FROM user where job='student'";
		$result = mysqli_query($conn, $sql);
		while($row=mysqli_fetch_assoc($result)){
		
		
		if($_POST["username"]==$row["username"] && $_POST["password"]==$row["password"] ){
		
		$_SESSION["username"]=$_POST["username"];
		
		header("Location: index.php");
		}
	}
	}
	
	

	
	

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Student Management System</title>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<link rel="stylesheet" href="style/sign-style.css"/>
			<link rel="icon" type="image" href="img/login.png" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
	


		
		<form id="login"  action="sign.php" method="POST">
			<h1 style="color:red">SMS LOGIN</h1>
			
			<input type="text" name="username" placeholder="username" required />
			<input type="password" name="password" placeholder="password" required />
			<input type="submit" value="Log in" name="loginput"/>
		</form>
		
		
		
		
		<script>
			
			$(document).ready(function(){
				$("#login").show();
			});
		
		</script>
		
	
		
	</body>
</html>