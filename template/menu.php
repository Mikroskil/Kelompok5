<html>
	<head>
		<title>menu</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/menu.css" />
		<link rel="stylesheet" type="text/css" href="../assets/css/link.css" />
	</head>
	<body>
		<div id="menu">
			<a href="index.php">Home</a> &nbsp; &nbsp; | &nbsp; &nbsp; <a href="unanswered.php">Unanswerred</a> &nbsp; &nbsp; 
			<?php
				if (isset($_SESSION["status"]))
				{
					echo "| &nbsp; &nbsp; <a href='ask.php'>Asking</a>";
				}
			?>
		</div>
	</body>
</html>