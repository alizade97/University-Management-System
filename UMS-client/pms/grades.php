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
		<div style="margin:auto;" class="col-lg-8">
		<h1 style="text-align:center; margin:auto;"> Grades </h1>
		
		
<table style="margin-top:30px; margin-bottom:50px;" class="table table-striped table-hover table-responsive-sm">
    <thead class="thead-dark">
     
	 <tr>
        <th>Course</th>
        <th>Class</th>
		<th>SDF-1</th>
		<th>SDF-2</th>
		<th>SDF-3</th>
		<th>FF</th>
		<th>Final</th>
      </tr>
    </thead>
	
    <tbody  id="mytable">
		
		<?php
		
		$username = $_SESSION["username"];
		$sql6="SELECT *  FROM user WHERE username= '$username' and job='teacher'";
		$result6 = mysqli_query($conn, $sql6);
		$row6=mysqli_fetch_assoc($result6);
		$id = $row6["id"];
		
		$sql7="SELECT * FROM  ctc WHERE teacherId = '$id' ";
		$result7 = mysqli_query($conn, $sql7);
		while($row7=mysqli_fetch_assoc($result7)){
	
		
		/*
		$sql8="SELECT * FROM  ctc WHERE classId = '$classId' ";
		$result8 = mysqli_query($conn, $sql8);
		
		
		
		
		
		while($row8=mysqli_fetch_assoc($result8)){
		
		$teacherId = $row8["teacherId"];
		$courseId = $row8["courseId"];
		$classId = $row8["classId"];
		
		
		$sql3="SELECT * FROM course WHERE id = '$courseId' ";
		$result3 = mysqli_query($conn, $sql3);
		$row3=mysqli_fetch_assoc($result3);
		
		
		$sql4="SELECT * FROM user WHERE id = '$teacherId' ";
		$result4 = mysqli_query($conn, $sql4);
		$row4=mysqli_fetch_assoc($result4);
		
		
		$sql5="SELECT * FROM class WHERE id = '$classId' ";
		$result5 = mysqli_query($conn, $sql5);
		$row5=mysqli_fetch_assoc($result5);*/
		
		
		
		
		
		?>
		<tr>

					<td><?php 
					
					$sql5="SELECT * FROM course WHERE id = '".$row7["courseId"]."' ";
					$result5 = mysqli_query($conn, $sql5);
					$row5=mysqli_fetch_assoc($result5);
			
					echo $row5["name"];?></td>
					<td><?php 
					
					$sql6="SELECT * FROM class WHERE id = '".$row7["classId"]."' ";
					$result6 = mysqli_query($conn, $sql6);
					$row6=mysqli_fetch_assoc($result6);
			
					echo $row6["name"];?></td>
		
					<td><a href="#sdf1<?php echo $row7["id"] ?>" data-toggle="modal" class="btn btn-danger"> Edit</a></td>
					
									<div class="modal fade" id="sdf1<?php echo $row7['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
										  
										  
										  <div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">SDF-1 Grade - <?php echo $row6["name"]." - "; echo $row5["name"] ?> </h5>
											
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
										  </div>
										  
										  
										<div class="modal-body">
									
									<?php
														$edit=mysqli_query($conn,"select * from addstudent where classId='".$row7['classId']."'");
														while($row25=mysqli_fetch_array($edit)){
													?>
											
											<form method="POST" action="addgradesdf1.php?id=<?php echo $row7['id']; ?>">
											
												 <?php   
															$sql9="SELECT * FROM user WHERE id = '".$row25["studentId"]."' ";
															$result9 = mysqli_query($conn, $sql9);
															$row9=mysqli_fetch_assoc($result9);
															
															
															echo "<input style ='width:40px; margin:0 20px;' type='text' name='topic' value='' />";
															echo $row9["fname"]." ".$row9["lname"] ;
															echo "<br/>";

															?>
												
											
										
											
											
														<?php }?>
										  </div>
										  
										  
										  
										  <div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Dismiss</button>
										  
											<button type="submit" style="color:white"   class="btn btn-primary"> Save </button> 
											
											</form>
										  </div>
										 
										</div>
									  </div>
									</div>
														
					
					
					
					
					
					
					
					
					
					
					<td><a href="#sdf2<?php echo $row7["id"] ?>" data-toggle="modal" class="btn btn-danger"> Edit</a></td>
					
					<div class="modal fade" id="sdf2<?php echo $row7['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
										  
										  
										  <div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">SDF-2 Grade - <?php echo $row6["name"]." - "; echo $row5["name"] ?> </h5>
											
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
										  </div>
										  
										  
										<div class="modal-body">
									
									<?php
														$edit=mysqli_query($conn,"select * from addstudent where classId='".$row7['classId']."'");
														while($row25=mysqli_fetch_array($edit)){
													?>
											
											<form method="POST" action="addgradesdf1.php?id=<?php echo $row7['id']; ?>">
											
												 <?php   
															$sql9="SELECT * FROM user WHERE id = '".$row25["studentId"]."' ";
															$result9 = mysqli_query($conn, $sql9);
															$row9=mysqli_fetch_assoc($result9);
															
															
															echo "<input style ='width:40px; margin:0 20px;' type='text' name='topic' value='' />";
															echo $row9["fname"]." ".$row9["lname"] ;
															echo "<br/>";

															?>
												
											
										
											
											
														<?php }?>
										  </div>
										  
										  
										  
										  <div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Dismiss</button>
										  
											<button type="submit" style="color:white"   class="btn btn-primary"> Save </button> 
											
											</form>
										  </div>
										 
										</div>
									  </div>
									</div>
					<td><a href="#sdf3<?php echo $row7["id"] ?>" data-toggle="modal" class="btn btn-danger"> Edit</a></td>
					
					<div class="modal fade" id="sdf3<?php echo $row7['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
										  
										  
										  <div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">SDF-3 Grade - <?php echo $row6["name"]." - "; echo $row5["name"] ?> </h5>
											
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
										  </div>
										  
										  
										<div class="modal-body">
									
									<?php
														$edit=mysqli_query($conn,"select * from addstudent where classId='".$row7['classId']."'");
														while($row25=mysqli_fetch_array($edit)){
													?>
											
											<form method="POST" action="addgradesdf1.php?id=<?php echo $row7['id']; ?>">
											
												 <?php   
															$sql9="SELECT * FROM user WHERE id = '".$row25["studentId"]."' ";
															$result9 = mysqli_query($conn, $sql9);
															$row9=mysqli_fetch_assoc($result9);
															
															
															echo "<input style ='width:40px; margin:0 20px;' type='text' name='topic' value='' />";
															echo $row9["fname"]." ".$row9["lname"] ;
															echo "<br/>";

															?>
												
											
										
											
											
														<?php }?>
										  </div>
										  
										  
										  
										  <div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Dismiss</button>
										  
											<button type="submit" style="color:white"   class="btn btn-primary"> Save </button> 
											
											</form>
										  </div>
										 
										</div>
									  </div>
									</div>
					<td><a href="#ff<?php echo $row7["id"] ?>" data-toggle="modal" class="btn btn-danger"> Edit</a></td>
					
					<div class="modal fade" id="ff<?php echo $row7['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
										  
										  
										  <div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">FF Grade - <?php echo $row6["name"]." - "; echo $row5["name"] ?> </h5>
											
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
										  </div>
										  
										  
										<div class="modal-body">
									
									<?php
														$edit=mysqli_query($conn,"select * from addstudent where classId='".$row7['classId']."'");
														while($row25=mysqli_fetch_array($edit)){
													?>
											
											<form method="POST" action="addgradesdf1.php?id=<?php echo $row7['id']; ?>">
											
												 <?php   
															$sql9="SELECT * FROM user WHERE id = '".$row25["studentId"]."' ";
															$result9 = mysqli_query($conn, $sql9);
															$row9=mysqli_fetch_assoc($result9);
															
															
															echo "<input style ='width:40px; margin:0 20px;' type='text' name='topic' value='' />";
															echo $row9["fname"]." ".$row9["lname"] ;
															echo "<br/>";

															?>
												
											
										
											
											
														<?php }?>
										  </div>
										  
										  
										  
										  <div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Dismiss</button>
										  
											<button type="submit" style="color:white"   class="btn btn-primary"> Save </button> 
											
											</form>
										  </div>
										 
										</div>
									  </div>
									</div>
					
					<td><a href="#final<?php echo $row7["id"] ?>" data-toggle="modal" class="btn btn-danger"> Edit</a></td>
					<div class="modal fade" id="final<?php echo $row7['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
										  
										  
										  <div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Final Grade - <?php echo $row6["name"]." - "; echo $row5["name"] ?> </h5>
											
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											  <span aria-hidden="true">&times;</span>
											</button>
										  </div>
										  
										  
										<div class="modal-body">
									
									<?php
														$edit=mysqli_query($conn,"select * from addstudent where classId='".$row7['classId']."'");
														while($row25=mysqli_fetch_array($edit)){
													?>
											
											<form method="POST" action="addgradesdf1.php?id=<?php echo $row7['id']; ?>">
											
												 <?php   
															$sql9="SELECT * FROM user WHERE id = '".$row25["studentId"]."' ";
															$result9 = mysqli_query($conn, $sql9);
															$row9=mysqli_fetch_assoc($result9);
															
															
															echo "<input style ='width:40px; margin:0 20px;' type='text' name='topic' value='' />";
															echo $row9["fname"]." ".$row9["lname"] ;
															echo "<br/>";

															?>
												
											
										
											
											
														<?php }?>
										  </div>
										  
										  
										  
										  <div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Dismiss</button>
										  
											<button type="submit" style="color:white"   class="btn btn-primary"> Save </button> 
											
											</form>
										  </div>
										 
										</div>
									  </div>
									</div>
				</tr>
        
	
        
	 
		
		<?php  } ?>
    </tbody>
  </table>
				
 </div>
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