  <?php
  include "connection.php";
	
	$id=$_GET['id'];
	
	
	foreach($_POST as $key => $value){
    echo $key . ": " . $value . "<br />";
}
	
		$sql = "UPDATE topic SET disname = '$disname' , topic = '$topic'  WHERE id = '$id'";
			mysqli_query($conn, $sql);

		 //header('location:grades.php');
	
  

  
  ?>
  