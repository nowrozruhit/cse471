<?php 
	$connection = mysqli_connect("localhost", "root","");
	$db = mysqli_select_db($connection, 'medical');

	if(isset($_POST['deletedata'])){

		$id = $_POST['delete_id'];

		$query = "DELETE FROM patients WHERE id='$id'";
		$query_run = mysqli_query($connection, $query);

		if($query_run){
			echo '<script> alert("Data Saved"); </script>';
			header('location:index.php');
		}else{
			echo mysqli_error($connection);
		}
	}
 ?>