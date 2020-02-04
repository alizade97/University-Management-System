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


  <div style="min-height:800px;" class="container1" >
		<div style="margin:auto;" class="col-lg-8">
		<h1 style="text-align:center; margin:auto;"> Attendance</h1>
		
		
<table style="margin-top:30px; margin-bottom:50px;" class="table table-striped table-hover table-responsive-sm">
    <thead class="thead-dark">
     
	 <tr>
        <th>Course</th>
        <th>Teacher</th>
		<th>Show</th>
      </tr>
    </thead>
	
    <tbody  id="mytable">
		
		<?php
		
		$username = $_SESSION["username"];
		$sql6="SELECT *  FROM user WHERE username= '$username' and job='student'";
		$result6 = mysqli_query($conn, $sql6);
		$row6=mysqli_fetch_assoc($result6);
		$id = $row6["id"];
		
		$sql7="SELECT * FROM  addstudent WHERE studentId = '$id' ";
		$result7 = mysqli_query($conn, $sql7);
		$row7=mysqli_fetch_assoc($result7);
		$classId = $row7["classId"];
		
		
		$sql8="SELECT * FROM  ctc WHERE classId = '$classId' ";
		$result8 = mysqli_query($conn, $sql8);
		
		
		
		
		
		while($row8=mysqli_fetch_assoc($result8)){
		
		$teacherId = $row8["teacherId"];
		$courseId = $row8["courseId"];
		//echo $row8["courseId"];
		$sql3="SELECT * FROM course WHERE id = '$courseId' ";
		$result3 = mysqli_query($conn, $sql3);
		$row3=mysqli_fetch_assoc($result3);
		
		
		$sql4="SELECT * FROM user WHERE id = '$teacherId' ";
		$result4 = mysqli_query($conn, $sql4);
		$row4=mysqli_fetch_assoc($result4);
		?>
		<tr>

					<td><?php echo $row3["name"];?></td>
					<td><?php echo $row4["fname"]; echo " ".$row4["lname"];?></td>		
					<td><a href="#attendance<?php echo $row8["id"] ?>" data-toggle="modal" class="btn btn-danger"> Show</a></td>
									
									
							 <div class="modal fade" id="attendance<?php echo $row8['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
									  
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Attendance Scores - <?php echo $row3["name"]; ?> - <?php echo $row4["fname"]; echo " "; echo $row4["lname"]; ?> </h5>
										
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  
									<div class="modal-body">
									<?php 
													$edit=mysqli_query($conn,"SELECT * FROM attendance WHERE courseId='$courseId' AND studentId='$id' AND teacherId='$teacherId';");
													while($row12=mysqli_fetch_array($edit)){
													
													
												echo $row12["date"];
												echo " --- ";
												echo $row12["absent"];
												echo "<br/>";
												

												}?>
											
										
							
											
									  </div>
									  
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Dismiss</button>
									  
										
										
										
									  </div>
									 
									</div>
								  </div>
								</div>		
									
									
									
									
									
									
				</tr>
        
	
        
	 
		
		<?php } /*}*/ ?>
    </tbody>
  </table>
				
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