<?php 
	$connection = mysqli_connect("localhost", "root","");
	$db = mysqli_select_db($connection, 'cse471');

	if(isset($_POST['updatedata'])){

		$id = $_POST['update_id'];
		$name = $_POST['name'];
		$age = $_POST['age'];
		$bp = $_POST['bp'];
		$weight = $_POST['weight'];
		$image = $_POST['image'];
		$prescription = $_POST['prescription'];
		$history = $_POST['history'];
		$diagnosis = $_POST['diagnosis'];

		$query = "UPDATE patients SET name='$name', age='$age', bp='$bp', weight='$weight', prescription='$prescription', history='$history', diagnosis='$diagnosis' WHERE id='$id'";
		$query_run = mysqli_query($connection, $query);

		if($query_run){
			echo '<script> alert("Data Saved"); </script>';
			header('location:index.php');
		}else{
			echo mysqli_error($connection);
		}
	}
 ?>