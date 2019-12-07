<?php 
	$id = $_GET['myVar'];
	
	$connection = mysqli_connect("localhost", "root","");
	$db = mysqli_select_db($connection, 'cse471');

	$query = "SELECT * FROM `patients` WHERE id=$id";

	$query_run = mysqli_query($connection, $query);
	$result=mysqli_fetch_array($query_run);
	
	echo '<img style="" src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';

 ?>