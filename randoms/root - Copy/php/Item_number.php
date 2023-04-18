<!doctype="html>


<?php

	$itemNumber = 0;
	if(isset($_COOKIE['count'])) {
	$itemNumber =++$_COOKIE['count'];
	}
	else {
		$itemNumber = 1;
	}
	setcookie("entry",$itemNumber, time()+86400);
	?>
	
	<html lang="en">
	<head>
	<meta charset="utf-8">	
	<link rel="stylesheet" type="text/css" href="METAKRON.css">

	
	<title>Item Number</title>
	</head>
	<body>
	<h1>Product details entered</h1>
	<?php
	
	if($itemNumber ==1){
		echo "<p> Item ".$_COOKIE['entry']. "has been entered into the Acme Door Levers Database. </p>";
	}
	?>
	
	<a href="acmePortal.php">Return to product entry page</a>
	
	</body>
	</html>
	
	