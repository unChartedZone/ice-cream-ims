<?php
include('../login/session.php');
$name = $login_session;
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
			<h1 class="minty-text">Sales</h1>
		</div>
	</div>
	<div id="areaToPrint">
		<table class="table table-striped table-dark icetrack-table">
			<thead>
			<tr>
				<th scope="col">Product Name</th>
				<th scope="col">Customer Name</th>
				<th scope="col">Quantity</th>
				<th scope="col">Revenue</th>
                <th scope="col">Date</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$query = "SELECT  pn.productname, c.fullname, sr.quantity, sr.revenue, sr.date FROM products as pn Natural JOIN customers as c natural join salesreport as sr";
			if ($result = mysqli_query($db, $query)) {
				while ($row = mysqli_fetch_assoc($result)) {
					echo '<tr>';
					echo '<td>' . $row["productname"] . '</td>';
					echo '<td>' . $row["fullname"] . '</td>';
                    echo '<td>' . $row["quantity"] . '</td>';
					echo '<td>' . $row["revenue"] . '</td>';
					echo '<td>' . $row["date"] . '</td>';
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
                              <h1>Add A Sale <i class="fa fa-arrow-circle-down" aria-hidden="true"></i></h1>
                          </button>
                      </div>
                      <div id="collapseExample" class="collapse">
                          <div class="form-group">
                              <label for="customerName">Customer Name</label>
                              <input type="text" class="form-control" id="customerName" name="customerName" placeholder="Customer Name">
                          </div>
                          <?php echo $customer_name_error; ?>
                          <div class="form-group">
                              <label for="quantity">Quantity</label>
                              <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
                          </div>
                          <?php echo $quantity_error; ?>
                          <div class="form-group">
                              <label for="revenue">Revenue</label>
                              <input type="text" class="form-control" id="revenue" name="revenue" placeholder="Revenue">
                          </div>
                          <?php echo $quantity_error; ?>
                          <div class="form-group">
                              <button type="submit" class="btn minty-button">Submit</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
       </div>
    </div>
</div>

<?php echo file_get_contents("../components/bootstrap-js.html"); ?>
<script type="text/javascript" src="../script.js"></script>
</body>

</html>
