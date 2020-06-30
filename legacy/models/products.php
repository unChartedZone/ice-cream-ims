<?php
include('../login/session.php');
$name = $login_session;
$success_message = "";

if ($_POST) {
	if (!$_POST["productName"]) {
		$product_name_error = '<div class="alert alert-danger" role="alert"><strong>Uh Oh!</strong> Empty Product Name detected. </div>';
	}
	if (!$_POST["costPrice"]) {
		$cost_price_error = '<div class="alert alert-danger" role="alert"><strong>Uh Oh!</strong> Empty Cost Price detected. </div>';
	}
	if (!$_POST["sellingPrice"]) {
		$selling_price_error = '<div class="alert alert-danger" role="alert"><strong>Uh Oh!</strong> Empty Selling Price detected. </div>';
	}
	if (!$_POST["brand"]) {
		$brand_error = '<div class="alert alert-danger" role="alert"><strong>Uh Oh!</strong> Empty Brand detected. </div>';
	}

	$valid_submission = ($product_code_error == "") && ($product_name_error == "") && ($cost_price_error == "") && ($selling_price_error == "") && ($brand_error == "");

	if ($valid_submission) {
		// This is where the sql insertion will occur
		$product_code = substr(uniqid(),7,6); // Generates a random product code
		$product_name = $_POST["productName"];
		$cost_price = $_POST["costPrice"];
		$selling_price = $_POST["sellingPrice"];
		$brand = $_POST["brand"];
		$insert_query = "INSERT INTO products (productcode,productname,costprice,sellingprice,brand) VALUES('$product_code','$product_name',$cost_price,$selling_price,'$brand');";
		if ($insert_result = mysqli_query($db, $insert_query)) {
			// echo "It worked";
			$success_message = file_get_contents("../components/success-message.html");
		} 
	}
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
			<h1 class="minty-text">Products</h1>
		</div>
	</div>
	<div id="areaToPrint">
		<table class="table table-striped table-dark icetrack-table">
			<thead>
			<tr>
				<th scope="col">Product Code</th>
				<th scope="col">Product Name</th>
				<th scope="col">Cost Price</th>
				<th scope="col">Selling Price</th>
				<th scope="col">Brand</th>
			</tr>
			</thead>
			<tbody>
<?php
	$query = "SELECT * FROM products";
if ($result = mysqli_query($db, $query)) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo '<tr>';
		echo '<td>' . $row["productcode"] . '</td>';
		echo '<td>' . $row["productname"] . '</td>';
		echo '<td>$ ' . $row["costprice"] . '</td>';
		echo '<td>$ ' . $row["sellingprice"] . '</td>';
		echo '<td>' . $row["brand"] . '</td>';
		echo '</tr>';
	}
}
?>
			</tbody>
		</table>
	</div>
	<div class="container-fluid icetrack-form-div">
		<div class="row">
			<div class="col-4">
				<form method="post">
					<div class="form-group">
						<button class="btn minty-button minty-dropdown-button btn-block" type="button" data-toggle="collapse" data-target="#collapseExample">
							<h1>Add a Product <i class="fa fa-arrow-circle-down" aria-hidden="true"></i></h1>
						</button>
					</div>
					<div id="collapseExample" class="collapse">
						<div class="form-group">
							<label for="productName">Product Name</label>
							<input type="text" class="form-control" id="productName" name="productName" placeholder="Product Name">
						</div>
						<?php echo $product_name_error; ?>

						<div class="form-group">
							<label for="costPrice">Cost Price</label>
							<input type="text" class="form-control" id="costPrice" name="costPrice" placeholder="Cost Code">
						</div>
						<?php echo $cost_price_error; ?>

						<div class="form-group">
							<label for="sellingPrice">Selling Price</label>
							<input type="text" class="form-control" id="sellingPrice" name="sellingPrice" placeholder="Selling Price">
						</div>
						<?php echo $selling_price_error; ?>

						<div class="form-group">
							<label for="brand">Brand</label>
							<input type="text" class="form-control" id="brand" name="brand" placeholder="Brand">
						</div>
						<?php echo $brand_error; ?>

						<div class="form-group">
							<button type="submit" class="btn minty-button">Submit</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-4"></div>
			<div class="col-4">
				<?php echo $success_message;?>
			</div>
		</div>
		<div class="row">
		</div>


	</div>

</div>

<?php echo file_get_contents("../components/bootstrap-js.html"); ?>
<script type="text/javascript" src="../script.js"></script>
</body>

</html>
