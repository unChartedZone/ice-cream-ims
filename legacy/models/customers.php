<?php
include('../login/session.php');
$name = $login_session;

// Begin Customer Form Validation for adding and removing customers
if($_POST) {
	$entered_full_name = $_POST["fullName"];
	$entered_location = $_POST["location"];
	$entered_phone_number = $_POST["phone"];
	
	if ($entered_full_name == "") {
		$full_name_error = '<div class="alert alert-danger" role="alert"><strong>Uh Oh!</strong> Empty Full Name detected. </div>';
	}
	if ($entered_location == "") {
		$location_error = '<div class="alert alert-danger" role="alert"><strong>Uh Oh!</strong> Empty Location detected. </div>';
	}
	if ($entered_phone_number == "") {
		$phone_number_error = '<div class="alert alert-danger" role="alert"><strong>Uh Oh!</strong> Empty Phone Number detected. </div>';
	}
	
	
	$valid_submission = ($full_name_error == "") && ($location_error == "") && ($phone_number_error == "");
	
	if ($valid_submission) {
		// Generate a random hash for customer code
		// Uses the function uniqid() which creates a 13 long string, then
		// it is truncated at the 7th index to a length of 6
		$generated_customer_code  = substr(uniqid(),7, 6);
		
		$insert_query = "INSERT INTO customers (customercode, fullname, location, phone) VALUES('$generated_customer_code','$entered_full_name','$entered_location',$entered_phone_number);";
		if($insert_result = mysqli_query($db, $insert_query)) {
			$success_message = file_get_contents("../components/success-message.html");
		}
	}
}

// Get form will handle deleting customers
if($_GET) {
	$customer_to_delete = $_GET["deletedCustomer"];
	$delete_query = "DELETE FROM customers WHERE customercode = '$customer_to_delete'";
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
echo file_get_contents("../components/navbar.html")
?>

<div id="dashboard-homepage" class="container-fluid">
	<div class="row">
		<div id="dashboard-header" class="col-12">
			<h1 class="minty-text">Customers</h1>
		</div>
	</div>
	<div id="areaToPrint">
		<table class="table table-striped table-dark icetrack-table">
			<thead>
			<tr>
				<th scope="col">Customer Code</th>
				<th scope="col">Full Name</th>
				<th scope="col">Location</th>
				<th scope="col">Phone</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$query = "SELECT * FROM customers";
			if ($result = mysqli_query($db, $query)) {
				while ($row = mysqli_fetch_assoc($result)) {
					echo '<tr>';
					echo '<td>' . $row["customercode"] . '</td>';
					echo '<td>' . $row["fullname"] . '</td>';
					echo '<td>' . $row["location"] . '</td>';
					echo '<td>' . $row["phone"] . '</td>';
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
						<div class="form-group dropdown-button-container">
							<button class="btn minty-button minty-dropdown-button btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
								<h1>Add a Customer <i class="fa fa-arrow-circle-down" aria-hidden="true"></i></h1>
							</button>
						</div>
						<div id="collapseExample" class="collapse">
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
								<label for="phone">Phone Number</label>
								<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
							</div>
							<?php echo $phone_number_error; ?>

							<div class="form-group">
								<button type="submit" class="btn minty-button">Submit</button>
							</div>
						</div>
					</form>
				</div>

				<div class="col-4">
					<form  method="get">
						<div class="form-group">
							<button id="deleteComponent" class="btn minty-button minty-dropdown-button btn-block" type="button" data-toggle="collapse" data-target="#deleteCollapse" aria-expanded="false" aria-controls="deleteCollapse">
								<h1>Delete a Customer <i class="fa fa-arrow-circle-down" aria-hidden="true"></i></h1>
							</button>
						</div>
						<div id="deleteCollapse" class="collapse">
							<div class="form-group">
								<label for="deletedCustomer">Customer Code</label>
								<input type="text" class="form-control" id="deletedCustomer" name="deletedCustomer" placeholder="Customer to delete">
							</div>
							<div class="form-group">
								<button type="submit" class="btn minty-button">Delete</button>
							</div>
					</form>
				</div>
			</div>
			<div class="col-4">
				<?php echo $success_message;?>
			</div>
		</div>
	</div>
</div>

<?php echo file_get_contents("../components/bootstrap-js.html"); ?>
<script type="text/javascript" src="../script.js"></script>
</body>

</html>
