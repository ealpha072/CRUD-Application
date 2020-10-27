<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<?php require_once 'process.php'; ?>
	<?php if(isset($_SESSION['message'])): ?>

	<div class="alert alert-<?php echo $_SESSION['msg_type']?>">
		<?php echo $_SESSION['message'];
		unset($_SESSION['message']);
		?>
	</div>
	<?php endif;?>

	<div class="container">
	<?php
		$conn = mysqli_connect('localhost','root','','crud');
		$myquery = "SELECT * FROM locations";
		$results = mysqli_query($conn,$myquery);
	
		/*$resultArray = mysqli_fetch_assoc($results);
		show($resultArray);
		show($resultArray);*/
	?>
	<div class="row justify-content-center"> 
		<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Location</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<?php
				while($row = mysqli_fetch_assoc($results)): ?>
					<tr>
						<td><?php echo $row['name'];?></td>
						<td><?php echo $row['location'];?></td>
						<td>
							<a href="index.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>
							<a href="process.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				<?php endwhile;?>
		</table>
	</div>
	<?php
		function show($array){
			echo "<pre>";
			print_r($array);
			echo "</pre>";
		}
	?>
	<div class="row justify-content-center">
		<form action="process.php" method="post">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control" value="<?php echo $name;?>" placeholder="Enter your name">
			</div>
			<div class="form-group">
				<label for="location">Location</label>
				<input type="text" name="location" class="form-control" placeholder="Enter Location" value="<?php echo $location;?>">
			</div>
			<div class="form-group">
				<?php if($update==true): ?>
					<button class="btn btn-primary" name="update">Update</button>
				<?php else:?>
					<button class="btn btn-primary" name="save">Save</button>
				<?php endif ?>
			</div>
		</form>
	</div>
</div>
</body>
</html>
