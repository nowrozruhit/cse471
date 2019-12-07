<?php 
	$connection = mysqli_connect("localhost", "root","");
	$db = mysqli_select_db($connection, 'cse471');

	if(isset($_POST['insertdata'])){
		$name = $_POST['name'];
		$age = $_POST['age'];
		$bp = $_POST['bp'];
		$weight = $_POST['weight'];
		$image = $_POST['image'];
		$prescription = $_POST['prescription'];
		$history = $_POST['history'];
		$diagnosis = $_POST['diagnosis'];

		$query = "INSERT INTO patients(`name`, `age`, `bp`, `weight`, `image`, `prescription`,`history`,`diagnosis` ) VALUES('$name', '$age', '$bp', '$weight', '$image', '$prescription', '$history', '$diagnosis')";
		$query_run = mysqli_query($connection, $query);

		if($query_run){
			echo '<script> alert("Data Saved"); </script>';
			header('Location:index.php');
		}else{
			echo mysqli_error($connection);
		}
	}
 ?>