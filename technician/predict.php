<?php 
	session_start();

  if(!isset($_SESSION['username']) || $_SESSION['role']!="technician"){
    header("location:../index.php");
  }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<meta charset="utf-8">
<title>Pneumonic X-Ray Analyzer</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Use the power of Machine Learning to diagnose pneumonic x-ray images.">


<!--Code to prevent the browser from caching the page-->
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
<meta http-equiv="Pragma" content="no-cache"/>
<meta http-equiv="Expires" content="0"/>





<!--CSS Stylesheets-->
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/dr.css">

<!--Link to Font Awesome icons-->
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.4.2/css/all.css' integrity='sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns' crossorigin='anonymous'>

<!--Link to fonts from google fonts-->
<link href="https://fonts.googleapis.com/css?family=Oswald:300" rel="stylesheet">


<link rel="shortcut icon" type="image/png" href="robotfavicon.png">




<style>
html,body,h2,h3,h4 {font-family: Helvetica, sans-serif}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>


<body class="w3-pale-blue">
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


<!-- w3-content defines a container for fixed size centered content,
and is wrapped around the whole page content. -->
<div class="w3-content card" style="max-width:960px">



<!-- 1. HOME PAGE TAB -->
<div class="tabbed w3-animate-opacity w3-white" id="home">



<!-- Header -->
<div class="w3-center title adjust-fontcolor logo">
	
  <h1 class="display-3">Pneumonic X-Ray<br>Analyzer</h1>

  
  
  <p class="lead">
  <kbd>Powered by TensroflowJS</kbd>
</p>
</div>




<!-- Front page image -->
<!-- This image will be replaced once the js code runs. -->
<div class="w3-center">
	<img id="selected-image" class="w3-round adjust-image" src="assets/person1_bacteria_1.jpg" width="300" alt=""> 
</div> 


<div class="w3-center">
	<div class="progress-bar w3-text-teal">Model is Loading...</div>
</div>


<div class="w3-center add-padding w3-border add-margin side-margin w3-round w3-pale-blue">
		
	<h5 class='new-font'>Results</h5>
	<ol class='w3-left-align' id='prediction-list'></ol>

	<button onclick="copyToClipboard('#prediction-list')" style="position: relative; margin: -40px 0px 50px 330px" type="button" class="btn btn-primary btn-sm click-me" id="btnCopy">Copy</button>

		
</div>


<!-- Button -->
<div id="btnn" class="w3-center bottom-padding">
	
	<button class="w3-btn w3-purple w3-round w3-margin-bottom adjust-spacing w3-hover-red btn-font w3-padding w3-space-letters w3-card-4" onclick="setTimeout(simulateClick.bind(null, 'image-selector'), 200)"><i class='fas fa-camera w3-padding-right' style='font-size:15px'></i><b>Submit an X-Ray Scan</b></button>
	<p class="w3-text-teal">jpeg or png</p>
</div> 







<div class='w3-padding'>
	<p class='w3-round w3-margin w3-margin-bottom w3-text-teal'>Please Note: This is a prototype to demonstrate the capabilities. In no way should this be used in a production environment.</p>
</div>


</div><!--END OF HOME PAGE TAB-->



<!-- We simulate clicks on these two. -->
<div class="hide">
	<button id='predict-button'>Predict</button>
</div>

<div class="hide">
	<input id="image-selector" type="file">
</div>
<!--===================================-->


	<!-- Load jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">

	</script>
	<!-- Load TensorFlow.js -->
	
	<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@0.13.3/dist/tf.min.js"> 
	</script>
	
	<!-- NOTE:
	Change the predict.js file name (change the number) each time you modify the predict.js file.
	This will force the browser to load the latest predict.js and not load
	the predict.js file that is in the user's cache.
	There is a stackoverflow soulution that says to add a version to the js file. 
	But it could be that some browsers can ignore the version. Therefore I think
	it's safer to change the js file name.-->
	<script src="jscript/target_classes.js"></script>
	<script src="jscript/predict.js"></script> 
	
	
	
</div> <!-- w3-content -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
	function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
</script>
</body>
</html>

