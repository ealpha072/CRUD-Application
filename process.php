<?php 
	$conn = mysqli_connect('localhost','root','','crud');
	
	if (isset($_POST['save'])){
		$name = $_POST['name'];
		$location = $_POST['location'];

		$sql = "INSERT INTO locations (name,location) VALUES ('$name','$location')";
		mysqli_query($conn,$sql);

	}
?>
