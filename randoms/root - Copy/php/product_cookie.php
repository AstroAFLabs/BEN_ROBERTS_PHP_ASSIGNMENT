<!DOCTYPE html>
		<?php

			$numVisits = 0;
		
			if (isset($_COOKIE['count'])) {
				$numVisits = ++$_COOKIE['count'];
			}
			else {
				$numVisits = 1;			
			}
			setcookie("count",$numVisits, time()+ (86400 * 365));
		?>
	
		<html lang="en">
zz
		<head>
			<meta charset="UTF-8">
			<title>Last Visited Example</title>
		</head>
		<body>
			<h1>Last Visited Example</h1>		
		
			<?php
			
				if ($numVisits == 1)  {
					echo "<p>Welcome on your first visit to this page<p>";
				}
				else  {
					echo "<p>Welcome back ! You have visited this page <b>" . 								$_COOKIE['count']. "</b> times.<p>";
				}
			?>	
		</body>
		</html>
