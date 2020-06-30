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
echo file_get_contents("../components/navbar.html");
?>

<div id="dashboard-homepage" class="container-fluid">
	<div id="dashboard-home-container" class="container-fluid">
		<h1 id="dashboard-welcome" class="minty-text">Welcome Back <?php echo ucfirst($name); ?>!</h1>
	</div>
</div>

<?php echo file_get_contents("../components/bootstrap-js.html"); ?>

<script type="text/javascript" src="../script.js"></script>
</body>

</html>
