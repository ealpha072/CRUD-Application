<?php 
	session_start();
	$name = '';
	$location = '';
	$conn = mysqli_connect('localhost','root','','crud');
	
	
	if (isset($_POST['save'])){
		$name = $_POST['name'];
		$location = $_POST['location'];

		$sql = "INSERT INTO locations (name,location) VALUES ('$name','$location')";
		mysqli_query($conn,$sql);

		$_SESSION['message'] = "Record saved";
		$_SESSION['msg_type'] = "success";

		header("location: index.php");

	}

	if(isset($_GET['delete'])){
		$id = $_GET['delete'];

		$delquery = "DELETE FROM locations WHERE id = $id";
		mysqli_query($conn, $delquery);

		$_SESSION['message'] = "Record deleted";
		$_SESSION['msg_type'] = 'danger';

		header("location: index.php");
	}

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$query = "SELECT * FROM locations WHERE id=$id";

		$result = mysqli_query($conn, $query);

		if(count(mysqli_fetch_assoc($result))==1){
			$row = mysqli_fetch_array($result);
			$name = $row['name'];
			$location =$row['location'];
		}
	}
?>
