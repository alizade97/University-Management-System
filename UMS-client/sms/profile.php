<?php 
	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: sign.php");
	}

	include "connection.php";
	$username = $_SESSION["username"];
	
	
	if(isset($_GET['edit']) && isset($_GET["fname"]) && isset($_GET["lname"]) && isset($_GET["country"])  && isset($_GET["city"]) && isset($_GET["birth"]) && isset($_GET["gender"]) && isset($_GET["password"])){
	
	
	$fname = $_GET["fname"];
	$lname = $_GET["lname"];
	$city = $_GET["city"];
	$country = $_GET["country"];
	$birth = $_GET["birth"];
	$gender = $_GET["gender"];
	$password = $_GET["password"];
	
	
	
	
	$sql = "UPDATE user SET fname = '$fname', lname='$lname', country = '$country', city='$city', birth='$birth', sex='$gender', password='$password' WHERE username='$username' AND job='student'";
			
	mysqli_query($conn, $sql);
			
			header("Location: profile.php");
			exit();
	}
	
	
	
	
	
	
	
	
	
	
	
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
		
		case "transcript":
			header("Location: transcript.php");
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
		<title>Student Management System</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="style/index-style.css"/>
		<link rel="icon" type="image" href="img/icon.png" />
	</head>
	
	
	<body >
	
	
		 <nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
		<a class="navbar-brand" href="?action=home">Student Management System</a>
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
				<a class="nav-link" href="?action=transcript">Transcript</a>
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

<div style="min-height:800px;" class="container1">
		<div class="row">
   
    <div style="margin-top:10px;" class="col-lg-2">
		  <div style="margin-top:20px;" class="list-group">
         
			<button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1"> <a href="#" style="color:white;" >Edit Profile</a></button>
		</div>
	</div>

	
	
	
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
	  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
	  
	  
	  
	  <div class="modal-body">
    <form id="login"  action="profile.php" method="GET">
			
			
			  <?php  
			  $user = $_SESSION['username'];
			  $sql2="SELECT * FROM user WHERE username='$user' AND job='student'";
		$result2 = mysqli_query($conn, $sql2);
		while($row2=mysqli_fetch_array($result2)){
			  ?>
			  <h6> First Name: </h6>
		
			  <input type="text" name="fname" value=" <?php echo $row2['fname'] ?>"  > </input>
			  <h6> Last Name: </h6>
			  <input type="text" name="lname" value="<?php echo $row2["lname"] ?>"  ></input>
			   <h6> Country: </h6>
			  <input type="text" name="country" value="<?php echo $row2["country"] ?>"  ></input>
			  <h6> City: </h6>
			  <input type="text" name="city" value="<?php echo $row2["city"] ?>"  ></input>
			   <h6> birth: </h6>
			  <input type="text" name="birth" value="<?php echo $row2["birth"] ?>"  ></input>
			  <h6> gender: </h6>
			  <input type="text" name="gender" value="<?php echo $row2["sex"] ?>"  ></input>
			   <h6> Password: </h6>
			  <input type="text" name="password" value="<?php echo $row2["password"] ?>"  ></input>
			  
			  
			  
			  
			  
		<?php }?>
			
			
			
			
      </div>
      
	  
	  
	  
	  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Dismiss</button>
        <input  value="Save" type="submit" name="edit" class="btn btn-primary"/>
        
      </div>
	  </form>
    </div>
  </div>
</div>
	
	
	
	
	
	
	
	
	
      
	  
	  <div style="margin:auto;" class="col-lg-8">
		<h1 style="text-align:center; margin:auto;"> Profile </h1>
		
		
<table style="margin-top:30px; margin-bottom:50px;" class="table table-striped table-hover table-responsive-sm">
    <thead class="thead-dark">
     
	 <tr>
        <th>Profile Info</th>
        <th></th>
      </tr>
    </thead>
	
    <tbody  id="mytable">
		
		<?php
		
		$sql="SELECT *  FROM user WHERE username= '$username' AND job ='student' ";
		$result = mysqli_query($conn, $sql);
		
		while($row=mysqli_fetch_assoc($result)){
		?>
		
      <tr>
		<td>First Name</td>
        <td><?php echo $row["fname"] ?></td>
	</tr>
        
	 <tr>
		<td>Last Name</td>
		<td><?php echo $row["lname"] ?></td>
	</tr>
		  <tr>
		<td>Country</td>
        <td><?php echo $row["country"] ?></td>
	</tr>
        
	 <tr>
		<td>City</td>
		<td><?php echo $row["city"] ?></td>
	</tr>
	
	  <tr>
		<td>Birth</td>
        <td><?php echo $row["birth"] ?></td>
	</tr>
        
	 <tr>
		<td>Gender</td>
		<td><?php echo $row["sex"] ?></td>
	</tr>
		  <tr>
		<td>Username</td>
        <td><?php echo $row["username"] ?></td>
	</tr>
        
	 <tr>
		<td>Password</td>
		<td><?php echo $row["password"] ?></td>
	</tr>
	
	  <tr>
		<td>Job</td>
        <td><?php echo $row["job"] ?></td>
	</tr>
        
	 
		
		<?php } ?>
    </tbody>
  </table>
				
  		 </div>
	  
    </div>
  </div> 

		
  
  
  
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; SMS <?php echo date("Y"); ?></p>
    </div>
  </footer>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		
	</body>
</html>