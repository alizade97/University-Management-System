<?php 
	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: sign.php");
	}

	include "connection.php";
	
	if(isset($_GET["action"])) $action = $_GET["action"];
	else $action="";

	
	
	switch($action){
		case "logout":
			
			session_unset();
			session_destroy();
			header("Location: sign.php");
		break;
		
		case "grades":
			header("Location: grades.php");
		break;
		
		case "attendance":
			header("Location: attendance.php");
		break;
		
		case "library":
			header("Location: library.php");
		break;
		

		
		case "profile":
			header("Location: profile.php");
		break;
		
		case "home":
			header("Location: index.php");
		break;
		
	}

?>


<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Personal Management System</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="style/index-style.css"/>
		<link rel="icon" type="image" href="img/icon.png" />
	</head>
	
	
	<body >
	
	
		
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
		<a class="navbar-brand" href="?action=home">Personal Management System</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
			 
			<li class="nav-item">
				<a class="nav-link" href="?action=grades">Grades</a>
			  </li>
			
			<li class="nav-item">
				<a class="nav-link"href="?action=attendance">Attendance</a>
			  </li>
			 
			 <li class="nav-item">
				<a class="nav-link" href="?action=library">Library</a>
			  </li>
			  
			
			  
			  <li class="nav-item">
				<a class="nav-link" href="?action=profile">Profile</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="?action=logout">Log Out</a>
			  </li>
			  
			</ul>
			
		  </div>
		  </div>
		</nav>


  <div style="min-height:800px;" class="container1" >
		
	
  </div>

  
  
  
  
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; PMS <?php echo date("Y"); ?></p>
    </div>
  </footer>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		
	</body>
</html>