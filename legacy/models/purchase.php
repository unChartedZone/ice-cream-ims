<?php
include('../login/session.php');
$name = $login_session;

if ($_POST) {
    if (!$_POST["productName"]) {
        $product_name_error = '<div class="alert alert-danger" role="alert"><strong>Uh Oh!</strong> Empty Product Name detected. </div>';
    }
    if (!$_POST["supplierName"]) {
        $supplier_name_error = '<div class="alert alert-danger" role="alert"><strong>Uh Oh!</strong> Empty Full Name detected. </div>';
    }
    if (!$_POST["quantity"]) {
        $quantity_error = '<div class="alert alert-danger" role="alert"><strong>Uh Oh!</strong> Empty Quantity Value detected. </div>';
    }
    if (!$_POST["totalCost"]) {
        $total_cost_error = '<div class="alert alert-danger" role="alert"><strong>Uh Oh!</strong> Empty  Total Cost detected. </div>';
    }

    $valid_submission = ($product_name_error == "") && ($supplier_name_error == "") && ($totatl_cost == "");

    if ($valid_submission) {
        // This is where the sql insertion will occur
        $product_name = $_POST["productName"];
        $supplier_name = $_POST["supplierName"];
	    date_default_timezone_set('America/Los_Angeles'); // Set timezone for date function
		$date = date('m/d/Y h:i:s a', time());
        $quantity = $_POST["quantity"];
        $total_cost = $_POST["totalCost"];

        // SQL INSERT QUERY WILL BE MADE
        $insert_query = "INSERT INTO purchaseinfo(supplier_id, product_id, date, quantity, totalcost) VALUES((select supplier_id from suppliers where fullname = '$supplier_name'),(select product_id from products where productname = '$product_name'), '$date', $quantity, $total_cost)";

        if ($insert_result = mysqli_query($db, $insert_query)) {
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
			<h1 class="minty-text">Purchase</h1>
		</div>
	</div>
	<div id="areaToPrint">
		<table class="table table-striped table-dark icetrack-table">
			<thead>
			<tr>
				<th scope="col">Product Name</th>
				<th scope="col">Supplier</th>
				<th scope="col">Date</th>
				<th scope="col">Quantity</th>
                <th scope="col">Total Cost</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$query = "SELECT p.productname, s.fullname, pi.date, pi.quantity, pi.totalcost FROM `products` as p NATURAL JOIN purchaseinfo as pi NATURAL JOIN suppliers as s";
			if ($result = mysqli_query($db, $query)) {
				while ($row = mysqli_fetch_assoc($result)) {
					echo '<tr>';
					echo '<td>' . $row["productname"] . '</td>';
					echo '<td>' . $row["fullname"] . '</td>';
					echo '<td>' . $row["date"] . '</td>';
					echo '<td>' . $row["quantity"] . '</td>';
					echo '<td>' . $row["totalcost"] . '</td>';
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
                <form action="./purchase.php" method="post">
                    <div class="form-group">
	                    <button class="btn minty-button minty-dropdown-button btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
		                    <h1>Add a Purchase <i class="fa fa-arrow-circle-down" aria-hidden="true"></i></h1>
	                    </button>
                    </div>
					<div class="collapse" id="collapseExample">
						<div class="form-group">
							<label for="productName">Product Name</label>
							<input type="text" class="form-control" id="productName" name="productName" aria-describedby="product name" placeholder="Product Name">
						</div>
						<?php echo $product_name_error; ?>

						<div class="form-group">
							<label for="supplierName">Supplier Name</label>
							<input type="text" class="form-control" id="supplierName" name="supplierName" placeholder="Supplier Name">
						</div>
						<?php echo $supplier_name_error; ?>

						<div class="form-group">
							<label for="quantity">Quantity</label>
							<input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
						</div>
						<?php echo $quantity_error; ?>

						<div class="form-group">
							<label for="totalCost">Total Cost</label>
							<input type="text" class="form-control" id="totalCost" name="totalCost" placeholder="Total Cost">
						</div>
						<?php echo $total_cost_error; ?>

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
    </div>


</div>

<?php echo file_get_contents("../components/bootstrap-js.html"); ?>
<script type="text/javascript" src="../script.js"></script>
</body>

</html>
