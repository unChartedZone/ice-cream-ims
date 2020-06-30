<?php
include('../login/session.php');
$name = $login_session;

if ($_POST) {
    if (!$_POST["productName"]) {
        $product_name_error = '<div class="alert alert-danger" role="alert"><strong>Uh Oh!</strong> Empty Product Name detected. </div>';
    }
    if (!$_POST["quantity"]) {
        $quantity_error = '<div class="alert alert-danger" role="alert"><strong>Uh Oh!</strong> Empty Quantity Value detected. </div>';
    }

    $valid_submission = ($product_name_error == "")  && ($quantity_error == "");

    if ($valid_submission) {
        // This is where the sql insertion will occur
        $product_name = $_POST["productName"];
        $quantity = $_POST["quantity"];

        // SQL INSERT QUERY WILL BE MADE

        $insert_query = "INSERT INTO currentstocks (product_id, quantity) VALUES ((select product_id from products where productname = '$product_name'), $quantity) ON DUPLICATE KEY UPDATE quantity = quantity + $quantity";

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
			<h1 class="minty-text">Inventory</h1>
		</div>
	</div>
	<div id="areaToPrint">
		<table class="table table-striped table-dark icetrack-table">
			<thead>
			<tr>
				<th scope="col">Product Code</th>
				<th scope="col">Product Name</th>
				<th scope="col">Quantity</th>
			</tr>
			</thead>
			<tbody>
			<?php
            $query = "SELECT pn.productcode, pn.productname, qu.quantity FROM `products` as pn NATURAL JOIN currentstocks as qu";
			if ($result = mysqli_query($db, $query)) {
				while ($row = mysqli_fetch_assoc($result)) {
					echo '<tr>';
					echo '<td>' . $row["productcode"] . '</td>';
					echo '<td>' . $row["productname"] . '</td>';
					echo '<td>' . $row["quantity"] . '</td>';
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
	                    <button class="btn minty-button minty-dropdown-button btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
		                    <h1>Add Inventory Item <i class="fa fa-arrow-circle-down" aria-hidden="true"></i></h1>
	                    </button>
                    </div>
	                <div id="collapseExample" class="collapse">
		                <div class="form-group">
			                <label for="productName">Product Name</label>
			                <input type="text" class="form-control" id="productName" name="productName" aria-describedby="product name" placeholder="Product Name">
		                </div>
		                <?php echo $product_name_error; ?>
		                <div class="form-group">
			                <label for="quantity">Quantity</label>
			                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
		                </div>
		                <?php echo $quantity_error; ?>
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
