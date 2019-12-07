

<?php 
session_start();
  if(!isset($_SESSION['username']) || $_SESSION['role']!="technician"){
    header("location:../index.php");
  }

    // $timezone = date_default_timezone_set("Asia/Dhaka");
$conn = new mysqli("localhost", "root","", "cse471");
$msg = "";

if(isset($_POST['insert'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $bp = $_POST['bp'];
    $weight = $_POST['weight'];
    $history = $_POST['history'];
    $diagnosis = $_POST['diagnosis'];
    $image = $_POST['image'];

    $query = "INSERT INTO patients(`name`, `age`, `bp`, `weight`,`history`,`diagnosis`,`image` ) VALUES('$name', '$age', '$bp', '$weight', '$history', '$diagnosis', '$image')";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
            // echo '<script> alert("Data Saved"); </script>';
            // header('Location:index.php');
    }else{
        echo mysqli_error($conn);
    }

        // $date_added = date("Y-m-d H:i:s");
        // $update = "update users set last_login='$date_added where username='$username'";
        // $run = mysqli_query($conn, $update);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert Patient Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="predict.php">Home</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="insert.php">Insert<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <a href="../logout.php"><button type="button" class="btn btn-primary">Log Out</button></a>
  </div>
</nav>
    <br>
    <br>
    <br>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="main-form needs-validation" novalidate>
        <div class="form-group">
            <label for="name">Patient Name</label>
            <input type="text" name="name" id="name" class="form-control">
            
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" name="age" id="age" class="form-control">
                    
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="bp">Blood Pressure</label>
                    <input type="text" name="bp" id="bp" class="form-control">
                    
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="weight">Weight</label>
                    <input type="text" name="weight" id="weight" class="form-control">
                    
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label for="history">Medical History</label>
            <input type="text" name="history" id="history" class="form-control">
        </div>

        <div class="form-group">
            <label for="diagnosis">Diagnosis</label>
            <input type="text" name="diagnosis" id="diagnosis" class="form-control">
        </div>

        <div class="form-group">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
        </div>

        <div class="custom-file">
            <input name="image" type="file" class="custom-file-input" id="inputGroupFile01">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
    </div>
</div>
    <button type="submit" name="insert" class="btn btn-primary">Submit</button>
</form>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
crossorigin="anonymous"></script>


</body>

</html>