<?php
include("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// username and password sent from form
	
	$myusername = mysqli_real_escape_string($db, $_POST['username']);
	$mypassword = mysqli_real_escape_string($db, $_POST['password']);
	$mypassword = md5($mypassword); // Hashes whatever string was entered in password field to md5
	
	$sql = "SELECT user_id FROM users WHERE username = '$myusername' and password = '$mypassword'";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$active = $row['active'];
	
	$count = mysqli_num_rows($result);
	
	// If result matched $myusername and $mypassword, table row must be 1 row
	if ($count == 1) {
		$_SESSION['login_user'] = $myusername;
		
		header("location: ../models/dashboard.php");
	} else {
		$error = "Your Login Name or Password is invalid";
	}
}
?>

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
	      integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link href="../style.css" rel="stylesheet">
</head>

<body>
<nav id="navbar-container" class="navbar navbar-expand-lg fixed-top navbar-dark bg-light">
	<a class="navbar-brand" href="#">Tom and Adam's Ice Cream</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
	        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">About Us</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Pricing</a>
			</li>
		</ul>
		<button id="loginButton" class="btn btn-outline-light my-2 my-sm-0">Log In</button>
	</div>
</nav>

<div id="login-screen" class="jumbotron vertical-center">
	<div id="login-container" class="container">
		<h1 id="login-header" class="minty-text"> Login </h1>
		<form action="" method="post">
			<div class="form-group">
				<label class="col-form-label loginText minty-text">UserName :</label>
				<input class="box form-control col-sm-4" type="text" name="username" placeholder="Username"/><br/><br/>
			</div>
			<div class="form-group">
				<label class="col-form-label loginText minty-text">Password :</label>
				<input class="box form-control col-sm-4" type="password" name="password" placeholder="Password"/><br/><br/>
			</div>
			<input id="login-submit-button" class="btn" type="submit" value=" Submit "/><br/>
		</form>

		<div> <span id="login-error" class="loginText minty-text"><?php echo $error; ?></span></div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>

</body>
</html>
