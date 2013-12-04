<html>
	<head>
		<title>header</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/header.css" />
		<link rel="stylesheet" type="text/css" href="../assets/css/link.css" />
	</head>
	<body>
	<div id="header">
		<div id="logo">
			<a href="index.php"> <img class="logo" src="../assets/images/logo.jpg" width="40"></a>
		</div>
		<div id="search">
			<form action="searchresults.php" method="get">
				<fieldset>
                    				<input type="text" name="search" placeholder="search" />
                    				<input type="submit" value="Search" />
				</fieldset>
			</form>
		</div>
		<div id="search">
			<form action="searchresults.php" method="get">
				<fieldset>
                    				<input type="text" name="search" placeholder="search" />
                    				<input type="submit" value="Search" />
				</fieldset>
			</form>
		</div>
		<div id="search">
			<form action="searchresults.php" method="get">
				<fieldset>
                    				<input type="text" name="search" placeholder="search" />
                    				<input type="submit" value="Search" />
				</fieldset>
			</form>
		</div>
		<div id="login">
			<p> 
				<?php
					session_start();
					if (isset($_SESSION["status"]))
					{
						echo "<a class='regis' href='profil.php'>" . $_SESSION["name"] . "</a> &nbsp; &nbsp; &nbsp; &nbsp;";
						echo "<a href = 'logout.php'>Log Out</a>";
					}
					else
					{
						echo "<a class='regis' href='register.php'>Sign Up</a> &nbsp; &nbsp; &nbsp; &nbsp";
						echo "<a href='login.php'>Log In</a>";
					}
				?>
			</p>
		</div>
	</div>
	</body>
</html>
