<?php 
	session_start();

	// $timezone = date_default_timezone_set("Asia/Dhaka");
	$conn = new mysqli("localhost", "root","", "cse471");
	$msg = "";

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$userType = $_POST['userType'];

		$sql = "SELECT * FROM user WHERE username=? AND password=? AND type=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param("sss",$username, $password, $userType);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		// $date_added = date("Y-m-d H:i:s");
		// $update = "update users set last_login='$date_added where username='$username'";
		// $run = mysqli_query($conn, $update);


		session_regenerate_id();
		$_SESSION['username'] = $row['username'];
		$_SESSION['role'] = $row['type'];
		session_write_close();

		$query = "UPDATE user SET last_login=NOW() WHERE username='$username' LIMIT 1";
		$result_set = mysqli_query($conn, $query);

		if($result->num_rows==1 && $_SESSION['role']=="admin"){
			header("location:admin/admin.php");
			exit;
		}else if($result->num_rows==1 && $_SESSION['role']=="doctor"){
			header("location:doctor/index.php");
			exit;
		}else if($result->num_rows==1 && $_SESSION['role']=="technician"){
			header("location:technician/predict.php");
			exit;
		}else{
			$msg = "Invalid username or password";
		}
	}
 ?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Log In</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="bg-dark">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5 bg-light mt-5 px-0">
				<h3 class="text-center text-light bg-danger p-3">Log In</h3>
				<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="p-4">
					<div class="form-group">
						<input type="text"
						 name="username"
						 class="form-control form-control-lg" placeholder="Enter Username" required>
					</div>

					<div class="form-group">
						<input type="password"
						 name="password"
						 class="form-control form-control-lg" placeholder="Enter Password" required>
					</div>

					<div class="form-group lead">
						<label for="User Type">
							Log In as:
						</label>
						<br>
						<input type="radio"
						name="userType"
						value="admin"
						class="custom-radio" required>&nbsp; Admin

						<input type="radio"
						name="userType"
						value="doctor"
						class="custom-radio" required>&nbsp; Doctor

						<input type="radio"
						name="userType"
						value="technician"
						class="custom-radio" required>&nbsp; Technician
					</div>

					<div class="form-group">
						<input type="submit" name="login" class="btn btn-danger btn-block">
					</div>
					<h5 class="text-danger text-center"><?= $msg;  ?></h5>
				</form>
			</div>
		</div>
	</div>
</body>
</html>