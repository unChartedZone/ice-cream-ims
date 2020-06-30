<?php
include('../login/session.php');
$name = $login_session;

function get_user_category($db,$name_parmaeter) {
	$category_query = "SELECT category from users WHERE username = '$name_parmaeter'";
	$logged_user_category = mysqli_query($db, $category_query); // Execute query for user's category
	$category_array = mysqli_fetch_assoc($logged_user_category); // Convert query result to an associative array
	$user_category = $category_array["category"];
	return $user_category;
}

// Begin Add A User Form Validation, only occurs if input is entered into form
if($_POST) {
	$entered_username = $_POST["username"];
	$entered_password = $_POST["password"];
	$entered_full_name = $_POST["fullName"];
	$entered_location = $_POST["location"];
	$entered_category = $_POST["category"];
	
	if ($entered_username == "") {
		$username_error = '<div class="alert alert-danger" role="alert"><strong>Uh Oh!</strong> Empty Username detected. </div>';
	}
	if ($entered_password == "") {
		$password_error = '<div class="alert alert-danger" role="alert"><strong>Uh Oh!</strong> Empty Password detected. </div>';
	}
	if ($entered_full_name == "") {
		$full_name_error = '<div class="alert alert-danger" role="alert"><strong>Uh Oh!</strong> Empty Full Name detected. </div>';
	}
	if ($entered_location == "") {
		$location_error = '<div class="alert alert-danger" role="alert"><strong>Uh Oh!</strong> Empty Location detected. </div>';
	}
	
	$valid_submission = ($username_error == "") && ($password_error == "") && ($full_name_error == "") && ($location_error == "");
	
	if ($valid_submission) {
		$entered_password = md5($entered_password); // Encrypt password
		// This is where the sql insertion will occur
		$random_pid = mt_rand(1,100000);
		$insert_query = "INSERT INTO users (user_id,fullname,location,phone,username,password,category) VALUES($random_pid,'$entered_full_name','$entered_location',619,'$entered_username','$entered_password','$entered_category');";
		/* $insert_result = mysqli_query($db, $insert_query); */
		if($insert_result = mysqli_query($db, $insert_query)) {
			$success_message = file_get_contents("../components/success-message.html");
		}
	}
	
}

if($_GET) {
    $username_to_delete = $_GET["deletedUsername"];
    $delete_query = "DELETE FROM users WHERE username = '$username_to_delete'";
    mysqli_query($db,$delete_query);
}
?>

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> Tom and Adam's Ice Cream </title>
	<?php echo file_get_contents("../components/bootstrap-css.html"); ?>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>

<?php
echo file_get_contents("../components/navbar.html");
?>

<div id="dashboard-homepage" class="container-fluid">
	<div class="row">
		<div id="dashboard-header" class="col-12">
			<h1 class="minty-text">Users</h1>
		</div>
	</div>
	<div id="areaToPrint">
		<table class="table table-striped table-dark icetrack-table">
			<thead>
			<tr>
				<th scope="col">Username</th>
				<th scope="col">Full Name</th>
				<th scope="col">Location</th>
				<th scope="col">Category</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$user_category = get_user_category($db,$name);
			if($user_category == "ADMINISTRATOR") {
				// Currently logged user is an administrator
				$query = "SELECT * FROM users";
			}
			else {
				// Logged user is a normie
				$query = "SELECT * FROM users WHERE category = 'NORMAL USER'";
				echo "<div id='invisible-buttons'></div>";
			}
			if ($result = mysqli_query($db, $query)) {
				while ($row = mysqli_fetch_assoc($result)) {
					echo '<tr>';
					echo '<td>' . $row["username"] . '</td>';
					echo '<td>' . $row["fullname"] . '</td>';
					echo '<td>' . $row["location"] . '</td>';
					echo '<td>' . $row["category"] . '</td>';
					echo '</tr>';
				}
			}
			?>
			</tbody>
		</table>
	</div>
	
	<div class="container-fluid form-components">
		<div class="icetrack-form-div">
			<div class="row">
				<div class="col-4">
					<form method="post">
						<div class="form-group">
							<button class="btn minty-button minty-dropdown-button btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
								<h1>Add an User <i class="fa fa-arrow-circle-down" aria-hidden="true"></i></h1>
							</button>
						</div>
						<div id="collapseExample" class="collapse">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control" id="username" name="username" placeholder="Username">
							</div>
							<?php echo $username_error; ?>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
							</div>
							<?php echo $password_error; ?>
							<div class="form-group">
								<label for="fullName">Full Name</label>
								<input type="text" class="form-control" id="fullName" name="fullName" placeholder="Full Name">
							</div>
							<?php echo $full_name_error; ?>
							<div class="form-group">
								<label for="location">Location</label>
								<input type="text" class="form-control" id="location" name="location" placeholder="Location">
							</div>
							<?php echo $location_error; ?>
							<div class="form-group">
								<label for="category">Category</label>
								<select class="form-control" id="category" name="category">
									<option>NORMAL USER</option>
									<option>ADMINISTRATOR</option>
								</select>
							</div>

							<div class="form-group">
								<button type="submit" class="btn minty-button">Submit</button>
							</div>
						</div>
					</form>
				</div>

				<div class="col-4">
					<form  method="get">
						<div class="form-group dropdown-button-container">
							<button id="deleteComponent" class="btn minty-button minty-dropdown-button btn-block" type="button" data-toggle="collapse" data-target="#deleteCollapse" aria-expanded="false" aria-controls="deleteCollapse">
								<h1>Delete an User <i class="fa fa-arrow-circle-down" aria-hidden="true"></i></h1>
							</button>
						</div>
						<div id="deleteCollapse" class="collapse">
							<div class="form-group">
								<label for="deletedUsername">Username</label>
								<input type="text" class="form-control" id="deletedUsername" name="deletedUsername" placeholder="Username">
							</div>
                            <div class="form-group">
                                <button type="submit" class="btn minty-button">Delete</button>
                            </div>
					</form>
				</div>
				<div class="col-4">
					<?php echo $success_message;?>
				</div>
            </div>
        </div>
	</div>
</div>

<?php echo file_get_contents("../components/bootstrap-js.html"); ?>
<script type="text/javascript" src="../script.js"></script>
</body>
</html>
